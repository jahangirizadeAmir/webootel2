<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-02-24
 * Time: 16:15
 */
$array = array("number");
include "../../class/dataBase.php";
$db = new dataBase();

if(
    $db::issetParams($_POST,$array) &&
    $db::emptyParams($_POST,$array)
){
    $real = $db::RealString($_POST);
    $id = $real['number'];
    $select ="SELECT * FROM lawyer where lawyerFileNumber='$id'";
    if($db::Query($select,$db::$NUM_ROW)==1){
        $row = $db::Query($select,$db::$RESULT_ARRAY);

        $call = array(
            "result"=>true,
            "name"=>$row['lawyerName'],
            "family"=>$row["lawyerFamily"],
            "NationalCode"=>$row['lawyerNationalCode']
        );

    }else{
        $call = array(
            "result"=>false,
            "name"=>null,
            "family"=>null,
            "NationalCode"=>null
        );
    }
    echo json_encode($call);
}