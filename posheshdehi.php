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
<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12" style="padding: 50px">

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


        <br>
        <br>
        <img src="Images/LTE.png" class="img">

    </div>

<!-- ----------------------------------------------------------------------------------------------   -->


    <div class="collapse" id="three">
        <p class="para"><b>شما میتوانید جهت اطلاع از پوشش خدمات وایرلس در منطقه ی خود از نقشه زیر استفاده کنید.</b></p>
        <p class="para"><b>قسمت های بنفش بیانگر پوشش خدمات وایرلس وبوتل است.</b></p>
<!--        <div class="wireless">-->
<!--            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" value="انتخاب شهر">انتخاب شهر<span class="caret"></span></button>-->
<!--            <ul class="dropdown-menu">-->
<!--                <li><a href="#">اهواز</a></li>-->
<!--                <li><a href="#">تهران</a></li>-->
<!--                <li><a href="#">اصقهان</a></li>-->
<!--                <li><a href="#">شیراز</a></li>-->
<!--                <li><a href="#">مشهد</a></li>-->
<!--            </ul>-->
<!--    </div>-->
    </div>

</div>


<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">

<div class="footer">
    <div class="footerContent">
        <div class="UnuaFooterPart">
            <div class="footertekstujo">
                <h4 class="footertekstujoHead">
                    خدمات وبوتل
                </h4>
                <a href="#" class="footertekstujolinks">
                    پهنای باند اختصاصی
                </a>
                <a href="#" class="footertekstujolinks">
                    تلفن (Voice)
                </a>
                <a href="#" class="footertekstujolinks">
                    اینترنت ADSL
                </a>
                <a href="#" class="footertekstujolinks">
                    اینترنت TD-LTE
                </a>
                <a href="#" class="footertekstujolinks">
                    اینترنت Wireless
                </a>
                <a href="#" class="footertekstujolinks">
                    اینترنت مجتمع‌ها
                </a>
            </div><!--footertekstujo-->

            <div class="footertekstujo">
                <h4 class="footertekstujoHead">
                    آشنایی با وبوتل
                </h4>
                <a href="#" class="footertekstujolinks">
                    درباره ما
                </a>
                <a href="#" class="footertekstujolinks">
                    چرا وبوتل؟
                </a>
                <a href="#" class="footertekstujolinks">
                    عوامل فروش وبوتل
                </a>
                <a href="#" class="footertekstujolinks">
                    آشنایی با رگولاتوری
                </a>
                <a href="#" class="footertekstujolinks">
                    سامانه‌ی رضایت سنجی
                </a>
            </div><!--footertekstujo-->

        </div>
        <div class="DuaFooterPart">
            <div class="footertekstujo">
                <h4 class="footertekstujoHead">
                    دسترسی سریع
                </h4>
                <a href="#" class="footertekstujolinks">
                    سوالات متداول (FAQ)
                </a>
                <a href="#" class="footertekstujolinks">
                    نواحی تحت پوشش
                </a>
                <a href="#" class="footertekstujolinks">
                    صفحه‌ی مشترکین
                </a>
                <a href="#" class="footertekstujolinks">
                    اعلام واریز اشتباه
                </a>
            </div><!--footertekstujo-->
            <div class="enamadC">
                <img src="Images/enamad.png" alt="enamad" class="enamad">
            </div>

        </div>
        <div class="TriaFooterPart">
            <p class="adress">
                آدرس: خیابان طالقانی، بین نظامی و خوانساری - ساختمان بهپوری - طبقه‌ی ۲
                <br>
                کد پستی: ۶۱۹۳۹۶۸۶۴۴
                <br>
                شماره تماس: ۰۶۱۳۲۲۳۰۰۴۰
            </p>

            <div class="FooterSocialMedia">
                <a href="#" class="SocialMediaIcons fab fa-instagram"></a>
                <a href="#" class="SocialMediaIcons fab fa-twitter"></a>
                <a href="#" class="SocialMediaIcons fab fa-linkedin-in"></a>
                <a href="#" class="SocialMediaIcons fab fa-telegram-plane"></a>
            </div>
            <div class="Servco">
                <img src="Images/195.png" alt="195" class="imgServco">
                <p class="ServcoText">
                    دارای مجوز سروکو به شماره ۱۰۰-۹۵-۲۹ از سازمان تنظیم مقررات و ارتباطات رادیویی کشور
                </p>

            </div>
        </div>
    </div>
    <div class="CopyRight">
        <p class="Co">
            تمام حقوق این وبسایت متعلق به شرکت ثابت آوا اروند می‌باشد.
        </p>
    </div>
</div><!--End of my dear footer-->

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






