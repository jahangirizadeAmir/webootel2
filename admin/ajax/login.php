<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/20/2017
 * Time: 2:49 PM
 */


if($_SERVER['REQUEST_METHOD']=='POST'){
    include "../../class/dataBase.php";
    if(
        isset($_POST['username']) && $_POST['username']!='' &&
        isset($_POST['password']) && $_POST['password']!=''
    ){

        $conn = new dataBase();
        $userName = mysqli_real_escape_string($conn::connection(),$_POST['username']);
        $password = mysqli_real_escape_string($conn::connection(),$_POST['password']);

        $va_password = $conn::HashPassword($password);
        $selectAdministrator = mysqli_query($conn::connection(),"SELECT * FROM admin WHERE admin.adminUserName='$userName'
          AND admin.adminPassword='$va_password' ");
        IF(mysqli_num_rows($selectAdministrator)==1){

            $rowAdmin = mysqli_fetch_assoc($selectAdministrator);
            $adminName = $rowAdmin['adminName'];
            session_start();
            $_SESSION['loginAdmin']=true;
            $_SESSION['name']=$adminName;
            $_SESSION['lastName']=$rowAdmin['adminLastName'];
            $_SESSION['img']='img/upload/'.$rowAdmin['adminImage'].'.jpg';
            $_SESSION['adminOccupation']=$rowAdmin['adminOccupation'];
            $_SESSION['email'] = $rowAdmin['adminEmail'];
            $_SESSION['mobile']=$rowAdmin['adminMobile'];
            $_SESSION['tell']=$rowAdmin['adminTell'];
            $_SESSION['id']=$rowAdmin['adminId'];

            $date = $conn::GetDate();
            $time = $conn::GetTime();
       echo json_encode('true');
        }else{

            echo json_encode('false');

        }
    }
}
?>