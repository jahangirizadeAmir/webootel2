<?php
include 'inc/inc.php';
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row state-overview">
                  <div class="col-lg-4 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1><?php
                                  $selectUser = mysqli_query($conn,"SELECT * FROM checkservice where checkservice.serviceOk!='1'");
                                  echo mysqli_num_rows($selectUser);
                                  ?></h1>
                              <p>تعداد در خواست های جدید</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1><?php
                                  $selectUser = mysqli_query($conn,"SELECT * FROM seller");
                                  echo mysqli_num_rows($selectUser);
                                  ?></h1>
                              <p>تعداد درخواست عاملین فروش</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1><?php
                                  $selectUser = mysqli_query($conn,"SELECT * FROM checkservice WHERE serviceOk='0' OR serviceOk=''");
                                  echo mysqli_num_rows($selectUser);
                                  ?>
                              </h1>
                              <p>تعداد درخواست های تایید شده</p>
                          </div>
                      </section>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1 style="font-family: yekan">فعالیت های درخواستی من</h1>
                                  <p>از مدیران</p>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <?php
                              $adminId =mysqli_real_escape_string($conn,$_SESSION['id']);
                              $i =1;
                              $selectMyWorkToAdmin = mysqli_query($conn,"
                                  SELECT * FROM adminjobs,admin WHERE adminJobsSenderId='$adminId'
                                   AND adminJobsAdminId = adminId AND adminJobsPercent<'100'");
                              while ($resultMyWork = mysqli_fetch_assoc($selectMyWorkToAdmin)){
                                  echo'
                                  
                                  <tr>
                                  <td>'.$i.'</td>
                                  <td>
                                      '.$resultMyWork['adminName'].' '.$resultMyWork['adminLastName'].'
                                  </td>
                                  
                                  <td>
                                        '.$resultMyWork['adminJobsText'].'
                                  </td>
                                  <td>
                                      <span class="badge bg-'.$arrayColor[array_rand($arrayColor)].'">'.$resultMyWork['adminJobsPercent'].'%</span>
                                  </td>
                                 
                                     </tr>
                                  
                                  
                                  
                                  ';
                                  $i++;
                              }
                              ?>
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <!--timeline start-->
                      <section class="panel">
                          <div class="panel-body">
                                  <div class="text-center mbot30">
                                      <h3 class="timeline-title" style="font-family: yekan">خط زمان</h3>
                                      <p class="t-info">پیام های ارسالی از سوی مدیران</p>
                                  </div>
                              <div class="timeline">

                              <?php
                              $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);
                              $i = 0;
                              $dateMsg = '';
                              $selectMsg = mysqli_query($conn, "SELECT * FROM adminmsg,admin
                                   WHERE adminId=adminMsgAdminId ORDER BY date(adminMsgRegDate) DESC ,
                                 time(adminMsgRegTime) DESC ");
                              while ($rowSelect = mysqli_fetch_assoc($selectMsg)) {
                                  if($i%2==0) {
                                      $dateMsg = $rowSelect['adminMsgRegDate'];
                                      echo '
                                   <article class="timeline-item">
                                          <div class="timeline-desk">
                                              <div class="panel">
                                                  <div class="panel-body">
                                                      <span class="arrow"></span>
                                                      <span class="timeline-icon red"></span>
                                                      <span class="timeline-date">' . substr($rowSelect['adminMsgRegTime'], 0, 5) . '</span>
                                                      <h1 class="red" style="font-family: yekan">' . str_replace('-', '/', jalali($rowSelect['adminMsgRegDate'])) . '|'
                                          . $rowSelect['adminName'] . ' ' . $rowSelect['adminLastName'] . '</h1>
                                                      <p>'.$rowSelect['adminMsgText'].'</p>
                                                  </div>
                                              </div>
                                          </div>
                                      </article>
                                    ';
                                  }else{
                                      echo'<article class="timeline-item alt">
                                          <div class="timeline-desk">
                                              <div class="panel">
                                                  <div class="panel-body">
                                                      <span class="arrow-alt"></span>
                                                      <span class="timeline-icon green"></span>
                                                      <span class="timeline-date">' . substr($rowSelect['adminMsgRegTime'], 0, 5) . '</span>
                                                      <h1 class="green" style="font-family: yekan">' . str_replace('-', '/', jalali($rowSelect['adminMsgRegDate'])) . '|'
                                          . $rowSelect['adminName'] . ' ' . $rowSelect['adminLastName'] . '</h1>
                                                      <p>'.$rowSelect['adminMsgText'].'</p>
                                                  </div>
                                              </div>
                                          </div>
                                      </article>';

                                  }
                                  $i++;
                              }
                              ?>
                                  </div>

                                  <div class="clearfix">&nbsp;</div>
                              </div>
                      </section>
                      <!--timeline end-->
                  </div>
          </section>
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
