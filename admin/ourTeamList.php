<?php
/**
 * artiash.com
 */

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
                                        <th class="hidden-phone">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $cot = "'";
                                $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);
                                $selectListAdmin = mysqli_query($conn,"SELECT * FROM ourteam");
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                     echo '                                   
                                        <tr class="odd gradeX" id="'.$rowAdmin['ourTeamId'].'" onclick="" style="cursor: pointer">
                                            <td>'.$rowAdmin['ourTeamName'].'</td>
                                            <td><button type="button" onclick="deleteContact(' . $cot . $rowAdmin['ourTeamId'] . $cot . ')" class="btn btn-danger btn-sm">حذف</button></td>
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
    function deleteContact(id) {
        $.ajax({
            url: 'ajax/deleteOurTeam.php',
            data: {
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data['error'] === true) {
                } else {
                    $('#'+id).hide('fast');
                    return;
                }
            }
        });
    }
</script>
</body>
</html>
