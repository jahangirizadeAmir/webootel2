<?php
if(isset($_GET['id']) && $_GET['id']!='') {
include 'inc/inc.php';
$postId = mysqli_real_escape_string($conn, $_GET['id']);
$selectPost = mysqli_query($conn, "SELECT * FROM collectionstyle WHERE collectionStyleId = '$postId'");
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
                                ویرایش ظاهر مجموعه
                            </header>
                            <div class="panel-body">

                                        <div class="panel-body">
                                            <div class="alert alert-success fade in" id="successMSG" style="display: none" >
                                                <button data-dismiss="alert" class="close close-sm" type="button">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                مجموعه با موفقیت ویرایش شد.
                                            </div>

                                            <form class="form-horizontal tasi-form" method="get">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name" value="<?php echo $rowPost['collectionStyleName']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">تعداد نمایش در هر صفحه</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="number" value="<?php echo $rowPost['collectionStylePageCount']?>">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <section class="panel">
                                                            <header class="panel-heading">
متن بالا
                                                            </header>
                                                            <div class="panel-body">
                                                                <div class="form">
                                                                    <form action="#" class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control ckeditor" name="TOP" id="TOP" rows="6">
                                                                                    <?php echo $rowPost['collectionStyleTop']?>
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
                                                                نمای اصلی

                                                            </header>
                                                            <div class="panel-body">
                                                                <div class="form">
                                                                    <form action="#" class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control ckeditor" name="TEXT" id="TEXT" rows="6">
                                                                                    <?php echo $rowPost['collectionStyleHTML']?>
                                                                                </textarea>
                                                                                <span class="help-block">[text] در جای متن</span>
                                                                                <span class="help-block">[img] به جای آدرس تصویر شاخص</span>
                                                                                <span class="help-block">[name] به جای نام</span>
                                                                                <span class="help-block">[date] به جای تاریخ</span>
                                                                                <span class="help-block">[title] به جای تیتر</span>
                                                                                <span class="help-block">[view] به جای تعداد نمایش</span>
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
متن پایین                                                             </header>
                                                            <div class="panel-body">
                                                                <div class="form">
                                                                    <form action="#" class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control ckeditor" name="BOTTOM" id="BOTTOM" rows="6">
                                                                                    <?php echo $rowPost['collectionStyleBottom']?>
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
شمارنده صفحه                                                             </header>
                                                            <div class="panel-body">
                                                                <div class="form">
                                                                    <form action="#" class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control ckeditor" name="COUNT" id="COUNT" rows="6">
                                                                                    <?php echo $rowPost['collectionStyleCount']?>
                                                                                </textarea>
                                                                                <span class="help-block">[number] در جای شمارنده صفحه</span>
                                                                                <span class="help-block">[link] در جای لینک شمارنده صفحه</span>
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
                                                        <button type="button" onclick="submit_post()" class="btn btn-success">ثبت</button>
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
            $('#title').css('border','1px solid #e2e2e4');
            $('#name').css('border','1px solid #e2e2e4');
            $('#successMSG').slideUp('fast');
        }







function submit_post() {
    border_defult();
    var y = 0;
    var BOTTOM,TEXT,TOP,number,name,COUNT;
    var id = '<?php echo $postId ?>';
    number = $('#number').val();
    name = $('#name').val();
    BOTTOM = CKEDITOR.instances["BOTTOM"].getData();
    TOP = CKEDITOR.instances["TOP"].getData();
    TEXT = CKEDITOR.instances["TEXT"].getData();
    COUNT = CKEDITOR.instances["COUNT"].getData();



    if(name===''){
        $('#name').css('border','2px solid red');
        y = 1;
    }
    if(y===0){

        $.ajax({
            url: 'ajax/editCollectionStyle.php',
            data: {
                number:number,
                name:name,
                bottom:BOTTOM,
                top:TOP,
                text:TEXT,
                count:COUNT,
                id:id
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data['error'] === true) {
                    $('#userName').css('border','2px solid red');
                }else{
                    $('html,body').animate({ scrollTop: 0 }, 'slow');
                    $('#successMSG').slideDown('fast');
                    return;
                }
            }
        });
    }
}

        function selectImg (id,url) {
            localStorage.setItem('imgSet',id);
            $('#imgSet').fadeIn('slow').attr('src',url);
            $('#imgRemover').fadeIn('slow');
            $('#myModal').modal('toggle');
        }


        function deletImg() {
            localStorage.setItem('imgSet','');
            $('#imgSet').fadeOut('fast').attr('src','');
            $('#imgRemover').fadeOut('fast');
        }



  </script>


</body>
</html>
    <?php
}
}
?>