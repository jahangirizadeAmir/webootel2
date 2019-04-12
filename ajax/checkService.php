<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-12
 * Time: 16:13
 */
include "../class/dataBase.php";
$db = new dataBase();
$arrayIsset = ("number");
if(
    $db::issetParams($_POST,$arrayIsset)
    &&
    $db::emptyParams($_POST,$arrayIsset)
){
    $result = $db::RealString($_POST);
    $number = $result['number'];

    $Q = $db::Query("SELECT * FROM checkService where serviceOk='1' AND serviceId='$number'",$db::$NUM_ROW);
    if($Q===1){
        $call = array("error"=>false);
    }else{
        $call = array("error"=>true);
    }
    echo json_encode($call);
}