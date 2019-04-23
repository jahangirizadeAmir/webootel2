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
      <h4 class="registerFormHeader" id="error2" style="color:red;display: none;">
  کد تاییده اشتباه است
  </h4>
        <h4 class="registerFormHeader">
  کد تاییدیه
  </h4>
      <input type="text" class="textInput birthdateujo" id="acceptCode">
    </form>

  </div>
  <div class="NCsubaPartoButonoj">
    <span class="NCsubaPartoButonojmem1" id="PetoPorEbleco1" >
تایید
</span>
    <a href="#smootScrollReveno" class="NCsubaPartoButonojmem2" id="miJaFarisReveno">
بازگشت
</a>
  </div>

</div>


<?php
include "inc/footer.php";
?>


  </body>

<script>
</script>
</html>
