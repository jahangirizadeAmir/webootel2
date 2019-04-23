<?php
if(isset($_GET['id']) && $_GET['id']!='') {
include 'inc/inc.php';
$postId = mysqli_real_escape_string($conn, $_GET['id']);
$selectPost = mysqli_query($conn, "SELECT * FROM module WHERE moduleId = '$postId'");
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
                                ویرایش ماژول
                            </header>
                            <div class="panel-body">

                                        <div class="panel-body">
                                            <div class="alert alert-success fade in" id="successMSG" style="display: none" >
                                                <button data-dismiss="alert" class="close close-sm" type="button">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                ماژول با موفقیت ویرایش شد.
                                            </div>

                                            <form class="form-horizontal tasi-form" method="get">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name" value="<?php echo $rowPost['moduleName'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">مادر</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control input-lg m-bot4" id="parent">
                                                            <option value="" selected >منو اصلی</option>
                                                            <?php
                                                            $selectAdminJobsSet = mysqli_query($conn,"SELECT * FROM collection");

                                                            while ($rowAdminSet = mysqli_fetch_assoc($selectAdminJobsSet)){
                                                                if ($rowAdminSet['collectionId']==$rowAdminSet['moduleCollectionId']){
                                                                    $selected = 'selected';
                                                                }else{
                                                                    $selected = '' ;
                                                                }
                                                                echo '
                                                     <option value="'.$rowAdminSet['collectionId'].'" '.$selected.'>'.$rowAdminSet['collectionName'].'</option>';
                                                            }
                                                            ?>
                                                        </select>                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <section class="panel">
                                                            <header class="panel-heading">
                                                                متن ماژول

                                                            </header>
                                                            <div class="panel-body">
                                                                <div class="form">
                                                                    <form action="#" class="form-horizontal">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control ckeditor" name="TEXT" id="TEXT" rows="6"><?php echo $rowPost['moduleText'];?></textarea>
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
<script type="text/javascript" src="assets/ckeditor/config3.js"></script>


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
            $('#name').css('border','1px solid #e2e2e4');
            $('#successMSG').slideUp('fast');
        }







function submit_post() {
    border_defult();
    var y = 0;
    var name,text;
    name = $('#name').val();
    text = CKEDITOR.instances["TEXT"].getData();
    var parent = $('#parent option:selected').val();

    var id ='<?php echo $_GET['id'] ?>';

    if(name===''){
        $('#name').css('border','2px solid red');
        y = 1;
    }
    if(y===0){
        $.ajax({
            url: 'ajax/editModule.php',
            data: {
                name:name,
                id:id,
                parent:parent,
                text:text

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