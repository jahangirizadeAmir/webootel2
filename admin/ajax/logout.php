<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/21/2017
 * Time: 12:46 PM
 */
    session_start();
    session_destroy();
header('location:../login.php');