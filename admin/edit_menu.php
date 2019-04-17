<?php
if (isset($_GET['id']) && $_GET['id'] != '') {
    include 'inc/inc.php';
    $menuId = mysqli_real_escape_string($conn, $_GET['id']);
    $selectMenu = mysqli_query($conn, "SELECT * FROM menu WHERE menu.menuId = '$menuId'");
    if (mysqli_num_rows($selectMenu) == 1) {
        $rowMenu = mysqli_fetch_assoc($selectMenu);
        $menuName = $rowMenu['menuName'];

        ?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                ویرایش منو
                            </header>
                            <div class="panel-body">

                                <div class="panel-body">
                                    <div class="alert alert-success fade in" id="successMSG" style="display: none">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="icon-remove"></i>
                                        </button>
                                        منو با موفقیت ویرایش شد.
                                    </div>

                                    <form class="form-horizontal tasi-form" method="get">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">نام منو</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" value="<?php echo $menuName?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">مادر</label>
                                            <div class="col-sm-10">
                                                <select class="form-control input-lg m-bot4" id="parent">
                                                    <option value="" selected>منو اصلی</option>
                                                    <?php
                                                    $menuParentId = $rowMenu['menuParent'];
                                                    $selectAdminJobsSet = mysqli_query($conn, "SELECT * FROM menu WHERE menuId != '$menuId'");
                                                    while ($rowAdminSet = mysqli_fetch_assoc($selectAdminJobsSet)) {
                                                        if($rowAdminSet['menuId'] == $menuParentId){
                                                            echo '
                                                     <option value="' . $rowAdminSet['menuId'] . '" selected>' . $rowAdminSet['menuName'] . '</option>';
                                                        }else {
                                                            echo '
                                                     <option value="' . $rowAdminSet['menuId'] . '">' . $rowAdminSet['menuName'] . '</option>';
                                                        }

                                                    }
                                                    ?>
                                                </select></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">آیکن</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="icon" value="<?php echo $rowMenu['menuIcon']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">هدف</label>
                                            <div class="col-sm-10">
                                                <select class="form-control input-lg m-bot4" id="target">
                                                    <option value="" selected>انتخاب کنید</option>
                                                    <?php
                                                    $type = $rowMenu['menuType'];
                                                    $target = $rowMenu['menuTarget'];
                                                    $selectAdminJobsSet = mysqli_query($conn, "SELECT * FROM post WHERE postParent = ''");
                                                    while ($rowAdminSet = mysqli_fetch_assoc($selectAdminJobsSet)) {
                                                        if($type=='1' && $target == $rowAdminSet['postId']){
                                                            echo '
                                                     <option value="1' . $rowAdminSet['postId'] . '" selected>' . $rowAdminSet['postName'] . '</option>';

                                                        }else{
                                                            echo '
                                                     <option value="1' . $rowAdminSet['postId'] . '">' . $rowAdminSet['postName'] . '</option>';

                                                        }

                                                    }
                                                    ?>
                                                    <option value="" disabled>--------</option>
                                                    <?php
                                                    $selectAdminJobsSet = mysqli_query($conn, "SELECT * FROM collection");
                                                    while ($rowAdminSet = mysqli_fetch_assoc($selectAdminJobsSet)) {
                                                       if($type=='2' && $target == $rowAdminSet['collectionId']){
                                                           echo '
                                                     <option value="2' . $rowAdminSet['collectionId'] . '" selected>' . $rowAdminSet['collectionName'] . '</option>';

                                                       }else{
                                                           echo '
                                                     <option value="2' . $rowAdminSet['collectionId'] . '">' . $rowAdminSet['collectionName'] . '</option>';

                                                       }

                                                    }
                                                    ?>
                                                </select></div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="button" onclick="submit_admin('<?php echo $menuId ?>')" class="btn btn-success">
ویرایش
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


        <script>

            function border_defult() {
                $('#name').css('border', '1px solid #e2e2e4');
                $('#successMSG').slideUp('fast');

            }

            function submit_admin(id) {
                border_defult();
                var y = 0;
                var name, icon, parent, target;
                icon = $('#icon').val();
                name = $('#name').val();
                parent = $('#parent option:selected').val();
                target = $('#target option:selected').val();
                if (name === '') {
                    $('#name').css('border', '2px solid red');
                    y = 1;
                }
                if (y === 0) {
                    $.ajax({
                        url: 'ajax/editMenu.php',
                        data: {
                            icon: icon,
                            parent: parent,
                            target: target,
                            name: name,
                            id:id
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            if (data['error'] === false) {
                                $('html,body').animate({scrollTop: 0}, 'slow');
                                $('#successMSG').slideDown('fast');
                            }
                        }
                    });
                }
            }

        </script>


        </body>
        </html>
        <?php

    }else{
        header('location:index.php');
    }
}else{
    header('location:index.php');
}
?>