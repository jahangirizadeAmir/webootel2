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
                                لیست ماژول ها
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>


                                    <tr>
                                        <th>نام ماژول</th>
                                        <th class="hidden-phone">کد ماژول</th>
                                    </tr>



                                </thead>
                                <tbody>

                                <?php
                                $Select_mj = mysqli_query($conn,"SELECT * FROM module");
                                $cot = "'";
                                while ($row = mysqli_fetch_assoc($Select_mj)){
                                    echo '                                   
                                        <tr class="odd gradeX" onclick="goto_module('.$cot.$row['moduleId'].$cot.')" style="cursor: pointer">
                                            <td>'.$row['moduleName'].'</td>
                                            <td class="hidden-phone">'.$row['moduleCode'].'</td>
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

    function goto_module(id) {
        window.location.href = 'edit_module.php?id='+id;
    }

</script>
</body>
</html>
