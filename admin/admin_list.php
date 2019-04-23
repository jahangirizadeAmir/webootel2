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
                            <th>نام و نام خانوادگی</th>
                            <th class="hidden-phone">پست الکترونیکی</th>
                            <th class="hidden-phone">موبایل</th>
                            <th class="hidden-phone">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $cot = "'";
                        $adminId = mysqli_real_escape_string($conn, $_SESSION['id']);
                            $selectListAdmin = mysqli_query($conn, "SELECT * FROM admin WHERE adminId!='$adminId'");
                            while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)) {
                                    $btn = '<button class="btn btn-danger" onclick="deactive(' . $cot . $rowAdmin['adminId'] . $cot . ')">غیر فعال</button>';
                                    $btn = '<button class="btn btn-info" onclick="deactive(' . $cot . $rowAdmin['adminId'] . $cot . ')">فعال سازی</button>';

                                echo '                                   
                                        <tr class="odd gradeX"  style="cursor: pointer">
                                            <td onclick="goto_profleAdmin(' . $cot . $rowAdmin['adminId'] . $cot . ')">' . $rowAdmin['adminName'] . ' ' . $rowAdmin['adminLastName'] . '</td>
                                            <td class="hidden-phone">' . $rowAdmin['adminEmail'] . '</td>
                                            <td class="center hidden-phone">' . $rowAdmin['adminMobile'] . '</td>
                                            <td class="center hidden-phone">
                                            ' . $btn . '

                                           </td>
                                        </tr>
                                     ';
                        }?>



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

        window.location.href = 'profile.php?id=' + id.toString();

    }

    function deactive(id) {
        $.ajax({
            url: 'ajax/deactiveAdmin.php',
            data: {
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data['error'] === true) {
                } else {
                    location.reload();
                }
            }
        });
    }

</script>
</body>
</html>
