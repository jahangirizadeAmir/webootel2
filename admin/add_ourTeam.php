<?php
/**
 * artiash.com
 */

include 'inc/inc.php';
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
        width: 360px !important;
        height: 250px !important;
    }
    .cropit-preview#a2 {
        margin: auto;
        background: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 0px;
        margin-top: 7px;
        width: 360px !important;
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
        width: 360px !important;
        height: 250px !important;
    }

</style>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-primary">
                    <header class="panel-heading">
                        ثبت تیم جدید
                    </header>
                    <div class="panel-body">

                        <div class="panel-body">
                            <div class="alert alert-success fade in" id="successMSG" style="display: none">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                هم تیمی با موفقیت در سیستم اضافه شد.
                            </div>

                            <form class="form-horizontal tasi-form" method="get">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">تخصص</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="skill">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">متن</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="image-editor1" style="text-align: center;direction: ltr;">
                                        <input type="file" class="cropit-image-input" style="display:none;"
                                               id="img1">
                                        <a type="button" onclick="show_img1()" class="btn btn-info "><i
                                                    class="icon-plus"></i>اضافه
                                            کردن تصویر</a>
                                        <div class="cropit-preview" id="a2">
                                        </div>

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
<script src="assets/jquery.cropit.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>


<script>

    function show_img() {
        $('#img').click();
    }

    function show_img1() {
        $('#img1').click();
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

    function border_defult() {
        $('#skill').css('border', '1px solid #e2e2e4');
        $('#name').css('border', '1px solid #e2e2e4');
        $('#text').css('border', '1px solid #e2e2e4');
        $('#successMSG').slideUp('fast');

    }

    function submit_admin() {
        border_defult();

        var imgprofile = $('.image-editor1').cropit('export', {
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        if (typeof imgprofile !== 'undefined') // Any scope
        {
            img = imgprofile;
        }else{
            img='';
        }


        var y = 0;
        var  name, text, skill;
        name = $('#name').val();
        text = $('#text').val();
        skill = $('#skill').val();

        if (name === '') {
            $('#name').css('border', '2px solid red');
            y = 1;
        }
        if (text === '') {
            $('#text').css('border', '2px solid red');
            y = 1;
        }
        if (skill === '') {
            $('#skill').css('border', '2px solid red');
            y = 1;
        }

        if (y === 0) {

            $.ajax({
                url: 'ajax/addOurTeam.php',
                data: {
                    img: img,
                    text: text,
                    skill: skill,
                    name: name
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
    }

</script>


</body>
</html>
