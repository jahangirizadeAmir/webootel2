<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/22/2017
 * Time: 12:29 AM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {
        if(
            isset($_POST['img']) && !empty($_POST['img'])
        ){
            include '../../inc/conn.php';
            include "../../inc/my_frame.php";
            $conn = connection();

            $img = mysqli_real_escape_string($conn, $_POST['img']);
            $nameImg = generateRandomString();
            saveImage($img, '../../img/', $nameImg);

            $id = generate_id();



            $insertIntoJobs = mysqli_query($conn,"INSERT INTO image (imageId, imageUrl, imageType) VALUES ('$id','$nameImg','.jpg')");
            if($insertIntoJobs){
                $call =array('error'=>false,'id'=>$id,'address'=>$nameImg.'.jpg');
                echo json_encode ($call);
                endfile($conn);
            }
        }
    }
}