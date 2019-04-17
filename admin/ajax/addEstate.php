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


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    session_start();
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {
        if (
            isset($_POST['transaction']) && $_POST['transaction'] != '' &&
            isset($_POST['type']) && $_POST['type'] != '' &&
            isset($_POST['aria']) && $_POST['aria'] != '' &&
            isset($_POST['title']) && $_POST['title'] != '' &&
            isset($_POST['price']) &&
            isset($_POST['mortgage']) &&
            isset($_POST['rent']) &&
            isset($_POST['address']) &&
            isset($_POST['bedroom']) &&
            isset($_POST['year']) &&
            isset($_POST['num']) &&
            isset($_POST['unit']) &&
            isset($_POST['floor']) &&
            isset($_POST['lat']) &&
            isset($_POST['lng']) &&
            isset($_POST['unitFloor']) &&
            isset($_POST['detail']) &&
            isset($_POST['detailUser']) &&
            isset($_POST['name']) &&
            isset($_POST['area']) &&
            isset($_POST['mobile']) &&
            isset($_POST['yard']) && $_POST['yard'] != '' &&
            isset($_POST['pool']) && $_POST['pool'] != '' &&
            isset($_POST['renterMobile']) &&
            isset($_POST['special']) && $_POST['special'] != '' &&
            isset($_POST['garden']) && $_POST['garden'] != '' &&
            isset($_POST['data1']) && $_POST['data1'] != '' &&
            isset($_POST['show']) && $_POST['show'] != '' &&
            isset($_POST['data2']) && $_POST['data2'] != '' &&
            isset($_POST['data3']) && $_POST['data3'] != '' &&
            isset($_POST['data4']) && $_POST['data4'] != '' &&
            isset($_POST['data5']) && $_POST['data5'] != '' &&
            isset($_POST['data6']) && $_POST['data6'] != '' &&
            isset($_POST['data7']) && $_POST['data7'] != '' &&
            isset($_POST['data8']) && $_POST['data8'] != '' &&
            isset($_POST['data9']) && $_POST['data9'] != '' &&
            isset($_POST['data10']) && $_POST['data10'] != '' &&
            isset($_POST['data11']) && $_POST['data11'] != '' &&
            isset($_POST['data12']) && $_POST['data12'] != '' &&
            isset($_POST['data13']) && $_POST['data13'] != '' &&
            isset($_POST['data14']) && $_POST['data14'] != ''  &&
            isset($_POST['data15']) && $_POST['data15'] != ''
        ) {


            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $transaction = mysqli_real_escape_string($conn, $_POST['transaction']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $aria = mysqli_real_escape_string($conn, $_POST['aria']);
            $renterMobile = mysqli_real_escape_string($conn, $_POST['renterMobile']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $unitFloor = mysqli_real_escape_string($conn, $_POST['unitFloor']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $mortgage = mysqli_real_escape_string($conn, $_POST['mortgage']);
            if($mortgage==''){
                $mortgage=0;
            }
            $rent = mysqli_real_escape_string($conn, $_POST['rent']);
            if($rent==''){
                $rent=0;
            }
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $bedroom = mysqli_real_escape_string($conn, $_POST['bedroom']);
            $year = mysqli_real_escape_string($conn, $_POST['year']);
            $unit = mysqli_real_escape_string($conn, $_POST['unit']);
            $floor = mysqli_real_escape_string($conn, $_POST['floor']);
            $lat = mysqli_real_escape_string($conn, $_POST['lat']);
            $lng = mysqli_real_escape_string($conn, $_POST['lng']);
            $detail = mysqli_real_escape_string($conn, $_POST['detail']);
            $detailUser = mysqli_real_escape_string($conn, $_POST['detailUser']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $area = mysqli_real_escape_string($conn, $_POST['area']);
            $yard = mysqli_real_escape_string($conn, $_POST['yard']);
            $garden = mysqli_real_escape_string($conn, $_POST['garden']);
            $special = mysqli_real_escape_string($conn, $_POST['special']);
            $pool = mysqli_real_escape_string($conn, $_POST['pool']);
            $data1 = mysqli_real_escape_string($conn, $_POST['data1']);
            $data2 = mysqli_real_escape_string($conn, $_POST['data2']);
            $data3 = mysqli_real_escape_string($conn, $_POST['data3']);
            $data4 = mysqli_real_escape_string($conn, $_POST['data4']);
            $data5 = mysqli_real_escape_string($conn, $_POST['data5']);
            $data6 = mysqli_real_escape_string($conn, $_POST['data6']);
            $num = mysqli_real_escape_string($conn, $_POST['num']);
            $data7 = mysqli_real_escape_string($conn, $_POST['data7']);
            $data8 = mysqli_real_escape_string($conn, $_POST['data8']);
            $data9 = mysqli_real_escape_string($conn, $_POST['data9']);
            $data10 = mysqli_real_escape_string($conn, $_POST['data10']);
            $data11 = mysqli_real_escape_string($conn, $_POST['data11']);
            $data12 = mysqli_real_escape_string($conn, $_POST['data12']);
            $data13 = mysqli_real_escape_string($conn, $_POST['data13']);
            $data14 = mysqli_real_escape_string($conn, $_POST['data14']);
            $data15 = mysqli_real_escape_string($conn, $_POST['data15']);
            $show = mysqli_real_escape_string($conn,$_POST['show']);

            if(isset($_POST['agentMobile']) && $_POST['agentMobile']!=''){
                $agentMobile = mysqli_real_escape_string($conn,$_POST['agentMobile']);
            }else{
                $agentMobile='';
            }

            if (isset($_POST['img'])
                && $_POST['img'] != '' &&
                $_POST['img'] != 'undefined'
            ) {
                $img = mysqli_real_escape_string($conn, $_POST['img']);
                $nameImg = generateRandomString();
                saveImage($img, '../../img/', $nameImg);
            }else{
                $nameImg='defult_2';
            }

            $id = generate_id();
            $date = _date();
            $time = _time();
            if($transaction=='3') {
                $numberEstate = 'A'.$area.rand(10000,99999);
                }else{
                $numberEstate = 'B'.$area.rand(10000,99999);

            }

            $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
            if($_SESSION['level']=='2'){
                $masterOnerSelect = mysqli_query($conn,"SELECT * FROM admin WHERE adminId='$adminId'");
                $getMasterOner = mysqli_fetch_assoc($masterOnerSelect);
                $masterOnerId = $getMasterOner['adminAdminId'];
            }else{
                $masterOnerId = $adminId;
            }
            $insert = mysqli_query($conn, "INSERT INTO estate (
            estate_id, estate_number, estate_title, estate_detail, estate_pointId,
            estate_type, estate_transaction,estate_year, estate_unit,estate_pool,
            estate_yard, estate_garden, estate_bedroom, estate_area,estate_sale, estate_mortgage,
            estate_rent, estate_data1, estate_data2, estate_data3,estate_data4, estate_data5,
            estate_data6, estate_data7,estate_data8, estate_data9, estate_data10, estate_data11,
            estate_data12, estate_data13,estate_lat, estate_lng, estate_oner,
            estate_regDate, estate_regTime, estate_metatag, estate_img, estate_view,
            estate_address, estate_mobile,estate_status, estate_special,estate_userName,
            estate_userDetail,estate_floor,estate_num,estate_data14,estate_data15,estate_mobileAgent,
            estate_renter,estate_unitFloor,estate_masterOner,estateShow
            )
         VALUES (
         '$id','$numberEstate','$title','$detail','$aria',
         '$type','$transaction','$year','$unit','$pool',
         '$yard','$pool','$bedroom','$area','$price',
         '$mortgage','$rent','$data1','$data2','$data3',
         '$data4','$data5','$data6','$data7','$data8',
         '$data9','$data10','$data11','$data12','$data13',
         '$lat','$lng','$adminId','$date','$time',
         '','$nameImg','0','$address','$mobile',
         '1','$special','$name','$detailUser','$floor','$num','$data14','$data15','$agentMobile','$renterMobile',
         '$unitFloor','$masterOnerId','$show')");
            $contacId = generate_id();
            $insertContact = mysqli_query($conn,"INSERT INTO contact
 (contactId, contactData1, contactData2, contactData3,
  contactData4, contactData5, contactAdminId) VALUES
   ('$contacId','$name','$address','$mobile','$type','$detail','$adminId')");
            if($insert){
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}