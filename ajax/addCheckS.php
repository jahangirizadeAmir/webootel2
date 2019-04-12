<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-11
 * Time: 18:10
 */
include "../class/dataBase.php";
$db= new dataBase();
$issetArray = array("name","mobile","tell","address","postalCode","serviceModel","lat","lng");
$emptyArray = array("name","mobile","tell","address","postalCode","serviceModel");
if(
    $db::issetParams($_POST,$issetArray)
    &&
    $db::emptyParams($_POST,$emptyArray)
){

    $result = $db::RealString($_POST);
    $name = $result['name'];
    $mobile = $result['mobile'];
    $tell = $result['tell'];
    $address = $result['address'];
    $postalCode = $result['postalCode'];
    $serviceModel = $result['serviceModel'];
    $lat = $result['lat'];
    $lng = $result['lng'];
    $date=$db::GetDate();
    $time = $db::GetTime();

    $Q = $db::Query("INSERT INTO checkService 
          (serviceName, serviceMobile, serviceTell, serviceAddress, 
          servicePostalCode,serviceModel, serviceLat, serviceLng,
           serviceDate, serviceTime,serviceOk,serviceDesc) VALUES
                                            (
                                             '$name','$mobile','$tell','$address',
                                             '$postalCode','$serviceModel','$lat','$lng',
                                             '$date','$time','',''
                                          )");

    if($Q){
        $call=array("error"=>false);
        echo json_encode($call);
    }
}else{
    $call = array("error"=>true,"MSG"=>"تمامی موارد اجباری می باشد");
    echo json_encode($call);
}