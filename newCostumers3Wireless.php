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
        $Q = $db::Query("SELECT * FROM packModel where modelService='2'");
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
                        model:'2'
                    },
                    dataType:'json',
                    type:'post',
                    success: function (data) {
                        if(data['error']){
                            $("#WirelessContent").html("");
                        }else{
                            $("#WirelessContent").html(data['html']);
                        }
                    }

                });
            }
        </script>


    </div>

      <div class="" id="WirelessContent"></div>




    <h3 class="tarefeinformationtext mta">
      بسته‌های شبانه از ۲ تا ۷ صبح قابل استفاده است.
    </h3>

    <h3 class="tarefeinformationtext mba">
سرعت تمامی بسته‌ها تا ۲۴ مگابیت بر ثانیه آزاد است.
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





<?php
include "inc/footer.php";
?>

  </body>
</html>
