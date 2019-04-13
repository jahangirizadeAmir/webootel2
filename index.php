<?php
include "class/dataBase.php";
$db = new dataBase();
include "inc/header.php";
?>
    <div class="slideshowContainer"><!--slideshow Container is he here!-->
      <div class="Bildoj"><!--First part of the container-->
          <?php
          $i=1;
          $select = $db::Query("SELECT * FROM slider ORDER BY date(sliderDate) DESC ,time(sliderTime) DESC ");
          while ($rowSelect = mysqli_fetch_assoc($select)){
          ?>
              <div class="mySlides" id="im_<?php echo $i ?>"> <!-- 1 -->
                  <img src="Images/<?php echo $rowSelect['sliderImg'] ?>.svg"
                       alt="Slide Show <?php echo $i?>" class="SlideshowImage"
                       id="slideshowImage1">
                  <div class="CaptionContainer">
                      <h1 class="SlideshowText">
                          <?php echo $rowSelect['sliderText']?>
                      </h1>
                      <a href="<?php echo $rowSelect['sliderLink'] ?>" class="SlideshowLink"><?php echo $rowSelect['sliderBtn'] ?></a>
                  </div>
              </div>

          <?php
              $i++;
          }
          ?>


      </div>
        <?php
        if($db::Query("SELECT * FROM slider",$db::$NUM_ROW)>1){
            echo '<div class="ControllerContainer">
                <a class="next fas fa-chevron-right" id="previous"></a><!-- Next -->';

                for ($i=1;$i<=$db::Query("SELECT * FROM slider",$db::$NUM_ROW);$i++){
                    echo '<span class="dot" id="c_'.$i.'" data-item="'.$i.'"></span>';
                }
        echo '<a class="prev fas fa-chevron-left" id="next"></a><!-- previous -->
      </div>';
        }
        ?>

    </div><!--here is the end of my dear slideshow Container :) -->

   <div class="ItemsContainer1"> <!-- here is four important services and their icons [first row]-->

  <div class="Itemujo"><!--packages-->
    <img src="Images/Package.svg" alt="Package icon" class="ItemIcon">
    <div class="ItemTextContainer">
      <div class="Tekstujo">
        <h2 class="ItemHeader">طرح‌ها و تعرفه‌ها</h2>
        <p class="ItemText">هزینه‌ها و شرایط تهییه بسته‌های اینترنتی ثابت و وایرلس</p>
      </div>
      <a href="#" class="ItemLink">دیدن بسته‌ها</a>
    </div>
  </div>

  <div class="Itemujo"><!--Buy-->
    <img src="Images/Buy.svg" alt="Buy icon" class="ItemIcon">
    <div class="ItemTextContainer">
      <div class="Tekstujo">
        <h2 class="ItemHeader">سفارش آنلاین خدمات</h2>
        <p class="ItemText">همین الان سرویس مورد نیاز خود را به سادگی سفارش دهید</p>
      </div>
      <a href="#" class="ItemLink">سفارش بسته‌ها</a>
    </div>
  </div>

</div> <!-- here is the end of my dear container for important items [First row]-->


<div class="ItemsContainer2"> <!-- here is four important services and their icons [Second row]-->
  <div class="Itemujo"><!--Search-->
    <img src="Images/Search.svg" alt="Search icon" class="ItemIcon">
    <div class="ItemTextContainer">
      <div class="Tekstujo">
        <h2 class="ItemHeader">بررسی پوشش خدمات</h2>
        <p class="ItemText">بررسی شرایط پوشش در محل سکونت و کار شما</p>
      </div>
      <a href="posheshdehi.php" class="ItemLink">بررسی پوشش</a>
    </div>
  </div>

  <div class="Itemujo"><!--Collaboration-->
    <img src="Images/Collaboration.svg" alt="Collaboration icon" class="ItemIcon">
    <div class="ItemTextContainer">
      <div class="Tekstujo">
        <h2 class="ItemHeader">جذب عامل فروش</h2>
        <p class="ItemText">جذب عوامل فروش جهت همکاری با وبوتل</p>
      </div>
      <a href="newSellers.php" class="ItemLink">ارتباط با واحد تجاری</a>
    </div>
  </div>

</div> <!-- here is the end of my dear container for important items [Second row]-->

<div class="ServicesContainer"><!--Services container-->
  <h1 class="ServicesHead">
    خدمات وبوتل
  </h1>
  <div class="servicesItems"> <!--Items of our services-->

    <a href="#" class="servicesItemujo">
      <img src="Images/Voice.svg" alt="Voice" class="servicesImages">
      <h3 class="Servicestext">
        تلفن (Voice)
      </h3>
    </a>

    <a href="#" class="servicesItemujo">
      <img src="Images/Wireless.svg" alt="Wireless" class="servicesImages">
      <h3 class="Servicestext">
        اینترنت Wireless
      </h3>
    </a>

    <a href="#" class="servicesItemujo">
      <img src="Images/TDLTE.svg" alt="TDLTE" class="servicesImages">
      <h3 class="Servicestext">
اینترنت TD-LTE
      </h3>
    </a>

    <a href="#" class="servicesItemujo">
      <img src="Images/ADSL.svg" alt="ADSL" class="servicesImages">
      <h3 class="Servicestext">
اینترنت ADSL
      </h3>
    </a>

    <a href="#" class="servicesItemujo">
      <img src="Images/Aparteman.svg" alt="Aparteman" class="servicesImages">
      <h3 class="Servicestext">
        اینترنت مجتمع‌ها
      </h3>
    </a>

    <a href="#" class="servicesItemujo">
      <img src="Images/Pahnayeband.svg" alt="Pahnayeband" class="servicesImages">
      <h3 class="Servicestext">
پهنای باند اختصاصی
      </h3>
    </a>

  </div>  <!--Items of our services-->

</div><!--End of Services container-->

<?php
include "inc/footer.php";
?>

  </body>
</html>
