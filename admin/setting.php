<?php
include 'inc/inc.php';
$select = mysqli_query($conn,"SELECT * FROM setting");
$rowGet = mysqli_fetch_assoc($select);
?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                تنظیمات سیستم
                            </header>
                            <div class="panel-body">

                                        <div class="panel-body">
                                            <div class="alert alert-success fade in" id="successMSG" style="display: none" >
                                                <button data-dismiss="alert" class="close close-sm" type="button">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                تنظیمات ویرایش شد.
                                            </div>

                                            <form class="form-horizontal tasi-form" method="get">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Head</label>
                                                    <div class="col-sm-10">
                                                        <textarea  class="form-control" id="head" cols="8" rows="20">
                                                            <?php
                                                            echo $rowGet['settingHead']
                                                            ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">header</label>
                                                    <div class="col-sm-10">
                                                        <textarea  class="form-control" id="header" cols="8" rows="20">
                                                            <?php
                                                            echo $rowGet['settingHeader']
                                                            ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="button" onclick="submit_admin()" class="btn btn-success">ثبت تغییرات</button>
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



    <script>
        function border_defult() {
            $('#head').css('border','1px solid #e2e2e4');
            $('#header').css('border','1px solid #e2e2e4');
            $('#successMSG').slideUp('fast');

        }
function submit_admin() {
    border_defult();

    var y = 0;
    var head,header;
    head = $('#head').val();
    header = $('#header').val();

    if(head===''){
        $('#head').css('border','2px solid red');
         y = 1;
    }if(header===''){
        $('#header').css('border','2px solid red');
        y = 1;
    }
    if(y===0){

        $.ajax({
            url: 'ajax/setting.php',
            data: {
                header: header,
                head: head
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

  </script>


</body>
</html>
