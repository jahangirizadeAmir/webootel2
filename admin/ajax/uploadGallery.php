<?php
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

        if (isset($_POST['img'])
            && $_POST['img'] != '' &&
            $_POST['img'] != 'undefined' &&
            isset($_POST['id']) && $_POST['id']!=''
        ) {
            include '../../inc/conn.php';
            include '../../inc/my_frame.php';
            $conn = connection();
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $img = mysqli_real_escape_string($conn, $_POST['img']);


            $nameImg = generateRandomString();
            saveImage($img, '../../img/', $nameImg);

            $galleryId = generate_id();

            $insertQuery = mysqli_query($conn,"INSERT INTO gallery 
( gallery_id, gallery_estateId, gallery_imgLink, gallery_metaTag ) 
    VALUES
( '$galleryId','$id','$nameImg','' )");
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