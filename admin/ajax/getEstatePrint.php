<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] == true) {
        if (
            isset($_POST['id']) && $_POST['id']!=''
        ) {
            include '../../inc/conn.php';
            include '../../inc/my_frame.php';
            $conn = connection();
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $insertQuery = mysqli_query($conn,"SELECT * FROM estate WHERE estate_id='$id'");
            $rowEstate = mysqli_fetch_assoc($insertQuery);

            $div = '<div class="whiteBox">
                    <div class="col-sm-12 col-md-12">
                        <p class="col-md-3 floater"> کد :'.$rowEstate['estate_number'].'</p>
<p class="col-md-3 floater">  آدرس : '.$rowEstate['estate_address'].' </p>';

if($rowEstate['estate_transaction']=='3'){

    $div.='<p class="col-md-3 floater"> مبلغ رهن : '.$rowEstate['estate_mortgage'].'</p>
<p class="col-md-3 floater"> مبلغ اجاره : '.$rowEstate['estate_rent'].' </p>';
}elseif ($rowEstate['estate_transaction']=='4') {
$div.='<p class="col-md-3 floater" style="direction: rtl">  قیمت:'.@toMoney($rowEstate['estate_sale']).'</p>';
}

$div.='
<p class="col-md-3 floater">متراژ : '.$rowEstate['estate_area'].'</p>
<p class="col-md-3 floater">سال ساخت '. $rowEstate['estate_year'].'</p>
<p class="col-md-3 floater"> طبقه : '.$rowEstate['estate_floor'].'</p>
<p class="col-md-3 floater"> تعداد واحد: '.$rowEstate['estate_unit'].'</p>
<p class="col-md-3 floater"> تعداد طبقه: '.$rowEstate['estate_unitFloor'].'</p>
<p class="col-md-3 floater">تعداد اتاق : '.$rowEstate['estate_bedroom'].'</p>
<p class="col-md-3 floater">شماره پلاک: '.$rowEstate['estate_num'].'</p>
<p class="col-md-3 floater">شماره تلفن مالک : '.$rowEstate['estate_mobile'].'</p>
<p class="col-md-3 floater">نام مالک : '.$rowEstate['estate_userName'].'</p>
<p class="col-md-12 floater">
سایر امکانات
';
    $data = '';
    if($rowEstate['estate_data1']=='1') {
        $data .= 'آسانسور';
        $data .= '-';
    }
    if($rowEstate['estate_data2']=='1') {
        $data .= 'پارکینگ اختصاصی';
        $data .= '-';
    }
    if($rowEstate['estate_data3']=='1') {
        $data .= 'تک واحدی';
        $data .= '-';
    }
    if($rowEstate['estate_data4']=='1') {
        $data .= 'انباری';
        $data .= '-';
    }
    if($rowEstate['estate_data5']=='1') {
        $data .= 'تخلیه';
        $data .= '-';
    }
    if($rowEstate['estate_data6']=='1') {
        $data .= 'کلید اول';
        $data .= '-';
    }
    if($rowEstate['estate_data7']=='1') {
        $data .= 'حیاط';
        $data .= '-';
    }
    if($rowEstate['estate_data8']=='1') {
        $data .= 'آبگرمکن';
        $data .= '-';
    }
    if($rowEstate['estate_data9']=='1') {
        $data .= 'هود';
        $data .= '-';
    }
    if($rowEstate['estate_data10']=='1') {
        $data .= 'گاز صفحه ای';
        $data .= '-';
    }
    if($rowEstate['estate_data11']=='1') {
        $data .= 'کمد دیواری';
        $data .= '-';
    }
    if($rowEstate['estate_data12']=='1') {
        $data .= 'پمپ آب';
        $data .= '-';
    }
    if($rowEstate['estate_data13']=='1') {
        $data .= 'درب ضدسرقت';
        $data .= '-';
    }
    if($rowEstate['estate_data14']=='1') {
        $data .= 'تهاتر';
        $data .= '-';
    }
    if($rowEstate['estate_data15']=='1') {
        $data .= 'پیش خرید';
        $data .= '-';
    }


    if(substr($data,-1,1)=='-')
        $data = substr($data,0,-1);
    $div.=$data;
$div.='</p>
<p class="col-md-12">
سایر توضیحات
'.$rowEstate['estate_detail'].'
</p>
<p class="col-md-12">
توضیح ملک خودم
'.$rowEstate['estate_userDetail'].'</p>';
        }
    }
}
echo json_encode($div);
    ?>




