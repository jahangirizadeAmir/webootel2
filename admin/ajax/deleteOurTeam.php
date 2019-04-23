<?php
/**
 * artiash.com
 */

/**
 * artiash.com
 */

/**
 * artiash.com
 */

/**
 * artiash.com
 */

/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/21/2017
 * Time: 2:18 PM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {

        if (
            isset($_POST['id']) && $_POST['id']!=''
        ) {
            include '../../inc/conn.php';
            include '../../inc/my_frame.php';
            $conn = connection();
            $id = mysqli_real_escape_string($conn, $_POST['id']);





            $insertQuery = mysqli_query($conn,"DELETE FROM ourteam WHERE ourTeamId='$id'");
                if ($insertQuery) {
                    $call = array('error' => false);
                    echo json_encode($call);
                }else{
                    echo mysqli_error($conn);
                }

        }
    }
}
?>