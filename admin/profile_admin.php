<?php
include 'inc/inc.php';
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
                            <img src="<?php echo $_SESSION['img']?>" alt="">
                        </a>
                        <h1 style="font-family: yekan;"><?php echo $_SESSION['name'] . ' ' . $_SESSION['lastName'] ?></h1>
                        <p><?php echo $_SESSION['email'] ?></p>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="profile_admin.php"><i class="icon-user"></i>مشخصات کاربری</a></li>
                        <li><a href="profile_admin_act.php"><i class="icon-calendar"></i>فعالیت ها</a></li>
                    </ul>


                </section>
            </aside>
            <aside class="profile-info col-lg-9">

                <section class="panel">
                    <div class="bio-graph-heading">
                        <?php
                        echo $_SESSION['name'] . ' ' . $_SESSION['lastName']
                        ?>
                    </div>
                    <div class="panel-body bio-graph-info">
                        <div class="row">
                            <div class="bio-row">
                                <p><span>نام </span>:<?php echo $_SESSION['name'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>نام خانوادگی </span>: <?php echo $_SESSION['lastName'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>سمت </span>: <?php echo $_SESSION['adminOccupation'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>پست الکترونیکی </span>: <?php echo $_SESSION['email'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>موبایل </span>:<?php echo $_SESSION['mobile'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>تلفن ثابت </span>: <?php echo $_SESSION['tell'] ?></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <form>
                        <input type="text" placeholder="ارسال پیام به لیست مدیران" id="text"
                               class="form-control input-lg p-text-area">
                    </form>
                    <footer class="panel-footer">
                        <button class="btn btn-danger pull-right" onclick="send_msg();">ارسال</button>
                        <ul class="nav nav-pills">
                            <li>
                            </li>
                            <li>
                            </li>
                            <li>
                            </li>
                            <li>
                            </li>
                        </ul>
                    </footer>
                </section>

                <section class="panel panel-primary">
                    <div class="panel-heading">لیست پیامهای ارسال شده</div>
                    <div class="panel-body profile-activity" id='MSGlist'>
                        <?php
                        $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);
                        $i = 0;
                        $dateMsg = '';
                        $selectMsg = mysqli_query($conn, "SELECT * FROM adminmsg WHERE 
                                adminMsgAdminId = '$adminId' ORDER BY date(adminMsgRegDate) DESC , time(adminMsgRegTime) DESC ");
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

                <section class="panel   panel-primary ">
                    <div class="panel-heading">ویرایش پروفایل</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">نام</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" disabled id="f-name"
                                           value="<?php echo $_SESSION['name'] ?>" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">نام خانوادگی</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" disabled id="l-name" placeholder=" "
                                           value="<?php echo $_SESSION['lastName'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">سمت</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" disabled id="occupation"
                                           value="<?php echo $_SESSION['adminOccupation'] ?>" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">پست الکترونیکی</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="email"
                                           value="<?php echo $_SESSION['email'] ?>" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">شماره همراه</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['mobile'] ?>"
                                           id="mobile" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">شماره ثابت</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="tell"
                                           value="<?php echo $_SESSION['tell'] ?>" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="button" onclick="editProfile()" class="btn btn-success">ویرایش
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>


                <div class="panel panel-primary">

                    <div class="panel-heading">ویرایش رمز عبور</div>
                    <div class="panel-body">


                        <div class="alert alert-block alert-danger fade in" id="dangerMSG" style="display: none">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            خطایی رخ داده ، لطفا در ورود اطلاعات دقت فرمایید
                        </div>

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">رمز عبور فعلی</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="c-pwd" placeholder=" ">
                                </div>
                            </div>
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
                                    <button type="button" onclick="changePassword()" class="btn btn-info">ویرایش</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <section class="panel   panel-primary ">
                    <div class="panel-heading">ویرایش تصویر</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="image-editor" style="text-align: center;direction: ltr;">
                                <input type="file" class="cropit-image-input" style="display:none;" id="img">
                                <a type="button" onclick="show_img()" class="btn btn-info "><i class="icon-plus"></i>اضافه
                                    کردن تصویر</a>
                                <div class="cropit-preview">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="button" onclick="change_avatar()" class="btn btn-success">ویرایش
                                </button>
                            </div>
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
        var imgprofile = $('.image-editor').cropit('export',{
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        if (typeof imgprofile !== 'undefined') // Any scope
        {
            img = imgprofile;
        }else{
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
                }else{

                }
            }
        });
    }

    function changePassword() {
        $('#successMSG').fadeOut();
        $('#dangerMSG').fadeOut();
        var c_pwd,
        n_pwd,
        rt_pwd;
        c_pwd = $('#c-pwd').val();
        n_pwd = $('#n-pwd').val();
        rt_pwd = $('#rt-pwd').val();
        $.ajax({
            url: 'ajax/changePassword.php',
            data: {
                password: c_pwd,
                newPassword: n_pwd,
                rtNewPassword: rt_pwd
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data['error'] === false) {
                    location.replace('login.php?password=true');
                }else{
                    $('#dangerMSG').fadeIn();
                }
            }
        });


    }
</script>