<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-12
 * Time: 18:31
 *
*/
session_start();
include "../class/dataBase.php";
$db= new dataBase();
$Setarray=array("gender","name","nationalCode","fatherName","bLocation"
            ,"birthDate","tell","email","address","shsh","agent","postCode");
$emptyarray=array("gender","name","nationalCode","fatherName","bLocation"
            ,"birthDate","tell","email","address","shsh","postCode");
if(
    $db::issetParams($_POST,$Setarray)
    &&
    $db::emptyParams($_POST,$emptyarray)
){
    $result       = $db::RealString($_POST);
    $result2      = $db::RealString($_SESSION);
    $gender       = $result['gender'];
    $name         = $result['name'];
    $nationalCode = $result['nationalCode'];
    $fatherName   = $result['fatherName'];
    $bLocation    = $result['bLocation'];
    $birthDate    = $result['birthDate'];
    $tell         = $result['tell'];
    $emil         = $result['email'];
    $address      = $result['address'];
    $shsh         = $result['shsh'];
    $agent        = $result['agent'];
    $postalCode   = $result['postCode'];
    $id = $db::Gid();
    $date = $db::GetDate();
    $time = $db::GetTime();
    $Q = $db::Query("INSERT INTO userCustomer (
                          userId, userName, userGender, userNationalCode, userFathername, userCityBorn, userBDate, userTell,
                          userEmail, userAddress, userShSh, userAgentName, userPostalCode, userDate, userTime)
                          VALUES ('$id','$name','$gender','$nationalCode',
                                  '$fatherName','$bLocation','$birthDate','$tell','$emil'
                                  ,'$address','$shsh','$agent','$postalCode','$date','$time')");
    if($Q){
        $number = $result2['number'];
        $Q3 = $db::Query("SELECT * FROM checkService where checkService.serviceId='$number'",$db::$RESULT_ARRAY);
        $model = $Q3['serviceModel'];
        $Q2 = $db::Query("DELETE FROM checkService where serviceId='$number'");
            $_SESSION['number']='';
            $call = array("error"=>false,"serviceModel"=>$model);
            echo json_encode($call);
    }else{
        $call = array("error"=>true,"MSG"=>"خطایی رخ داده است لطفا مجدد اقدام نمایید");
        echo json_encode($call);
    }
}else{
    $call = array("error"=>true,"MSG"=>"موارد ستاره دار اجباری می باشد.");
    echo json_encode($call);
}