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
            isset($_POST['receive']) && !empty($_POST['receive']) &&
            isset($_POST['text']) && !empty($_POST['text'])
        ){
            include '../../inc/conn.php';
            include "../../inc/my_frame.php";
            $conn = connection();
            $adminJobsAdminId = mysqli_real_escape_string($conn,$_POST['receive']);
            $text = mysqli_real_escape_string($conn,$_POST['text']);

            $id = generate_id();
            $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);

            $insertIntoJobs = mysqli_query($conn,"
            INSERT INTO adminjobs (adminJobsId, adminJobsSenderId, adminJobsAdminId, adminJobsPercent, adminJobsText) VALUES 
            ('$id','$adminId','$adminJobsAdminId','0','$text')");
            if($insertIntoJobs){
                $call =array('error'=>false);
                echo json_encode ($call);
                endfile($conn);
            }
        }
    }
}