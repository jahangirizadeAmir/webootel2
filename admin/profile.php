<?php
if(isset($_GET['id']) && $_GET['id']!='') {
    include 'inc/inc.php';
    $ProfileAdmin = mysqli_real_escape_string($conn, $_GET['id']);
    $adminProfileId = mysqli_query($conn, "SELECT * FROM admin
 WHERE adminId = '$ProfileAdmin' ");
    if (mysqli_num_rows($adminProfileId) == 1) {
        $rowAdmin = mysqli_fetch_assoc($adminProfileId);
        ?>
        <style>
            .cropit-preview-image {
                border-radius: 176px !important;
            }

            .cropit-preview-image-container {
                border-radius: 176px !important;
            }

            .cropit-preview {
                margin: auto;
                background: #f8f8f8;
                background-size: cover;
                border: 5px solid #ccc;
                border-radius: 176px;
                margin-top: 7px;
                width: 250px !important;
                height: 250px !important;
            }

            .cropit-preview-image-container {
                cursor: move;
            }

            .cropit-preview-background {
                opacity: .2;
                cursor: auto;
            }

            div#cropit-preview {
                width: 741px !important;
                height: 142px !important;
            }

        </style>
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
                                <li class="active"><a href="profile.php?id=<?php echo $_GET['id'] ?>"><i
                                                class="icon-user"></i>مشخصات کاربری</a>
                                </li>
                                <li><a href="profile_act.php?id=<?php echo $_GET['id'] ?>"><i class="icon-calendar"></i>فعالیت
                                        ها
                                    </a>
                                </li>
                            </ul>

                        </section>
                    </aside>
                    <aside class="profile-info col-lg-9">

                        <section class="panel">
                            <div class="bio-graph-heading">
                                <?php
                                echo $rowAdmin['adminName'] . ' ' . $rowAdmin['adminLastName']
                                ?>
                            </div>
                            <div class="panel-body bio-graph-info">
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>نام </span>:<?php echo $rowAdmin['adminName'] ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>نام خانوادگی </span>: <?php echo $rowAdmin['adminLastName'] ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>سمت </span>: <?php echo $rowAdmin['adminOccupation'] ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>پست الکترونیکی </span>: <?php echo $rowAdmin['adminEmail'] ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>موبایل </span>:<?php echo $rowAdmin['adminMobile'] ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>تلفن ثابت </span>: <?php echo $rowAdmin['adminTell'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section class="panel panel-primary">
                            <div class="panel-heading">لیست پیامهای ارسال شده</div>
                            <div class="panel-body profile-activity" id='MSGlist'>
                                <?php
                                $i = 0;
                                $dateMsg = '';
                                $selectMsg = mysqli_query($conn, "SELECT * FROM adminmsg WHERE 
                                adminMsgAdminId = '$ProfileAdmin' ORDER BY date(adminMsgRegDate) DESC , time(adminMsgRegTime) DESC ");
                                while ($rowSelect = mysqli_fetch_assoc($selectMsg)) {
                                    if ($i == 0) {
                                        echo '<h5 class="pull-right">' . str_replace('-', '/', jalali($rowSelect['adminMsgRegDate'])) . '</h5>';
                                    } elseif ($dateMsg != $rowSelect['adminMsgRegDate']) {
                                        echo '<h5 class="pull-right">' . str_replace('-', '/', jalali($rowSelect['adminMsgRegDate'])) . '</h5>';

                                    }
                                    $i++;
                                    $dateMsg = $rowSelect['adminMsgRegDate'];
                                    echo '
                                    <div class="activity terques">
                                    <span>
                                        <i class="icon-shopping-cart"></i>
                                    </span>
                                    <div class="activity-desk">
                                        <div class="panel">
                                            <div class="panel-body" style="    min-width: 200px;">
                                                <div class="arrow"></div>
                                                <i class=" icon-time"></i>
                                                <h4>' . substr($rowSelect['adminMsgRegTime'], 0, 5) . '</h4>
                                                <p>' . $rowSelect['adminMsgText'] . '</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    ';
                                }
                                ?>
                            </div>
                        </section>

                        <div class="panel panel-primary">

                            <div class="panel-heading">ویرایش رمز عبور</div>
                            <div class="panel-body">


                                <div class="alert alert-block alert-danger fade in" id="dangerMSG"
                                     style="display: none">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    خطایی رخ داده ، لطفا در ورود اطلاعات دقت فرمایید
                                </div>
                                <div class="alert alert-block alert-info fade in" id="OkMSG" style="display: none">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    عملیات با موفقیت انجام شد
                                </div>

                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">رمز عبور جدید</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="n-pwd" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">تکرار رمز عبور جدید</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="rt-pwd" placeholder=" ">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="button" onclick="changePassword()" class="btn btn-info">
                                                ویرایش
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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

        <!--common script for all pages-->
        <script src="js/common-scripts.js"></script>

        <script src="assets/jquery.cropit.js"></script>

        </body>
        </html>
        <script>


            function changePassword() {
                $('#OkMSG').fadeOut();
                $('#dangerMSG').fadeOut();
                var n_pwd, rt_pwd;
                var id = '<?php echo $_GET['id']; ?>';
                n_pwd = $('#n-pwd').val();
                rt_pwd = $('#rt-pwd').val();
                $.ajax({
                    url: 'ajax/changePasswordOtherAdmin.php',
                    data: {
                        newPassword: n_pwd,
                        rtNewPassword: rt_pwd,
                        id:id
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        if (data['error'] === false) {
                            $('#OkMSG').fadeIn();
                        } else {
                            $('#dangerMSG').fadeIn();
                        }
                    }
                });


            }

            function show_img() {
                $('#img').click();
            }

            (function ($) {
                $('.image-editor').cropit({
                    exportZoom: 1.25,
                    imageBackground: true,
                    imageBackgroundBorderWidth: 20,
                    imageState: {
                        src: ''
                    }
                });
                $('.image-editor1').cropit({
                    exportZoom: 1.25,
                    imageBackground: true,
                    imageBackgroundBorderWidth: 20,
                    imageState: {
                        src: ''
                    }
                });

            })(jQuery);

            function change_avatar() {
                var imgprofile = $('.image-editor').cropit('export', {
                    type: 'image/jpeg',
                    quality: 0.33,
                    originalSize: true
                });
                if (typeof imgprofile !== 'undefined') // Any scope
                {
                    img = imgprofile;
                } else {
                    return;
                }

                $.ajax({
                    url: 'ajax/avatarChange.php',
                    data: {
                        img: img
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

            function send_msg() {
                var text = document.getElementById('text').value;
                $.ajax({
                    url: 'ajax/sendMsg.php',
                    data: {
                        text: text
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        if (data['error'] === false) {
                            $('#text').val('');
                            var time = data["time"].substr(0, 5);
                            var date = data['date'];
                            $("#MSGlist").prepend('<h5 class="pull-right">' + date + '</h5><div class="activity terques"><span><i class="icon-shopping-cart"></i></span><div class="activity-desk"><div class="panel"><div class="panel-body" style="min-width: 200px"><div class="arrow"></div><i class="icon-time"></i><h4>' + time + '</h4><p>' + text + '</p></div></div></div></div>');
                        }


                    }
                });
            }

            function editProfile() {
                var email,
                    mobile,
                    tell;

                email = $('#email').val();
                mobile = $('#mobile').val();
                tell = $('#tell').val();

                $.ajax({
                    url: 'ajax/editProfile.php',
                    data: {
                        email: email,
                        mobile: mobile,
                        tell: tell
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        if (data['error'] === false) {
                            location.reload();
                        } else {

                        }
                    }
                });
            }

        </script>
        <?php
    } else{
    header('location:index.php');
}
}else{
    header('location:index.php');
}
    ?>