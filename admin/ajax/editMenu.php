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
            isset($_POST['icon']) &&
            isset($_POST['parent']) &&
            isset($_POST['target']) &&
            isset($_POST['name']) &&
            $_POST['name'] != '' &&
            isset($_POST['id']) &&
            $_POST['id'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();
            $icon = mysqli_real_escape_string($conn, $_POST['icon']);
            $parent = mysqli_real_escape_string($conn, $_POST['parent']);
            $target = mysqli_real_escape_string($conn, $_POST['target']);
            $type = substr($target, '0', '1');
            $target = substr($target, '1');
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $id = mysqli_real_escape_string($conn, $_POST['id']);

            $adminId = generate_id();
            $insertIntoAdmin = mysqli_query($conn, "UPDATE menu SET 
                menuIcon = '$icon',menuParent='$parent',menuType='$type',menuTarget='$target',menuName='$name'
                WHERE menu.menuId='$id'");
            if ($insertIntoAdmin) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}