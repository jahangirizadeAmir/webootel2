<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-11
 * Time: 12:17
 */
include "../class/dataBase.php";
$db = new dataBase();
$arrayList = array("name","family","tell","mobile","bDate","city","email");
if(
    $db::issetParams($_POST,$arrayList)
        &&
    $db::emptyParams($_POST,$arrayList)
){
    $result = $db::RealString($_POST);
    $name = $result['name'];
    $family = $result['family'];
    $tell = $result['tell'];
    $mobile = $result['mobile'];
    $bDate = $result['bDate'];
    $city = $result['city'];
    $email = $result['email'];

    $id = $db::Gid();
    $date = $db::GetDate();
    $time = $db::GetTime();

    $Q = $db::Query("INSERT INTO seller (
                    sellerId, sellerName, sellerTell, sellerMobile,
                    sellerBDate, sellerCity, sellerEmail, sellerDate, sellerTime)
                     VALUES ('$id','$name','$tell','$mobile',
                     '$bDate','$city','$email','$date','$time')");
    $call = array("error"=>false);
    echo json_encode($call);

}else{
    $call = array("error"=>true,"MSG"=>"تمام پرامترها را ورودی را چک کنید");
    echo json_encode($call);

}