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
                                لیست ملکهای من
                            </header>
                            <br>
                            <a href="ajax/exel.php"> <button class="button btn-success">دریافت اکسل</button></a>
<br>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th class="hidden-phone">آدرس</th>
                                        <th class="hidden-phone">شماره تماس</th>
                                        <th class="hidden-phone">نوع ملک</th>
                                        <th class="hidden-phone">توضیحات</th>
                                        <th class="hidden-phone">تاریخ</th>
                                        <th class="hidden-phone">عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);

                                if($_SESSION['level']=='1') {
                                    $selectListAdmin = mysqli_query($conn,"SELECT * FROM contact ");
                                }else {
                                    $selectListAdmin = mysqli_query($conn,"SELECT * FROM contact WHERE
            contactAdminId='$adminId' ");
                                }
                                while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)){
                                    $id = $rowAdmin['contactId'];
                                    $year = substr($id,0,4);
                                    $month=substr($id,4,2);
                                    $day=substr($id,6,2);
                                    $date = $year."/".$month."/".$day;

                                    $cot = "'";
                                     echo '                                   
                                        <tr class="odd gradeX" onclick="" style="cursor: pointer">
                                            <td>'.$rowAdmin['contactData1'].'</td>
                                            <td>'.$rowAdmin['contactData2'].'</td>
                                            <td>'.$rowAdmin['contactData3'].'</td>
                                            <td>'.$rowAdmin['contactData4'].'</td>
                                            <td>'.$rowAdmin['contactData5'].'</td>
                                            <td>'.jalali($date).'</td>
                                            <td><button type="button" onclick="deleteContact(' . $cot . $rowAdmin['contactId'] . $cot . ')" class="btn btn-danger btn-sm">حذف</button></td>
                                            
                                        </tr>
                                     ';
                                }

                                ?>


                                </tbody>
                            </table>

                            <script>
                                function deleteContact(id) {
                                    $.ajax({
                                        url: 'ajax/deleteContact.php',
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

        window.location.href = 'editMelk.php?id='+id;

    }

</script>
</body>
</html>
