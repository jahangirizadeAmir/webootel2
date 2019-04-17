<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']==true){
    header('location:index.php');
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>پنل مدیریت</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" >
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
          <div class="alert alert-block alert-danger fade in" id="error" style="display: none;">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
              </button>
             نام کاربری و رمز عبور اشتباه وارد شده است.
          </div>
          <?php
          if(isset($_GET['password']) && $_GET['password']=='true'){
?>
              <div class="alert alert-success fade in" id="successMSG" >
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  رمز عبور با موفقیت تغییر کرد جهت ورود رمز جدید را وارد نمایید
              </div>

<?php

          }
          ?>


        <div class="login-wrap">
            <input type="text" id="username" class="form-control" placeholder="نام کاربری" autofocus>
            <input type="password" id="password" class="form-control" placeholder="کلمه عبور">
            <button class="btn btn-lg btn-login btn-block" onclick="login()" type="button">ورود</button>
        </div>

      </form>

    </div>
<script>
    function login() {
        $('#error').fadeOut('fast');
        var userName = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        $.ajax({
            url: 'ajax/login.php',
            data: {
                username: userName,
                password: password
            },
            dataType: 'json',
            type: 'POST',
            success: function(data) {
                if(data==='true'){
                    location.replace("./index.php");
                }else if(data==='false'){
                    $('#error').fadeIn('fast');
                }


            }
        });

    }
</script>

  </body>
</html>
