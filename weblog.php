<!DOCTYPE html>
<html lang="fa" dir="rtl">

<body class="otherPages">

<?php

include "class/dataBase.php";
$db = new dataBase();
include "inc/header.php";
if(isset($_GET['id']) && $_GET['id']!=''){

    $id = mysqli_real_escape_string($db::connection(),$_GET['id']);

    $where = "AND newsCatId='$id'";

}else{
    $where ="";
}

?>
<style>
    .Images{
        width:100%;
        height:220px;
        margin-top:25px ;
        margin-bottom:25px ;
    }

    .daste {
        position: absolute;
        box-shadow: 0px 1px 10px silver;
        direction: rtl;
        padding-left: 150px;
        padding-right: 15px;
        padding-top: 0px;
        padding-bottom: 8px;
        border: 1px solid #9d9d9d;
        border-radius: 1px;
        font-family: 'iransans';
        position: absolute;
        margin-bottom: 30px;
        margin-left: 74%;
    }

    .hr-down {
        border: 1px solid #cacaca;
    }

    .font-size {
        font-size: 20px;
    }

    .input-search {
        position: absolute;
        border-radius: 40px;
        border: 2px solid #d8d9db;
        background-color: #e8e8e8;
        font-family: 'iransans';
        font-size: 20px;
    }



    .dast {
        box-shadow: 0px 1px 10px silver;
        direction: rtl;
        padding-left: 48px;
        padding-right: 15px;
        padding-top: 0px;
        padding-bottom: 8px;
        border: 1px solid #9d9d9d;
        border-radius: 1px;
        font-family: 'iransans';
        margin-bottom: 30px;
    }

    .hr-dow {
        border: 1px solid #cacaca;
    }

    .font-siz {
        font-size: 15px;
    }
    /*#axim{*/
    /*margin-left: 6%;*/
    /*}*/
    .serch{

    }
    #page{
        margin-bottom: 30px;
        margin-top: 30px;
    }
    #page a{
        font-family: iransans;
        text-decoration: none;
        font-size: 30px;
        text-align: center;
        line-height: 20px;
        height: 40px;
        width: 40px;
        display: inline-block;
        padding: 5px;
        margin-left: 5px;
        color: #5a5959;
    }
    .vv{
        color: #ffffff;
        background-color: #752b9c;
        border:2px solid #752b9c;
        border-radius: 1000px ;
    }
</style>
<div style="overflow: hidden">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <div class="col-md-9 col-sm-12 col-lg-9 col-xs-12" style="padding: 30px;">
            <?php
            $Q = $db::Query("SELECT * FROM news where newsId IS NOT null $where ORDER BY date(newsRegDate) DESC , time(newsRegTime) DESC ");
            while ($rowS = mysqli_fetch_assoc($Q)){
                ?>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="box-shadow: 0px 1px 10px silver;padding: 0;margin-top: 3%" id="axim">
                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-9" style="direction: rtl">
                        <h2 style="direction: rtl">  <b><?php echo $rowS['newsTitle']?></b></h2>
                        <p style="font-size: 15px;text-align: justify">
                            <?php
                            echo $rowS['newsShortText']
                            ?>
                        </p>
                        <button class="btn" style="border-radius: 12px;float:left; width:18%;color: white;background-color: #752b9c">ادامه مطلب</button>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3" style="direction: rtl;padding: 0">
                        <img style="    border-top-left-radius: 100%;
    border-bottom-left-radius: 100%;
    width: 100%;
}"  src="Images/<?php echo $rowS['imgShort']?>.jpg">
                    </div>

                </div>

            <?php
            }
            ?>
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="text-align: center">
<!--                <nav id="page">-->
<!--                    <a class="vv" href="#"><p style="color: white"> < </p></a>-->
<!--                    <a href="#">1</a>-->
<!--                    <a href="#">2</a>-->
<!--                    <a href="#">3</a>-->
<!--                    <a href="#">4</a>-->
<!--                    <a class="vv" href="#"><p style="color: white"> > </p></a>-->
<!--                </nav>-->
            </div>
        </div>

        <div class="col-md-3 hidden-sm hidden-xs col-lg-3">

            <div class="col-md-12 col-lg-12 " style="margin-top: 8%">
                <!--سرچ-->
                <div class="col-md-12 col-lg-12" style="padding: 0;margin-bottom: 33%">
                    <img class="pos" style="z-index: 2;position: absolute" src="./Images/icon-swarch.png" height="57">
                    <input class="input-search" style="    padding-right: 57px;direction: rtl;z-index: 1;height:57px;width: 100%"type="search"placeholder="    جستجو">
                </div>

                <div class="col-md-12 col-lg-12" style="border:2px solid #9d9d9d;padding: 0;margin-bottom: 15px">
                    <h3 style="border-bottom: 2px solid black;padding:5px 10px 10px 0px">دسته بندی</h3>
                    <ul style="list-style-type: none;color:#742a9d">
                        <?php
                        $QW = $db::Query("SELECT * FROM cat");
                        while ($rowQW = mysqli_fetch_assoc($QW)){
                            ?>
                            <li><a href="weblog.php?id=<?php echo $rowQW['catId'];?>"><?php echo $rowQW['catName'];?></li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
                <!--اخرین پست ها-->
                <div class="col-md-12 col-lg-12" style="padding: 0">
                    <div class="dast" style="direction: rtl;">
                        <h3 class="h3" style="font-size: 25px">آخرین پست ها</h3>
                        <hr class="hr-dow" style="">
                        <div class="font-siz">
                            <?php
                            $Q = $db::Query("SELECT * FROM news where newsId IS NOT null $where ORDER BY date(newsRegDate) DESC , time(newsRegTime) DESC LIMIT 4 ");

                            while ($rowS = mysqli_fetch_assoc($Q)){
?>
                                <p style="color: #b2b2b2;background-color: #f0f0f0"><a href="#"
                                                                                       style="color: #752b9c;text-decoration: none;background-color: #f0f0f0">
                                        <?php echo $rowS['newsTitle']?> </a><?php echo $db::G2J($rowS['newsRegDate'])?></p><br>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">

    <?php
    include "inc/footer.php";
    ?>

</div>
