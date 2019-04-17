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
            isset($_POST['skill']) && $_POST['skill'] != '' &&
            isset($_POST['name']) && $_POST['name'] != '' &&
            isset($_POST['text']) && $_POST['text'] != '' &&
            isset($_POST['img']) && $_POST['img'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";

            $conn = connection();
            $skill = mysqli_real_escape_string($conn, $_POST['skill']);
            $text = mysqli_real_escape_string($conn, $_POST['text']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $img = mysqli_real_escape_string($conn, $_POST['img']);

            $nameImg = generateRandomString();
            saveImage($img, '../../img/', $nameImg);

            $id = generate_id();

            $insertOurTeam = mysqli_query($conn, "
INSERT INTO ourteam (ourTeamId, ourTeamName, ourTeamText, ourTeamSkill, ourTeamImg) VALUES ('$id','$name','$text','$skill','$nameImg')");
            if ($insertOurTeam) {
                $call = array('error' => false);
                echo json_encode($call);
            }
        }
    }
}