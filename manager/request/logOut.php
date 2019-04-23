<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-02-24
 * Time: 12:15
 */

session_start();
session_destroy();
header("location:../login.php");

