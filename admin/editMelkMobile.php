<?php
/**
 * artiash.com
 */

if (isset($_GET['id']) && $_GET['id'] != '') {
    /**
     * artiash.com
     */

    include "../inc/conn.php";
    include "../inc/my_frame.php";
    $conn = connection();
    /**
     * artiash.com
     */

    /**
     * Created by PhpStorm.
     * User: amir
     * Date: 10/10/2017
     * Time: 2:45 PM
     */

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $selectEstate = mysqli_query($conn, "SELECT * FROM estate WHERE
      estate.estate_id='$id'
      "
    );

    if (mysqli_num_rows($selectEstate) == 1) {
        $rowEstate = mysqli_fetch_assoc($selectEstate);

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="Mosaddek">
            <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
            <link rel="shortcut icon" href="img/favicon.html">
            <title>کلید اول</title>
            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/bootstrap-reset.css" rel="stylesheet">
            <!--external css-->
            <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
            <link href="assets/bootstrap-slider/bootstrap-slider.css" rel="stylesheet" type="text/css" media="screen"/>
            <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
            <!-- Custom styles for this template -->
            <link href="css/style.css" rel="stylesheet">
            <link href="css/style-responsive.css" rel="stylesheet" />

            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
            <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>


            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRchZ_CvPMjE_0WJjwhu_pIGfBmvVnza4" type="text/javascript"></script>
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
            <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
            <![endif]-->
                <style>
                    .cropit-preview-image {
                        border-radius: 0px !important;
                    }

                    .cropit-preview-image-container {
                        border-radius: 0px !important;
                    }

                    .cropit-preview {
                        margin: auto;
                        background: #f8f8f8;
                        background-size: cover;
                        border: 5px solid #ccc;
                        border-radius: 0px;
                        margin-top: 7px;
                        width: 250px !important;
                        height: 250px !important;
                    }
                    .cropit-preview#a2 {
                        margin: auto;
                        background: #f8f8f8;
                        background-size: cover;
                        border: 5px solid #ccc;
                        border-radius: 0px;
                        margin-top: 7px;
                        width: 600px !important;
                        height: 375px !important;
                    }

                    .cropit-preview-image-container {
                        cursor: move;
                    }

                    .cropit-preview-background {
                        opacity: .2;
                        cursor: auto;
                    }

                    div#cropit-preview {
                        width: 741px !important;
                        height: 142px !important;
                    }

                </style>
        </head>
        <body>
                <section id="main-content">
                    <section class="wrapper">
                        <!-- page start-->
                <!-- page start-->
                <div class="row" style="display: none;">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                لیست گالری
                            </header>
                            <br>
                            <div class="form-group">
                                <div class="image-editor1" style="text-align: center;direction: ltr;">
                                    <input type="file" class="cropit-image-input" style="display:none;"
                                           id="img1">
                                    <a type="button" onclick="show_img1()" class="btn btn-info "><i
                                                class="icon-plus"></i>اضافه
                                        کردن تصویر</a>
                                    <div class="cropit-preview" id="a2">
                                    </div>
<br>
                                    <a type="button" onclick="uploadImg()" class="btn btn-success ">ثبت در گالری</a>
                                </div>
                            </div>

                            <script>
                                function uploadImg() {
                                    var id = '<?php echo $id ?>';
                                    var imgprofile = $('.image-editor1').cropit('export', {
                                        type: 'image/jpeg',
                                        quality: 0.33,
                                        originalSize: false
                                    });
                                    if (typeof imgprofile !== 'undefined') // Any scope
                                    {
                                        img = imgprofile;
                                    }else{
                                        return;
                                    }
                                    $.ajax({
                                        url: 'ajax/uploadGallery.php',
                                        data: {
                                            img: img,
                                            id: id
                                        },
                                        dataType: 'json',
                                        type: 'POST',
                                        success: function (data) {
                                            if (data['error'] === true) {
                                                $('#userName').css('border', '2px solid red');
                                            } else {
                                                location.reload();
                                            }
                                        }
                                    });

                                }
                                function deleteimg(id) {
                                    $.ajax({
                                        url: 'ajax/deleteGallery.php',
                                        data: {
                                            id: id
                                        },
                                        dataType: 'json',
                                        type: 'POST',
                                        success: function (data) {
                                            if (data['error'] === true) {
                                                $('#userName').css('border', '2px solid red');
                                            } else {
                                                location.reload();
                                            }
                                        }
                                    });
                                }
                            </script>


                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                <tr>
                                    <th>تصویر</th>
                                    <th class="hidden-phone">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $selectListAdmin = mysqli_query($conn, "SELECT * FROM gallery WHERE gallery_estateId = '$id'");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)) {


                                    $cot = "'";
                                    echo '                                   
                                        <tr class="odd gradeX" onclick=""  style="cursor: pointer">
                                            <td><img src="../img/'.$rowAdmin['gallery_imgLink'].'.jpg" style="width:200px "></td>
                                            <td class="hidden-phone"><button type="button" onclick="deleteimg(' . $cot . $rowAdmin['gallery_id'] . $cot . ')" class="btn btn-danger btn-sm">حذف</button></td>
                                        </tr>
                                     ';
                                }
                                ?>


                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <!-- page end-->


                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                ویرایش ملک
                            </header>
                            <div class="panel-body">

                                <div class="panel-body">
                                    <div class="alert alert-success fade in" id="successMSG" style="display: none">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="icon-remove"></i>
                                        </button>
                                        ملک با موفقیت ویرایش شد.
                                    </div>

                                    <form class="form-horizontal tasi-form" method="get">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نوع معامله</label>
                                            <div class="col-sm-10">
                                                <select class="col-sm-12" id="transaction">
                                                    <option value="4" <?php if ($rowEstate['estate_transaction'] == '4') echo 'selected' ?>>
                                                        خرید و فروش
                                                    </option>
                                                    <option value="3" <?php if ($rowEstate['estate_transaction'] == '3') echo 'selected' ?>>
                                                        رهن و اجاره
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نوع ملک</label>
                                            <div class="col-sm-10">
                                                <select class="col-sm-12" id="type">
                                                    <option value="1" <?php if ($rowEstate['estate_type'] == '1') echo 'selected' ?>>
                                                        آپارتمان اداری تجاری
                                                    </option>
                                                    <option value="2" <?php if ($rowEstate['estate_type'] == '2') echo 'selected' ?>>
                                                        آپارتمان مسکونی
                                                    </option>
                                                    <option value="3"<?php if ($rowEstate['estate_type'] == '3') echo 'selected' ?>>
                                                        پزشکی
                                                    </option>
                                                    <option value="4" <?php if ($rowEstate['estate_type'] == '4') echo 'selected' ?>>
                                                        تجاری مغازه
                                                    </option>
                                                    <option value="5" <?php if ($rowEstate['estate_type'] == '5') echo 'selected' ?>>
                                                        زمین و ویلایی
                                                    </option>
                                                    <option value="6" <?php if ($rowEstate['estate_type'] == '6') echo 'selected' ?>>
                                                        مشارکت در ساخت
                                                    </option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">منطقه</label>
                                            <div class="col-sm-10">
                                                <select class="col-sm-12" id="aria">
                                                    <?php
                                                    $selecTCity = mysqli_query($conn, "SELECT * FROM area WHERE area_cityId='1'");
                                                    while ($RowCity = mysqli_fetch_assoc($selecTCity)) {
                                                        if ($rowEstate['estate_pointId']    ==   $RowCity['area_id']){
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                        echo '<option ' . $selected . ' value="' . $RowCity['area_id'] . '">' . $RowCity['area_name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">عنوان</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="title"
                                                       value="<?php echo $rowEstate['estate_title'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">پلاک</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="num"
                                                       value="<?php echo $rowEstate['estate_num'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">قیمت</label>
                                            <div class="col-sm-10">
                                                <input etype="Number" type="text" class="form-control" id="price"
                                                       value="<?php echo $rowEstate['estate_sale'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">رهن</label>
                                            <div class="col-sm-10">
                                                <input etype="Number" type="text" class="form-control" id="mortgage"
                                                       value="<?php echo $rowEstate['estate_mortgage'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">اجاره</label>
                                            <div class="col-sm-10">
                                                <input etype="Number" type="text" class="form-control" id="rent"
                                                       value="<?php echo $rowEstate['estate_rent'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> شماره موبایل مالک</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="mobile"
                                                       value="<?php echo $rowEstate['estate_mobile'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نام و نام خانوادگی</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name"
                                                       value="<?php echo $rowEstate['estate_userName'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نام و شماره موبایل مستاجر</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="renterMobile"
                                                       value="<?php echo $rowEstate['estate_renter'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نام و شماره موبایل مشاور</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="agentMobile"
                                                       value="<?php echo $rowEstate['estate_mobileAgent'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">آدرس</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="address"
                                                       value="<?php echo $rowEstate['estate_address'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">تعداد اتاق</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="bedroom"
                                                       value="<?php echo $rowEstate['estate_bedroom'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">سال ساخت</label>
                                            <div class="col-sm-10">
                                                <input etype="Number" type="text" class="form-control" id="year"
                                                       value="<?php echo $rowEstate['estate_year'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">متراژ</label>
                                            <div class="col-sm-10">
                                                <input etype="Number" type="text" class="form-control" id="area"
                                                       value="<?php echo $rowEstate['estate_area'] ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">تعداد واحد</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="unit"
                                                       value="<?php echo $rowEstate['estate_unit'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">تعداد طبقه</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="testerAّ"
                                                       value="<?php echo $rowEstate['estate_unitFloor'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">طبقه</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="floor"
                                                       value="<?php echo $rowEstate['estate_floor'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">سایر امکانات</label>
                                            <div class="col-sm-10">
                                                <label class="checkbox-inline"><input type="checkbox" id="data1"
                                                        <?php if ($rowEstate['estate_data1'] == '1') echo 'checked' ?>
                                                                                      value="">آسانسور</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data2" <?php if ($rowEstate['estate_data2'] == '1') echo 'checked' ?>
                                                                                      value="">پارکینگ اختصاصی</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data3" <?php if ($rowEstate['estate_data3'] == '1') echo 'checked' ?>
                                                                                      value="">تک
                                                    واحده</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data4" <?php if ($rowEstate['estate_data4'] == '1') echo 'checked' ?>
                                                                                      value="">انباری</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data5" <?php if ($rowEstate['estate_data5'] == '1') echo 'checked' ?>
                                                                                      value="">تخلیه</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data6" <?php if ($rowEstate['estate_data6'] == '1') echo 'checked' ?>
                                                                                      value="">کلید
                                                    اول</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data7" <?php if ($rowEstate['estate_data7'] == '1') echo 'checked' ?>
                                                                                      value="">حیاط</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data8" <?php if ($rowEstate['estate_data8'] == '1') echo 'checked' ?>
                                                                                      value="">آبگرمکن</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data9" <?php if ($rowEstate['estate_data9'] == '1') echo 'checked' ?>
                                                                                      value="">هود</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data10" <?php if ($rowEstate['estate_data10'] == '1') echo 'checked' ?>
                                                                                      value="">گاز
                                                    صفحه ای</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data11" <?php if ($rowEstate['estate_data11'] == '1') echo 'checked' ?>
                                                                                      value="">کمد
                                                    دیواری</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data12" <?php if ($rowEstate['estate_data12'] == '1') echo 'checked' ?>
                                                                                      value="">پمپ
                                                    آب</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data13" <?php if ($rowEstate['estate_data13'] == '1') echo 'checked' ?>
                                                                                      value="">درب
                                                    ضد سرقت</label>
                                                / <label class="checkbox-inline"><input type="checkbox"
                                                                                        id="pool" <?php if ($rowEstate['estate_pool'] == '1') echo 'checked' ?>
                                                                                        value="">استخر</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="yard" <?php if ($rowEstate['estate_yard'] == '1') echo 'checked' ?>
                                                                                      value="">حیاط</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="garden" <?php if ($rowEstate['estate_garden'] == '1') echo 'checked' ?>
                                                                                      value="">تراس</label>
                                                <label class="checkbox-inline"><input type="checkbox"
                                                                                      id="special" <?php if ($rowEstate['estate_special'] == '1') echo 'checked' ?>
                                                                                      value="">ملک
                                                    ویژه</label><label class="checkbox-inline"><input type="checkbox"
                                                                                      id="data14" <?php if ($rowEstate['estate_data14'] == '1') echo 'checked' ?>
                                                                                      value="">تهاتر ( معاوضه )</label>

                                                <label class="checkbox-inline">
                                                    <input type="checkbox"
                                                                                      id="data15" <?php if ($rowEstate['estate_data15'] == '1') echo 'checked' ?>
                                                                                      value="">پیش فروش
                                                </label>
                                            </div>
                                        </div>

                                        <div class="modal-body" id="mappAdd">
                                            <input id="latbox" type="text" style="display: none"
                                                   value="<?php echo $rowEstate['estate_lat'] ?>">
                                            <input id="lngbox" style="display: none" type="text"
                                                   value="<?php echo $rowEstate['estate_lng'] ?>">
                                            <div id="map" style="width:100%;height: 500px;"></div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">توضیحات</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" id="detail"
                                                          rows="10"> <?php echo $rowEstate['estate_detail'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">توضیحات کاربر</label>
                                            <div class="col-sm-10">
                                            <textarea type="text" class="form-control" id="detailUser"
                                                      rows="10"> <?php echo $rowEstate['estate_userDetail'] ?> </textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="image-editor" style="text-align: center;direction: ltr;">
                                                <input type="file" class="cropit-image-input" style="display:none;"
                                                       id="img">
                                                <a type="button" onclick="show_img()" class="btn btn-info "><i
                                                            class="icon-plus"></i>اضافه
                                                    کردن تصویر</a>
                                                <div class="cropit-preview">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="button" onclick="submit_admin()" class="btn btn-success">
                                                    ویرایش ملک
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                        </section>


                    </div>
                </div>
            </section>
            </div>
            </div>
            <!-- page end-->
        </section>
        </section>
        <!--main content end-->
        </section>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


        <!--common script for all pages-->
        <script src="js/common-scripts.js"></script>

        <!--script for this page only-->
        <script src="js/dynamic-table.js"></script>
        <script src="assets/jquery.cropit.js"></script>


        <script>

            $('input[etype="Number"]').keydown(function(event) {

                if(event.shiftKey && ((event.keyCode >=48 && event.keyCode <=57)
                        || (event.keyCode >=186 &&  event.keyCode <=222))){
                    // Ensure that it is a number and stop the Special chars
                    event.preventDefault();
                }
                else if ((event.shiftKey || event.ctrlKey) && (event.keyCode > 34 && event.keyCode < 40)){
                    // let it happen, don't do anything
                }
                else{
                    // Allow only backspace , delete, numbers
                    if (event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 39 ||event.keyCode == 37
                        || (event.keyCode >=48 && event.keyCode <=57)) {
                        // let it happen, don't do anything
                    }
                    else {
                        // Ensure that it is a number and stop the key press
                        event.preventDefault();
                    }
                }
            });



            <?php
            if($rowEstate['estate_lat']=='' || $rowEstate['estate_lng']=='')
                $rowEstate['estate_lat']=31.3546676;
                $rowEstate['estate_lng']=48.6822043;
//            ?>
//            var myCenter = new google.maps.LatLng(<?php //echo $rowEstate['estate_lat'] ?>//,<?php //echo $rowEstate['estate_lng'] ?>//);
//            var mapCanvas = document.getElementById("map");
//            var mapOptions = {center: myCenter, zoom: 15};
//            var map = new google.maps.Map(mapCanvas, mapOptions);
//            var marker = marker = new google.maps.Marker(
//                {
//                    map: map,
//                    draggable: true,
//                    animation: google.maps.Animation.DROP,
//                    position: myCenter
//                });
//            marker.setMap(map);
//
//            google.maps.event.addListener(marker, 'dragend', function (event) {
//                document.getElementById("latbox").value = this.getPosition().lat();
//                document.getElementById("lngbox").value = this.getPosition().lng();
//            });
//
//
//            function geocodePosition(pos) {
//                geocoder = new google.maps.Geocoder();
//                geocoder.geocode
//                ({
//                        latLng: pos
//                    },
//                    function (results, status) {
//                        if (status == google.maps.GeocoderStatus.OK) {
//                            $("#mapSearchInput").val(results[0].formatted_address);
//                            $("#mapErrorMsg").hide(100);
//                        }
//                        else {
//                            $("#mapErrorMsg").html('Cannot determine address at this location.' + status).show(100);
//                        }
//                    }
//                );
//            }
//



            var map = L.map('map', {
                center: [<?php echo $rowEstate['estate_lat'] ?>,<?php echo $rowEstate['estate_lng'] ?>],
                zoom: 15,
                preferCanvas:false,
                boxZoom:false,
                zoomAnimation:true
            });
            var latlng1 = L.latLng(<?php echo $rowEstate['estate_lat'] ?>,<?php echo $rowEstate['estate_lng'] ?>);

            marker = L.marker(
                latlng1,{
                    title:"test",
                    description:'London Eye',
                    draggable:true
                }).addTo(map)
                .bindPopup('حرکت بده...')
            ;

            marker.on('dragend', function(event) {
                var marker = event.target;  // you could also simply access the marker through the closure
                var result = marker.getLatLng();  // but using the passed event is cleaner
                document.getElementById('latbox').value=result['lat'];
                document.getElementById('lngbox').value=result['lng'];
            });

            L.tileLayer('' +
                'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?' +
                'access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 30,
                attribution: '',
                id: 'mapbox.streets'
            }).addTo(map);


            function show_img() {
                $('#img').click();
            }

            function show_img1() {
                $('#img1').click();
            }

            (function ($) {
                $('.image-editor').cropit({
                    exportZoom: 1.25,
                    imageBackground: true,
                    imageBackgroundBorderWidth: 20,
                    imageState: {
                        src: ''
                    }
                });
                $('.image-editor1').cropit({
                    exportZoom: 1.25,
                    imageBackground: true,
                    imageBackgroundBorderWidth: 20,
                    imageState: {
                        src: ''
                    }
                });

            })(jQuery);

            function border_defult() {
                $('#successMSG').slideUp('fast');

            }

            function submit_admin() {
                var img = '';

                var imgprofile = $('.image-editor').cropit('export', {
                    type: 'image/jpeg',
                    quality: 0.33,
                    originalSize: true
                });
                if (typeof imgprofile !== 'undefined') // Any scope
                {
                    img = imgprofile;
                }

                var data1 = '0';
                var data2 = '0';
                var data3 = '0';
                var data4 = '0';
                var data5 = '0';
                var data6 = '0';
                var data7 = '0';
                var data8 = '0';
                var data9 = '0';
                var data10 = '0';
                var data11 = '0';
                var data12 = '0';
                var data13 = '0';
                var data14 = '0';
                var data15 = '0';


                var yard = '0', garden = '0', pool = '0', special = '0';

                if ($('#data1').is(":checked")) {
                    data1 = '1';
                }
                if ($('#data2').is(":checked")) {
                    data2 = '1';
                }
                if ($('#data3').is(":checked")) {
                    data3 = '1';
                }
                if ($('#data4').is(":checked")) {
                    data4 = '1';
                }
                if ($('#data5').is(":checked")) {
                    data5 = '1';
                }
                if ($('#data6').is(":checked")) {
                    data6 = '1';
                }
                if ($('#data7').is(":checked")) {
                    data7 = '1';
                }
                if ($('#data8').is(":checked")) {
                    data8 = '1';
                }
                if ($('#data9').is(":checked")) {
                    data9 = '1';
                }
                if ($('#data10').is(":checked")) {
                    data10 = '1';
                }
                if ($('#data11').is(":checked")) {
                    data11 = '1';
                }
                if ($('#data12').is(":checked")) {
                    data12 = '1';
                }
                if ($('#data13').is(":checked")) {
                    data13 = '1';
                }if ($('#data14').is(":checked")) {
                    data14 = '1';
                }if ($('#data15').is(":checked")) {
                    data15 = '1';
                }


                if ($('#pool').is(":checked")) {
                    pool = '1';
                }
                if ($('#yard').is(":checked")) {
                    yard = '1';
                }
                if ($('#garden').is(":checked")) {
                    garden = '1';
                }
                if ($('#special').is(":checked")) {
                    special = '1';
                }

                var transaction = $('#transaction option:selected').val();
                var type = $('#type option:selected').val();
                var aria = $('#aria option:selected').val();
                var title = $('#title').val();
                var price = $('#price').val();
                var mortgage = $('#mortgage').val();
                var rent = $('#rent').val();
                var address = $('#address').val();


                var unitF = $('#testerAّ').val();
                var bedroom = $('#bedroom').val();
                var year = $('#year').val();
                if(year!=='0' && year.length<4){
                    $('#year').css('border', '2px solid red');
                    return;
                }
                if(price!=='0' && price!=='' && price.length<6){
                    $('#price').css('border', '2px solid red');
                    return;
                }
                if(mortgage!=='0' && mortgage!=='' && mortgage.length<5){
                    $('#mortgage').css('border', '2px solid red');
                    return;
                }
                if(rent!=='0' && rent!=='' && rent.length<5){
                    $('#rent').css('border', '2px solid red');
                    return;
                }
                var unit = $('#unit').val();
                var floor = $('#floor').val();
                var lat = $('#latbox').val();
                var lng = $('#lngbox').val();
                var detail = $('#detail').val();
                var mobile = $('#mobile').val();
                var detailUser = $('#detailUser').val();
                var renterMobile = $('#renterMobile').val();
                var name = $('#name').val();
                var area = $('#area').val();
                var num = $('#num').val();
                var agentMobile = $('#agentMobile').val();
                $.ajax({
                    url: 'ajax/editEstateMobile.php',
                    data: {
                        id:'<?php echo $id ?>',
                        data1: data1,
                        data2: data2,
                        data3: data3,
                        data4: data4,
                        data5: data5,
                        data6: data6,
                        data7: data7,
                        data8: data8,
                        data9: data9,
                        data10: data10,
                        data11: data11,
                        data12: data12,
                        renterMobile:renterMobile,
                        unitFloor: unitF,
                        data13: data13,
                        data14: data14,
                        data15: data15,
                        special: special,
                        transaction: transaction,
                        type: type,
                        aria: aria,
                        num:num,
                        title: title,
                        price: price,
                        mortgage: mortgage,
                        rent: rent,
                        address: address,
                        bedroom: bedroom,
                        year: year,
                        unit: unit,
                        floor: floor,
                        lat: lat,
                        lng: lng,
                        detail: detail,
                        area: area,
                        agentMobile:agentMobile,
                        mobile: mobile,
                        name: name,
                        yard: yard,
                        garden: garden,
                        pool: pool,
                        img: img,
                        detailUser: detailUser
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        if (data['error'] === true) {
                            $('#userName').css('border', '2px solid red');
                        } else {
                            $('html,body').animate({scrollTop: 0}, 'slow');
                            $('#successMSG').slideDown('fast');
                            return;
                        }
                    }
                });

            }

        </script>


        </body>
        </html>

        <?php
    }

}
?>
