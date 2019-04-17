<?php
/**
 * artiash.com
 */

/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/8/2017
 * Time: 11:36 AM
 */
session_start();

if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {


    include '../../inc/conn.php';
    $conn = connection();
    $header = '';
    $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
    $data = '';
    $select = "SELECT
 estate_number,estate_address,
estate_num,estate_floor,estate_sale,estate_mortgage,estate_rent,
estate_year,estate_area,estate_data1,estate_data2,
estate_userName,estate_mobile,estate_regDate
 FROM estate WHERE estate_oner='$adminId' OR estate_masterOner='$adminId'";

    $export = mysqli_query($conn, $select);


    while ($row = mysqli_fetch_row($export)) {
        $line = '';
        foreach ($row as $value) {
            if ((!isset($value)) || ($value == "")) {
                $value = ",";
            } else {
                $value = str_replace('"', '-', $value);
                $value = '"' . $value . '"' . ",";
            }
            $line .= $value;
        }
        $data .= trim($line) . "\n";
    }
    $data = str_replace("\r", "", $data);

    if ($data == "") {
        $data = "\n(0) Records Found!\n";
    }
    $header = 'کدملک,آدرس,پلاک,طبقه,قیمت فروش,رهن,اجاره,سال ساخت,متراژ,آسانسور,پارکینگ,نام و نام خانوادگی مالک,شماره موبایل مالک,تاریخ ثبت';
    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="kelidAval.csv"');
    echo "\xEF\xBB\xBF";
    echo $header;
    echo "\n";
    echo $data;
}
