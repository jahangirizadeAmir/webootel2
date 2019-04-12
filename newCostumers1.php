<?php
include "inc/header.php";
?>




<div class="registerHNNBack">
  <div class="registerHNN">
    <div class="registerHNNTeksto">
      <h1 class="registerHNNTekstomem">
        مراحل ثبت نام مشترکین جدید
      </h1>
    </div>

    <div class="registerHNNbildujo">
      <div class="registerHNNbildo">
        <img src="Images/Register.svg" alt="Register" class="registerHNNbildomem">
      </div>

      <div class="registerHNNpasxujo">
        <div class="registerHNNpasxoj" id="smootScrollReveno">

          <div class="registerHNNpasxo registerHNNpasxoActive"> <!--pasxo 1-->
            <h2 class="registerHNNpasxoN">
              ۱
            </h2>
            <h4 class="registerHNNpasxoT">
              درخواست امکان سنجی
            </h4>
          </div>

          <div class="registerHNNpasxo"> <!--pasxo 2-->
            <h2 class="registerHNNpasxoN">
            ۲
            </h2>
            <h4 class="registerHNNpasxoT">
              تکمیل اطلاعات
            </h4>
          </div>

          <div class="registerHNNpasxo"> <!--pasxo 3-->
            <h2 class="registerHNNpasxoN">
          ۳
            </h2>
            <h4 class="registerHNNpasxoT">
            انتخاب طرح یا تعرفه
            </h4>
          </div>

          <div class="registerHNNpasxo"> <!--pasxo 4-->
            <h2 class="registerHNNpasxoN">
          ۴
            </h2>
            <h4 class="registerHNNpasxoT">
          پرداخت حق تعرفه
            </h4>
          </div>

          <div class="registerHNNpasxo"> <!--pasxo 5-->
            <h2 class="registerHNNpasxoN">
          ۵
            </h2>
            <h4 class="registerHNNpasxoT">
        تحویل سرویس
            </h4>
          </div>


        </div>
      </div>

    </div><!--registerHNNbildujo-->
  </div>

</div>

<div class="NCsubaParto">
  <div class="NCsubaPartoTekstujo">
    <h3 class="NCsubaPartoTekstomem">
      برای شروع ثبت نام باید درخواست امکان سنجی دهید. نیروی‌های فنی ما به محل شما مراجعه کرده و پس از تایید یک کد تایید به شما می‌دهند که با آن می‌توانید بقیه‌ی مراحل ثبت نام خود را ادامه دهید.
    </h3>
    <img src="Images/RegisterSubaParto.svg" alt="Register" class="registerSubaPartonhom">
  </div>
  <div class="NCsubaPartoButonoj">
    <a href="#smootScrollPetoPorEbleco" class="NCsubaPartoButonojmem1" id="PetoPorEbleco">
درخواست امکان‌سنجی
</a>
    <a href="#smootScrollmiJaFaris" class="NCsubaPartoButonojmem2" id="miJaFaris">
      امکان‌سنجی انجام شده است
    </a>
  </div>

</div>


<div class="NCsubaParto2">
  <div class="NCsubaPartoTekstujo" id="smootScrollPetoPorEbleco">
    <h3 class="NCsubaPartoTekstomem">
  برای درخواست امکان‌سنجی اطلاعات زیر را به صورت دقیق وارد کنید. پس از این مرحله کارشناسان ما جهت مراجعه با شما تماس خواهند گرفت.
    </h3>


    <h4 class="registerFormHeader" style="display: none;color: red;" id="error">

    </h4>
    <form class="formujo2">


    <br>
    <h4 class="registerFormHeader">
    نام و نام خانوادگی
    </h4>

    <input class="textInput" type="text" id="name">

    <h4 class="registerFormHeader">
شماره موبایل
    </h4>

    <input class="textInput" type="text" id="phNR" maxlength="10" minlength="10">


    <h4 class="registerFormHeader">
شماره تلفن ثابت
    </h4>

    <input class="textInput" type="text" id="phNSR">


    <h4 class="registerFormHeader">
آدرس دقیق
</h4>

    <input class="textInput" type="text" id="AdressR">

    <h4 class="registerFormHeader">
کد پستی
</h4>
    <input type="text" class="textInput birthdateujo" id="PostCodeR">



    <h4 class="registerFormHeader">
انتخاب نوع سرویس
 </h4>

    <label class="lcontainer">
      <h6 class="RadioText">
سرویس ADSL
    </h6>
    <input type="radio" checked="checked" name="radio" id="adsl">
    <span class="checkmark"></span>
    </label>


    <label class="lcontainer">
    <h6 class="RadioText">
سرویس Wireless
    </h6>
    <input type="radio" checked="checked" name="radio" id="wireless">
    <span class="checkmark"></span>
    </label>

    <label class="lcontainer">
    <h6 class="RadioText">
سرویس TD-LTE
    </h6>
    <input type="radio" checked="checked" name="radio" id="TD_LTE">
    <span class="checkmark"></span>
    </label>

    </form>

    <h4 class="registerFormHeader">
انتخاب موقعیت مکانی (اختیاری)
      برای انتخاب موقعیت بر روی نقشه  کلیک نمایید.
</h4>


    <input type="text" id="lat" style="display: none">
    <input type="text" id="lng" style="display: none">

    <div id="mapid" style="height: 280px;"> </div>


  </div>
  <div class="NCsubaPartoButonoj">
    <a href="#smootScrollReveno" class="NCsubaPartoButonojmem1" id="sendoPetoPorEbleco">
ارسال درخواست
</a>
    <a href="#smootScrollReveno" class="NCsubaPartoButonojmem2" id="sendoPetoPorEblecoReveno">
بازگشت
</a>
  </div>

</div>

<div class="NCsubaParto3">
  <div class="NCsubaPartoTekstujo">
    <h3 class="NCsubaPartoTekstomemAccept">
درخواست امکان‌سنجی با موفقیت ارسال شد. به زودی همکاران ما برای هماهنگی مراجه به محل و انجام امکان‌سنجی با شما تماس خواهند گرفت.

    </h3>

  </div>

</div>


<div class="NCsubaParto4">
  <div class="NCsubaPartoTekstujo" id="smootScrollmiJaFaris">
    <h3 class="NCsubaPartoTekstomem" >
      لطفا کد تاییدیه امکان‌سنجی که به تلفن همراه شما ارسال شده است را وارد کنید. در صورت صحیح بودن کد به مرحله‌ی بعدی ثبت نام منتقل خواهید شد.
    </h3>
    <form class="formujo6">
      <h4 class="registerFormHeader">
  کد تاییدیه
  </h4>
      <input type="text" class="textInput birthdateujo" name="acceptCode">
    </form>

  </div>
  <div class="NCsubaPartoButonoj">
    <a class="NCsubaPartoButonojmem1" id="PetoPorEbleco1" href="newCostumers2.html">
تایید
</a>
    <a href="#smootScrollReveno" class="NCsubaPartoButonojmem2" id="miJaFarisReveno">
بازگشت
</a>
  </div>

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

<script>
</script>
</html>
