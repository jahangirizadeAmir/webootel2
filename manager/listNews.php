<?php
include "inc/header.php"
?>

        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                لیست اخبار
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>شماره</th>
                                        <th class="hidden-phone">عنوان</th>
                                        <th class="hidden-phone">تاریخ</th>
                                        <th class="hidden-phone">عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>


                                <?php
                                $select = "SELECT * FROM news";
                                $i='1';
                                $rowLawyer = $db::Query($select);
                                while ($row = mysqli_fetch_assoc($rowLawyer)){
                                ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['newsTitle'] ?></td>
                                        <td><?php echo $db::G2J($row['newsRegDate']) ?></td>
                                        <td>
                                            <a href="editNews.php?id=<?php echo $row['newsId']?>">ویرایش</a>
                                            \
                                            <a href="request/deleteNews.php?id=<?php echo $row['newsId']?>">حذف</a>
                                        </td>

                                    </tr>



                                <?php
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


</body>
</html>
