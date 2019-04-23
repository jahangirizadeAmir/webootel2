<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-23
 * Time: 11:40
 */
include "../../class/dataBase.php";
$db = new dataBase();
$issetArray = array("id","desc","status");
if(
    $db::issetParams($_POST,$issetArray)
    &&
    $db::emptyParams($_POST,$issetArray)
){
    $result = $db::RealString($_POST);
    $id = $result['id'];
    $desc = $result['desc'];
    $status = $result['status'];

    $updateCheckServies = $db::Query("UPDATE checkService Set serviceOk='$status',serviceDesc='$desc' where serviceId='$id'");
    //TODO :: SMS SEND TO CUSTOMER

    $call = array("error"=>false);
    echo json_encode($call);

}