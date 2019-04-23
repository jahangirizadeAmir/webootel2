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
                $img = 'defult';
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
            $postId = generate_id();
            $date = _date();
            $time = _time();
            $insertIntoAdmin = mysqli_query($conn, "INSERT INTO post 
        (
         postId, postName, postImg,
         postText, postTitle, postParent,
         postRegDate,
         postRegTime, postAdminId,
         postWidth, postRight, postLeft,postShortText
         ) VALUES
          ('$postId','$name','$img','$detail',
          '$title','$parent','$date','$time','$adminId',
          '$width','$detailRight','$detailLeft','$detail2')");
            if ($insertIntoAdmin) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}