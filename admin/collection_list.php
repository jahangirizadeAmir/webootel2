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
                                لیست مجموعه
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>نام مجموعه</th>
                                        <th class="hidden-phone">تیتر مجموعه</th>
                                        <th class="hidden-phone">نمای ظاهری</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $selectListAdmin = mysqli_query($conn,"SELECT * FROM collection");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                    $lastPostId = $rowAdmin['collectionParent'];
                                    $selectMenuName = mysqli_query($conn,"SELECT * FROM collectionstyle WHERE collectionStyleId = '$lastPostId'");
                                    $rowMenuParent = mysqli_fetch_assoc($selectMenuName);
                                    $parentName = $rowMenuParent['collectionStyleName'];

                                    $cot = "'";
                                     echo '                                   
                                        <tr class="odd gradeX" onclick="goto_collectionEdit('.$cot.$rowAdmin['collectionId'].$cot.')" style="cursor: pointer">
                                            <td>'.$rowAdmin['collectionName'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['collectionTitle'].'</td>
                                            <td class="hidden-phone">'.$parentName.'</td>
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

    function goto_collectionEdit(id) {

        window.location.href = 'edit_collection.php?id='+id;

    }

</script>
</body>
</html>
