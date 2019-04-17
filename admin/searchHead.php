<?php
session_start();
include 'inc/conn.php';
include 'inc/my_frame.php';
$conn = connection();
$where = '';


if (isset($_GET['id']) && $_GET['id'] != '' && $_GET['id'] != '0') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $where .= "AND ( estate_masterOner = '$id' OR estate_oner = '$id' ) ";
} else {
    $id = '';
}


if (isset($_GET['point']) && $_GET['point'] != '' && $_GET['point'] != '0') {
    $point = mysqli_real_escape_string($conn, $_GET['point']);
    $where .= "AND estate_pointId = '$point' ";

}
if (isset($_GET['state']) && $_GET['state'] != '' && $_GET['state'] != '0') {
    $state = mysqli_real_escape_string($conn, $_GET['state']);
    $where .= "AND estate_type = '$state' ";
}
if (isset($_GET['model']) && $_GET['model'] != '' && $_GET['model'] != '0') {
    $model = mysqli_real_escape_string($conn, $_GET['model']);
    $where .= "AND  estate_transaction = '$model' ";
}

?>
<html>
<head>
    <title>کلید اول - خرید،فروش،رهن و اجاره در اهواز</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="noUi/nouislider.css">
    <script src="noUi/nouislider.js"></script>
    <script src="noUi/wNumbs.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <!--[if lt IE 9]>
    <script src="js/respond.js"></script>
    <![endif]-->
    <script src="js/jquery-1.11.3.min.js"></script>
</head>
<body class="home">
<!-- Site Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-2 topMenu">
                <a href="index.php" class=""> <i class="ico ico-food" style="
    margin-right: 4px;
    position: relative;
    /* left: 69px; */
    top: -5px;
    float: left;
    "></i>
                    <span style="
    color: #FFFFFF;
    top: 22px;
    position: relative;
    left: -33px;
    ">خانه</span>

                </a>
                <div class="subMenu">

                    <i></i>
                    <i></i>
                    <i></i>
                    <span style="color: #FFFFFF">منو</span>


                    <div class="sub">
                        <i class="topTriangle"></i>
                        <ul>
                            <?php

                            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                ?>
                                <li><a href="news.php">معرفی انبوه سازان</a></li>
                                <?php
                            } else {
                                echo '<li><a href="#">معرفی انبوه سازان (باید ثبت نام کنید)</a></li>';
                            }
                            ?>
                            <li><a href="blog.php">طراحی داخلی</a></li>
                            <li><a href="estateNews.php">اخبار مسکن</a></li>

                            <li><a href="area.php">معرفی شهر اهواز و مناطق</a></li>

                            <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                ?>
                                <li><a href="realState.php">معرفی مشاوران همکار</a></li>
                                <li><a href="invest.php">پتانسیل های سرمایه گذاری</a></li>
                                <?php
                            } else {
                                echo '<li><a href="#">معرفی مشاوران همکار(باید ثبت نام کنید</a></li>
                                <li><a href="#">پتانسیل های سرمایه گذاری(باید ثبت نام کنید )</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 login">
                <?php
                if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
                    ?>
                    <a href="#!" data-toggle="modal" data-target="#login">ورود</a> |
                    <a href="#!" data-toggle="modal" data-target="#register">عضویت</a>
                    <?php
                } else {
                    ?>
                    <a href="#!" data-toggle="modal"> خوش آمدید<?php echo $_SESSION['userName']; ?></a> |
                    <a href="logout.php">خروج</a>
                    <?php
                }
                ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12 col-md-12 siteLogo" style="margin: 0px auto 0 auto;">
                <a href="#!">
                    <img src="css/images/siteLogo.png" class="img-responsive" alt="کلید اول" title="کلید اول"/>
                </a>
            </div>
            <div class="col-sm-5 col-md-4 col-lg-6 map">
                <li href="#!" id="one" onclick="activeation('one')">خرید و فروش</li>
                <li href="#!" id="two" onclick="activeation('two')">رهن و اجاره</li>
                <br>
                <script>
                    activeation('one');

                    function activeation(id) {
                        if (id === 'one') {
                            localStorage.setItem('model', '4');
                            $('#one').css('background-color', 'rgba(0, 87, 133, 0.6)');
                            $('#two').css('background-color', 'transparent');

                        } else {
                            if (id === 'two') {
                                localStorage.setItem('model', '3');
                                $('#two').css('background-color', 'rgba(0, 87, 133, 0.6)');
                                $('#one').css('background-color', 'transparent');
                            }
                        }

                    }
                </script>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-8 siteSearch">
                <div class="customSelect city">
                    <span><i class="ico ico-map"></i><span>اهواز</span></span>
                    <!--                    <ul>-->
                    <!--                        <li onclick="ShowArea('1')"><a href="#!">اهواز</a></li>-->
                    <!--                        --><?php
                    //                        include 'inc/conn.php';
                    //                        include 'inc/my_frame.php';
                    //                        $conn = connection();
                    //                        $cot = "'";
                    //                        $selecTCity = mysqli_query($conn,"SELECT * FROM city");
                    //                        while($RowCity = mysqli_fetch_assoc($selecTCity)){
                    //                            echo'<li onclick="ShowArea('.$cot.$RowCity['city_id'].$cot.')"><a href="#!" id="cityId'.$RowCity['city_id'].'">'.$RowCity['city_name'].'</a></li>';
                    //                        }
                    //                        ?>
                    <!--                    </ul>-->
                </div>
                <div class="customSelect">
                    <span><i class="ico ico-page-map"></i><span>منطقه</span></span>
                    <ul id="area">
                        <?php
                        $cot = "'";
                        $selecTCity = mysqli_query($conn, "SELECT DISTINCT area_id,area_cityId,area_name FROM area,estate 
                        WHERE area_cityId='1' AND estate.estate_pointId=area.area_id ORDER BY area_name ASC ");
                        while ($RowCity = mysqli_fetch_assoc($selecTCity)) {
                            echo '<li onclick="setPoint(' . $cot . $RowCity['area_id'] . $cot . ')" class="CityIdArea' . $RowCity['area_cityId'] . '"><a href="#!" id="PointId' . $RowCity['area_id'] . '">' . $RowCity['area_name'] . '</a></li>';

                        }
                        ?>
                    </ul>
                </div>


                <script>
                    localStorage.setItem('mapper', '');

                    function allArea() {
                        $('ul#area li').show();
                    }

                    function ShowArea(id) {
                        $('ul#area li').hide();
                        $('ul#area li.CityIdArea' + id).show();
                    }

                    localStorage.setItem('state', 0);
                    localStorage.setItem('point', 0);

                    function setSetate(num) {
                        localStorage.setItem('state', num);
                    }

                    function setPoint(num) {
                        localStorage.setItem('point', num);
                    }

                    function goToSearch() {
                        var point = localStorage.getItem('point');
                        var state = localStorage.getItem('state');
                        var model = localStorage.getItem('model');
                        var id = '<?php echo $id ?>';

                        location.href = 'search.php?point=' + point + '&state=' + state + '&model=' + model + '&id=' + id;
                    }

                </script>

                <div class="customSelect">
                    <span><i class="ico ico-home"></i><span>نوع ملک</span></span>
                    <ul>
                        <li onclick="setSetate(1)"><a href="#!">آپارتمان اداری تجاری</a></li>
                        <li onclick="setSetate(2)"><a href="#!">آپارتمان مسکونی</a></li>
                        <li onclick="setSetate(3)"><a href="#!">پزشکی</a></li>
                        <li onclick="setSetate(4)"><a href="#!">تجاری مغازه</a></li>
                        <li onclick="setSetate(5)"><a href="#!">زمین و ویلایی</a></li>
                        <li onclick="setSetate(6)"><a href="#!">مشارکت در ساخت</a></li>
                    </ul>
                </div>
                <input onclick="goToSearch()" type="button" class="button green" value="جستجو کن"/>
                <div class="clearfix"></div>
            </div>


        </div>
    </div>
    <!-- Modal -->
    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog text-right">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ورود</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger fade in" id="successMSG1" style="display: none">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <span id="msgAlert1">عضویت با موفقیت انجام شد</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="lineTxt" id="emailLogin" placeholder="ایمیل یا شماره تماس "/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="lineTxt" id="passwordLogin" placeholder="رمز عبور"/>
                    </div>
                    <div class="form-group">
                        <input type="button" value="ورود" onclick="loginUser()" class="button green sm"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="maper" class="modal fade" role="dialog">
        <div class="modal-dialog text-right">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">نقشه</h4>
                </div>
                <div class="modal-body">
                    <div id="googleMap" style="width:100%;height:400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="register" class="modal fade text-right" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ثبت نام</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info fade in" id="" style="">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <span id="msgAlert">با عضو شدن در سایت کلید اول می توانید از تمامی قسمت های سایت ما دیدن فرمایید .</span>
                    </div>
                    <div class="alert alert-danger fade in" id="successMSG" style="display: none">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <span id="msgAlert4">عضویت با موفقیت انجام شد</span>
                    </div>
                    <fieldset class="text-right">
                        <div class="row">
                            <div class="form-group form-group-lg col-md-6 col-xs-12">
                                <input type="text" placeholder="نام و نام خانوادگی" class="lineTxt" id="name">
                            </div>
                            <div class="form-group form-group-lg col-md-6 col-xs-12">
                                <input type="text" placeholder="شماره تلفن همراه" class="lineTxt" id="mobile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-lg col-md-12 col-xs-12">
                                <input type="email" placeholder="ایمیل" class="lineTxt" id="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-lg col-md-6 col-xs-12">
                                <input type="password" placeholder="رمز عبور" class="lineTxt" id="password">
                            </div>
                            <div class="form-group form-group-lg col-md-6 col-xs-12">
                                <input type="password" placeholder="تکرار رمز عبور" class="lineTxt" id="newpassword">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-lg col-md-12 col-xs-12">
                                <input type="button" value="ثبت نام" onclick="userSubmit()" class="button green sm"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <script>
                function errorSubmit() {
                    $('#successMSG').fadeIn('slow');
                    $('#msgAlert4').text('تمامی اطلاعات اجباری می باشند');
                }

                function errorLogin() {
                    $('#successMSG1').fadeIn('slow');
                    $('#msgAlert1').text('تمامی اطلاعات اجباری می باشند');
                }

                function userSubmit() {
                    var name, password, newPassword, email, mobile;
                    name = $('#name').val();
                    password = $('#password').val();
                    newPassword = $('#newpassword').val();
                    email = $('#email').val();
                    mobile = $('#mobile').val();

                    if (name === '') {
                        errorSubmit();
                        return;
                    }
                    if (password === '') {
                        errorSubmit();
                        return;
                    }
                    if (newPassword === '') {
                        errorSubmit();
                        return;
                    }
                    if (mobile === '') {
                        errorSubmit();
                        return;
                    }
                    if (password !== newPassword) {

                        $('#successMSG').fadeIn('slow');
                        $('#msgAlert4').html('رمزعبور یکسان وارد نشده است');
                    } else {
                        $.ajax({
                            url: 'mobile/reg.php',
                            data: {
                                name: name,
                                username: email,
                                mobile: mobile,
                                password: password
                            },
                            dataType: 'json',
                            type: 'POST',
                            success: function (data) {
                                if (data['status'] === false) {
                                    $('#successMSG').fadeIn('slow');
                                    $('#msgAlert4').text(data['MSG']);
                                } else {
                                    $.ajax({
                                        url: 'mobile/login.php',
                                        data: {
                                            email: email,
                                            password: password
                                        },
                                        dataType: 'json',
                                        type: 'POST',
                                        success: function (data) {
                                            if (data['login'] === true) {
                                                location.reload();
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }
                }

                function loginUser() {
                    var email, password;
                    email = $('#emailLogin').val();
                    password = $('#passwordLogin').val();
                    if (email === '') {
                        errorLogin();
                        return;
                    }
                    if (password === '') {
                        errorLogin();
                        return;
                    }
                    $.ajax({
                        url: 'mobile/login.php',
                        data: {
                            email: email,
                            password: password
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            if (data['login'] === true) {
                                location.reload();
                            } else {
                                $('#successMSG1').fadeIn('slow');
                                $('#msgAlert1').text('نام کاربری و رمز عبور اشتباه است  ');
                            }
                        }
                    });
                }
            </script>

        </div>
    </div>
</header>
<!-- End Site Header -->
<!-- Site Body -->
<section>
    <div class="container" style="    padding-top: 18px;
    padding-bottom: 18px;">
        <div class="row">
            <?php
            $getNumRow = mysqli_query($conn, "SELECT * FROM estate WHERE estate.estate_status ='1' AND estateShow='0'
 " . $where . " ORDER BY date(estate_regDate) DESC , time(estate_regTime)");
            $rows = mysqli_num_rows($getNumRow);


            ?>

            <section class="col-xs-12 col-md-3 searchFilter" style="text-align: center">
                <?php
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $idLast = mysqli_real_escape_string($conn, $_GET['id']);
                    $query = mysqli_query($conn, "SELECT * FROM admin WHERE adminId = '$id'");
                    $rowAdmin = mysqli_fetch_assoc($query);
                    $name = $rowAdmin['adminOccupation'];
                    ?>
                    <aside>

                        <div class="grayBox"><?php echo $name ?></div>
                        <img src="admin/img/upload/<?php $rowAdmin['adminImage'] == '' ? $a = 'defult' : $a = $rowAdmin['adminImage'];
                        echo $a; ?>.jpg" alt="" style="width: 100%" title=""/>
                        <div class="orangeBox">
                            <?php echo $rowAdmin['adminMobile'] ?>
                            <br>
                            <?php echo $rowAdmin['adminTell'] ?>

                        </div>
                    </aside>
                    <br>
                    <br>
                    <?php
                } ?>
                <aside>

                    <div class="grayBox">جستجو بر اساس</div>

                    <div class="orangeBox">فیلتر جانبی</div>
                    <?php
                    //اگر یک ملک در سیستم بود دیگر نباید فیلتر اعمال شود.
                    if ($rows > 1) {
                        ?>
                        <ul>
                            <li class="custChk">
                                <input type="text" id="text" style="width: 100%;"
                                       placeholder="کد یا آدرس را وارد کنید"/>
                            </li>
                            <br>
                            <li class="custChk">
                                <input type="checkbox" id="chk5"/>
                                <label for="chk5" onclick=""> آسانسور </label>
                            </li>
                            <li class="custChk">
                                <input type="checkbox" id="chk6"/>
                                <label for="chk6" onclick="">پارکینگ</label>
                            </li>
                            <li class="custChk">
                                <input type="checkbox" id="chk12"/>
                                <label for="chk12" onclick="">تک واحده</label>
                            </li>

                            <?php
                            if (isset($_GET['model']) && $_GET['model'] == '4') {
                                $priceMin = 0;
                                $priceMax = 0;
                                $yearMin = 0;
                                $yearMax = 0;
                                $i = 1;
                                $getMinMax = mysqli_query($conn, "
SELECT estate_sale,estate_year FROM estate WHERE estate.estate_status ='1' AND estateShow='0' " . $where
                                );
                                while ($getMaxMinRow = mysqli_fetch_assoc($getMinMax)) {
                                    if ($i == 1) {
                                        $priceMin = $getMaxMinRow['estate_sale'];
                                        $priceMax = $getMaxMinRow['estate_sale'];
                                        $yearMin = $getMaxMinRow['estate_year'];
                                        $yearMax = $getMaxMinRow['estate_year'];
                                    } else {

                                        if ($priceMin > $getMaxMinRow['estate_sale']) {
                                            $priceMin = $getMaxMinRow['estate_sale'];
                                        }
                                        if ($priceMax < $getMaxMinRow['estate_sale']) {
                                            $priceMax = $getMaxMinRow['estate_sale'];
                                        }
                                        if ($yearMin > $getMaxMinRow['estate_year']) {
                                            $yearMin = $getMaxMinRow['estate_year'];
                                        }
                                        if ($yearMax < $getMaxMinRow['estate_year']) {
                                            $yearMax = $getMaxMinRow['estate_year'];
                                        }
                                    }

                                    $i++;
                                }
                                ?>
                                <li class="custChk">
                                    <input type="checkbox" id="chk7"/>
                                    <label for="chk7" onclick="">تهاتر (معاوضه)</label>
                                </li>
                                <li class="custChk">
                                    <input type="checkbox" id="chk8"/>
                                    <label for="chk8" onclick="">پیش خرید</label>
                                </li>
                            <br>
                            <?php
                            if ($_GET['state'] != '4'){
                            ?>
                                <li>
                                    <label for="chk8">تعداد اتاق خواب</label>
                                    <br>
                                    از
                                    <span id="startReng3">20,000,0000</span>
                                    تا
                                    <span id="endReng3">20,000,000,000</span>
                                    <div id="slider-range3"></div>

                                </li>
                            <br>
                            <?php
                            }if ($_GET['state'] == '2'){
                            ?>
                                <li>
                                    <label for="">سال ساخت</label>
                                    <br>
                                    از
                                    <span id="startReng233">20,000,0000</span>
                                    تا
                                    <span id="endReng233">20,000,000,000</span>
                                    <div id="slider-range233"></div>
                                </li>
                            <br>
                            <?php
                            }
                            ?>
                                <li>
                                    <label for="chk8">مبلغ خرید</label>
                                    <br>
                                    از
                                    <span id="startReng">20,000,0000</span>
                                    تا
                                    <span id="endReng">20,000,000,000</span>
                                    تومان
                                    <div id="slider-range"></div>

                                </li>
                                <li>
                                    <label for="chk23">متراژ</label>
                                    <br>
                                    از
                                    <span id="startReng23">20,000,0000</span>
                                    تا
                                    <span id="endReng23">20,000,000,000</span>
                                    متر
                                    <div id="slider-range23"></div>

                                </li>
                                <script>
                                    <?php
                                    $areaMin = 0;
                                    $areaMax = 0;
                                    $yearMin = 0;
                                    $yearMax = 0;
                                    $i = 1;
                                    $getMinMax = mysqli_query($conn, "
SELECT estate_area,estate_year FROM estate WHERE estate.estate_status ='1' AND estateShow='0' " . $where
                                    );
                                    while ($getMaxMinRow = mysqli_fetch_assoc($getMinMax)) {
                                        if ($i == 1) {
                                            $areaMin = $getMaxMinRow['estate_area'];
                                            $areaMax = $getMaxMinRow['estate_area'];
                                            $yearMin = $getMaxMinRow['estate_year'];
                                            $yearMax = $getMaxMinRow['estate_year'];
                                        } else {
                                            if ($yearMin > $getMaxMinRow['estate_year']) {
                                                $yearMin = $getMaxMinRow['estate_year'];
                                            }
                                            if ($yearMax < $getMaxMinRow['estate_year']) {
                                                $yearMax = $getMaxMinRow['estate_year'];
                                            }
                                            if ($areaMin > $getMaxMinRow['estate_area']) {
                                                $areaMin = $getMaxMinRow['estate_area'];
                                            }
                                            if ($areaMax < $getMaxMinRow['estate_area']) {
                                                $areaMax = $getMaxMinRow['estate_area'];
                                            }
                                        }

                                        $i++;
                                    }?>
                                    var valuesDivs23 = [
                                        document.getElementById('startReng23'),
                                        document.getElementById('endReng23')
                                    ];
                                    var slider23 = document.getElementById('slider-range23');

                                    noUiSlider.create(slider23, {
                                        start: [<?php echo $areaMin?>, <?php echo $areaMax ?>],
                                        connect: true,
                                        range: {
                                            'min': <?php echo $areaMin?>,
                                            'max': <?php echo $areaMax?>
                                        },
                                        direction: 'rtl', // Put '0' at the bottom of the slider
                                        tooltips: false,
                                        format: wNumb({
                                            decimals: 0
                                        }),
                                        step: 5
                                    });
                                    slider23.noUiSlider.on('update', function (values, handle) {
                                            valuesDivs23[handle].innerHTML = values[handle].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                        }
                                    );
                                </script>
                                <script>

                                    var valuesDivs = [
                                        document.getElementById('startReng'),
                                        document.getElementById('endReng')
                                    ];
                                    var slider = document.getElementById('slider-range');

                                    noUiSlider.create(slider, {
                                        start: [<?php echo $priceMin?>, <?php echo $priceMax ?>],
                                        connect: true,
                                        range: {
                                            'min': <?php echo $priceMin?>,
                                            'max': <?php echo $priceMax?>
                                        },
                                        direction: 'rtl', // Put '0' at the bottom of the slider
                                        tooltips: false,
                                        format: wNumb({
                                            decimals: 0
                                        }),
                                        step: 25000000
                                    });
                                    slider.noUiSlider.on('update', function (values, handle) {
                                            valuesDivs[handle].innerHTML = values[handle].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                        }
                                    );
                                </script>
                            <?php
                            } elseif (isset($_GET['model']) && $_GET['model'] == '3') {
                            $rentMin = 0;
                            $rentMax = 0;
                            $mortgageMax = 0;
                            $mortgageMin = 0;
                            $yearMin=0;
                            $yearMax=0;

                            $i = 1;

                            $getMinMax = mysqli_query($conn, "SELECT estate_rent,estate_mortgage,estate_year
 FROM estate WHERE estate.estate_status ='1' AND estateSHow='0' " . $where);
                            while ($getMaxMinRow = mysqli_fetch_assoc($getMinMax)) {
                                if ($i === 1) {
                                    $rentMin = $getMaxMinRow['estate_rent'];
                                    $rentMax = $getMaxMinRow['estate_rent'];
                                    $mortgageMin = $getMaxMinRow['estate_mortgage'];
                                    $mortgageMax = $getMaxMinRow['estate_mortgage'];
                                    $yearMin = $getMaxMinRow['estate_year'];
                                    $yearMax = $getMaxMinRow['estate_year'];
                                } else {
                                    if ($rentMax < $getMaxMinRow['estate_rent']) {
                                        $rentMax = $getMaxMinRow['estate_rent'];
                                    }
                                    if ($rentMin > $getMaxMinRow['estate_rent']) {
                                        $rentMin = $getMaxMinRow['estate_rent'];
                                    }
                                    if ($mortgageMax < $getMaxMinRow['estate_mortgage']) {
                                        $mortgageMax = $getMaxMinRow['estate_mortgage'];
                                    }
                                    if ($mortgageMin > $getMaxMinRow['estate_mortgage']) {
                                        $mortgageMin = $getMaxMinRow['estate_mortgage'];
                                    }
                                    if ($yearMin > $getMaxMinRow['estate_year']) {
                                        $yearMin = $getMaxMinRow['estate_year'];
                                    }
                                    if ($yearMax < $getMaxMinRow['estate_year']) {
                                        $yearMax = $getMaxMinRow['estate_year'];
                                    }
                                }
                                $i++;
                            }
                            ?>
                            <br>
                                <li>
                                    <label for="chk8">تعداد اتاق خواب</label>
                                    <br>
                                    از
                                    <span id="startReng3">1</span>
                                    تا
                                    <span id="endReng3">5</span>
                                    اتاق
                                    <div id="slider-range3"></div>

                                </li>
                            <br>
                                <li>
                                    <label for="chk8">مبلغ اجاره</label>
                                    <br>
                                    از
                                    <span id="startReng1">20,000,0000</span>
                                    تا
                                    <span id="endReng1">20,000,000,000</span>
                                    تومان
                                    <div id="slider-range1"></div>

                                </li>
                            <br>
                                <li>
                                    <label for="chk8">مبلغ رهن</label>
                                    <br>
                                    از
                                    <span id="startReng2">20,000,0000</span>
                                    تا
                                    <span id="endReng2">20,000,000,000</span>
                                    تومان
                                    <div id="slider-range2"></div>
                                </li>
                                <li>
                                    <label for="chk23">متراژ</label>
                                    <br>
                                    از
                                    <span id="startReng23">20,000,0000</span>
                                    تا
                                    <span id="endReng23">20,000,000,000</span>
                                    متر
                                    <div id="slider-range23"></div>
                                </li>
                            <br>
                            <?php
                            if ($_GET['state'] == '2'){
                            ?>
                                <li>
                                    <label for="">سال ساخت</label>
                                    <br>
                                    از
                                    <span id="startReng233">20,000,0000</span>
                                    تا
                                    <span id="endReng233">20,000,000,000</span>
                                    <div id="slider-range233"></div>
                                </li>
                            <br>
                            <?php
                            }
                            ?>
                                <script>
                                    <?php
                                    $areaMin = 0;
                                    $areaMax = 0;
                                    $i = 1;
                                    $getMinMax = mysqli_query($conn, "
SELECT estate_area FROM estate WHERE estate.estate_status ='1' AND estateShow='0' " . $where
                                    );
                                    while ($getMaxMinRow = mysqli_fetch_assoc($getMinMax)) {
                                        if ($i == 1) {
                                            $areaMin = $getMaxMinRow['estate_area'];
                                            $areaMax = $getMaxMinRow['estate_area'];
                                        } else {

                                            if ($areaMin > $getMaxMinRow['estate_area']) {
                                                $areaMin = $getMaxMinRow['estate_area'];
                                            }
                                            if ($areaMax < $getMaxMinRow['estate_area']) {
                                                $areaMax = $getMaxMinRow['estate_area'];
                                            }
                                        }

                                        $i++;
                                    }
                                    ?>
                                    var valuesDivs23 = [
                                        document.getElementById('startReng23'),
                                        document.getElementById('endReng23')
                                    ];
                                    var slider23 = document.getElementById('slider-range23');

                                    noUiSlider.create(slider23, {
                                        start: [<?php echo $areaMin?>, <?php echo $areaMax ?>],
                                        connect: true,
                                        range: {
                                            'min': <?php echo $areaMin?>,
                                            'max': <?php echo $areaMax?>
                                        },
                                        direction: 'rtl', // Put '0' at the bottom of the slider
                                        tooltips: false,
                                        format: wNumb({
                                            decimals: 0
                                        }),
                                        step: 5
                                    });
                                    slider23.noUiSlider.on('update', function (values, handle) {
                                            valuesDivs23[handle].innerHTML = values[handle].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                        }
                                    );
                                </script>

                                <script>
                                    var valuesDivs1 = [
                                        document.getElementById('startReng1'),
                                        document.getElementById('endReng1')
                                    ];
                                    var slider1 = document.getElementById('slider-range1');

                                    noUiSlider.create(slider1, {
                                        start: [<?php echo $rentMin?>, <?php echo $rentMax?>],
                                        connect: true,
                                        range: {
                                            'min': <?php echo $rentMin?>,
                                            'max': <?php echo $rentMax?>
                                        },
                                        direction: 'rtl', // Put '0' at the bottom of the slider
                                        tooltips: false,
                                        format: wNumb({
                                            decimals: 0
                                        }),
                                        step: 100000
                                    });
                                    slider1.noUiSlider.on('update', function (values, handle) {
                                            valuesDivs1[handle].innerHTML = values[handle].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                        }
                                    );
                                    var valuesDivs2 = [
                                        document.getElementById('startReng2'),
                                        document.getElementById('endReng2')
                                    ];
                                    var slider2 = document.getElementById('slider-range2');

                                    noUiSlider.create(slider2, {
                                        start: [<?php echo $mortgageMin?>,<?php echo $mortgageMax?>],
                                        connect: true,
                                        range: {
                                            'min': <?php echo $mortgageMin?>,
                                            'max': <?php echo $mortgageMax?>
                                        },
                                        direction: 'rtl', // Put '0' at the bottom of the slider
                                        tooltips: false,
                                        format: wNumb({
                                            decimals: 0
                                        }),
                                        step: 5000000
                                    });
                                    slider2.noUiSlider.on('update', function (values, handle) {
                                            valuesDivs2[handle].innerHTML = values[handle].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                        }
                                    );
                                </script>
                                <?php
                            }
                            if ($_GET['state'] != '4') {
                                ?>
                                <script>
                                    var valuesDivs3 = [
                                        document.getElementById('startReng3'),
                                        document.getElementById('endReng3')
                                    ];
                                    var slider3 = document.getElementById('slider-range3');
                                    noUiSlider.create(slider3, {
                                        start: [1, 5],
                                        connect: true,
                                        range: {
                                            'min': 1,
                                            'max': 5
                                        },
                                        direction: 'rtl', // Put '0' at the bottom of the slider
                                        tooltips: false,
                                        format: wNumb({
                                            decimals: 0
                                        }),
                                        step: 1
                                    });
                                    slider3.noUiSlider.on('update', function (values, handle) {
                                            valuesDivs3[handle].innerHTML = values[handle];
                                        }
                                    );
                                </script>
                                <?php
                            }

                            if ($_GET['state'] == '2') {
                                ?>
                                <script>
                                    var valuesDivs2333 = [
                                        document.getElementById('startReng233'),
                                        document.getElementById('endReng233')
                                    ];
                                    var slider233 = document.getElementById('slider-range233');

                                    noUiSlider.create(slider233, {
                                        start: [<?php echo $yearMin?>, <?php echo $yearMax ?>],
                                        connect: true,
                                        range: {
                                            'min': <?php echo $yearMin?>,
                                            'max': <?php echo $yearMax?>
                                        },
                                        direction: 'rtl', // Put '0' at the bottom of the slider
                                        tooltips: false,
                                        format: wNumb({
                                            decimals: 0
                                        }),
                                        step: 1
                                    });
                                    slider233.noUiSlider.on('update', function (values, handle) {
                                            valuesDivs2333[handle].innerHTML = values[handle].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                        }
                                    );
                                </script>
                                <?php
                            }
                            ?>
                            <br>
                            <button class="button sm" style="position: relative;background: #03a3c5" onclick="search()">
                                اعمال فیلتر
                            </button>
                        </ul>
                        <?php
                    }
                    ?>
                </aside>
            </section>
            <?php
            if ($_GET['model'] == '3') {
                ?>
                <script type='text/javascript'>
                    function search() {
                        $('#googleMap').html('');
                        var point = '<?php echo $_GET['point']?>';
                        var state = '<?php echo $_GET['state']?>';
                        var sort = localStorage.getItem('sort');
                        var option = '<table class="table table-hover table-bordered" style="direction: rtl;text-align: right;display: none" id="tableAll">\n' +
                            '                <thead>\n' +
                            '                <tr>\n' +
                            '                    <th>کد ملک</th>\n' +
                            '                    <th>آدرس</th>\n' +
                            '                   <th>رهن</th>\n' +
                            '                   <th>اجاره</th>\n' +
                            '                    <th>متراژ</th>\n' +
                            '                    <th>سال ساخت</th>\n' +
                            '                    <th>طبقه</th>\n' +
                            '                    <th>امکانات</th>\n' +
                            '                </tr>\n' +
                            '                </thead>\n' +
                            '                <tbody>';
                        var areaStart = document.getElementById('startReng23').innerHTML.replace(/,/g, '');
                        var areaEnd = document.getElementById('endReng23').innerHTML.replace(/,/g, '');
                        <?php
                        if($_GET['state'] != '4'){
                        ?>
                        var roomStart = document.getElementById('startReng3').innerHTML.replace(/,/g, '');
                        var roomEnd = document.getElementById('endReng3').innerHTML.replace(/,/g, '');
                        <?php
                        }
                        else{?>
                        var roomStart = '0';
                        var roomEnd = '0';
                        <?php
                        }if($_GET['state'] == '2'){
                        ?>
                        var yearStart = document.getElementById('startReng233').innerHTML.replace(/,/g, '');
                        var yearEnd = document.getElementById('endReng233').innerHTML.replace(/,/g, '');
                        <?php
                        }else{
                        ?>
                        var yearStart = '0';
                        var yearEnd = '1899';
                        <?php
                        }
                        ?>
                        var rentStart = document.getElementById('startReng1').innerHTML.replace(/,/g, '');
                        var rentEnd = document.getElementById('endReng1').innerHTML.replace(/,/g, '');
                        var mortgageStart = document.getElementById('startReng2').innerHTML.replace(/,/g, '');
                        var mortgageEnd = document.getElementById('endReng2').innerHTML.replace(/,/g, '');
                        var data1 = document.getElementById('chk5').checked ? '1' : '0';
                        var data2 = document.getElementById('chk6').checked ? '1' : '0';
                        var data12 = document.getElementById('chk12').checked ? '1' : '0';
                        var text = document.getElementById('text').value;
                        $.ajax({
                            url: 'ajax/search.php',
                            data: {
                                sort: sort,
                                id: '<?php echo $id?>',
                                point: point,
                                text: text,
                                roomStart: roomStart,
                                roomEnd: roomEnd,
                                rentEnd: rentEnd,
                                yearStart: yearStart,
                                yearEnd: yearEnd,
                                rentStart: rentStart,
                                mortgageStart: mortgageStart,
                                mortgageEnd: mortgageEnd,
                                data1: data1,
                                data2: data2,
                                areaStart: areaStart,
                                areaEnd: areaEnd,
                                data12: data12,
                                state: state,
                                model: '3'
                            },
                            type: 'POST',
                            success: function (data) {
                                texter = JSON.parse(data);
                                var mapper = [];
                                var cot = "'";
                                for (var j = 0; j < texter['data1'].length; j++) {
                                    mapper[j] = [];
                                    mapper[j][0] = '<h2 style="font-family: IranSans">' + texter['data1'][j]['estate_title'] + '</h2><br><center><a style="font-family: IranSans" href="page.php?id=' + texter['data1'][j]['estate_id'] + '" class="btn btn-info">مشاهده ملک</a><center>';
                                    mapper[j][1] = parseFloat(texter['data1'][j]['estate_lat']);
                                    mapper[j][2] = parseFloat(texter['data1'][j]['estate_lng']);
                                }
                                localStorage.setItem('mapper', JSON.stringify(mapper));
                                for (var i = 0; i < texter['data'].length; i++) {
                                    option += '<tr>';
                                    option += '<td>' + texter['data'][i]['estate_number'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_address'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_mortgage'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_rent'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_area'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_floor'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_year'] + '</td>';
                                    option += '<td>';
                                    if (texter['data'][i]['estate_data2'] === '1') {
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                    }
                                    if (texter['data'][i]['estate_data1'] === '1')
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                    option += '</td>';
                                    option += '</tr>';

                                    option += '<div class="result" id="Test"><div class="image" style="top: 25px;">';
                                    if (texter['data'][i]['estate_special'] === '1') {
                                        option += '<i class="ico ico-offer"></i>';
                                    }
                                    option += '<img  src="img/' + texter['data'][i]['estate_img'] + '.jpg" alt="" title="" style="width: 143px; margin-bottom: 10px;"/></div><div class="details"><div><h2 style="color: #3D619B;">' + texter['data'][i]['estate_title'] + '<i class="ico ico-food" style="    top: 11px; position: relative;"></i></h2></div><div><div class="pull-right"><div><span class="gray">آدرس :</span><span>' + texter['data'][i]['estate_address'] + '</span></div><div><span class="gray">کد ملک :</span><span>' + texter['data'][i]['estate_number'] + '</span></div><div><span class="gray">متراژ :</span><span>' + texter['data'][i]['estate_area'] + ' متر </span></div><div><span class="gray">طبقه :</span><span>' + texter['data'][i]['estate_floor'] + '</span></div><div><span class="gray">سال ساخت :</span><span>' + texter['data'][i]['estate_year'] + '</span></div><div><span class="gray">مبلغ رهن:</span><span>' + texter['data'][i]['estate_mortgage'].replace(/(\\d)(?=(\\d\\d\\d)+(?!\\d))/g, "$1,") + '</span></div><div><span class="gray">مبلغ اجاره:</span><span>' + texter['data'][i]['estate_rent'].replace(/(\\d)(?=(\\d\\d\\d)+(?!\\d))/g, "$1,") + '</span></div></div></div><div class="clearfix"></div></div><div class="clearfix"></div><div class="bottomDet"><a href="page.php?id=' + texter['data'][i]['estate_id'] + '" id="opengo"><button class="button green sm" style="position: relative;z-index: 99999999;"> مشاهده ملک</button></a><section class="clearfix"><ul class="list-inline" style="position: relative;margin-top:5px;padding-right: 0">';
                                    if (texter['data'][i]['estate_data2'] === '1') {
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                    }
                                    if (texter['data'][i]['estate_data1'] === '1')
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                    option += '</ul></section></div></div>';
                                }
                                document.getElementById('AllResult').innerHTML = "";
                                document.getElementById('AllResult').innerHTML = option;
                                if (texter['data'].length === 0) {
                                    document.getElementById('AllResult').innerHTML = '<p style="text-align: right;font-size: 20px;color: #04b6dc;margin-top: 29px;">موردی با مشخصات زیر یافت نشد</p>';
                                }
                                document.getElementById('number').innerHTML = texter['qwert'];
                            }
                        });
                    }
                    var offset = 20;
                    var i = 0;
                    processing = false;

                    $(window).on("scroll", function () {
                        if (processing)
                            return false;
                        if ($(window).scrollTop() >= $('#AllResult').offset().top + $('#AllResult').outerHeight() - window.innerHeight) {
                            processing = true;
                            $('#loadingPage').show();

                            var point = '<?php echo $_GET['point']?>';
                            var state = '<?php echo $_GET['state']?>';
                            var sort = localStorage.getItem('sort');
                            var option = '<table class="table table-hover table-bordered" style="direction: rtl;text-align: right;display: none" id="tableAll">\n' +
                                '                <thead>\n' +
                                '                <tr>\n' +
                                '                    <th>کد ملک</th>\n' +
                                '                    <th>آدرس</th>\n' +
                                '                   <th>رهن</th>\n' +
                                '                   <th>اجاره</th>\n' +
                                '                    <th>متراژ</th>\n' +
                                '                    <th>سال ساخت</th>\n' +
                                '                    <th>طبقه</th>\n' +
                                '                    <th>امکانات</th>\n' +
                                '                </tr>\n' +
                                '                </thead>\n' +
                                '                <tbody>';
                            var areaStart = document.getElementById('startReng23').innerHTML.replace(/,/g, '');
                            var areaEnd = document.getElementById('endReng23').innerHTML.replace(/,/g, '');
                            <?php
                            if($_GET['state'] != '4'){
                            ?>
                            var roomStart = document.getElementById('startReng3').innerHTML.replace(/,/g, '');
                            var roomEnd = document.getElementById('endReng3').innerHTML.replace(/,/g, '');
                            <?php
                            }
                            else{?>
                            var roomStart = '0';
                            var roomEnd = '0';
                            <?php
                            }if($_GET['state'] == '2'){
                            ?>
                            var yearStart = document.getElementById('startReng233').innerHTML.replace(/,/g, '');
                            var yearEnd = document.getElementById('endReng233').innerHTML.replace(/,/g, '');
                            <?php
                            }else{
                            ?>
                            var yearStart = '0';
                            var yearEnd = '1899';
                            <?php
                            }
                            ?>
                            var rentStart = document.getElementById('startReng1').innerHTML.replace(/,/g, '');
                            var rentEnd = document.getElementById('endReng1').innerHTML.replace(/,/g, '');
                            var mortgageStart = document.getElementById('startReng2').innerHTML.replace(/,/g, '');
                            var mortgageEnd = document.getElementById('endReng2').innerHTML.replace(/,/g, '');
                            var data1 = document.getElementById('chk5').checked ? '1' : '0';
                            var data2 = document.getElementById('chk6').checked ? '1' : '0';
                            var data12 = document.getElementById('chk12').checked ? '1' : '0';
                            var text = document.getElementById('text').value;
                            $.ajax({
                                url: 'ajax/search.php',
                                data: {
                                    sort: sort,
                                    id: '<?php echo $id?>',
                                    point: point,
                                    text: text,
                                    roomStart: roomStart,
                                    roomEnd: roomEnd,
                                    rentEnd: rentEnd,
                                    rentStart: rentStart,
                                    mortgageStart: mortgageStart,
                                    mortgageEnd: mortgageEnd,
                                    yearStart:yearStart,
                                    yearEnd:yearEnd,
                                    data1: data1,
                                    data2: data2,
                                    areaStart: areaStart,
                                    areaEnd: areaEnd,
                                    data12: data12,
                                    state: state,
                                    model: '3',
                                    offset: offset
                                },
                                type: 'POST',
                                success: function (data) {
                                    texter = JSON.parse(data);
                                    for (var i = 0; i < texter['data'].length; i++) {
                                        option += '<tr>';
                                        option += '<td>' + texter['data'][i]['estate_number'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_address'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_mortgage'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_rent'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_area'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_floor'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_year'] + '</td>';
                                        option += '<td>';
                                        if (texter['data'][i]['estate_data2'] === '1') {
                                            option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                        }
                                        if (texter['data'][i]['estate_data1'] === '1')
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                        option += '</td>';
                                        option += '</tr>';
                                        option += '<div class="result" id="Test"><div class="image" style="top: 25px;">';
                                        if (texter['data'][i]['estate_special'] === '1') {
                                            option += '<i class="ico ico-offer"></i>';
                                        }
                                        option += '<img  src="img/' + texter['data'][i]['estate_img'] + '.jpg" alt="" title="" style="width: 143px; margin-bottom: 10px;"/></div><div class="details"><div><h2 style="color: #3D619B;">' + texter['data'][i]['estate_title'] + '<i class="ico ico-food" style="    top: 11px; position: relative;"></i></h2></div><div><div class="pull-right"><div><span class="gray">آدرس :</span><span>' + texter['data'][i]['estate_address'] + '</span></div><div><span class="gray">کد ملک :</span><span>' + texter['data'][i]['estate_number'] + '</span></div><div><span class="gray">متراژ :</span><span>' + texter['data'][i]['estate_area'] + ' متر </span></div><div><span class="gray">طبقه :</span><span>' + texter['data'][i]['estate_floor'] + '</span></div><div><span class="gray">سال ساخت :</span><span>' + texter['data'][i]['estate_year'] + '</span></div><div><span class="gray">مبلغ رهن:</span><span>' + texter['data'][i]['estate_mortgage'].replace(/(\\d)(?=(\\d\\d\\d)+(?!\\d))/g, "$1,") + '</span></div><div><span class="gray">مبلغ اجاره:</span><span>' + texter['data'][i]['estate_rent'].replace(/(\\d)(?=(\\d\\d\\d)+(?!\\d))/g, "$1,") + '</span></div></div></div><div class="clearfix"></div></div><div class="clearfix"></div><div class="bottomDet"><a href="page.php?id=' + texter['data'][i]['estate_id'] + '" id="opengo"><button class="button green sm" style="position: relative;z-index: 99999999;"> مشاهده ملک</button></a><section class="clearfix"><ul class="list-inline" style="position: relative;margin-top:5px;padding-right: 0">';
                                        if (texter['data'][i]['estate_data2'] === '1') {
                                            option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                        }
                                        if (texter['data'][i]['estate_data1'] === '1')
                                            option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                        option += '</ul></section></div></div>';
                                    }
                                    if (texter['data'].length == 0) {
                                        $('#loadingPage').hide();
                                        return;
                                    } else {
                                        var a = document.getElementById('AllResult').innerHTML;
                                        document.getElementById('AllResult').innerHTML = a + option;
                                        processing = false;
                                        offset += 20;
                                    }
                                }
                            });
                        } else {
                            $('#loadingPage').hide();
                        }
                    });
                </script>

            <?php
            }elseif ($_GET['model'] == '4'){
            ?>
                <script type='text/javascript'>
                    var offset = 20;
                    var i = 0;
                    localStorage.setItem('mapper', '');
                    function search() {
                        localStorage.setItem('mapper', '');
                        $('#googleMap').html('');
                        var point = '<?php echo $_GET['point']?>';
                        var state = '<?php echo $_GET['state']?>';
                        var sort = localStorage.getItem('sort');
                        var option = '<table class="table table-hover table-bordered" style="direction: rtl;text-align: right;display: none" id="tableAll">\n' +
                            '                <thead>\n' +
                            '                <tr>\n' +
                            '                    <th>کد ملک</th>\n' +
                            '                    <th>آدرس</th>\n' +
                            '                   <th>قیمت</th>\n' +
                            '                    <th>متراژ</th>\n' +
                            '                    <th>سال ساخت</th>\n' +
                            '                    <th>طبقه</th>\n' +
                            '                    <th>امکانات</th>\n' +
                            '                </tr>\n' +
                            '                </thead>\n' +
                            '                <tbody>';
                        var areaStart = document.getElementById('startReng23').innerHTML.replace(/,/g, '');
                        var areaEnd = document.getElementById('endReng23').innerHTML.replace(/,/g, '');
                        <?php
                        if($_GET['state'] != '4'){
                        ?>
                        var roomStart = document.getElementById('startReng3').innerHTML.replace(/,/g, '');
                        var roomEnd = document.getElementById('endReng3').innerHTML.replace(/,/g, '');
                        <?php
                        }
                        else{?>
                        var roomStart = '0';
                        var roomEnd = '0';
                        <?php
                        }if($_GET['state'] == '2'){
                        ?>
                        var yearStart = document.getElementById('startReng233').innerHTML.replace(/,/g, '');
                        var yearEnd = document.getElementById('endReng233').innerHTML.replace(/,/g, '');
                        <?php
                        }else{
                        ?>
                        var yearStart = '0';
                        var yearEnd = '1899';
                        <?php
                        }
                        ?>
                        var priceStart = document.getElementById('startReng').innerHTML.replace(/,/g, '');
                        var priceEnd = document.getElementById('endReng').innerHTML.replace(/,/g, '');
                        var data1 = document.getElementById('chk5').checked ? '1' : '0';
                        var data2 = document.getElementById('chk6').checked ? '1' : '0';
                        var data3 = document.getElementById('chk7').checked ? '1' : '0';
                        var data4 = document.getElementById('chk8').checked ? '1' : '0';
                        var data12 = document.getElementById('chk12').checked ? '1' : '0';
                        var text = document.getElementById('text').value;

                        $.ajax({
                            url: 'ajax/search.php',
                            data: {
                                sort: sort,
                                point: point,
                                state: state,
                                id: '<?php echo $id?>',
                                roomStart: roomStart,
                                roomEnd: roomEnd,
                                priceStart: priceStart,
                                priceEnd: priceEnd,
                                data1: data1,
                                data3: data3,
                                data4: data4,
                                yearStart:yearStart,
                                yearEnd:yearEnd,
                                areaStart: areaStart,
                                areaEnd: areaEnd,
                                data2: data2,
                                text: text,
                                data12: data12,
                                model: '4'
                            },
                            type: 'POST',
                            success: function (data) {
                                texter = JSON.parse(data);
                                var mapper = [];
                                var cot = "'";
                                for (var j = 0; j < texter['data1'].length; j++) {
                                    mapper[j] = [];
                                    mapper[j][0] = '<h2 style="font-family: IranSans">' + texter['data1'][j]['estate_title'] + '</h2><br><center><a style="font-family: IranSans" href="page.php?id=' + texter['data1'][j]['estate_id'] + '" class="btn btn-info">مشاهده ملک</a><center>';
                                    mapper[j][1] = parseFloat(texter['data1'][j]['estate_lat']);
                                    mapper[j][2] = parseFloat(texter['data1'][j]['estate_lng']);
                                }
                                localStorage.setItem('mapper', JSON.stringify(mapper));
                                for (var i = 0; i < texter['data'].length; i++) {
                                    option += '<tr>';
                                    option += '<td>' + texter['data'][i]['estate_number'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_address'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_sale'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_area'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_year'] + '</td>';
                                    option += '<td>' + texter['data'][i]['estate_floor'] + '</td>';
                                    option += '<td>';
                                    if (texter['data'][i]['estate_data2'] === '1') {
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                    }
                                    if (texter['data'][i]['estate_data1'] === '1')
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                    option += '</td>';
                                    option += '</tr>';
                                    option += '<div class="result" id="Test"><div class="image" style="top: 25px;">';
                                    if (texter['data'][i]['estate_special'] === '1') {
                                        option += '<i class="ico ico-offer"></i>';
                                    }
                                    option += '<img  src="img/' + texter['data'][i]['estate_img'] + '.jpg" alt="" title="" style="width: 143px; margin-bottom: 10px;"/></div><div class="details"><div><h2 style="color: #3D619B;">' + texter['data'][i]['estate_title'] + '<i class="ico ico-food" style="    top: 11px; position: relative;"></i></h2></div><div><div class="pull-right"><div><span class="gray">آدرس :</span><span>' + texter['data'][i]['estate_address'] + '</span></div><div><span class="gray">کد ملک :</span><span>' + texter['data'][i]['estate_number'] + '</span></div><div><span class="gray">متراژ :</span><span>' + texter['data'][i]['estate_area'] + ' متر </span></div><div><span class="gray">طبقه :</span><span>' + texter['data'][i]['estate_floor'] + '</span></div><div><span class="gray">سال ساخت :</span><span>' + texter['data'][i]['estate_year'] + '</span></div><div><span class="gray">مبلغ فروش:</span><span>' + texter['data'][i]['estate_sale'].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span></div></div></div><br><br><br><div class="pull-right"> <div> <span class="gray">تعداد طبقه :</span> <span>'+texter['data'][i]['estate_unitFloor']+'</span> </div><div> <span class="gray">تعداد واحد :</span> <span>'+texter['data'][i]['estate_unit']+'</span> </div><div> <span class="gray">تعداد اتاق :</span> <span>'+texter['data'][i]['estate_bedroom']+'</span> </div> </div></div><div class="clearfix"></div><div class="bottomDet"><a href="page.php?id=' + texter['data'][i]['estate_id'] + '" id="opengo"><button class="button green sm" style="position: relative;z-index: 99999999;"> مشاهده ملک</button></a><section class="clearfix"><ul class="list-inline" style="position: relative;margin-top:5px;padding-right: 0">';
                                    if (texter['data'][i]['estate_data2'] === '1') {
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                    }
                                    if (texter['data'][i]['estate_data1'] === '1')
                                        option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                    option += '</ul></section></div></div>';
                                    document.getElementById('AllResult').innerHTML = "";
                                    document.getElementById('AllResult').innerHTML = option;
                                }
                                if (texter['data'].length === 0) {
                                    document.getElementById('AllResult').innerHTML = '<p style="text-align: right;font-size: 20px;color: #04b6dc;margin-top: 29px;">موردی با مشخصات زیر یافت نشد</p>';
                                }
                                document.getElementById('number').innerHTML = texter['qwert'];
                            }
                        });
                    }
                    processing = false;
                    $(window).on("scroll", function () {
                        if (processing)
                            return false;
                        if ($(window).scrollTop() >= $('#AllResult').offset().top + $('#AllResult').outerHeight() - window.innerHeight) {
                            processing = true;
                            $('#loadingPage').show();
                            var point = '<?php echo $_GET['point']?>';
                            var state = '<?php echo $_GET['state']?>';
                            var sort = localStorage.getItem('sort');
                            var option = '<table class="table table-hover table-bordered" style="direction: rtl;text-align: right;display: none" id="tableAll">\n' +
                                '                <thead>\n' +
                                '                <tr>\n' +
                                '                    <th>کد ملک</th>\n' +
                                '                    <th>آدرس</th>\n' +
                                '                   <th>قیمت</th>\n' +
                                '                    <th>متراژ</th>\n' +
                                '                    <th>سال ساخت</th>\n' +
                                '                    <th>طبقه</th>\n' +
                                '                    <th>امکانات</th>\n' +
                                '                </tr>\n' +
                                '                </thead>\n' +
                                '                <tbody>';
                            var areaStart = document.getElementById('startReng23').innerHTML.replace(/,/g, '');
                            var areaEnd = document.getElementById('endReng23').innerHTML.replace(/,/g, '');
                            <?php
                            if($_GET['state'] != '4'){
                            ?>
                            var roomStart = document.getElementById('startReng3').innerHTML.replace(/,/g, '');
                            var roomEnd = document.getElementById('endReng3').innerHTML.replace(/,/g, '');
                            <?php
                            }
                            else{?>
                            var roomStart = '0';
                            var roomEnd = '0';
                            <?php
                            }if($_GET['state'] == '2'){
                            ?>
                            var yearStart = document.getElementById('startReng233').innerHTML.replace(/,/g, '');
                            var yearEnd = document.getElementById('endReng233').innerHTML.replace(/,/g, '');
                            <?php
                            }else{
                            ?>
                            var yearStart = '0';
                            var yearEnd = '1899';
                            <?php
                            }
                            ?>
                            var priceStart = document.getElementById('startReng').innerHTML.replace(/,/g, '');
                            var priceEnd = document.getElementById('endReng').innerHTML.replace(/,/g, '');
                            var data1 = document.getElementById('chk5').checked ? '1' : '0';
                            var data2 = document.getElementById('chk6').checked ? '1' : '0';
                            var data3 = document.getElementById('chk7').checked ? '1' : '0';
                            var data4 = document.getElementById('chk8').checked ? '1' : '0';
                            var data12 = document.getElementById('chk12').checked ? '1' : '0';
                            var text = document.getElementById('text').value;
                            $.ajax({
                                url: 'ajax/search.php',
                                data: {
                                    sort: sort,
                                    point: point,
                                    state: state,
                                    id: '<?php echo $id?>',
                                    roomStart: roomStart,
                                    roomEnd: roomEnd,
                                    priceStart: priceStart,
                                    priceEnd: priceEnd,
                                    data1: data1,
                                    data3: data3,
                                    data4: data4,
                                    areaStart: areaStart,
                                    areaEnd: areaEnd,
                                    data2: data2,
                                    yearStart:yearStart,
                                    yearEnd:yearEnd,
                                    text: text,
                                    data12: data12,
                                    model: '4',
                                    offset: offset
                                },
                                type: 'POST',
                                success: function (data) {
                                    texter = JSON.parse(data);
                                    for (var i = 0; i < texter['data'].length; i++) {
                                        option += '<tr>';
                                        option += '<td>' + texter['data'][i]['estate_number'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_address'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_sale'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_area'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_floor'] + '</td>';
                                        option += '<td>' + texter['data'][i]['estate_year'] + '</td>';
                                        option += '<td>';
                                        if (texter['data'][i]['estate_data2'] === '1') {
                                            option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                        }
                                        if (texter['data'][i]['estate_data1'] === '1')
                                            option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                        option += '</td>';
                                        option += '</tr>';
                                        option += '<div class="result" id="Test"><div class="image" style="top: 25px;">';
                                        if (texter['data'][i]['estate_special'] === '1') {
                                            option += '<i class="ico ico-offer"></i>';
                                        }
                                        option += '<img  src="img/' + texter['data'][i]['estate_img'] + '.jpg" alt="" title="" style="width: 143px; margin-bottom: 10px;"/></div><div class="details"><div><h2 style="color: #3D619B;">' + texter['data'][i]['estate_title'] + '<i class="ico ico-food" style="    top: 11px; position: relative;"></i></h2></div><div><div class="pull-right"><div><span class="gray">آدرس :</span><span>' + texter['data'][i]['estate_address'] + '</span></div><div><span class="gray">کد ملک :</span><span>' + texter['data'][i]['estate_number'] + '</span></div><div><span class="gray">متراژ :</span><span>' + texter['data'][i]['estate_area'] + ' متر </span></div><div><span class="gray">طبقه :</span><span>' + texter['data'][i]['estate_floor'] + '</span></div><div><span class="gray">سال ساخت :</span><span>' + texter['data'][i]['estate_year'] + '</span></div><div><span class="gray">مبلغ فروش:</span><span>' + texter['data'][i]['estate_sale'].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span></div></div></div><br><br><br><div class="pull-right"> <div> <span class="gray">تعداد طبقه :</span> <span>'+texter['data'][i]['estate_unitFloor']+'</span> </div><div> <span class="gray">تعداد واحد :</span> <span>'+texter['data'][i]['estate_unit']+'</span> </div><div> <span class="gray">تعداد اتاق :</span> <span>'+texter['data'][i]['estate_bedroom']+'</span> </div> </div></div><div class="clearfix"></div><div class="bottomDet"><a href="page.php?id=' + texter['data'][i]['estate_id'] + '" id="opengo"><button class="button green sm" style="position: relative;z-index: 99999999;"> مشاهده ملک</button></a><section class="clearfix"><ul class="list-inline" style="position: relative;margin-top:5px;padding-right: 0">';
                                        if (texter['data'][i]['estate_data2'] === '1') {
                                            option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="پارکینگ"><img style="width: 37px"src="02.png"> </a></li>';
                                        }
                                        if (texter['data'][i]['estate_data1'] === '1')
                                            option += '<li style="position: relative;"><a href="#" data-toggle="tooltip" data-placement="top"title="آسانسور"><img style="width: 37px" src="01.png"></a></li>';
                                        option += '</ul></section></div></div>';
                                    }
                                    var a = document.getElementById('AllResult').innerHTML;
                                    document.getElementById('AllResult').innerHTML = a + option;
                                    processing = false;
                                }
                            });
                            offset += 20;

                        } else {
                            $('#loadingPage').hide();

                        }
                    });
                </script>
                <?php
            }
            ?>
