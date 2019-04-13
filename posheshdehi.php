<?php
include "class/dataBase.php";
$db = new dataBase();
include "inc/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>وبوتل</title>
    <link href="Style/bootstrap.css" rel="stylesheet">
    <link href="Style/all.css" rel="stylesheet">
    <link href="Style/slick-theme.css" rel="stylesheet">
    <link href="Style/slick.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Style/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style/bootstrap.min.css">





    <script src="Scripts/jquery.js" type="text/javascript"></script>
    <script src="Scripts/popper.js"></script>
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/migrate.js"></script>
    <script src="Scripts/slick.js"></script>
    <script type="text/javascript"></script>



</head>

<body>
<style>
/*---------------------------------وسطی-----------------------------------*/
 #btnbtn{
     width: 32%;
     margin-top: 15%;
     background-color: white;
     border: 1px solid silver;
     box-shadow: 0 1px 10px silver;
 }
    .btn:hover{
        background-color: #742a9d!important;
        color: white;
    }
    #one{
        margin-top: 210px;
        text-align: center;
        font-size: 15px;
    }
    #two{
        margin-top: 210px;
        text-align: center;
        font-size: 15px;
    }
    #three{
        margin-top: 210px;
        text-align: center;
        font-size: 15px;
    }
    .but{
        background-color: #742a9d;
        color: white;
        border-color: #742a9d;

    }
    .size{
        font-size: 25px;
    }
    /*----------------------------چپی----------------------------*/
    .para{
        font-size: 23px;
    }
    .buttton{
        background-color: #742a9d;
        color: white;
        border-color: #742a9d;
        border-radius: 150px;
        font-size: 25px;
    }
    .buttton:hover{
        background-color: #4d1c68;
    }
    .img{
        width: 750px;
        height: 400px;
    }

</style>
<!--بادی---------------------------------------------------------------------------------------------------------->
<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

    <div style="text-align: center;" class="col-md-6 col-md-offset-3  col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-lg-6 col-lg-offset-3">
    <button type="button" class="btn" id="btnbtn" onclick="showOne()"><b>پوشش TD-LTE</b></button>
    <button type="button" class="btn" id="btnbtn" onclick="showOne1()"><b>پوشش ADSL</b></button>
    <button type="button" class="btn" id="btnbtn" onclick="showOne2()"><b>پوشش وایرلس</b></button>
    </div>


<!------------------------------------------------------------------------------------------------>


    <div class="collapse" id="one">
        <div class="size">
        <p class="para"><b>جهت امکان سنجی خط تلفن خود برای ارائه سرویس اینترنت ADSL شماره</b></p>
        <p class="para"><b> تلفن ثابت خود را وارد فرمائید.</b></p>
        <br>

        <input type="text" class="num" placeholder="شماره 8 رقمی تلفن ثابت خود را وارد کنید...">
        <input type="text" class="numb" placeholder="کد استان">
        <input type="button" class="but" value="بررسی">
        </div>
    </div>


<!--    ----------------------------------------------------------------------------------------------->

    <div class="collapse" id="two">
        <p class="para"><b>شما میتوانید جهت اطلاع از پوشش خدمات TD_LTE در منطقه خود از نقشه ی زیر استفاده کنید.</b></p>
        <p class="para"><b>قسمت های بنفش بیانگر پوشش خدمات TD_LTE وبوتل است.</b></p>
        <br>

        <button type="button" class="buttton dropdown-toggle" data-toggle="dropdown" value="انتخاب استان">انتخاب استان<span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">خوزستان</a></li>
            <li><a href="#">تهران</a></li>
            <li><a href="#">اصقهان</a></li>
            <li><a href="#">فارس</a></li>
            <li><a href="#">بوشهر</a></li>
        </ul>
        <button type="button" class="buttton dropdown-toggle" data-toggle="dropdown" value="انتخاب شهر">انتخاب شهر<span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">اهواز</a></li>
            <li><a href="#">تهران</a></li>
            <li><a href="#">اصقهان</a></li>
            <li><a href="#">شیراز</a></li>
            <li><a href="#">مشهد</a></li>
        </ul>
        <br>
        <br>
        <img src="Images/LTE.png" class="img">

    </div>

<!-- ----------------------------------------------------------------------------------------------   -->


    <div class="collapse" id="three">
        <p class="para"><b>شما میتوانید جهت اطلاع از پوشش خدمات وایرلس در منطقه ی خود از نقشه زیر استفاده کنید.</b></p>
        <p class="para"><b>قسمت های بنفش بیانگر پوشش خدمات وایرلس وبوتل است.</b></p>
        <div class="wireless">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" value="انتخاب شهر">انتخاب شهر<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">اهواز</a></li>
                <li><a href="#">تهران</a></li>
                <li><a href="#">اصقهان</a></li>
                <li><a href="#">شیراز</a></li>
                <li><a href="#">مشهد</a></li>
            </ul>
    </div>
    </div>

</div>

<!--فوتر------------------------------------------------------------------------------------------------------------------------->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
    <hr>
    <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6" style="padding: 0">

        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <ul style="list-style-type: none">
                <li style="color:#742a9d"><b>آدرس:خیابان طالقانی - بین نظامی و </b></li>
                <li style="color:#742a9d"><b>خوانساری - ساختمان بهپوری - طبقه ۲</b></li>
                <li style="color:#742a9d"><b>کد پستی:۶۱۹۳۹۶۸۶۴۴</b></li>
                <li style="color:#742a9d"><b>شماره تماس:۰۶۱۳۲۲۳۰۰۴۰</b></li>
            </ul><br>

            <img class="imgfooter" src="img/tweeter.png" >
            <img class="imgfooter" src="img/insta.jpg">
            <img class="imgfooter" src="img/telegram.jpg" >
            <img class="imgfooter" src="img/in.png" >

            <br><br><br>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="col-sm-12 col-md-9 col-lg-9 col-xs-12">
                    <h2 style="color:#742a9d"><b> دارای مجوز سروکو به شماره ۲۹-۹۵-۱۰۰ از سازمان تنظیم مقررات و ارتباطات رادیویی کشور</b></h2>

                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12">
                    <img src="img/195.png" class="samane">

                </div>

            </div>


        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <img src="img/namad.jpg " style="width: 170px">
        </div>


    </div>

    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">

            <h2  style="color:#742a9d;margin-top: 0 "><b>آشنایی با وبوتل</b><hr style="border-bottom: 3px solid #742a9d"></h2>
            <ul style="list-style-type: none">
                <li style="color:#742a9d"><b>درباره ما</b></li>
                <li style="color:#742a9d"><b>چرا وبوتل؟</b></li>
                <li style="color:#742a9d"><b>عوامل فروش وبوتل</b></li>
                <li style="color:#742a9d"><b>آشنایی با رگولاتوری</b></li>
                <li style="color:#742a9d"><b>سامانه رضایت سنجی</b></li>
            </ul>


        </div>
        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
            <h2  style="color:#742a9d;margin-top: 0"><b>خدمات وبوتل</b><hr style="border-bottom: 3px solid #742a9d"></h2>
            <ul style="list-style-type: none">
                <li style="color:#742a9d"><b>پهنای باند اختصاصی</b></li>
                <li style="color:#742a9d"><b>تلفن(voice)</b></li>
                <li style="color:#742a9d"><b>اینترنت ADSL</b></li>
                <li style="color:#742a9d"><b>اینترنت TD-LTE</b></li>
                <li style="color:#742a9d"><b>اینترنت Wierless</b></li>
                <li style="color:#742a9d"><b>اینترنت مجتمع ها</b></li>
            </ul>
        </div>
        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">

            <h2  style="color:#742a9d; margin-top: 0"><b>دسترسی سریع</b><hr style="border-bottom: 3px solid #742a9d"></h2>
            <ul style="list-style-type: none">


                <li style="color:#742a9d"><b>سوالات متداول(FAQ)</b></li>
                <li style="color:#742a9d"><b>نواحی تحت پوشش</b></li>
                <li style="color:#742a9d"><b>صفحه مشترکین</b></li>
                <li style="color:#742a9d"><b>اعلام واریز اشتباه</b></li>


            </ul>



        </div>
    </div>



    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
        <hr>
        <p  style="color:#742a9d;text-align: center"> تمامی حقوق این سایت متعلق به شرکت ارتباطات ثابت آوا اروند می باشد</p>

    </div>



</div>
<script>
    function showOne() {
        $("#one").hide();
        $("#two").hide();
        $("#three").show();

    }function showOne1() {
        $("#one").show();
        $("#two").hide();
        $("#three").hide();

    }function showOne2() {
        $("#one").hide();
        $("#two").show();
        $("#three").hide();

    }
</script>






</body>
</html>






