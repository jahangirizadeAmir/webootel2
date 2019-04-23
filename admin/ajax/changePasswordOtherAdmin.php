<?php
/**
 * artiash.com
 */

/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/21/2017
 * Time: 10:11 PM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

        if(
            isset($_POST['id']) && $_POST['id']!='' &&
            isset($_POST['newPassword']) && $_POST['newPassword']!='' &&
            isset($_POST['rtNewPassword']) && $_POST['rtNewPassword']!=''
        ){


            include '../../inc/conn.php';
            include '../../inc/my_frame.php';
            $conn = connection();


            $adminId = mysqli_real_escape_string($conn,$_POST['id']);



                if($_POST['newPassword']===$_POST['rtNewPassword']){


                    $new_pass = mysqli_real_escape_string($conn,passwordHash($_POST['newPassword']));
                    $update = mysqli_query($conn,"UPDATE admin SET adminPassword = '$new_pass' WHERE adminId = '$adminId'");
                    if($update){
                        session_destroy();
                        $call=array('error'=>false);
                        echo json_encode($call);
                        endfile($conn);
                    }else{
                        $call = array('error'=>true);
                        echo json_encode($call);
                        endfile($conn);
                    }
                }else{
                    $call = array('error'=>true);
                    echo json_encode($call);
                    endfile($conn);
                }




        }

    }
}