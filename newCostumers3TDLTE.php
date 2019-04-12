<?php
include "class/dataBase.php";
$db=new dataBase();
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

          <div class="registerHNNpasxo"> <!--pasxo 1-->
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

          <div class="registerHNNpasxo registerHNNpasxoActive"> <!--pasxo 3-->
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







<div class="NCsubaParto5">
  <div class="NCsubaPartoTekstujo">

    <h3 class="NCsubaPartoTekstomem" >
اکنون باید طرح اولیه‌ی اینترنت خود را انتخاب کنید. برای انتخاب می‌توانید از میان طرح‌های ۱ ماهه، ۳ ماهه، ۶ ماهه و یک ساله انتخاب کنید.
    </h3>

    <div class="monatujo">
        <?php
        $i=0;
        $Q = $db::Query("SELECT * FROM packModel where modelService='3'");
        while ($row = mysqli_fetch_assoc($Q)){
            $month = $row['packModelMonth'];

            $MQ = $db::Query("SELECT * FROM month where monthId='$month'",$db::$RESULT_ARRAY);
            $name = $MQ['monthName'];

            ?>
            <div id="BTN<?php echo $row['packModelId'] ?>" class="monatomem" onclick="selectBox('<?php echo $row['packModelId'] ?>')">
                <h1>
                    <?php echo $name?>
                </h1>
            </div><!--1-->
            <?
            $i++;
        }
        ?>

        <script>
            function selectBox(id) {
                $(".monatomem").removeClass("monatomemAktiva");
                $("#BTN"+id).addClass("monatomemAktiva");
                var ADSLTBL = $('#ADSLTBL');
                $.ajax({
                    url:"ajax/getPack.php",
                    data:{
                        id:id,
                        model:'3'
                    },
                    dataType:'json',
                    type:'post',
                    success: function (data) {
                        if(data['error']){
                            $("#TDLTE").html("");
                        }else{
                            $("#TDLTE").html(data['html']);
                        }
                    }

                });
            }
        </script>

    </div>

<div id="TDLTE">



    </div>




    <h3 class="tarefeinformationtext mba">
سرعت تمامی بسته‌ها تا ۴۰ مگابیت بر ثانیه آزاد است.
</h3>
  </div>

  <div class="NCsubaPartoButonoj">
    <a class="NCsubaPartoButonojmem1" id="PetoPorEbleco" href="newCostumers2.php">
تایید
</a>
    <a href="#smootScrollReveno" class="NCsubaPartoButonojmem2" id="revenoHoghughi">
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
</html>
