<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-22
 * Time: 14:23
 */
$setArray = array("name","id");
include "../../class/dataBase.php";
$db = new dataBase();
if(
    $db::issetParams($_POST,$setArray)
    &&
    $db::emptyParams($_POST,$setArray)
){
    $result = $db::RealString($_POST);
    $name = $result['name'];
    $id = $result['id'];

    $Q = $db::Query("UPDATE cat Set catName = '$name' where catId='$id'");

    $call = array("error"=>false);
    echo  json_encode($call);
}