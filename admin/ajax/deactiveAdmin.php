<?php
/**
 * artiash.com
 */

/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/23/2017
 * Time: 2:36 PM
 */
session_start();

if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if (
            isset($_POST['id']) &&
            $_POST['id'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();

            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $select = mysqli_query($conn, "SELECT * FROM admin WHERE admin.adminId='$id'");
            $rowGet = mysqli_fetch_assoc($select);
            $adminLevel = $rowGet['adminlevel'];
            if ($adminLevel == 3) {
                $_SESSION['level'] == '0' ? $updateAdmin = 2 : $updateAdmin = 0;
            } else {
                $updateAdmin = 3;
            }
            $update = mysqli_query($conn, "UPDATE admin set admin.adminlevel='$updateAdmin' WHERE adminId='$id'");
            if ($update) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}