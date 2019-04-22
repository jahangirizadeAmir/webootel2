<?php
session_start();
include "../class/dataBase.php";
$db = new dataBase();
$arraySession = array("login","adminId");
if(
    $db::issetParams($_SESSION,$arraySession)
    &&
    $db::emptyParams($_SESSION,$arraySession)
) {
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="amir jahangirizade piratil company">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>ورود به سیستم مدیریت</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
  <body class="login-body">
    <div class="container">
      <form class="form-signin">
          <div class="alert alert-danger" style="display: none" id="errorLogin">نام کاربری یا رمز عبور اشتباه است</div>
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" id="userName" placeholder="نام کاربری" autofocus>
            <input type="password" class="form-control" id="password" placeholder="کلمه عبور">
            <span onclick="login()" class="btn btn-lg btn-login btn-block" >ورود</span>
        </div>
      </form>
    </div>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script>
    function login() {
        var username,password;
        username = $('#userName').val();
        password = $('#password').val();
        $.ajax({
            url:"request/login.php",
            data:{
                userName:username,
                password:password
            },
            dataType:"json",
            type:"POST",
            success: function (data) {
                if(data['login']){
                    window.location.href="index.php";
                }else{
                    $('#errorLogin').show("slow");
                }
            }

        });
    }
</script>
  </body>
</html>
