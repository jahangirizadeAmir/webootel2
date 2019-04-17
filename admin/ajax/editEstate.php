<?php
/**
 * artiash.com
 */

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
            isset($_POST['unit']) &&
            isset($_POST['floor']) &&
            isset($_POST['unitFloor']) &&
            isset($_POST['lat']) &&
            isset($_POST['lng']) &&
            isset($_POST['detail']) &&
            isset($_POST['detailUser']) &&
            isset($_POST['num']) &&
            isset($_POST['name']) &&
            isset($_POST['area']) &&
            isset($_POST['mobile']) &&
            isset($_POST['id']) && $_POST['id'] != '' &&
            isset($_POST['yard']) && $_POST['yard'] != '' &&
            isset($_POST['pool']) && $_POST['pool'] != '' &&
            isset($_POST['special']) && $_POST['special'] != '' &&
            isset($_POST['renterMobile']) &&
            isset($_POST['garden']) && $_POST['garden'] != '' &&
            isset($_POST['data1']) && $_POST['data1'] != '' &&
            isset($_POST['data2']) && $_POST['data2'] != '' &&
            isset($_POST['data3']) && $_POST['data3'] != '' &&
            isset($_POST['data4']) && $_POST['data4'] != '' &&
            isset($_POST['data5']) && $_POST['data5'] != '' &&
            isset($_POST['data6']) && $_POST['data6'] != '' &&
            isset($_POST['data7']) && $_POST['data7'] != '' &&
            isset($_POST['data8']) && $_POST['data8'] != '' &&
            isset($_POST['show']) && $_POST['show'] != '' &&
            isset($_POST['data9']) && $_POST['data9'] != '' &&
            isset($_POST['data10']) && $_POST['data10'] != '' &&
            isset($_POST['data11']) && $_POST['data11'] != '' &&
            isset($_POST['data12']) && $_POST['data12'] != '' &&
            isset($_POST['data15']) && $_POST['data14'] != '' &&
            isset($_POST['data15']) && $_POST['data15'] != '' &&
            isset($_POST['data13']) && $_POST['data13'] != ''
        ) {

            include "../../inc/conn.php";
            include "../../inc/my_frame.php";
            $conn = connection();

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $transaction = mysqli_real_escape_string($conn, $_POST['transaction']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $aria = mysqli_real_escape_string($conn, $_POST['aria']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $num = mysqli_real_escape_string($conn, $_POST['num']);
            $mortgage = mysqli_real_escape_string($conn, $_POST['mortgage']);
            if ($mortgage == '') {
                $mortgage = 0;
            }
            $rent = mysqli_real_escape_string($conn, $_POST['rent']);
            if ($rent == '') {
                $rent = 0;
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
            $renterMobile = mysqli_real_escape_string($conn, $_POST['renterMobile']);
            $unitFloor = mysqli_real_escape_string($conn, $_POST['unitFloor']);
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
            $data7 = mysqli_real_escape_string($conn, $_POST['data7']);
            $data8 = mysqli_real_escape_string($conn, $_POST['data8']);
            $data9 = mysqli_real_escape_string($conn, $_POST['data9']);
            $data10 = mysqli_real_escape_string($conn, $_POST['data10']);
            $data11 = mysqli_real_escape_string($conn, $_POST['data11']);
            $show = mysqli_real_escape_string($conn, $_POST['show']);
            $data12 = mysqli_real_escape_string($conn, $_POST['data12']);
            $data13 = mysqli_real_escape_string($conn, $_POST['data13']);
            $data14 = mysqli_real_escape_string($conn, $_POST['data14']);
            $data15 = mysqli_real_escape_string($conn, $_POST['data15']);
            $id = mysqli_real_escape_string($conn, $_POST['id']);


            if (isset($_POST['agentMobile']) && $_POST['agentMobile'] != '') {
                $agentMobile = mysqli_real_escape_string($conn, $_POST['agentMobile']);
            } else {
                $agentMobile = '';
            }

            if (isset($_POST['img'])
                && $_POST['img'] != '' &&
                $_POST['img'] != 'undefined'
            ) {
                $img = mysqli_real_escape_string($conn, $_POST['img']);
                $nameImg = generateRandomString();
                saveImage($img, '../../img/', $nameImg);
                $upadet = mysqli_query($conn, "UPDATE estate SET estate_img='$nameImg' WHERE estate.estate_id='$id'");
            }

            $date = _date();
            $time = _time();
            $numberEstate = rand(1000, 9999);
            $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);
            $insert = mysqli_query($conn, "update  estate SET 
             estate_title='$title', estate_detail='$detail', estate_pointId='$aria',
             estate_type='$type', estate_transaction='$transaction', estate_year='$year', estate_unit='$unit', estate_pool='$pool',
             estate_yard='$yard', estate_garden='$garden', estate_bedroom='$bedroom', estate_area='$area', estate_sale='$price',
             estate_mortgage='$mortgage', estate_rent='$rent', estate_data1='$data1', estate_data2='$data2', estate_data3='$data3',
             estate_data4='$data4', estate_data5='$data5', estate_data6='$data6', estate_data7='$data7', estate_data8='$data8',
             estate_data9='$data9', estate_data10='$data10', estate_data11='$data11', estate_data12='$data12', estate_data13='$data13',
             estate_lat='$lat', estate_lng='$lng',
             estate_regDate='$date',
             expiry='0',
             estate_address='$address', estate_mobile='$mobile',
             estate_special='$special',estate_userName='$name',
             estate_userDetail='$detailUser',estate_floor='$floor',
             estate_num='$num',estate_data14='$data14',estate_data15='$data15',
             estate_mobileAgent='$agentMobile',
             estate_renter='$renterMobile',
            estate_unitFloor='$unitFloor' ,
            estateShow='$show'
             
              WHERE estate_id = '$id'
         ");


            if ($insert) {
                $call = array('error' => false);
                echo json_encode($call);
                endfile($conn);
            }
        }
    }
}