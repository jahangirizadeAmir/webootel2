<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/21/2017
 * Time: 2:18 PM
 */
session_start();

if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

            if (isset($_POST['mobile'])
                && $_POST['mobile'] != '' &&
                isset($_POST['email']) &&
                $_POST['email'] != '' &&
                isset($_POST['tell']) &&
                !empty($_POST['tell'])
            ) {
                include '../../inc/conn.php';
                include '../../inc/my_frame.php';
                $conn = connection();
                $tell = mysqli_real_escape_string($conn, $_POST['tell']);
                $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);

                $insertQuery = mysqli_query($conn, " UPDATE admin SET adminTell = '$tell' , adminMobile = '$mobile' , adminEmail = '$email' WHERE adminId = '$adminId'");
                if ($insertQuery) {
                    $_SESSION['email'] = $email;
                    $_SESSION['mobile'] = $mobile;
                    $_SESSION['tell'] = $tell;
                    $call = array('error' => false);
                    echo json_encode($call);
                }
            }
        }
    }
}
?>