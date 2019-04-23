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

//data1: data1,
//                    data2: data2,
//                    data3: data3,
//                    data4: data4,
//                    data5: data5,
//                    data6: data6,
//                    data7: data7,
//                    data8: data8,
//                    data9: data9,
//                    data10: data10,
//                    data11: data11,
//                    data12: data12,
//                    data13: data13,
//                    transaction: transaction,
//                    type: type,
//                    aria: aria,
//                    title: title,
//                    price: price,
//                    mortgage: mortgage,
//                    rent: rent,
//                    address: address,
//                    bedroom: bedroom,
//                    year: year,
//                    unit: unit,
//                    floor: floor,
//                    lat: lat,
//                    lng: lng,
//                    detail: detail,
//                    mobile: mobile,
//                    detailUser: detailUser

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        session_start();
        if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {
            if (


                isset($_POST['data1']) &&
                isset($_POST['data2']) &&
                isset($_POST['data3']) &&
                isset($_POST['data4']) &&
                isset($_POST['data5'])
            ) {

                include "../../inc/conn.php";
                include "../../inc/my_frame.php";
                $conn = connection();


                $data1 = mysqli_real_escape_string($conn, $_POST['data1']);
                $data2 = mysqli_real_escape_string($conn, $_POST['data2']);
                $data3 = mysqli_real_escape_string($conn, $_POST['data3']);
                $data4 = mysqli_real_escape_string($conn, $_POST['data4']);
                $data5 = mysqli_real_escape_string($conn, $_POST['data5']);


                $id = generate_id();
                $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);

                $insert = mysqli_query($conn, "INSERT INTO contact 
(contactId, contactData1, contactData2, contactData3, contactData4, contactData5, contactAdminId)
         VALUES (
         '$id','$data1','$data2','$data3','$data4',
         '$data5','$adminId')");
                if ($insert) {
                    $call = array('error' => false);
                    echo json_encode($call);
                    endfile($conn);
                }
            }
        }
    }
