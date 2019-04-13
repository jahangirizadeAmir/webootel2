<?php
include "class/dataBase.php";
$db = new dataBase();
include "inc/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>




</head>

<body>

<!--بادی---------------------------------------------------------------------------------------------------------->
<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
<div class="row">
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3 col-lg-6 col-lg-offset-3">

            <a href="#" type="button" class="hover" data-toggle="collapse" data-target="#demo2"><p class="ppp col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin:0"><b>پوشش TD-LTE</b></p></a>

            <a href="#" type="button" class="hover" data-toggle="collapse" data-target="#demo"><p class="ppp col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin:0"><b>پوشش ADSL</b></p></a>

            <a href="#" type="button" class="hover" data-toggle="collapse" data-target="#demo3"><p class="ppp col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin:0"><b>پوشش وایرلس</b></p></a>

        </div>
    </div>


    <div id="demo" class="collapse col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="para col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3 col-lg-6 col-lg-offset-3">
                <br>
                <br>

                <p class="para"><b>جهت امکان سنجی خط تلفن خود برای ارائه سرویس اینترنت ADSL شماره</b></p>
                <p class="para"><b> تلفن ثابت خود را وارد فرمائید.</b></p>
                <br>

                <input type="text" class="num" placeholder="شماره 8 رقمی تلفن ثابت خود را وارد کنید...">
                <input type="text" class="numb" placeholder="کد استان">
                <input type="button" class="button" value="بررسی">


            </div>
        </div>
    </div>


    <div id="demo2" class="collapse col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="para col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3 col-lg-6 col-lg-offset-3">
            <p class="para"><b>شما میتوانید جهت اطلاع از پوشش خدمات TD_LTE در منطقه خود از نقشه ی زیر استفاده کنید.قسمت های بنفش بیانگر پوشش خدمات TD_LTE وبوتل است.</b></p>
                <br>

                <button type="button" class="btn1 dropdown-toggle" data-toggle="dropdown" value="انتخاب استان">انتخاب استان<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">خوزستان</a></li>
                    <li><a href="#">تهران</a></li>
                    <li><a href="#">اصقهان</a></li>
                    <li><a href="#">فارس</a></li>
                    <li><a href="#">بوشهر</a></li>
                </ul>
                <button type="button" class="btn1 dropdown-toggle" data-toggle="dropdown" value="انتخاب شهر">انتخاب شهر<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">اهواز</a></li>
                        <li><a href="#">تهران</a></li>
                        <li><a href="#">اصقهان</a></li>
                        <li><a href="#">شیراز</a></li>
                        <li><a href="#">مشهد</a></li>
                    </ul>
                <br>
                <br>
                <img src="img/LTE.png" class="img">

            </div>
        </div>
    </div>

    <div id="demo3" class="collapse col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="para col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3 col-lg-6 col-lg-offset-3">
                <p class="para"><b>شما میتوانید جهت اطلاع از پوشش خدمات وایرلس در منطقه ی خود از نقشه زیر استفاده کنید.قسمت های بنفش بیانگر پوشش خدمات وایرلس وبوتل است.</b></p>
                <div class="wireless">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" value="انتخاب شهر">انتخاب شهر<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">اهواز</a></li>
                        <li><a href="#">تهران</a></li>
                        <li><a href="#">اصقهان</a></li>
                        <li><a href="#">شیراز</a></li>
                        <li><a href="#">مشهد</a></li>
                    </ul>
                <img src="img/LTE.png" class="img2">

                </div>
            </div>
        </div>
    </div>
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




</body>
</html>






