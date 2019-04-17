<?php
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
                width: 250px !important;
                height: 250px !important;
            }
            .cropit-preview#a2 {
                margin: auto;
                background: #f8f8f8;
                background-size: cover;
                border: 5px solid #ccc;
                border-radius: 0px;
                margin-top: 7px;
                width: 600px !important;
                height: 375px !important;
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
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                لیست گالری
                            </header>
                            <br>
                            <div class="form-group">
                                <div class="image-editor1" style="text-align: center;direction: ltr;">
                                    <input type="file" class="cropit-image-input" style="display:none;"
                                           id="img1">
                                    <a type="button" onclick="show_img1()" class="btn btn-info "><i
                                                class="icon-plus"></i>اضافه
                                        کردن تصویر</a>
                                    <div class="cropit-preview" id="a2">
                                </div>
<br>
                                    <a type="button" onclick="uploadImg()" class="btn btn-success ">ثبت در اسلایدر</a>
                                </div>
                            </div>

                            <script>
                                function uploadImg() {
                                    var imgprofile = $('.image-editor1').cropit('export', {
                                        type: 'image/jpeg',
                                        quality: 0.33,
                                        originalSize: true
                                    });
                                    if (typeof imgprofile !== 'undefined') // Any scope
                                    {
                                        img = imgprofile;
                                    }else{
                                        return;
                                    }
                                    $.ajax({
                                        url: 'ajax/slider.php',
                                        data: {
                                            img: img
                                        },
                                        dataType: 'json',
                                        type: 'POST',
                                        success: function (data) {
                                            if (data['error'] === true) {
                                                $('#userName').css('border', '2px solid red');
                                            } else {
                                                location.reload();
                                            }
                                        }
                                    });

                                }
                                function deleteimg(id) {
                                    $.ajax({
                                        url: 'ajax/deleteSlider.php',
                                        data: {
                                            id: id
                                        },
                                        dataType: 'json',
                                        type: 'POST',
                                        success: function (data) {
                                            if (data['error'] === true) {
                                                $('#userName').css('border', '2px solid red');
                                            } else {
                                                location.reload();
                                            }
                                        }
                                    });
                                }
                            </script>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                <tr>
                                    <th>تصویر</th>
                                    <th class="hidden-phone">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $selectListAdmin = mysqli_query($conn, "SELECT * FROM slider");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)) {
                                    $cot = "'";
                                    echo '                                   
                                        <tr class="odd gradeX" onclick=""  style="cursor: pointer">
                                            <td><img src="../img/'.$rowAdmin['slider_img'].'.jpg" style="width:200px "></td>
                                            <td class="hidden-phone"><button type="button" onclick="deleteimg(' . $cot . $rowAdmin['slider_id'] . $cot . ')" class="btn btn-danger btn-sm">حذف</button></td>
                                        </tr>
                                     ';
                                }
                                ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <!-- page end-->


                </section>
            </div>
            </div>
            <!-- page end-->
        </section>
        </section>
        <!--main content end-->
        </section>

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
        <script src="assets/jquery.cropit.js"></script>


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
                $('#successMSG').slideUp('fast');

            }


        </script>


        </body>
        </html>

