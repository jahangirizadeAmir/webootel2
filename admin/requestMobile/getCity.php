<?php
/**
 * artiash.com
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['username'])
        && $_POST['username'] != '' &&
        isset($_POST['password']) &&
        $_POST['password'] != ''
    ) {
        include "../../inc/conn.php";
        include '../../inc/my_frame.php';
        $conn = connection();
        $call_row=array();


        $userName = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = passwordHash($password);
        $selectAdministrator = mysqli_query($conn, "SELECT * FROM admin WHERE admin.adminUserName='$userName'
          AND admin.adminPassword='$password' AND adminlevel!='3'");
        IF (mysqli_num_rows($selectAdministrator) == 1) {
            $login = true;
            $rowAdmin = mysqli_fetch_assoc($selectAdministrator);
            $adminId = $rowAdmin['adminId'];

        } else {
            $adminId = '';
            $result = array("login" => false);
            echo json_encode($result);
            endfile($conn);
        }
        $cot = "'";
        $selecTCity = mysqli_query($conn, "SELECT DISTINCT area_id,area_cityId,area_name FROM area,estate 
                        WHERE area_cityId='1' AND
                         estate.estate_pointId=area.area_id AND 
                         (estate.estate_oner = '$adminId' OR estate.estate_masterOner='$adminId')
                          ORDER BY area_name ASC ");
        while ($RowCity = mysqli_fetch_assoc($selecTCity)) {
            $call_row[] = array(
                'area_name' => $RowCity['area_name'],
                'area_id' => $RowCity['area_id']
            );
        }
        $result['login']= $login;
        $result['data']['result'] = true;
        $result['data']['places'] = $call_row;
        echo json_encode($result);
        endfile($conn);
    }
}

