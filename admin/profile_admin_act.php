<?php
include 'inc/inc.php';
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="<?php echo $_SESSION['img']?>" alt="">
                        </a>
                        <h1 style="font-family: yekan;"><?php echo $_SESSION['name'] . ' ' . $_SESSION['lastName'] ?></h1>
                        <p><?php echo $_SESSION['email'] ?></p>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li ><a href="profile_admin.php"><i class="icon-user"></i>مشخصات کاربری</a></li>
                        <li class="active"><a href="profile_admin_act.php"><i class="icon-calendar"></i>فعالیت ها</a>
                        </li>
                    </ul>


                </section>
            </aside>
                    <aside class="profile-info col-lg-9">



                        <section class="panel panel-primary">
                            <div class="panel-heading">لیست فعالیت های من</div>
                            <div class="panel-body">


                                <?php
                                $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
                                $selectAdminJobs = mysqli_query($conn,"SELECT * FROM adminjobs,admin WHERE
                                  adminJobsAdminId = '$adminId' AND adminJobsSenderId = adminId");
                                while ($checkJobs = mysqli_fetch_assoc($selectAdminJobs)){
                                    echo '
                                    <p class="text-muted">
                                    '.$checkJobs['adminJobsText'].'-'.$checkJobs['adminName'].' '.$checkJobs['adminLastName'].'
                                </p>
                                <div class="progress progress-striped active progress-sm">
                                    <div class="progress-bar progress-bar-success" id="'.$checkJobs['adminJobsId'].'" role="progressbar" aria-valuenow="'.$checkJobs['adminJobsPercent'].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$checkJobs['adminJobsPercent'].'%">
                                        <span class="sr-only">'.$checkJobs['adminJobsPercent'].'% Complete</span>
                                    </div>
                                </div>
                                    
                                    
                                    ';
                                }

                                ?>

                            </div>
                        </section>
                        <section class="panel panel-primary">
                            <div class="panel-heading">لیست فعالیت های درخواستی من</div>
                            <div class="panel-body">


                                <?php
                                $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
                                $selectAdminJobs = mysqli_query($conn,"SELECT * FROM adminjobs,admin WHERE
                                  adminJobsSenderId = '$adminId' AND adminJobsAdminId = adminId AND adminJobsPercent<'100'");
                                while ($checkJobs = mysqli_fetch_assoc($selectAdminJobs)){
                                    echo '
                                    <p class="text-muted">
                                    '.$checkJobs['adminJobsText'].'-'.$checkJobs['adminName'].' '.$checkJobs['adminLastName'].'
                                </p>
                                <div class="progress progress-striped active progress-sm">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'.$checkJobs['adminJobsPercent'].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$checkJobs['adminJobsPercent'].'%">
                                        <span class="sr-only">'.$checkJobs['adminJobsPercent'].'% Complete</span>
                                    </div>
                                </div>
                                    
                                    
                                    ';
                                }

                                ?>

                            </div>
                        </section>





                        <section class="panel">
                            <header class="panel-heading summary-head">
                                <h4 style="font-family: yekan">درخواست فعالیت</h4>
                            </header>
                            <div class="panel-body">


                                <div class="form-group" style="overflow: hidden;">
                                    <label class="col-lg-2 control-label">موضوع فعالیت</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="c-pwd" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group" style="overflow: hidden;">
                                    <label class="col-lg-2 control-label">مدیر مورد نظر</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-lg m-bot4" id="select">
                                            <option value="" selected disabled>انتخاب کنید</option>
                                            <?php
                                            $selectAdminJobsSet = mysqli_query($conn,"SELECT * FROM admin");
                                            while ($rowAdminSet = mysqli_fetch_assoc($selectAdminJobsSet)){
                                                echo '
                                                     <option value="'.$rowAdminSet['adminId'].'">'.$rowAdminSet['adminName'].' '.$rowAdminSet['adminLastName'].'</option>
                                                ';

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="button" onclick="addJobs()" class="btn btn-info">ثبت</button>
                                    </div>
                                </div>

                            </div>

                        </section>
                        <section class="panel">
                            <header class="panel-heading summary-head">
                                <h4 style="font-family: yekan">فعالیت های من</h4>
                            </header>
                            <div class="panel-body">

                            <?php
                            $sliderJs='';
                            $cot = "'";
                            $selectAdminJobs = mysqli_query($conn,"SELECT * FROM adminjobs,admin WHERE
                                  adminJobsAdminId = '$adminId' AND adminJobsSenderId = adminId");
                            while ($checkJobs = mysqli_fetch_assoc($selectAdminJobs)){
                                echo '
                                 <div class="form-group" style="overflow: visible;">
                                    <label class="col-lg-4 control-label">'.$checkJobs['adminName'].' '.$checkJobs['adminLastName'].'-'.$checkJobs['adminJobsText'].'</label>
                                    <div class="col-lg-6">
                                        <input onchange="editPercent('.$cot.'ex5'.$checkJobs["adminJobsId"].$cot.')" id="ex5'.$checkJobs['adminJobsId'].'" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="5" data-slider-value="'.$checkJobs['adminJobsPercent'].'"/>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                              ';
                                $sliderJs.="var slider".$checkJobs['adminJobsId']." = new Slider('#ex5".$checkJobs['adminJobsId']."');";
                            }
                            ?>




                            </div>

                        </section>

                    </aside>
                </div>

                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="assets/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap-slider/bootstrap-slider.js"></script>



    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

<script>
    function addJobs() {
        var text = $("#c-pwd").val();
        var adminId = $("#select option:selected").val();
        $.ajax({
            url: 'ajax/addJobs.php',
            data: {
                text: text,
                receive : adminId
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data['error'] === false) {
                    location.reload();
                }
            }
        });
    }

    <?php
    echo $sliderJs;
    ?>
function editPercent(id) {
    var value = $('#'+id).attr('data-value');
    var idJob = id.substring(3);
    $.ajax({
        url: 'ajax/jobsPercent.php',
        data: {
            value: value,
            idJob : idJob
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if (data['error'] === false) {
                $("#"+idJob).css("width", value+"%");
            }
        }
    });
}

</script>
</body>
</html>
