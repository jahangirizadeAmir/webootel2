﻿<?php
if(isset($_GET['id']) && $_GET['id']!='') {
    include 'inc/inc.php';
    $postId = mysqli_real_escape_string($conn, $_GET['id']);
    $selectPost = mysqli_query($conn, "SELECT * FROM collection WHERE collectionId = '$postId'");
    if (mysqli_num_rows($selectPost)) {
        $rowPost = mysqli_fetch_assoc($selectPost);

        ?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                ویرایش مطلب
                            </header>
                            <div class="panel-body">

                                <div class="panel-body">
                                    <div class="alert alert-success fade in" id="successMSG" style="display: none">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="icon-remove"></i>
                                        </button>
                                        مجموعه با موفقیت ویرایش شد.
                                    </div>

                                    <form class="form-horizontal tasi-form" method="get">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نام</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" value="<?php echo $rowPost['collectionName'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">تیتر</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="title" value="<?php echo $rowPost['collectionTitle'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نمای ظاهری</label>
                                            <div class="col-sm-10">
                                                <select class="form-control input-lg m-bot4" id="parent">
                                                    <?php
                                                    $selectAdminJobsSet = mysqli_query($conn, "SELECT * FROM collectionstyle");
                                                    while ($rowAdminSet = mysqli_fetch_assoc($selectAdminJobsSet)) {
                                                        if($rowAdminSet['collectionStyleId'] == $rowPost['collectionParent']){
                                                            $active = 'selected';
                                                        }else{
                                                            $active = '';
                                                        }
                                                        echo '
                                                     <option value="' . $rowAdminSet['collectionStyleId'] . '" '.$active.'>' . $rowAdminSet['collectionStyleName'] . '</option>';
                                                    }
                                                    ?>
                                                </select></div>
                                        </div>




                                        <div class="row">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <header class="panel-heading">
                                                        متن راست

                                                    </header>
                                                    <div class="panel-body">
                                                        <div class="form">
                                                            <form action="#" class="form-horizontal">
                                                                <div class="form-group">
                                                                    <div class="col-sm-10">
                                                                    <textarea class="form-control ckeditor"
                                                                              name="RightDetail" id="RightDetail"
                                                                              rows="6">
                                                                        <?php
                                                                        echo $rowPost['collectionRight'];
                                                                        ?>
                                                                    </textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <header class="panel-heading">
                                                        متن چپ

                                                    </header>
                                                    <div class="panel-body">
                                                        <div class="form">
                                                            <form action="#" class="form-horizontal">
                                                                <div class="form-group">
                                                                    <div class="col-sm-10">
                                                                    <textarea class="form-control ckeditor"
                                                                              name="LeftDetail" id="LeftDetail"
                                                                              rows="6">
                                                                         <?php
                                                                         echo $rowPost['collectionLeft'];
                                                                         ?>
                                                                    </textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="button" onclick="submit_post()" class="btn btn-success">
                                                    ویرایش پست
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

        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="js/bootstrap-switch.js"></script>
        <!--custom tagsinput-->
        <script src="js/jquery.tagsinput.js"></script>
        <!--custom checkbox & radio-->
        <script type="text/javascript" src="js/ga.js"></script>

        <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>


        <!--common script for all pages-->
        <script src="js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="js/form-component.js"></script>


        <script>

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            function border_defult() {
                $('#title').css('border', '1px solid #e2e2e4');
                $('#name').css('border', '1px solid #e2e2e4');
                $('#successMSG').slideUp('fast');
            }


            $('#img').change(function (e) {
                var clicked = e.target;
                var file = clicked.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function (e) {
                    var a = e.target.result;
                    $('#blah').attr('src', a);
                    localStorage.setItem('img', a);
                };
            });

            function upload() {
                $('#imgLoder').show();
                $('#folder').click();
                var img = localStorage.getItem('img');

                $.ajax({
                    url: 'ajax/uploadImg.php',
                    data: {
                        img: img
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        if (data['error'] === false) {
                            var id = data['id'];
                            var address = data['address'];
                            var cot = "'";
                            var html = '<img id="amir23" src="../images/' + address + '" ondblclick="selectImg(' + cot + id + cot + ',' + cot + '../images/' + address + cot + ')" class="col-md-3" style="margin-bottom:5px;cursor: pointer;height: 50px;">';
                            $('#about-2').prepend(html);
                            $('#imgLoder').hide();
                            localStorage.setItem('imgSet', id);
                        }
                    }
                });
            }


            function submit_post() {
                border_defult();
                var y = 0;
                var title, name, parent, detailRight, detailLeft;
                var id = '<?php echo $postId ?>';
                title = $('#title').val();
                name = $('#name').val();
                parent = $('#parent option:selected').val();
                detailRight = CKEDITOR.instances["RightDetail"].getData();
                detailLeft = CKEDITOR.instances["LeftDetail"].getData();

                if (name === '') {
                    $('#name').css('border', '2px solid red');
                    y = 1;
                }
                if (title === '') {
                    $('#title').css('border', '2px solid red');
                    y = 1;
                }
                if (y === 0) {

                    $.ajax({
                        url: 'ajax/editCollection.php',
                        data: {
                            title: title,
                            name: name,
                            parent: parent,
                            detailRight: detailRight,
                            detailLeft: detailLeft,
                            id: id
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

            function selectImg(id, url) {
                localStorage.setItem('imgSet', id);
                $('#imgSet').fadeIn('slow').attr('src', url);
                $('#imgRemover').fadeIn('slow');
                $('#myModal').modal('toggle');
            }


            function deletImg() {
                localStorage.setItem('imgSet', '');
                $('#imgSet').fadeOut('fast').attr('src', '');
                $('#imgRemover').fadeOut('fast');
            }


        </script>


        </body>
        </html>
        <?php
    }
}
    ?>