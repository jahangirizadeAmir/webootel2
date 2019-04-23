<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/23/2017
 * Time: 2:36 PM
 */
//number:number,
//                name:name,
//                bottom:BOTTOM,
//                top:TOP,
//                text:TEXT
session_start();

if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if (
            isset($_POST['number']) && $_POST['number'] != '' &&
            isset($_POST['name']) && $_POST['name'] != '' &&
            isset($_POST['text']) && $_POST['text'] != '' &&
            isset($_POST['bottom']) &&
            isset($_POST['count']) &&
            isset($_POST['top'])
        ) {


            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            session_start();
            $conn = connection();


            $number = mysqli_real_escape_string($conn, $_POST['number']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $count = mysqli_real_escape_string($conn, $_POST['count']);
            $text = mysqli_real_escape_string($conn, $_POST['text']);
            $bottom = mysqli_real_escape_string($conn, $_POST['bottom']);
            $top = mysqli_real_escape_string($conn, $_POST['top']);


            $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);
            $postId = generate_id();
            $date = _date();
            $time = _time();
            $insertIntoAdmin = mysqli_query($conn, "INSERT INTO collectionstyle
        (collectionStyleId, collectionStyleHTML, collectionStyleName,
         collectionStyleTop, collectionStyleBottom, collectionStyleCount,collectionStylePageCount) VALUES
          ('$postId','$text',
          '$name','$top','$bottom','$count','$number')");
            if ($insertIntoAdmin) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}