<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-03-02
 * Time: 10:06
 */
include "../../class/dataBase.php";
$db=new dataBase();
$list = array("price","count");
if(
    $db::emptyParams($_POST,$list)
    &&
    $db::issetParams($_POST,$list)
){
    $result = $db::RealString($_POST);
    $price = $result['price'];
    $count = $result['count'];
    $date = $db::GetDate();
    $time = $db::GetTime();
    $Update = "UPDATE 
    contractSettings
    set
    contractActive='0'";
    $db::Query($Update);
    $Query = "INSERT INTO
    contractSettings (contractPrice, contractRegDate,
                      contractRegTime, contractCount,
                      contractActive)
                       VALUES
                       ('$price','$date',
                        '$time','$count',
                        '1')";
    $db::Query($Query);

    $call = array("error"=>false);
    echo json_encode($call);
}