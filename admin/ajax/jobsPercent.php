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
            isset($_POST['value']) && !empty($_POST['value']) &&
            isset($_POST['idJob']) && !empty($_POST['idJob'])
        ){
            include '../../inc/conn.php';
            include "../../inc/my_frame.php";
            $conn = connection();
            $idJob = mysqli_real_escape_string($conn,$_POST['idJob']);
            $value = mysqli_real_escape_string($conn,$_POST['value']);
            $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);


            $insertIntoJobs = mysqli_query($conn,"
            UPDATE adminjobs SET adminJobsPercent = '$value' WHERE adminJobsAdminId = '$adminId' AND adminJobsId = '$idJob'");
            if($insertIntoJobs){
                $call =array('error'=>false);
                echo json_encode ($call);
                endfile($conn);
            }
        }
    }
}