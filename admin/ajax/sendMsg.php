<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/21/2017
 * Time: 2:18 PM
 */
if($_SERVER['REQUEST_METHOD']=='POST') {
    session_start();
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {
        if(isset($_POST['text']) && $_POST['text']!=''){
            include '../../inc/conn.php';
            include '../../inc/my_frame.php';
            $conn = connection();
            $text = mysqli_real_escape_string($conn,$_POST['text']);
            $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
            $id = generate_id();
            $date = _date();
            $time = _time();
            $insertQuery = mysqli_query($conn,"
            INSERT INTO adminmsg (adminMsgId, adminMsgText, adminMsgRegDate, adminMsgRegTime, adminMsgAdminId) VALUES 
            ('$id','$text','$date','$time','$adminId')");
            if($insertQuery){
                $call = array('error'=>false,'time'=>$time,'date'=>str_replace('-','/',jalali($date)));
                echo json_encode($call);
            }
        }
    }
}
?>