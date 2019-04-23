<?php

    include 'inc/inc.php';

?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                لیست مطالب
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>نام مطلب</th>
                                        <th class="hidden-phone">تیتر مطلب</th>
                                        <th class="hidden-phone">دسته بندی</th>
                                        <th class="hidden-phone">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $selectListAdmin = mysqli_query($conn,"SELECT * FROM post");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                    $lastPostId = $rowAdmin['postParent'];
                                    $selectMenuName = mysqli_query($conn,"SELECT * FROM collection WHERE collectionId = '$lastPostId'");
                                    if(mysqli_num_rows($selectMenuName)==1) {
                                        $rowMenuParent = mysqli_fetch_assoc($selectMenuName);
                                        $parentName = $rowMenuParent['collectionName'];
                                    }else{
                                        $parentName = 'پست اصلی';
                                    }

                                    $cot = "'";
                                     echo '                                   
                                        <tr class="odd gradeX" onclick="goto_postEdit('.$cot.$rowAdmin['postId'].$cot.')" style="cursor: pointer">
                                            <td>'.$rowAdmin['postName'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['postTitle'].'</td>
                                            <td class="hidden-phone">'.$parentName.'</td>
                                            <td class="hidden-phone ">
                                            <button class="btn-danger btn" onclick="deleter('.$cot.$rowAdmin['postId'].$cot.')">حذف</button>
                                        
                                            </td>
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

<script>

    function goto_postEdit(id) {

        window.location.href = 'edit_post.php?id='+id;

    }

    function deleter(id) {
        $.ajax({
            url: 'ajax/deletePost.php',
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
</body>
</html>
