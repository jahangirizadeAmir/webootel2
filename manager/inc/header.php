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
    $adminId = $_SESSION['adminId'];
    $Query = "SELECT * FROM admin where adminId='$adminId'";

    $adminName = $db::Query($Query,$db::$RESULT_ARRAY)['adminName'];

}else{
    header("location:login.php");
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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">

        <!--logo start-->
        <a href="#" class="logo">سیستم مدیریت</a>
        <!--logo end-->

        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">

                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="img/avatar1_small.jpg">
                        <span class="username"><?php echo $adminName?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="logout.php"><i class="icon-key"></i> خروج</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">

                <li class="">
                    <a class="" href="index.php">
                        <span>صفحه اصلی</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>مدیریت اخبار</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub" style="overflow: hidden; display: none;">
                        <li><a class="" href="addCat.php">مدیریت دسته بندی</a></li>
                        <li><a class="" href="listNews.php">لیست اخبار</a></li>
                        <li><a class="" href="addNews.php">ثبت خبر</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>مدیریت مشتریان</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub" style="overflow: hidden; display: none;">
                        <li><a class="" href="listCheckService.php">درخواست اعتبار سنجی</a></li>
                        <li><a class="" href="listNews.php">لیست ثبت نام شده ها</a></li>
                        <li><a class="" href="addNews.php">ثبت خبر</a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="" href="listLawyer.php">
                        <span>لیست وکلا</span>
                    </a>
                </li>
                <li class="">
                    <a class="" href="addContract.php">
                        <span>ثبت قرارداد</span>
                    </a>
                </li>
                <li class="">
                    <a class="" href="listContact.php">
                        <span>لیست قرارداد های فروخته</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>