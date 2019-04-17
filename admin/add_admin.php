<?php
include 'inc/inc.php';
?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                ثبت مدیر جدید
                            </header>
                            <div class="panel-body">

                                        <div class="panel-body">
                                            <div class="alert alert-success fade in" id="successMSG" style="display: none" >
                                                <button data-dismiss="alert" class="close close-sm" type="button">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                مدیر با موفقیت در سیستم اضافه شد.
                                            </div>

                                            <form class="form-horizontal tasi-form" method="get">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام خانوادگی</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="family">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">شماره موبایل</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="mobile">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">شماره تلفن ثابت</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="tellPhone">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">پست الکترونیکی</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">شناسه کاربری</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="userName">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">رمزعبور</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام مشاور املاک</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="occupation">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="button" onclick="submit_admin()" class="btn btn-success">ثبت</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </section>







                                </div>
                            </div>
                        </section>
                    </div>
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



    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>



    <script>
        function border_defult() {
            $('#email').css('border','1px solid #e2e2e4');
            $('#name').css('border','1px solid #e2e2e4');
            $('#family').css('border','1px solid #e2e2e4');
            $('#password').css('border','1px solid #e2e2e4');
            $('#mobile').css('border','1px solid #e2e2e4');
            $('#userName').css('border','1px solid #e2e2e4');
            $('#occupation').css('border','1px solid #e2e2e4');
            $('#tellphone').css('border','1px solid #e2e2e4');
            $('#successMSG').slideUp('fast');

        }
function submit_admin() {
    border_defult();

    var y = 0;
    var email,name,family,password,mobile,tell,userName,occupation;
    email = $('#email').val();
    name = $('#name').val();
    family = $('#family').val();
    password = $('#password').val();
    mobile = $('#mobile').val();
    tell = $('#tellPhone').val();
    userName = $('#userName').val();
    occupation = $('#occupation').val();
    if(email===''){
        $('#email').css('border','2px solid red');
         y = 1;
    }if(name===''){
        $('#name').css('border','2px solid red');
        y = 1;
    }if(family===''){
        $('#family').css('border','2px solid red');
        y = 1;
    }if(password===''){
        $('#password').css('border','2px solid red');
        y = 1;
    }if(mobile===''){
        $('#mobile').css('border','2px solid red');
        y = 1;
    }if(tell===''){
        $('#tellPhone').css('border','2px solid red');
        y = 1;
    }if(userName===''){
        $('#userName').css('border','2px solid red');
        y = 1;
    }if(occupation===''){
        $('#occupation').css('border','2px solid red');
        y = 1;
    }
    if(y===0){

        $.ajax({
            url: 'ajax/addAdmin.php',
            data: {
                occupation: occupation,
                userName: userName,
                tell: tell,
                mobile: mobile,
                password: password,
                family: family,
                name: name,
                email: email
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data['error'] === true) {
                    $('#userName').css('border','2px solid red');
                }else{
                    $('html,body').animate({ scrollTop: 0 }, 'slow');
                    $('#successMSG').slideDown('fast');
                    return;
                }
            }
        });

    }
}

  </script>


</body>
</html>
