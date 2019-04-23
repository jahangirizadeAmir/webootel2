<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-22
 * Time: 15:52
 */

$id = $_GET['id'];
include "../../class/dataBase.php";
$db=new dataBase();
$Q = $db::Query("DELETE FROM news where newsId='$id'");
header("location:../listNews.php");