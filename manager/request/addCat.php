<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-03-03
 * Time: 15:24
 */

$setArray = array("name");
include "../../class/dataBase.php";
$db = new dataBase();
if(
  $db::issetParams($_POST,$setArray)
  &&
  $db::emptyParams($_POST,$setArray)
){
    $result = $db::RealString($_POST);
    $name = $result['name'];
    $id = $db::Gid();

    $Q = $db::Query("INSERT INTO cat (catId, catName) VALUES ('$id','$name')");

    $call = array("error"=>false);
    echo  json_encode($call);
}