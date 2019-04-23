<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 7/14/2018
 * Time: 11:26 AM
 */
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['id']) && $_POST['id']!=''){
        include "../../inc/conn.php";
        $conn =connection();
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $delete = mysqli_query($conn,"DELETE FROM estate WHERE estate_id='$id'");
        if($delete){
            $call = array("error"=>false);
            echo json_encode($call);
        }
    }
}