<?php
include "inc/header.php";
?>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="container">
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4" style="padding: 40px">
            <a href="#"><img src="./Images/img1.png" style="width: 100%"></a>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4" style="padding: 40px">
            <a href="#"><img src="./Images/img2.png" style="width: 100%"></a>

        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4" style="padding: 40px">
            <a href="#"><img src="./Images/img3.png" style="width: 100%"></a>
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="direction: ltr;margin-top: 20px">

    <div class="container" style="    padding-top: 10px;
    padding-bottom: 10px;
    box-shadow: 0px 0px 10px gainsboro;">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <p style="overflow: hidden;">
        <span style="padding-left: 20px;font-size:30px;border-bottom: 4px solid #74309c;margin-bottom: 20px;direction: rtl;float: right">آموزش های مفید</span>
        </p>
        <section class="regular slider">
            <div>
                <img src="http://placehold.it/350x300?text=1" style="margin: auto">
                <p style="    margin: 10px 30px 10px 30px;
    padding: 5px;
    direction: rtl;
    border-bottom: 2px solid black;">سلام بر شما</p>
            </div>
            <div>
                <img src="http://placehold.it/350x300?text=2" style="margin: auto">
                <p style="    margin: 10px 30px 10px 30px;
    padding: 5px;
    direction: rtl;
    border-bottom: 2px solid black;">سلام بر شما</p>
            </div>
            <div>
                <img src="http://placehold.it/350x300?text=3" style="margin: auto">
                <p style="    margin: 10px 30px 10px 30px;
    padding: 5px;
    direction: rtl;
    border-bottom: 2px solid black;">سلام بر شما</p>
            </div>
            <div>
                <img src="http://placehold.it/350x300?text=4" style="margin: auto">
                <p style="    margin: 10px 30px 10px 30px;
    padding: 5px;
    direction: rtl;
    border-bottom: 2px solid black;">سلام بر شما</p>
            </div>
            <div>
                <img src="http://placehold.it/350x300?text=5" style="margin: auto">
                <p style="    margin: 10px 30px 10px 30px;
    padding: 5px;
    direction: rtl;
    border-bottom: 2px solid black;">سلام بر شما</p>
            </div>
            <div>
                <img src="http://placehold.it/350x300?text=6" style="margin: auto">
                <p style="    margin: 10px 30px 10px 30px;
    padding: 5px;
    direction: rtl;
    border-bottom: 2px solid black;">سلام بر شما</p>
            </div>
        </section>
    </div>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top: 20px">
<?php
include "inc/footer.php"
?>
</div>
<script src="./Scripts/slick.js" type="text/javascript" charset="utf-8"></script>

<script>
    $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
</script>
</body>
</html>