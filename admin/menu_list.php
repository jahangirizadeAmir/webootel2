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
                                لیست مدیران
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>نام منو</th>
                                        <th class="hidden-phone">مادر</th>
                                        <th class="hidden-phone">هدف</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
                                $selectListAdmin = mysqli_query($conn,"SELECT * FROM menu");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                    $lastMenuId = $rowAdmin['menuParent'];
                                    $selectMenuName = mysqli_query($conn,"SELECT * FROM menu WHERE menuId = '$lastMenuId'");
                                    if(mysqli_num_rows($selectMenuName)==1) {
                                        $rowMenuParent = mysqli_fetch_assoc($selectMenuName);
                                        $menuName = $rowMenuParent['menuName'];
                                    }else{
                                        $menuName = 'منو اصلی';
                                    }
                                    if($rowAdmin['menuType']=='1'){
                                        $target= 'پست:  ';
                                        $postId = $rowAdmin['menuTarget'];
                                        $selectPost = mysqli_query($conn,"SELECT * FROM post WHERE postId = '$postId'");
                                        $rowPost = mysqli_fetch_assoc($selectPost);
                                        $postName = $rowPost['postName'];
                                        $target .= $postName;
                                    }elseif ($rowAdmin['menuType']=='2'){
                                        $target= 'مجموعه:  ';
                                        $postId = $rowAdmin['menuTarget'];
                                        $selectPost = mysqli_query($conn,"SELECT * FROM collection WHERE collectionId = '$postId'");
                                        $rowPost = mysqli_fetch_assoc($selectPost);
                                        $postName = $rowPost['collectionName'];
                                        $target .= $postName;
                                    }else{
                                        $target = 'بدون هدف';
                                    }
$cot = "'";
                                     echo '                                   
                                        <tr class="odd gradeX" onclick="goto_profleAdmin('.$cot.$rowAdmin['menuId'].$cot.')" style="cursor: pointer">
                                            <td>'.$rowAdmin['menuName'].'</td>
                                            <td class="hidden-phone">'.$menuName.'</td>
                                            <td class="hidden-phone">'.$target.'</td>
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

    function goto_profleAdmin(id) {

        window.location.href = 'edit_menu.php?id='+id;

    }

</script>
</body>
</html>
