<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>وبوتل</title>
    <link rel="stylesheet" href="Style/style.css"><!--Main Style-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--jQuery-->
    <script type="text/javascript" src="Scripts/main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><!--FontAwesome-->
    <meta name="theme-color" content="#742a9d"><!--Chrome Theme-->
    <link rel="icon" href="favicon.svg" type="image/svg+xml"><!--Icons-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="Style/bootstrap.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body class="mainPage">
<div class="sidebar"><!--sidebar menu-->
    <div class="">
        <a href="#" class="fas fa-times fermbutono" id="fermbutono"></a>
    </div>
    <a href="index.php" class="sidebarlinks">صفحه نخست</a>
    <a href="WhyWebotel.html" class="sidebarlinks">چرا وبوتل</a>
    <a href="#" class="sidebarlinks">پشتیبانی</a>
    <a href="#" class="sidebarlinks">وبلاگ</a>
    <a href="aboutUs.html" class="sidebarlinks">درباره‌ی وبوتل</a>
</div><!--sidebar menu-->
<div class="header"><!--header in desktop view-->
    <div class="rightPart">
        <a href="#"><img src="Images/Logo.svg" alt="Logo" class="logo"></a>
        <a href="index.php" class="linksHeader">صفحه نخست</a>
        <a href="WhyWebotel.html" class="linksHeader">چرا وبوتل</a>
        <a href="#" class="linksHeader">پشتیبانی</a>
        <a href="#" class="linksHeader">وبلاگ</a>
        <a href="aboutUs.html" class="linksHeader">درباره‌ی وبوتل</a>
        <div class="menuIcon">
            <a href="#" class="fas fa-bars MIcon" id="menubutono"></a>
        </div>
    </div><!--rightPart-->
    <div class="leftPart">
        <a href="tel:1858" class="fas fa-phone phoneN"> ۱۸۵۸</a>
        <a href="newCostumers1.php" class="logSig">ثبت نام جدید</a>
        <a href="#" class="logSig">ورود مشترکین</a>
    </div><!--leftPart-->
</div><!--header in desktop view-->