<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-04-22
 * Time: 13:38
 */
session_start();
session_destroy();
header("location:login.php");