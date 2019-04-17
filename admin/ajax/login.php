<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/20/2017
 * Time: 2:49 PM
 */


if($_SERVER['REQUEST_METHOD']=='POST'){
    if(
        isset($_POST['username']) && $_POST['username']!='' &&
        isset($_POST['password']) && $_POST['password']!=''
    ){
        include '../../inc/conn.php';
        include '../../inc/my_frame.php';
        $conn = connection();
        $userName = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $va_password = passwordHash($password);
        $selectAdministrator = mysqli_query($conn,"SELECT * FROM admin WHERE admin.adminUserName='$userName'
          AND admin.adminPassword='$va_password' AND adminlevel!='3'");
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
            $_SESSION['level']=$rowAdmin['adminlevel'];

            $date = _date();
            $time = _time();
            $update = mysqli_query($conn,"UPDATE admin SET adminLoginDate = '$date',adminLoginTime = '$time'
WHERE 
admin.adminUserName='$userName'
          AND admin.adminPassword='$va_password' AND adminlevel!='3'
");
            echo json_encode('true');
            endfile($conn);
        }else{

            echo json_encode('false');
            endfile($conn);

        }
    }
}
?>