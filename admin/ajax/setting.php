<?php
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
            isset($_POST['head']) && $_POST['head'] != '' &&
            isset($_POST['header']) && $_POST['header'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();
            $head = mysqli_real_escape_string($conn, $_POST['head']);
            $header = mysqli_real_escape_string($conn, $_POST['header']);
            $adminId = generate_id();
            $insertIntoAdmin = mysqli_query($conn, "UPDATE setting set settingHead = '$head',settingHeader='$header'");
            if ($insertIntoAdmin) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}