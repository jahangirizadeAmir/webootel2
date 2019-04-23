<?php
if(isset($_GET['id']) && $_GET['id']!='') {
include 'inc/inc.php';
$ProfileAdmin = mysqli_real_escape_string($conn,$_GET['id']);
$adminProfileId = mysqli_query($conn,"SELECT * FROM admin
 WHERE adminId = '$ProfileAdmin' ");
if(mysqli_num_rows($adminProfileId)==1) {
$rowAdmin = mysqli_fetch_assoc($adminProfileId)
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="img/upload/<?php echo $rowAdmin['adminImage'] ?>.jpg" alt="">
                        </a>
                        <h1 style="font-family: yekan;"><?php echo $rowAdmin['adminName'] . ' ' . $rowAdmin['adminLastName'] ?></h1>
                        <p><?php echo $rowAdmin['adminEmail'] ?></p>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li ><a href="profile.php?id=<?php echo $_GET['id'] ?>"><i
                                        class="icon-user"></i>مشخصات کاربری</a>
                        </li>
                        <li class="active"><a href="profile_act.php?id=<?php echo $_GET['id'] ?>"><i class="icon-calendar"></i>فعالیت ها
                            </a>
                        </li>
                    </ul>


                </section>
            </aside>
                    <aside class="profile-info col-lg-9">



                        <section class="panel panel-primary">
                            <div class="panel-heading">لیست فعالیت های مدیر</div>
                            <div class="panel-body">


                                <?php
                                $selectAdminJobs = mysqli_query($conn,"SELECT * FROM adminjobs,admin WHERE
                                  adminJobsAdminId = '$ProfileAdmin' AND adminJobsSenderId = adminId");
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
                            <div class="panel-heading">لیست فعالیت های درخواستی مدیر</div>
                            <div class="panel-body">


                                <?php
                                $selectAdminJobs = mysqli_query($conn,"SELECT * FROM adminjobs,admin WHERE
                                  adminJobsSenderId = '$ProfileAdmin' AND adminJobsAdminId = adminId AND adminJobsPercent<'100'");
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
    <?php
}else{
    header('location:index.php');
}
}else{
    header('location:index.php');
}
?>