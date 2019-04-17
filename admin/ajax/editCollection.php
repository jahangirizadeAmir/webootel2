<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/23/2017
 * Time: 2:36 PM
 */

//title:title,
//                name:name,
//                parent:parent,
//                detail:detail,
//                detailRight:detailRight,
//                detailLeft:detailLeft,
//                img: img
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['id']) && $_POST['id'] != '') {
        if (
            isset($_POST['title']) && $_POST['title'] != '' &&
            isset($_POST['name']) && $_POST['name'] != '' &&
            isset($_POST['parent']) && $_POST['parent']!='' &&
            isset($_POST['detailRight']) &&
            isset($_POST['detailLeft'])
        ) {


            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            session_start();
            $conn = connection();

            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $parent = mysqli_real_escape_string($conn, $_POST['parent']);
            $detailRight = mysqli_real_escape_string($conn, $_POST['detailRight']);
            $detailLeft = mysqli_real_escape_string($conn, $_POST['detailLeft']);

            if ($detailRight == '' && $detailLeft == '') {
                $width = '1';
            } else {
                $width = '0';
            }

            $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);
            $postId = mysqli_real_escape_string($conn,$_POST['id']);
            $date = _date();
            $time = _time();
            $insertIntoAdmin = mysqli_query($conn, "UPDATE collection SET
            collectionParent = '$parent',collectionAdminId = '$adminId',
            collectionTitle = '$title',collectionName='$name',
            collectionRight='$detailRight',collectionLeft='$detailLeft'
            ,collectionWidth='$width'
            WHERE collectionId = '$postId'");
            if ($insertIntoAdmin) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}