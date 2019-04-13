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
      <a href="#" class="sidebarlinks">پشتیبانی</a>
      <a href="#" class="sidebarlinks">وبلاگ</a>
      <a href="aboutUs.php" class="sidebarlinks">درباره‌ی وبوتل</a>
    </div><!--sidebar menu-->
    <div class="header"> <!--header in desktop view-->
      <div class="rightPart">
        <a href="#"><img src="Images/Logo.svg" alt="Logo" class="logo"></a>
        <a href="index.php" class="linksHeader">صفحه نخست</a>
        <a href="WhyWebotel.php" class="linksHeader">چرا وبوتل</a>
        <a href="#" class="linksHeader">پشتیبانی</a>
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




<div class="CostCxefujo">
  <div class="CostSidebar">

    <div class="CostSTipoujo CostSTipoujoActive" id="costWirelessE">
      <div class="CostSTipoujoelektilo">
        <div class="CostSTipoujoelektiloCricle">
        </div>
      </div>
      <h4 class="CostSTipTeksto">
        تعرفه‌های اینترنت Wireless
      </h4>
    </div><!--wireless-->

    <div class="CostSTipoujo" id="costtdlteE">
      <div class="CostSTipoujoelektilo">
        <div class="CostSTipoujoelektiloCricle">
        </div>
      </div>
      <h4 class="CostSTipTeksto">
        تعرفه‌های اینترنت TD-LTE
      </h4>
    </div><!--td-lte-->


    <div class="CostSTipoujo" id="costADSLE">
      <div class="CostSTipoujoelektilo">
        <div class="CostSTipoujoelektiloCricle">
        </div>
      </div>
      <h4 class="CostSTipTeksto">
        تعرفه‌های اینترنت ADSL
      </h4>
    </div><!--ADSL-->


    <div class="CostFilterujo" id="costFilterWireless">

      <form class="formujo2">
        <h4 class="registerFormHeaderCost">
نوع بسته
  </h4>

      <label class="lcontainerCost">
      <h6 class="RadioText">
روزانه
      </h6>
      <input type="radio" checked="checked" name="radio">
      <span class="checkmark"></span>
      </label>

      <label class="lcontainerCost">
      <h6 class="RadioText">
روزانه + شبانه
      </h6>
      <input type="radio" checked="checked" name="radio">
      <span class="checkmark"></span>
      </label>

      <label class="lcontainerCost">
      <h6 class="RadioText">
فشفشه
      </h6>
      <input type="radio" checked="checked" name="radio">
      <span class="checkmark"></span>
      </label>

      <label class="lcontainerCost">
      <h6 class="RadioText">
ترافیک آزاد
      </h6>
      <input type="radio" checked="checked" name="radio">
      <span class="checkmark"></span>
      </label>

        </form>

<form class="formujo2">
      <h4 class="registerFormHeaderCost">
زمان بسته
</h4>

    <label class="lcontainerCost">
    <h6 class="RadioText">
۱ماهه
    </h6>
    <input type="radio" checked="checked" name="radio">
    <span class="checkmark"></span>
    </label>

    <label class="lcontainerCost">
    <h6 class="RadioText">
۳ ماهه
    </h6>
    <input type="radio" checked="checked" name="radio">
    <span class="checkmark"></span>
    </label>

    <label class="lcontainerCost">
    <h6 class="RadioText">
۶ ماهه
    </h6>
    <input type="radio" checked="checked" name="radio">
    <span class="checkmark"></span>
    </label>

    <label class="lcontainerCost">
    <h6 class="RadioText">
۱ ساله
    </h6>
    <input type="radio" checked="checked" name="radio">
    <span class="checkmark"></span>
    </label>
    </form>



    <h4 class="registerFormHeaderCost">
قیمت بسته (تومان)
</h4>
    <div class="range-slider">
      <input class="range-slider__range" type="range" value="100" min="0" max="500">
      <span class="range-slider__value">0</span>
    </div>

    <h4 class="registerFormHeaderCost">
حجم (گیگ)
</h4>
    <div class="range-slider">
      <input class="range-slider__range" type="range" value="100" min="0" max="500">
      <span class="range-slider__value">0</span>
    </div>


    <h5 class="costinformationText">
سرعت تمامی سرویس‌ها تا ۲۴ مگابیت بر ثانیه آزاد است.
</h5>

    <h5 class="costinformationText">
ترافیک شبانه از ۲ تا ۷ صبح قابل استفاده است.
</h5>

<h5 class="costinformationText">
ساعت مصرف طرح فشفشه ۱۰ تا ۱۶ است.
</h5>

<h5 class="costinformationText">
مدت زمان استفاده از طرح فشفشه سه روز است.
</h5>

</div> <!--Cost Filter Wireless-->



<div class="CostFilterujo" id="costFilterTDLTE">
<form class="formujo2">
  <h4 class="registerFormHeaderCost">
زمان بسته
</h4>

<label class="lcontainerCost">
<h6 class="RadioText">
۱ماهه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۳ ماهه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۶ ماهه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۱ ساله
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>
</form>



<h4 class="registerFormHeaderCost">
قیمت بسته (تومان)
</h4>
<div class="range-slider">
  <input class="range-slider__range" type="range" value="100" min="0" max="500">
  <span class="range-slider__value">0</span>
</div>

<h4 class="registerFormHeaderCost">
حجم (گیگ)
</h4>
<div class="range-slider">
  <input class="range-slider__range" type="range" value="100" min="0" max="500">
  <span class="range-slider__value">0</span>
</div>


<h5 class="costinformationText">
سرعت تمامی سرویس‌ها تا ۴۰ مگابیت برثانیه است.
</h5>


</div> <!--Cost Filter TDLTE-->




<div class="CostFilterujo" id="costFilterADSL">
<form class="formujo2">
  <h4 class="registerFormHeaderCost">
زمان بسته
</h4>

<label class="lcontainerCost">
<h6 class="RadioText">
۱ماهه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۳ ماهه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۶ ماهه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۱ ساله
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>
</form>

<form class="formujo2">
  <h4 class="registerFormHeaderCost">
سرعت بسته
</h4>

<label class="lcontainerCost">
<h6 class="RadioText">
۵۱۲ کیلوبیت بر ثانیه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۱۰۲۴ کیلوبیت بر ثانیه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۲۰۴۸ کیلوبیت بر ثانیه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۳۰۷۲ کیلوبیت بر ثانیه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۴۰۹۶ کیلوبیت بر ثانیه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۸۱۹۲ کیلوبیت بر ثانیه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>

<label class="lcontainerCost">
<h6 class="RadioText">
۱۶۳۸۴ کیلوبیت بر ثانیه
</h6>
<input type="radio" checked="checked" name="radio">
<span class="checkmark"></span>
</label>
</form>



<h4 class="registerFormHeaderCost">
قیمت بسته (تومان)
</h4>
<div class="range-slider">
  <input class="range-slider__range" type="range" value="100" min="0" max="500">
  <span class="range-slider__value">0</span>
</div>

<h4 class="registerFormHeaderCost">
حجم بین‌المللی (گیگ)
</h4>
<div class="range-slider">
  <input class="range-slider__range" type="range" value="100" min="0" max="500">
  <span class="range-slider__value">0</span>
</div>

<h4 class="registerFormHeaderCost">
حجم داخلی (گیگ)
</h4>
<div class="range-slider">
  <input class="range-slider__range" type="range" value="100" min="0" max="500">
  <span class="range-slider__value">0</span>
</div>


<h5 class="costinformationText">
پس از پایان حجم اینترنت قطع نمی‌شود بلکه فقط سرعت آن کاهش پیدا می‌کند.
</h5>

<h5 class="costinformationText">
برای بازگشت به حالت سرعت قبل باید اقدام به خریداری حجم اضافه کنید. هر گیگ ترافیک آزاد ۲۰۰۰۰ تومان است.
</h5>

</div> <!--Cost Filter ADSL-->








  </div>
  <div class="CostPartujo" id="costWireless">
    <div class="costParto">

      <div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
      </div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۲۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۴۵۰۰۰
</h4>
</div>
</div> <!--cost part-->

<div class="costParto">

  <div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
  </div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۴۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۷۵۰۰۰
</h4>
</div>
</div> <!--cost part-->

<div class="costParto">

  <div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
  </div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۷۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۱۰۰۰۰۰ تومان
</h4>
</div>
</div> <!--cost part-->


<div class="costParto">

  <div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
  </div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۱۰۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت: ۱۵۰۰۰۰ تومان
</h4>
</div>
</div> <!--cost part-->


</div> <!--cost Wireless-->



<div class="CostPartujo" id="costTDLTE">
  <div class="costParto">

    <div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
    </div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۳۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۶۹۰۰۰
</h4>
</div>
</div> <!--cost part-->

<div class="costParto">

<div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
</div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۴۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۸۷۰۰۰
</h4>
</div>
</div> <!--cost part-->

<div class="costParto">

<div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
</div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۶۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۱۲۳۰۰۰
</h4>
</div>
</div> <!--cost part-->


<div class="costParto">

<div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۱ ماهه
</h2>
</div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۱۲۰</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۲۳۱۰۰۰
</h4>
</div>
</div> <!--cost part-->

<div class="costParto">

<div class="headerZamanCost">
<h5 class="headerZamanCostSub">
طول دوره
</h5>
<h2 class="headerZamanCostHead">
۳ ماهه
</h2>
</div>


<div class="headerdataCostCost">
<h4 class="headerdataCostCostT">
ترافیک (گیگ): ۴۰
</h4>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۱۳۸۰۰۰
</h4>
</div>
</div> <!--cost part-->


</div> <!--cost TD-LTE-->




<div class="CostPartujo" id="costADSL">


  <div class="costParto">

    <div class="headerZamanCostADSL">
      <div class="headerZamanCostADSLHU">
        <h5 class="headerZamanCostSubADSL">
        طول دوره
        </h5>
        <h2 class="headerZamanCostHeadADSL">
        ۱ ماهه
        </h2>
      </div>

      <div class="headerZamanCostADSLHU headerZamanCostADSLHUS">
        <h5 class="headerZamanCostSubADSL">
          سرعت بسته
        </h5>
        <h4 class="headerZamanCostHeadADSL">
          ۵۱۲ kbps
        </h4>
      </div>

    </div>


<div class="headerdataCostCost">
<h5 class="headerdataCostCostTADSLT">
ترافیک داخلی (گیگ): ۳۰
</h5>

<h5 class="headerdataCostCostTADSLB">
ترافیک بین‌المللی (گیگ): ۱۵
</h5>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
 قیمت (تومان): ۱۲۵۰۰
</h4>
</div>
</div> <!--cost part-->



<div class="costParto">

  <div class="headerZamanCostADSL">
    <div class="headerZamanCostADSLHU">
      <h5 class="headerZamanCostSubADSL">
      طول دوره
      </h5>
      <h2 class="headerZamanCostHeadADSL">
      ۱ ماهه
      </h2>
    </div>

    <div class="headerZamanCostADSLHU headerZamanCostADSLHUS">
      <h5 class="headerZamanCostSubADSL">
        سرعت بسته
      </h5>
      <h4 class="headerZamanCostHeadADSL">
        ۱۰۲۴ kbps
      </h4>
    </div>

  </div>


<div class="headerdataCostCost">
<h5 class="headerdataCostCostTADSLT">
ترافیک داخلی (گیگ): ۵۰
</h5>

<h5 class="headerdataCostCostTADSLB">
ترافیک بین‌المللی (گیگ): ۲۵
</h5>

<div class="costLine"></div>
<h4 class="headerdataCostCostT">
قیمت (تومان): ۲۰۰۰۰
</h4>
</div>
</div> <!--cost part-->












</div> <!--cost ADSL-->
</div>









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

  </body>
</html>
