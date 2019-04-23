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
session_start();

if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if (isset($_POST['id']) && $_POST['id'] != '') {
            if (
                isset($_POST['title']) && $_POST['title'] != '' &&
                isset($_POST['name']) && $_POST['name'] != '' &&
                isset($_POST['parent']) &&
                isset($_POST['detail']) && $_POST['detail'] != '' &&
                isset($_POST['detail2']) && $_POST['detail2'] != ''

            ) {


                include "../../inc/conn.php";
                include "../../inc/my_frame.php";
                $conn = connection();
                if (isset($_POST['img']) && $_POST['img'] != '') {
                    $img = mysqli_real_escape_string($conn, $_POST['img']);
                } else {
                    $img = '';
                }

                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $parent = mysqli_real_escape_string($conn, $_POST['parent']);
                $detail = mysqli_real_escape_string($conn, $_POST['detail']);
                $detail2 = mysqli_real_escape_string($conn, $_POST['detail2']);
                $detailRight = '';
                $detailLeft = '';

                if ($detailRight == '' && $detailLeft == '') {
                    $width = '1';
                } else {
                    $width = '0';
                }

                $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);
                $postId = mysqli_real_escape_string($conn, $_POST['id']);
                $date = _date();
                $time = _time();
                $insertIntoAdmin = mysqli_query($conn, "UPDATE post SET
            postParent = '$parent',postAdminId = '$adminId',
            postTitle = '$title',postName='$name',postText = '$detail',
            postRight='$detailRight',postLeft='$detailLeft'
            ,postWidth='$width',postImg = '$img',postShortText='$detail2'
            WHERE postId = '$postId'");
                if ($insertIntoAdmin) {
                    $call = array('error' => false);
                    echo json_encode($call);
                    endfile($conn);
                }
            }
        }
    }
}