<?php
include "inc/header.php";


?>
<style>

    .cropit-preview-image {
        border-top-left-radius: 176px;
        border-bottom-left-radius: 176px;
    }
    .image-editor2 .cropit-preview-image {
border-radius: 0!important;
    }

    .cropit-preview-image-container {
        border-top-left-radius: 176px;
        border-bottom-left-radius: 176px;
    }

    .image-editor2 .cropit-preview-image-container {
        border-radius: 0!important;

    }

    .cropit-preview {
        margin: auto;
        background: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-top-left-radius: 176px;
        border-bottom-left-radius: 176px;
        margin-top: 7px;
        width: 250px !important;
        height: 250px !important;
    }
    .image-editor2 .cropit-preview {
        margin: auto;
        background: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
border-radius: 0!important;
        margin-top: 7px;
        width: 550px !important;
        height: 150px !important;
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
                        <section class="panel">
                            <header class="panel-heading">
                                ثبت خبر
                            </header>


                            <section class="panel-body">


                                <div class="alert alert-success"
                                     id="error"
                                     style="display: none"
                                >خبر با موفقیت اضافه شد</div>


                            <div class="row" style="padding: 20px 100px 20px 100px;" id="form">

                                <input type="text" placeholder="عنوان" id="title" class="form-control">

                                <select class="form-control" id="cat">
                                    <option selected disabled>دسته بندی خود را انتخاب کنید</option>
                                    <?php
                                    $QR = $db::Query("SELECT * FROM cat");
                                    while ($rowCat = mysqli_fetch_assoc($QR)){
                                        echo '<option value="'.$rowCat['catId'].'">'.$rowCat['catName'].'</option>';
                                    }
                                    ?>
                                </select>

                                <header class="panel-heading">
                                    متن اصلی
                                </header>
                                <textarea name="editor1" placeholder=""></textarea>
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>

                                 <header class="panel-heading">
                                    متن کوچک
                                </header>
                                <textarea name="editor2" placeholder=""></textarea>
                                <script>
                                    CKEDITOR.replace( 'editor2' );
                                </script>
                                <br>
                                <div class="form-group">
                                    <div class="image-editor" style="text-align: center;direction: ltr;">
                                        <input type="file" class="cropit-image-input" style="display:none;" id="img">
                                        <a type="button" onclick="show_img()" class="btn btn-info "><i class="icon-plus"></i>
                                            تصویر شاخص</a>
                                        <div class="cropit-preview">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="form-group">
                                    <div class="image-editor2" style="text-align: center;direction: ltr;">
                                        <input type="file" class="cropit-image-input" style="display:none;" id="img2">
                                        <a type="button" onclick="show_img2()" class="btn btn-info "><i class="icon-plus"></i>
                                            تصویر خبر</a>
                                        <div class="cropit-preview">
                                        </div>
                                    </div>
                                </div>
                                <script>

                                </script>
                                <h4 id="result" style="display: none;"></h4>
                                <br>
                                <br>
                                <input type="button" id="submit" value="ثبت" class="btn btn-large btn-primary" style="margin-top: 20px">
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
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>

<script src="js/cropit.js"></script>

<script>
    $("#submit").on("click",function () {
        var shortText,longText,shortImg,longImg,cat,title;
        shortText = CKEDITOR.instances.editor2.getData();
        longText = CKEDITOR.instances.editor1.getData();
        cat = $('#cat').val();
        title = $('#title').val();
        var imgprofile = $('.image-editor').cropit('export',{
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        if (typeof imgprofile !== 'undefined') // Any scope
        {
            shortImg = imgprofile;
        }else{
            shortImg = "";
        }
        var imgprofile2 = $('.image-editor2').cropit('export',{
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        if (typeof imgprofile2 !== 'undefined') // Any scope
        {
            longImg = imgprofile2;
        }else{
            shortImg = "";
        }

        $.ajax({
            url:"request/addNews.php",
            type:"POST",
            dataType:"json",
            data:{
                shortText:shortText,
                longText:longText,
                shortImg:shortImg,
                longImg:longImg,
                title:title,
                cat:cat
            },
            success: function (data) {
                if(data['error']===true){
                    $('#error').show().addClass("alert-danger").removeClass("alert-success").html("تمام موارد اجباری می باشند");

                }else{
                    $('#error').show().removeClass("alert-danger").addClass("alert-success").html("خبر با موفقیت اضافه شد");
                }
            }
        });

    });

    function edit(id) {
        var text = $('#txt'+id).val();
        $.ajax({
            url:"request/EditCat.php",
            type:"POST",
            dataType:"json",
            data:{
                name:text,
                id:id
            },
            success: function (data) {

            }
        });

    }
    function show_img() {
        $('#img').click();
    }function show_img2() {
        $('#img2').click();
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
        $('.image-editor2').cropit({
            exportZoom: 1.25,
            imageBackground: true,
            imageBackgroundBorderWidth: 20,
            imageState: {
                src: ''
            }
        });


    })(jQuery);
</script>

</body>
</html>
