<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/23/2017
 * Time: 2:36 PM
 */
session_start();

if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {
    if($_SESSION['level']=='0') {
        $level = '2';
    }else{
        $level  = '0';
    }

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if (
            isset($_POST['occupation']) && $_POST['occupation'] != '' &&
            isset($_POST['userName']) && $_POST['userName'] != '' &&
            isset($_POST['tell']) && $_POST['tell'] != '' &&
            isset($_POST['mobile']) && $_POST['mobile'] != '' &&
            isset($_POST['password']) && $_POST['password'] != '' &&
            isset($_POST['family']) && $_POST['family'] != '' &&
            isset($_POST['name']) && $_POST['name'] != '' &&
            isset($_POST['email']) && $_POST['email'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();
            $admin=mysqli_real_escape_string($conn,$_SESSION['id']);

            $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
            $userName = mysqli_real_escape_string($conn, $_POST['userName']);
            $tell = mysqli_real_escape_string($conn, $_POST['tell']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $password = passwordHash(mysqli_real_escape_string($conn, $_POST['password']));
            $family = mysqli_real_escape_string($conn, $_POST['family']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $select_userName = mysqli_query($conn, "SELECT * FROM admin WHERE adminUserName = '$userName'");
            if (mysqli_num_rows($select_userName) == 1) {
                $call = array('error' => true);
                echo json_encode($call);
                endfile($conn);
            } else {
                $adminId = generate_id();
                $insertIntoAdmin = mysqli_query($conn, "insert INTO admin (adminId, adminPassword, adminUserName, 
              adminName, adminImage, adminLastName, adminOccupation, adminEmail, adminMobile, adminTell,adminlevel,adminAdminId)
               VALUES ('$adminId','$password','$userName','$name','defult','$family','$occupation','$email',
               '$mobile','$tell','$level','$admin')");
                if ($insertIntoAdmin) {
                    $call = array('error' => false,'admin'=>$_SESSION['tell']);
                    echo json_encode($call);
                    endfile($conn);
                }
            }
        }
    }
}