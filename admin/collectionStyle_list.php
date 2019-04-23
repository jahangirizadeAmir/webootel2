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
                                لیست ظاهر مجموعه
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>نام ظاهر</th>
                                        <th class="hidden-phone">تعداد پست ها</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $selectListAdmin = mysqli_query($conn,"SELECT * FROM collectionstyle");
                                $cot = "'";
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                     echo '                                   
                                        <tr class="odd gradeX" onclick="goto_collectionEdit('.$cot.$rowAdmin['collectionStyleId'].$cot.')" style="cursor: pointer">
                                            <td>'.$rowAdmin['collectionStyleName'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['collectionStylePageCount'].'</td>
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

        window.location.href = 'edit_collectionStyle.php?id='+id;

    }

</script>
</body>
</html>
