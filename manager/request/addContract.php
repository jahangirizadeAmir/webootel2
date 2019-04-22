<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-03-03
 * Time: 15:24
 */

$setArray = array("number","sort","from","to","name","family","guest","intern","NCode","city");
$emptyArray = array("number","sort","from","to","guest","intern");
include "../../class/dataBase.php";
$db = new dataBase();
if(
  $db::issetParams($_POST,$setArray)
  &&
  $db::emptyParams($_POST,$emptyArray)
){
    $result = $db::RealString($_POST);
    $number = $result['number'];
    $NCode = $result['NCode'];
    $sort = $result['sort'];
    $from = (int) $db::convertNumber($result['from']);
    $to =   (int) $db::convertNumber($result['to']);
    $date = $db::GetDate();
    $time = $db::GetTime();
    $Query = "SELECT * FROM lawyer where lawyerFileNumber = '$number'";
    if($db::Query($Query,$db::$NUM_ROW)==0){
        if($db::emptyParams($result,$setArray)){
            $lawyerId = $db::Gid();
            $name = $result['name'];
            $family = $result['family'];
            if($result['guest']=="1"){
                $city = $result['city'];
                if($result['intern']=='1'){
                    $model='32';
                }else{
                    $model='2';
                }
            }else{
                $city='مهمان نیست';
                if($result['intern']=='1'){
                    $model="12";
                }else{
                    $model="1";
                }
            }
            $Query2 = "INSERT INTO lawyer (lawyerId, lawyerNationalCode, 
                    lawyerFileNumber, lawyerName, lawyerFamily, lawyerRegDate,
                    lawyerRegTime, lawyerModel, lawyerCity)
                     VALUES
                    ('$lawyerId','$NCode','$number','$name','$family','$date','$time','$model','$city')";
            $db::Query($Query2);
//            $lawyerRow  = $db::Query($Query);
//            $lawyerId = $lawyerRow['lawyerId'];
        }else{
            $call = array("error"=>true,"MSG"=>"کلیه اطلاعات کاربر را تکمیل کنید");
            echo json_encode($call);
            return;
        }
    }else{
        $lawyerRow = $db::Query($Query,$db::$RESULT_ARRAY);
        $lawyerId = $lawyerRow['lawyerId'];
    }
    $Query6 = "SELECT * FROM contractSettings where contractActive='1'";
    $result= $db::Query($Query6,$db::$RESULT_ARRAY);
    $SettingId = $result['contractSettingId'];
    $contactId = $db::Gid();
    $Query4 = "INSERT INTO contract (
                      contractId, contractStart, contractEnd,
                      contractUserId,contractSerial,contractSettingsId
    ) VALUES ('$contactId','$from','$to','$lawyerId','$sort','$SettingId')";
    $db::Query($Query4);
    $i = 0;
    $f = 0;
    $arrayDuplicate = array();
    for($from;$from<$to;$from++){
        $listContractId=$db::Gid();
        $Query5 = "SELECT * FROM `list contract` where contractSerial='$sort' AND listContractNumber='$from'";
        if($db::Query($Query5,$db::$NUM_ROW==0)) {
            $i++;
            $Query3 = "INSERT INTO `list contract` (listContractId, 
                             listContractNumber, listContract_ContractId,
                             listContractStatus,contractSerial) VALUES (
                             '$listContractId','$from','$contactId','1','$sort')";
            $db::Query($Query3);
        }else{
            $f++;
            $arrayDuplicate[] = array("number"=>$from,"sort"=>$sort);

        }
    }
    $call = array("error"=>false,"numberContract"=>$i,"duplicateCount"=>$f,"duplicateArray"=>$arrayDuplicate);
    echo  json_encode($call);
}