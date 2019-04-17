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
                            <header class="panel-heading">لیست ملکهای من</header>
                            <br>
                            <a href="ajax/exel.php"> <button class="button btn-success">دریافت اکسل</button></a>

                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>عنوان ملک</th>
                                        <th>نوع ملک</th>
                                        <th class="hidden-phone">کد ملک</th>
                                        <th class="hidden-phone">نام مالک</th>
                                        <th class="hidden-phone">سال ساخت</th>
                                        <th class="hidden-phone">نوع معامله</th>
                                        <th class="hidden-phone">منطقه</th>
                                        <th class="hidden-phone">قیمت فروش</th>
                                        <th class="hidden-phone">قیمت رهن</th>
                                        <th class="hidden-phone">قیمت اجاره</th>
                                        <th class="hidden-phone">تاریخ ثبت</th>
                                        <th class="hidden-phone">عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $a = '';
                                $b = '';
                                $adminId = mysqli_real_escape_string($conn,$_SESSION['id']);

                                if($_SESSION['level']=='1') {
                                    $selectListAdmin = mysqli_query($conn,"SELECT * FROM estate WHERE expiry='0'");

                                }elseif($_SESSION['level']=='2' || $_SESSION['level']=='0'){
                                        $selectListAdmin = mysqli_query($conn, "SELECT * FROM estate WHERE
                                        estate.estate_oner='$adminId' AND expiry='0'");
                                }
                                if($_SESSION['level']=='0'){
                                    $selectListAdmin1 = mysqli_query($conn,"SELECT * FROM admin WHERE adminAdminId='$adminId'");
                                    while ($rowAdminSelect = mysqli_fetch_assoc($selectListAdmin1)){
                                        $adminListId = $rowAdminSelect['adminId'];
                                        $selectListAdminSS = mysqli_query($conn, "SELECT * FROM estate WHERE
                                        estate.estate_oner='$adminListId' AND expiry='0'");
                                        while ($rowAdmin = mysqli_fetch_assoc($selectListAdminSS)){
                                            if($rowAdmin['estate_pointId']==''){
                                                $PointName='نامشخص';
                                            }else{
                                                $pointId = $rowAdmin['estate_pointId'];
                                                $selectArea = mysqli_query($conn,"SELECT * FROM area WHERE area_id = '$pointId' ");
                                                $rowArea = mysqli_fetch_assoc($selectArea);
                                                $PointName = $rowArea['area_name'];
                                            }
                                            if($rowAdmin['estate_transaction']=='4'){
                                                $lastTransAction = 'فروش';
                                            }else{
                                                $lastTransAction='رهن و اجاره';
                                            }
                                            if($rowAdmin['estate_type']=='1'){
                                                $lastType ='آپارتمان اداری تجاری';
                                            } if($rowAdmin['estate_type']=='2'){
                                                $lastType ='آپارتمان مسکونی';
                                            } if($rowAdmin['estate_type']=='3'){
                                                $lastType ='پزشکی';
                                            } if($rowAdmin['estate_type']=='4'){
                                                $lastType ='تجاری مغازه';
                                            } if($rowAdmin['estate_type']=='5'){
                                                $lastType ='زمین و ویلایی';
                                            } if($rowAdmin['estate_type']=='6'){
                                                $lastType ='مستقلات';
                                            } if($rowAdmin['estate_type']=='7'){
                                                $lastType ='مشارکت';
                                            }

                                            $cot = "'";
                                            if($rowAdmin['estate_status']==0){
                                                $btn ='<button class="btn-success" onclick="acc('.$cot.$rowAdmin['estate_id'].$cot.')">تایید</button>';
                                            }else{
                                                $btn = '';
                                            }
                                            echo '                                   
                                        <tr class="odd gradeX"  style="cursor: pointer">
                                            <td onclick="goto_postEdit('.$cot.$rowAdmin['estate_id'].$cot.')">'.$rowAdmin['estate_title'].'</td>
                                            <td class="hidden-phone">'.$lastType.'</td>
                                            <td class="hidden-phone">'.$rowAdmin['estate_number'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['estate_userName'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['estate_year'].'</td>
                                            <td class="hidden-phone">'.$lastTransAction.'</td>
                                            <td class="hidden-phone">'.$PointName.'</td>
                                            <td class="hidden-phone">'.$rowAdmin['estate_sale'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['estate_mortgage'].'</td>
                                            <td class="hidden-phone">'.$rowAdmin['estate_rent'].'</td>
                                            <td class="hidden-phone">'.jalali($rowAdmin['estate_regDate']).'</td>
                                            <td class="hidden-phone">
                                            <button class="btn-danger" onclick="deleter('.$cot.$rowAdmin['estate_id'].$cot.')">حذف</button>
                                            <button class="btn-info" onclick="printer('.$cot.$rowAdmin['estate_id'].$cot.')">چاپ</button>
                                        '.$btn.'
                                            </td>
                                        </tr>
                                     ';
                                        }
                                    }
                                }
                                    while ($rowAdmin = mysqli_fetch_assoc($selectListAdmin)) {

                                        if ($rowAdmin['estate_pointId'] == '') {
                                            $PointName = 'نامشخص';
                                        } else {
                                            $pointId = $rowAdmin['estate_pointId'];
                                            $selectArea = mysqli_query($conn, "SELECT * FROM area WHERE area_id = '$pointId'");
                                            $rowArea = mysqli_fetch_assoc($selectArea);
                                            $PointName = $rowArea['area_name'];

                                        }
                                        if ($rowAdmin['estate_transaction'] == '4') {
                                            $lastTransAction = 'فروش';
                                        } else {
                                            $lastTransAction = 'رهن و اجاره';
                                        }

                                        if ($rowAdmin['estate_type'] == '1') {
                                            $lastType = 'آپارتمان اداری تجاری';
                                        }
                                        if ($rowAdmin['estate_type'] == '2') {
                                            $lastType = 'آپارتمان مسکونی';
                                        }
                                        if ($rowAdmin['estate_type'] == '3') {
                                            $lastType = 'پزشکی';
                                        }
                                        if ($rowAdmin['estate_type'] == '4') {
                                            $lastType = 'تجاری مغازه';
                                        }
                                        if ($rowAdmin['estate_type'] == '5') {
                                            $lastType = 'زمین و ویلایی';
                                        }
                                        if ($rowAdmin['estate_type'] == '6') {
                                            $lastType = 'مستقلات';
                                        }
                                        if ($rowAdmin['estate_type'] == '7') {
                                            $lastType = 'مشارکت';
                                        }

                                        $cot = "'";
                                        if ($rowAdmin['estate_status'] == 0) {
                                            $btn = '<button class="btn-success" onclick="acc(' . $cot . $rowAdmin['estate_id'] . $cot . ')">تایید</button>';
                                        } else {
                                            $btn = '';
                                        }
                                        echo '                                   
                                        <tr class="odd gradeX"  style="cursor: pointer">
                                            <td onclick="goto_postEdit(' . $cot . $rowAdmin['estate_id'] . $cot . ')">' . $rowAdmin['estate_title'] . '</td>
                                            <td class="hidden-phone">' . $lastType . '</td>
                                            <td class="hidden-phone">' . $rowAdmin['estate_number'] . '</td>
                                            <td class="hidden-phone">' . $rowAdmin['estate_userName'] . '</td>
                                            <td class="hidden-phone">' . $rowAdmin['estate_year'] . '</td>
                                            <td class="hidden-phone">' . $lastTransAction . '</td>
                                            <td class="hidden-phone">' . $PointName . '</td>
                                            <td class="hidden-phone">' . $rowAdmin['estate_sale'] . '</td>
                                            <td class="hidden-phone">' . $rowAdmin['estate_mortgage'] . '</td>                                           
                                            <td class="hidden-phone">' . $rowAdmin['estate_rent'] . '</td>
                                                                                        <td class="hidden-phone">'.jalali($rowAdmin['estate_regDate']).'</td>
                                            <td class="hidden-phone">
                                            <button class="btn-danger" onclick="deleter(' . $cot . $rowAdmin['estate_id'] . $cot . ')">حذف</button>
                                                                                        <button class="btn-info" onclick="printer('.$cot.$rowAdmin['estate_id'].$cot.')">چاپ</button>
                                            ' . $btn . '
                                            
                                        
                                            </td>
                                        </tr>
                                     ';
                                }
                                ?>

                                </tbody>
                            </table>
                        </section>
                        <div id="printDiv">


                        </div>
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

    function deleter(id) {
        var result = confirm("آیا از حذف اطمینان دارید");

                    if (result) {
                        $.ajax({
                            url: 'ajax/deleteMelk.php',
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            type: 'POST',
                            success: function (data) {
                                if (data['error'] === true) {
                                    $('#userName').css('border', '2px solid red');
                                } else {
                                    window.location.href="melkList.php";
                                }
                            }
                        });
                    } else {
                        // Do nothing; they cancelled
                    }
    }
    function acc(id) {
        $.ajax({
            url: 'ajax/accMelk.php',
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
    function goto_postEdit(id) {
        window.open(
            'editMelk.php?id='+id,
            '_blank' // <- This is what makes it open in a new window.
        );

//        window.location.href = 'editMelk.php?id='+id;

    }

        function printer(id) {
            $.ajax({
                url: 'ajax/getEstatePrint.php',
                data: {
                    id: id
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    var popupWin = window.open('', '_blank', 'width=500,height=800');
                    popupWin.document.open();
                    popupWin.document.write('<html><style>p{float: right;width: 30%;direction: rtl;border-right: 2px solid red;padding-right: 10px}</style><body onload="window.print()">' + data + '</html>');
                    popupWin.document.close();
                }
            });
        }
    $(document).ready(function() {
        document.title = 'لیست ملک';
    });

</script>
</body>
</html>
