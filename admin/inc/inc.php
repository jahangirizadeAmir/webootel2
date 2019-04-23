<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/20/2017
 * Time: 2:36 PM
 */
session_start();
if(!isset($_SESSION['loginAdmin']) || $_SESSION['loginAdmin']!=true){
    header('LOCATION:login.php');
    exit(0);
}
include 'head.php';
include 'header.php';
include 'menu.php';