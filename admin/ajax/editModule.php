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
            isset($_POST['text']) &&
            $_POST['text'] != '' &&
            isset($_POST['id']) &&
            $_POST['id'] != '' &&
            isset($_POST['parent']) &&
            isset($_POST['name']) &&
            $_POST['name'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();
            $text = mysqli_real_escape_string($conn, $_POST['text']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $parent = mysqli_real_escape_string($conn, $_POST['parent']);


            $adminId = generate_id();
            $randomINT = rand(900000, 1000000);
            $code = '[MJ' . $randomINT . ']';
            $insertIntoAdmin = mysqli_query($conn, "UPDATE module SET moduleName='$name',moduleText='$text' ,moduleCollectionId='$parent'
            WHERE module.moduleId='$id'");

            if ($insertIntoAdmin) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}