<?php
/**
 * artiash.com
 */

include 'inc/inc.php';

?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel panel-primary">
                            <header class="panel-heading">
                                لیست در خواست ها
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th class="hidden-phone">منطقه</th>
                                        <th class="hidden-phone">از قیمت</th>
                                        <th class="hidden-phone">تا قیمت</th>
                                        <th class="hidden-phone">شماره تماس اول</th>
                                        <th class="hidden-phone">شماره تماس دوم</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $cot="'";
                                $selectListAdmin = mysqli_query($conn,"SELECT * FROM formrecorder");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                    echo '
                                    <tr class="odd gradeX" onclick="goto_postEdit('.$cot.$rowAdmin['formId'].$cot.')" style="cursor: pointer">
                                            <td>'.$rowAdmin['address'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['from1'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['upTo'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['numOne'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['numTwo'].'</td>
                                            
                                        </tr>';

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

</script>
</body>
</html>
