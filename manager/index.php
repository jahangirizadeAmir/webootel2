<?php
include "inc/header.php";
?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  <?php

                                  $query = "SELECT * FROM lawyer";
                                  echo $db::Query($query,$db::$NUM_ROW);

                                  ?>
                              </h1>
                              <p>تعداد وکلای ثبت شده</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  <?php
                                  $query = "SELECT * FROM `list contract`";
                                  echo $db::Query($query,$db::$NUM_ROW);
                                  ?>
                              </h1>
                              <p>تعداد قرارداد فروخته شده</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  <?php
                                  $query = "SELECT * FROM `list contract` where listContractStatus='0'";
                                  echo $db::Query($query,$db::$NUM_ROW);
                                  ?>
                              </h1>
                              <p>تعداد قراردادهای مشکل دار</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-bar-chart"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  <?php
                                  $query = "SELECT * FROM `lawyer` where lawyerModel='32' OR lawyerModel='2' ";
                                  echo $db::Query($query,$db::$NUM_ROW);
                                  ?>

                              </h1>
                              <p>تعداد قراردادهای  میهمان</p>
                          </div>
                      </section>
                  </div>
              </div>
              <div class="panel">
                  <div class="panel-heading">
                      مشخصات سیستم
                  </div>
              <?php
              $Query = "SELECT * FROM contractSettings where contractActive='1'";
              if($db::Query($Query,$db::$NUM_ROW)===0){
                  $price=0;
                  $count=0;
              }else{
                  $price = $db::Query($Query,$db::$RESULT_ARRAY)['contractPrice'];
                  $count = $db::Query($Query,$db::$RESULT_ARRAY)['contractCount'];
              }
              ?>
                  <div class="panel-body">
                      <div class="alert alert-success" style="display: none" id="msg">
                         تغییرات با موفقیت ثبت شد
                      </div>
                      <div class="form-group">
                          <label for="price">مبلغ هر قرارداد</label>
                      <input type="text" value="<?php echo $price?>" class="form-control" id="price" placeholder="مبلغ هر قرارداد">
                      </div>
                      <br>
                      <div class="form-group">
                          <label for="count">تعداد قرارداد موجود</label>
                          <input type="text" value="<?php echo $count?>" class="form-control" id="count" placeholder="تعداد موجودی قرارداد">
                      </div>
                      <br>
                      <input type="button" class="btn btn-primary" id="submit" value="ثبت تغییرات">
                  </div>
              </div>
      </section>
      <!--main content end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
        <script>
            $('#submit').on("click",function (){
                var price = $('#price').val();
                var count = $('#count').val();
                $.ajax({
                    url:"request/contactSetting.php",
                    dataType:"json",
                    type:"POST",
                    data:{
                        count:count,
                        price:price
                    },
                    success: function (data) {
                        if(!data['error']){
                            $('#msg').fadeIn("slow");
                        }
                    }
                });
            });
        </script>
    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
  <script>
      //owl carousel
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true
          });
      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
  </script>
  </body>
</html>
