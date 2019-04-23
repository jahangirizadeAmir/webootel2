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
                                لیست کاربران
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>نام و نام خانوادگی</th>
                                        <th class="hidden-phone">شماره تلفن همراه</th>
                                        <th class="hidden-phone">پست الکترونیکی</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
                                $selectListAdmin = mysqli_query($conn,"SELECT * FROM user");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                     echo '                                   
                                        <tr class="odd gradeX" onclick="" style="cursor: pointer">
                                            <td>'.$rowAdmin['user_name'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['user_mobile'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['user_email'].'</td>
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

        window.location.href = 'profile.php?id='+id;

    }

</script>
</body>
</html>
