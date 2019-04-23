<?php
if(isset($_GET['id']) && $_GET['id']!='') {
    include 'inc/inc.php';
    $postId = mysqli_real_escape_string($conn, $_GET['id']);
    $selectPost = mysqli_query($conn, "SELECT * FROM post WHERE postId = '$postId'");
    if (mysqli_num_rows($selectPost)) {
        $rowPost = mysqli_fetch_assoc($selectPost);
        $postImgId = $rowPost['postImg'];
        $selectImg = mysqli_query($conn,"SELECT * FROM image WHERE imageId = '$postImgId'");
        $rowImg = mysqli_fetch_assoc($selectImg);
        if(mysqli_num_rows($selectImg)==1){
            $imgAddress = '../images/'.$rowImg['imageUrl'].$rowImg['imageType'];
        }else{
            $imgAddress = '';
        }

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
                                        مطلب با موفقیت ویرایش شد.
                                    </div>

                                    <form class="form-horizontal tasi-form" method="get">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نام</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" value="<?php echo $rowPost['postName'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">تیتر</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="title" value="<?php echo $rowPost['postTitle'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">دسته</label>
                                            <div class="col-sm-10">
                                                <select class="form-control input-lg m-bot4" id="parent">
                                                    <option value="" selected>دسته اصلی</option>
                                                    <?php
                                                    $selectAdminJobsSet = mysqli_query($conn, "SELECT * FROM cat");
                                                    while ($rowAdminSet = mysqli_fetch_assoc($selectAdminJobsSet)) {
                                                        if($rowAdminSet['catId'] == $rowPost['postParent']){
                                                            $active = 'selected';
                                                        }else{
                                                            $active = '';
                                                        }
                                                        echo '
                                                     <option value="' . $rowAdminSet['catId'] . '" '.$active.'>' . $rowAdminSet['catName'] . '</option>';
                                                    }
                                                    ?>
                                                </select></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">تصویر شاخص</label>
                                            <div class="col-sm-10">
                                                <a class="btn btn-success" data-toggle="modal" href="#myModal">انتخاب
                                                    تصویر
                                                    شاخص
                                                </a>
                                                <?php
                                                if($imgAddress==''){?>
                                                    <a class="btn btn-danger" style="display: none" id="imgRemover"
                                                       onclick="deletImg()"> حذف تصویر شاخص</a>
                                                    <img src="" style="display: none" class="col-md-3" id="imgSet">
                                                <?php
                                                }else{?>
                                                    <a class="btn btn-danger" style="" id="imgRemover"
                                                       onclick="deletImg()"> حذف تصویر شاخص</a>
                                                    <img src="<?php echo $imgAddress ?>" style="" class="col-md-3" id="imgSet">
                                                    <script>
                                                        localStorage.setItem('imgSet', '<?php echo $rowPost['postImg']?>');
                                                    </script>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title">لیست تصاویر شاخص</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section class="panel">
                                                            <header class="panel-heading tab-bg-dark-navy-blue">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="active">
                                                                        <a data-toggle="tab" href="#home-2">
                                                                            <i class="icon-picture"></i>
                                                                            آپلود تصویر
                                                                        </a>
                                                                    </li>
                                                                    <li class="">
                                                                        <a data-toggle="tab" href="#about-2"
                                                                           id="folder">
                                                                            <i class="icon-folder-open"></i>
                                                                            انتخاب از گالری
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </header>
                                                            <div class="panel-body">
                                                                <div class="tab-content">
                                                                    <div id="home-2" class="tab-pane active" style="">
                                                                        <div class="form-group">
                                                                            <div class="image-editor"
                                                                                 style="text-align: center;direction: ltr;">
                                                                                <div class="col-md-12">
                                                                                    <img src="" id="blah"
                                                                                         class="col-md-7"
                                                                                         style="float: none;margin: auto">
                                                                                </div>
                                                                                <br>
                                                                                <input type="file" class=""
                                                                                       style="display:none;" id="img"
                                                                                       accept="image/jpeg">
                                                                                <a type="button"
                                                                                   onclick="$('#img').click();"
                                                                                   class="btn btn-info "><i
                                                                                            class="icon-plus"></i> اضافه
                                                                                    کردن تصویر</a>
                                                                                <br>
                                                                                <br>
                                                                                <button class="btn btn-primary"
                                                                                        onclick="upload();"
                                                                                        type="button">
                                                                                    بارگزاری
                                                                                </button>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="about-2" class="tab-pane" id="panelImg">
                                                                        <img
                                                                                src="img/loadingImg.gif"
                                                                                style="margin-bottom:5px;cursor: pointer;
                                                                                     display: none;height: 50px;"
                                                                                class="col-md-3"
                                                                                id="imgLoder"
                                                                        >

                                                                        <?php
                                                                        $cot = "'";
                                                                        $selectImg = mysqli_query($conn, "SELECT * FROM image");
                                                                        while ($imgRow = mysqli_fetch_assoc($selectImg)) {
                                                                            $url = '../img/' . $imgRow['imageUrl'] . $imgRow['imageType'];
                                                                            echo '<img src="' . $url . '" ondblclick="selectImg(' . $cot . $imgRow['imageId'] . $cot . ',' . $cot . $url . $cot . ')"  class="col-md-3" style="margin-bottom:5px;cursor: pointer;    height: 50px;">';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default"
                                                                type="button">
                                                            بستن
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <header class="panel-heading">
                                                        متن اصلی

                                                    </header>
                                                    <div class="panel-body">
                                                        <div class="form">
                                                            <form action="#" class="form-horizontal">
                                                                <div class="form-group">
                                                                    <div class="col-sm-10">
                                                                    <textarea class="form-control ckeditor"
                                                                              name="Detail" id="Detail"
                                                                              rows="6">
                                                                        <?php
                                                                        echo $rowPost['postText'];
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
                                                        متن کوچک

                                                    </header>
                                                    <div class="panel-body">
                                                        <div class="form">
                                                            <form action="#" class="form-horizontal">
                                                                <div class="form-group">
                                                                    <div class="col-sm-10">
                                                                    <textarea class="form-control ckeditor"
                                                                              name="Detail2" id="Detail2"
                                                                              rows="6">
                                                                        <?php
                                                                        echo $rowPost['postُShortText'];
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
                $('#detail').css('border', '1px solid #e2e2e4');
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
                var title, name, parent, detail,detail2, detailRight, detailLeft;
                var id = '<?php echo $postId ?>';
                title = $('#title').val();
                name = $('#name').val();
                parent = $('#parent option:selected').val();
                detail = CKEDITOR.instances["Detail"].getData();
                detail2 = CKEDITOR.instances["Detail2"].getData();
                var img = localStorage.getItem('imgSet');

                if (name === '') {
                    $('#name').css('border', '2px solid red');
                    y = 1;
                }
                if (detail === '') {
                    $('#detail').css('border', '2px solid red');
                    y = 1;
                }
                if (title === '') {
                    $('#title').css('border', '2px solid red');
                    y = 1;
                }
                if (y === 0) {

                    $.ajax({
                        url: 'ajax/editPost.php',
                        data: {
                            title: title,
                            name: name,
                            parent: parent,
                            detail: detail,
                            detail2: detail2,
                            img: img,
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