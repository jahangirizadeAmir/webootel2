<?php
/**
 * artiash.com
 */

include 'inc/inc.php';
/**
 * artiash.com
 */

/**
 * Created by PhpStorm.
 * User: amir
 * Date: 10/10/2017
 * Time: 2:45 PM
 */

?>
<style>
    .cropit-preview-image {
        border-radius: 0px !important;
    }

    .cropit-preview-image-container {
        border-radius: 0px !important;
    }

    .cropit-preview {
        margin: auto;
        background: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 0px;
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
            <div class="col-lg-12">
                <section class="panel panel-primary">
                    <header class="panel-heading">
                        ثبت دفتر تلفن جدید
                    </header>
                    <div class="panel-body">

                        <div class="panel-body">
                            <div class="alert alert-success fade in" id="successMSG" style="display: none">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                               مشخصات با موفقیت در سیستم اضافه شد
                            </div>

                            <form class="form-horizontal tasi-form" method="get">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="data1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">آدرس</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="data2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">شماره تماس</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="data3">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نوع ملک</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="data4">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">توضیحات</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="data5">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="button" onclick="submit_admin()" class="btn btn-success">ثبت
                                        </button>
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
<script src="assets/jquery.cropit.js"></script>



<script>











    function border_defult() {
        $('#successMSG').slideUp('fast');

    }

    function submit_admin() {
        var img ='';

        var imgprofile = $('.image-editor').cropit('export',{
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        if (typeof imgprofile !== 'undefined') // Any scope
        {
            img = imgprofile;
        }

        var data1='0';
        var data2='0';
        var data3='0';
        var data4='0';
        var data5='0';

         data1 = $('#data1').val();
         data2 = $('#data2').val();
         data3 = $('#data3').val();
         data4 = $('#data4').val();
         data5 = $('#data5').val();


            $.ajax({
                url: 'ajax/addContact.php',
                data: {
                    data1: data1,
                    data2: data2,
                    data3: data3,
                    data4: data4,
                    data5: data5

               },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    if (data['error'] === true) {
                        $('#userName').css('border', '2px solid red');
                    } else {
                        $('html,body').animate({scrollTop: 0}, 'slow');
                        $('#successMSG').slideDown('fast');
                        return;
                    }
                }
            });

    }

</script>


</body>
</html>


