<?php
/**
 * artiash.com
 */

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
        $priceMin = 0;


        $userName = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = passwordHash($password);
        $selectAdministrator = mysqli_query($conn, "SELECT * FROM admin WHERE admin.adminUserName='$userName'
          AND admin.adminPassword='$password' AND adminlevel!='3'");
        IF (mysqli_num_rows($selectAdministrator) == 1) {
            $login = "true";
            $rowAdmin = mysqli_fetch_assoc($selectAdministrator);
            $adminId  = $rowAdmin['adminId'];

        } else {
            $adminId='';
            $result   = array("login"=>false);
            echo json_encode($result);
            endfile($conn);
        }

        $where = "AND estate_oner = '$adminId' ";
        if(isset($_POST['code']) && $_POST['code']!=''){
            $text = mysqli_real_escape_string($conn,$_POST['code']);
            $where .= "AND (estate_number LIKE '%$text%' OR estate_address LIKE '%$text%' OR estate_userName LIKE '%$text%') ";
        }
        $orderBy = ' ORDER BY date(estate_regDate) DESC,time(estate_regTime) DESC';

        if (
            isset($_POST['img']) &&
            $_POST['img'] != ''
        ) {
            $where .= "AND estate_img!='' ";
        }


        if (
            isset($_POST['sale']) &&
            $_POST['sale'] != ''
        ) {

            $sale = mysqli_real_escape_string($conn, $_POST['sale']);

            $arraySale = explode(',', $sale);

            $where .= "AND (estate_sale BETWEEN '$arraySale[0]' AND '$arraySale[1]') ";

        }
        if (
            isset($_POST['point']) &&
            $_POST['point'] != '' &&
            $_POST['point'] != '0' &&
            is_numeric($_POST['point'])
        ) {
            $areaId = mysqli_real_escape_string($conn, $_POST['point']);
            $where .= "AND estate_pointId = '$areaId' ";
        } else {
            if (isset($_POST['city']) && $_POST['city'] != '' && is_numeric($_POST['city'])) {
                $cityId = mysqli_real_escape_string($conn, $_POST['city']);
                $where .= "AND estate_pointId = area_id AND area_cityId = '$cityId' ";
            }
        }


        //نوع معامله
        if (
            isset($_POST['type']) &&
            $_POST['type'] != '' &&
            is_numeric($_POST['type']) &&
            $_POST['type'] > 0 &&
            $_POST['type'] < 6
        ) {

            switch ($_POST['type']) {
                //اجاره کوتاه مدت
                case '1':
                    $where .= "AND  estate_transaction = '1' ";
                    break;
                //پیش فروش
                case '2':
                    $where .= "AND  estate_transaction = '2' ";
                    break;
                //رهن و اجاره
                case '3':
                    $where .= "AND  estate_transaction = '3' ";
                    break;
                //فروش
                case '4':
                    $where .= "AND  estate_transaction = '4' ";
                    break;
                //مشارکت در ساخت
                case '5':
                    $where .= "AND  estate_transaction = '5' ";
                    break;

            }
        }

        //نوع ملک
        if (
            isset($_POST['status']) &&
            $_POST['status'] != '' &&
            is_numeric($_POST['status']) &&
            $_POST['status'] > 0 &&
            $_POST['status'] < 7
        ) {
            switch ($_POST['status']) {
                //آپارتمان اداری تجاری
                case '1':
                    $where .= "AND  estate_type = '1' ";
                    break;
                //آپارتمان مسکونی
                case '2':
                    $where .= "AND  estate_type = '2' ";
                    break;
                //پزشکی
                case '3':
                    $where .= "AND  estate_type = '3' ";
                    break;
                //تجاری مغازه
                case '4':
                    $where .= "AND  estate_type = '4' ";
                    break;
                //زمین و ویلایی
                case '5':
                    $where .= "AND  estate_type = '5' ";
                    break;
                //مستغلات
                case '6':
                    $where .= "AND  estate_type = '6' ";
                    break;
                //مشارکت
                case '7':
                    $where .= "AND  estate_type = '7' ";
                    break;
            }
        }
        //سال ساخت
        if (
            isset($_POST['year']) &&
            $_POST['year'] != ''
        ) {
            $year = mysqli_real_escape_string($conn, $_POST['year']);

            $arrayYear = explode(',', $year);

            $where .= "AND (estate_year BETWEEN '$arrayYear[0]' AND '$arrayYear[1]') ";
        }




//متراژ
        if (
            isset($_POST['area']) &&
            $_POST['area'] != ''
        ) {

            $area = mysqli_real_escape_string($conn, $_POST['area']);

            $arrayArea = explode(',', $area);

            $where .= "AND (estate_area BETWEEN '$arrayArea[0]' AND '$arrayArea[1]') ";

        }


//رهن
        if (
            isset($_POST['mortgage']) &&
            $_POST['mortgage'] != ''
        ) {

            $mortgage = mysqli_real_escape_string($conn, $_POST['mortgage']);

            $arrayMortgage = explode(',', $mortgage);

            $where .= "AND (estate_mortgage BETWEEN '$arrayMortgage[0]' AND '$arrayMortgage[1]') ";

        }


        if (
            isset($_POST['rent']) &&
            $_POST['rent'] != ''
        ) {

            $rent = mysqli_real_escape_string($conn, $_POST['rent']);

            $rentArray = explode(',', $rent);

            $where .= "AND (estate_mortgage BETWEEN '$rentArray[0]' AND '$rentArray[1]') ";

        }
        if (
            isset($_POST['bedroom']) &&
            $_POST['bedroom'] != ''
        ) {

            $bedroom = mysqli_real_escape_string($conn, $_POST['bedroom']);

            $rentArray = explode(',', $bedroom);

            $where .= "AND (estate_bedroom BETWEEN '$rentArray[0]' AND '$rentArray[1]') ";

        }

        if (
            isset($_POST['data1']) &&
            $_POST['data1'] == 'true'
        ) {
            $where .= "AND estate_data1 = '1' ";
        }


        if (
            isset($_POST['data1']) &&
            $_POST['data1'] == 'true'
        ) {
            $where .= "AND estate_data1 = '1' ";
        }


        if (
            isset($_POST['data2']) &&
            $_POST['data2'] == 'true'
        ) {
            $where .= "AND estate_data2 = '1' ";
        }

        if (
            isset($_POST['data3']) &&
            $_POST['data3'] == 'true'
        ) {
            $where .= "AND estate_data3 = '1' ";
        }

        if (
            isset($_POST['data4']) &&
            $_POST['data4'] == 'true'
        ) {
            $where .= "AND estate_data4 = '1' ";
        }


        if (
            isset($_POST['data5']) &&
            $_POST['data5'] == 'true'
        ) {
            $where .= "AND estate_data5 = '1' ";
        }


        if (
            isset($_POST['data6']) &&
            $_POST['data6'] == 'true'
        ) {
            $where .= "AND estate_data6 = '1' ";
        }


        if (
            isset($_POST['data7']) &&
            $_POST['data7'] == 'true'
        ) {
            $where .= "AND estate_data7 = '1' ";
        }


        if (
            isset($_POST['data8']) &&
            $_POST['data8'] == 'true'
        ) {
            $where .= "AND estate_data8 = '1' ";
        }


        if (
            isset($_POST['data9']) &&
            $_POST['data9'] == 'true'
        ) {
            $where .= "AND estate_data9 = '1' ";
        }


        if (
            isset($_POST['data10']) &&
            $_POST['data10'] == 'true'
        ) {
            $where .= "AND estate_data10 = '1' ";
        }


        if (
            isset($_POST['data11']) &&
            $_POST['data11'] == 'true'
        ) {
            $where .= "AND estate_data11 = '1' ";
        }


        if (
            isset($_POST['data12']) &&
            $_POST['data12'] == 'true'
        ) {
            $where .= "AND estate_data12 = '1' ";
        }


        if (
            isset($_POST['data13']) &&
            $_POST['data13'] == 'true'
        ) {
            $where .= "AND estate_data13 = '1' ";
        }
        if (

            isset($_POST['data14']) &&
            $_POST['data14'] == 'true'
        ) {
            $where .= "AND estate_data14 = '1' ";
        }
        if (
            isset($_POST['data15']) &&
            $_POST['data15'] == 'true'
        ) {
            $where .= "AND estate_data15 = '1' ";
        }


        if (
            isset($_POST['unit']) &&
            $_POST['unit'] != '' &&
            is_numeric($_POST['unit'])
        ) {
            $unitNumber = mysqli_real_escape_string($conn, $_POST['unit']);
            $where .= "AND estate_unit = '$unitNumber'";
        }

        if (
            isset($_POST['yard']) &&
            $_POST['yard'] == true
        ) {
            $where .= "AND estate_yard = '1' ";
        }

        if (
            isset($_POST['garden']) &&
            $_POST['garden'] == true
        ) {
            $where .= "AND estate_garden = '1' ";
        }
        if (
            isset($_POST['pool']) &&
            $_POST['pool'] == true
        ) {
            $where .= "AND estate_pool = '1' ";
        }

        $i=1;

       ;
$a = "SELECT * FROM
 estate,city,area WHERE
  estate.estate_pointId=area.area_id 
  AND area.area_cityId = city_id ".$where.$orderBy;
        $selectEstate = mysqli_query($conn,$a);


echo mysqli_error($conn);
        while ($rowGetEstate = mysqli_fetch_assoc($selectEstate)) {
            $type = $rowGetEstate['estate_type'];
            switch ($type) {
                //آپارتمان اداری تجاری
                case '1':
                    $check = "آپارتمان اداری تجاری";
                    break;
                //آپارتمان مسکونی
                case '2':
                    $check = "آپارتمان مسکونی";
                    break;
                //پزشکی
                case '3':
                    $check = "پزشکی";
                    break;
                //تجاری مغازه
                case '4':
                    $check = "تجاری مغازه";
                    break;
                //زمین و ویلایی
                case '5':
                    $check = "زمین و ویلایی";
                    break;
                //مستغلات
                case '6':
                    $check = "مستغلات";
                    break;
                //مشارکت
                case '7':
                    $check = "مشارکت در ساخت";
                    break;
                default:
                    $check = '';
                    break;
            }
            $estate_id = $rowGetEstate['estate_id'];
            $select_gallery = mysqli_query($conn, "SELECT * FROM gallery WHERE
     gallery.gallery_estateId = '$estate_id'");
            while ($rowGallery = mysqli_fetch_assoc($select_gallery)) {
                $imgs[] = array(
                    'pics' => $rowGallery['gallery_imgLink'] . '.jpg'
                );
            }
            if (empty($imgs)) {
                $gallery[] = array('pics' => $rowGetEstate['estate_img'] . '.jpg');
            } else {
                $gallery = $imgs;
            }



            if ($i == 1) {
                $areaMin = $rowGetEstate['estate_area'];
                $areaMax = $rowGetEstate['estate_area'];
                $rentMin = $rowGetEstate['estate_rent'];
                $rentMax = $rowGetEstate['estate_rent'];
                $mortgageMin = $rowGetEstate['estate_mortgage'];
                $mortgageMax = $rowGetEstate['estate_mortgage'];
                $yearMin = $rowGetEstate['estate_year'];
                $yearMax = $rowGetEstate['estate_year'];
                $priceMin = $rowGetEstate['estate_sale'];
                $priceMax = $rowGetEstate['estate_sale'];
            } else {

                if ($areaMin > $rowGetEstate['estate_area']) {
                    $areaMin = $rowGetEstate['estate_area'];
                }
                if ($areaMax < $rowGetEstate['estate_area']) {
                    $areaMax = $rowGetEstate['estate_area'];
                }
                if ($rentMax < $rowGetEstate['estate_rent']) {
                    $rentMax = $rowGetEstate['estate_rent'];
                }
                if ($rentMin > $rowGetEstate['estate_rent']) {
                    $rentMin = $rowGetEstate['estate_rent'];
                }
                if ($mortgageMax < $rowGetEstate['estate_mortgage']) {
                    $mortgageMax = $rowGetEstate['estate_mortgage'];
                }
                if ($mortgageMin > $rowGetEstate['estate_mortgage']) {
                    $mortgageMin = $rowGetEstate['estate_mortgage'];
                }
                if ($yearMin > $rowGetEstate['estate_year']) {
                    $yearMin = $rowGetEstate['estate_year'];
                }
                if ($yearMax < $rowGetEstate['estate_year']) {
                    $yearMax = $rowGetEstate['estate_year'];
                }
                if ($priceMin > $rowGetEstate['estate_sale']) {
                    $priceMin = $rowGetEstate['estate_sale'];
                }
                if ($priceMax < $rowGetEstate['estate_sale']) {
                    $priceMax = $rowGetEstate['estate_sale'];
                }
            }
            $i++;


            $call_row[] = array(
                'id' => $rowGetEstate['estate_id'],
                'name' => $rowGetEstate['estate_title'],
                'img' => $rowGetEstate['estate_img'] . '.jpg',
                'phone' => $rowGetEstate['estate_number'],
                'address' => $rowGetEstate['city_name'] .
                    ' ' . $rowGetEstate['area_name'] . '\\n' .
                    $rowGetEstate['estate_address']. '\\n' .
                    ' پلاک ' . $rowGetEstate['estate_num'],
                'type' => $check,
                'size' => $rowGetEstate['estate_area'],
                'price' => @toMoney($rowGetEstate['estate_sale']),
                'mortgage' => @toMoney($rowGetEstate['estate_mortgage']),
                'rent' => @toMoney($rowGetEstate['estate_rent']),
                'code' => $rowGetEstate['estate_number'],
                'floor' => $rowGetEstate['estate_floor'],
                'parking' => $rowGetEstate['estate_data2'],
                'lift' => $rowGetEstate['estate_data1'],
                'year' => $rowGetEstate['estate_year'],
                'lat' => $rowGetEstate['estate_lat'],
                'lng' => $rowGetEstate['estate_lng'],
                'username'=>$rowGetEstate['estate_userName'],
                'usermobile'=>$rowGetEstate['estate_mobile'],
                'pics' => $gallery
            );


            $imgs = null;
            $gallery = null;
        }
        echo mysqli_error($conn);

        if (!empty($call_row)) {
            $result['login']=true;
            $result['data']['result'] = true;
            $result['data']['places'] = $call_row;
            $a = mysqli_num_rows($selectEstate);
            $result['data']['number'] = "$a";
            $result['data']['areaMin']=str_replace(' ', '',$areaMin);
            $result['data']['areaMax']=str_replace(' ', '',$areaMax);
            $result['data']['priceMin']=str_replace(' ', '',@toMoney($priceMin));
            $result['data']['priceMax']=str_replace(' ', '',@toMoney($priceMax));
            $result['data']['yearMin']=str_replace(' ', '',$yearMin);
            $result['data']['yearMax']=str_replace(' ', '',$yearMax);
            $result['data']['rentMin']=str_replace(' ', '',@toMoney($rentMin));
            $result['data']['rentMax']=str_replace(' ', '',@toMoney($rentMax));
            $result['data']['mortMin']=str_replace(' ', '',@toMoney($mortgageMin));
            $result['data']['mortMax']=str_replace(' ', '',@toMoney($mortgageMax));
        } else {
            $result['login']=true;
            $result['data']['result'] = false;
            $result['data']['places'] = null;
        }
        echo json_encode($result);
    }
}
