<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/23/2017
 * Time: 2:36 PM
 */
session_start();

if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if (
            isset($_POST['parent']) &&
            isset($_POST['text']) &&
            $_POST['text'] != '' &&
            isset($_POST['name']) &&
            $_POST['name'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();
            $text = mysqli_real_escape_string($conn, $_POST['text']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $parent = mysqli_real_escape_string($conn, $_POST['parent']);


            $adminId = generate_id();
            $randomINT = rand(900000, 1000000);
            $code = '[MJ' . $randomINT . ']';
            $insertIntoAdmin = mysqli_query($conn, "INSERT INTO module (moduleId, moduleName, moduleCode, moduleText,moduleCollectionId) VALUES 
            ('$adminId','$name','$code','$text','$parent')");
            if ($insertIntoAdmin) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}