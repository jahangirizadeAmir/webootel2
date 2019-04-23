<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-02-24
 * Time: 11:26
 */

include "../../class/dataBase.php";
$db = new dataBase();

session_start();

    $array = array("userName", "password");
    if (

        $db::issetParams($_POST, $array)
        &&
        $db::emptyParams($_POST, $array)

    ) {
        $Real = $db::RealString($_POST);
        $userName = $Real['userName'];
        $password = $Real['password'];

        $password = $db::HashPassword($password);

        $query = "SELECT * FROM admin where adminUsername='$userName' AND adminPassword='$password'";

        if ($db::Query($query, $db::$NUM_ROW) == 1) {
            $call = array("login" => true);
            $_SESSION['login'] = true;
            $row = $db::Query($query, $db::$RESULT_ARRAY);
            $_SESSION['adminId'] = $row['adminId'];
        } else {
            $call = array("login" => $password);
        }
        echo json_encode($call);
    } else {
        $call = array("login" => false);
        echo json_encode($call);

}