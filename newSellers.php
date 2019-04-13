<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>وبوتل</title>
    <link rel="stylesheet" href="Style/style.css"><!--Main Style-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--jQuery-->
    <script type="text/javascript" src="Scripts/main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><!--FontAwesome-->
    <meta name="theme-color" content="#742a9d"><!--Chrome Theme-->
    <link rel="icon" href="favicon.svg" type="image/svg+xml"><!--Icons-->
  </head>
  <body class="otherPages">
    <div class="sidebar"><!--sidebar menu-->
      <div class="">
        <a href="#" class="fas fa-times fermbutono" id="fermbutono"></a>
      </div>
      <a href="index.php" class="sidebarlinks">صفحه نخست</a>
      <a href="WhyWebotel.php" class="sidebarlinks">چرا وبوتل</a>
      <a href="contactUs.php" class="sidebarlinks">پشتیبانی</a>
      <a href="#" class="sidebarlinks">وبلاگ</a>
      <a href="aboutUs.php" class="sidebarlinks">درباره‌ی وبوتل</a>
    </div><!--sidebar menu-->
    <div class="header"> <!--header in desktop view-->
      <div class="rightPart">
        <a href="#"><img src="Images/Logo.svg" alt="Logo" class="logo"></a>
        <a href="index.php" class="linksHeader">صفحه نخست</a>
        <a href="WhyWebotel.php" class="linksHeader">چرا وبوتل</a>
        <a href="contactUs.php" class="linksHeader">پشتیبانی</a>
        <a href="#" class="linksHeader">وبلاگ</a>
        <a href="aboutUs.php" class="linksHeader">درباره‌ی وبوتل</a>
        <div class="menuIcon">
          <a href="#" class="fas fa-bars MIcon" id="menubutono"></a>
        </div>
      </div><!--rightPart-->
      <div class="leftPart">
        <a href="tel:1858" class="fas fa-phone phoneN"> ۱۸۵۸</a>
        <a href="#" class="logSig">ثبت نام جدید</a>
        <a href="#" class="logSig">ورود مشترکین</a>
      </div><!--leftPart-->



    </div><!--header in desktop view-->












<div class="NCsubaParto7">
  <div class="NCsubaPartoTekstujo">

    <h1 class="sellertitr">

فرم درخواست عاملیت فروش
</h1>
    <h3 class="NCsubaPartoTekstomem" id="errorDis">
      یکی از بزرگترین اهداف وبوتل، همکاری با صاحبان مشاغل و علاقمندان به حوزه‌ی فناوری در زمینه‌‌ی توسعه‌ی بازار خدمات اینترنتی و ارتباطی است. به همین دلیل وبوتل برنامه‌ی منسجمی را در زمینه‌ی جذب عوامل فروش در حوزه‌ی اینترنت پرسرعت به مدت محدود و با شرایط ویژه دارد.
      <br>
      براین اساس کلیه‌ی افراد حقیقی و حقوقی (فروشگاه یا شرکت) واجد شرایط که تمایل به همکاری در زمینه‌ی عاملیت فروش اینترنت وبوتل را دارند می‌توانند از طریق تکمیل فرم ذیل، تماس با شماره‌های اعلامی یا ارسال رزومه به آدرس ایمیل اعلامی درخواست خود را ارائه نمایند.

    </h3>


      <div class="formujo2">

          <h4 class="registerFormHeader" id="error" style="display: none">
              <p>موارد ستاره دار اجباری می باشند</p>
          </h4>

      <br>
      <h4 class="registerFormHeader">
نام *
      </h4>

      <input class="textInput" type="text" id="sellername">

      <h4 class="registerFormHeader">
نام خانوادگی *
      </h4>

      <input class="textInput" type="text" id="sellerFamilyname">
      <h4 class="registerFormHeader">
شماره ثابت *
      </h4>
      <input class="textInput" type="text" id="sellerNumber">
      <h4 class="registerFormHeader">
شماره همراه *
</h4>
      <input class="textInput" type="text" id="phoneNumber">
      <h4 class="registerFormHeader">
        تاریخ تولد *
</h4>
      <input type="text" id="‌birthDate" class="textInput birthdateujo" name="sellerbirthday">
      <h4 class="registerFormHeader">
شهر *
</h4>
      <input class="textInput" type="text" id="sellerCity">
      <h4 class="registerFormHeader">
ایمیل *
      </h4>
      <input class="textInput" type="email" id="selleremail">
      </div>
      <div class="emailAdressSellerAndphone">
        <h4 class="emailAdressSellerAndphonemem">
  آدرس ایمیل برای ارسال رزومه: agents@webotel.ir
        </h4>

        <h4 class="emailAdressSellerAndphonemem">
شماره‌ی تماس ۱۸۵۸ داخلی ۱۰۴
        </h4>
      </div>

  </div>
  <div class="NCsubaPartoButonoj">
    <span class="NCsubaPartoButonojmem1seller" onclick="reg()">
ارسال
</span>
  </div>
</div> <!--Haghighi-->
    <script>
        function reg() {
            var name,family,tell,mobile,bDate,city,email;
            name = $('#sellername').val();
            family = $('#sellerFamilyname').val();
            tell = $('#sellerNumber').val();
            mobile = $('#phoneNumber').val();
            bDate = $('#‌birthDate').val();
            city=$('#sellerCity').val();
            email=$('#selleremail').val();
            $('html, body').animate({
                scrollTop: $("#errorDis").offset().top
            }, 600);
            $.ajax({
                url:"ajax/regSeller.php",
                data:{
                    name:name,
                    family:family,
                    tell:tell,
                    mobile:mobile,
                    bDate:bDate,
                    city:city,
                    email:email
                },
                dataType:'json',
                type:'POST',
                success: function (data) {
                    if(data['error']){
                        $('#error').css('color','red').html(data['MSG']).show();

                    }else{
                        $('#error').css('color','green').html('ثبت با موفقیت انجام شد، مشاورین ما به زودی با شما تماس خواهند گرفت').show();

                    }
                }

            });
        }
    </script>





    <?php
    include "inc/footer.php";
    ?>

  </body>
</html>
