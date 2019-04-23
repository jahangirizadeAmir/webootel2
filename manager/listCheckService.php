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
                                لیست وکلا
                         
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th class="hidden-phone">شماره موبایل</th>
                                        <th class="hidden-phone">تلفن</th>
                                        <th class="hidden-phone">نوع سرویس</th>
                                        <th class="hidden-phone">آدرس</th>
                                        <th class="hidden-phone">تاریخ - زمان</th>
                                        <th class="hidden-phone">وضعیت</th>
                                        <th class="hidden-phone">توضیحات</th>
                                        <th class="hidden-phone">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>


                                <?php
                                $select = "SELECT * FROM checkService";
                                $rowLawyer = $db::Query($select);
                                while ($row = mysqli_fetch_assoc($rowLawyer)){
                                    switch ($row['serviceModel']){
                                        case "1":
                                            $model = "ADSL";
                                            break;
                                        case "2":
                                            $model = "Wireless";
                                            break;
                                        case "3":
                                            $model="TDLTE";
                                            break;
                                        default:
                                            $model = "ADSL";
                                    }
                                    if($row['serviceOk']=="1"){
                                        $result ='تایید شده';
                                    }else if ($row['serviceOk']=="0"){
                                        $result ='تایید نشده';
                                    }else{
                                        $result ='بررسی نشده';
                                    }
                                ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $row['serviceName'] ?></td>
                                        <td><?php echo $row['serviceMobile'] ?></td>
                                        <td><?php echo $row['serviceTell'] ?></td>
                                        <td><?php echo $model ?></td>
                                        <td><?php echo $row['serviceAddress'] ?></td>
                                        <td><?php echo $db::G2J($row['serviceDate']).
                                                '-'.$row['serviceTime'] ?></td>
                                        <td><?php echo $result ?></td>
                                        <td><?php echo $row['serviceDesc'] ?></td>
                                        <td><span onclick="check('<?php echo $row['serviceId']?>')">بررسی</span></td>
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
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تعیین وضعیت</h4>
            </div>
            <div class="modal-body">
                <select class="form-control" id="status">
                    <option value="1">تایید شد</option>
                    <option value="0">عدم تایید</option>
                </select>
                <br>
                <input class="form-control" id="desc" type="text" placeholder="توضیحات">
                <input class="form-control"
                       id="code"
                       style="display: none"
                       type="text"
                       placeholder="توضیحات">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                <button type="button" class="btn btn-primary" id="sendRequest" data-dismiss="modal">تایید</button>
            </div>
        </div>

    </div>
</div>
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
    function check(id) {
        $('#myModal').modal('show');
        $('#code').val(id);

    }
    $('#sendRequest').on('click',function (){

        var id,desc,status;
        id =  $('#code').val();
        status =  $('#status').val();
        desc =  $('#desc').val();

        $.ajax({
            url:"request/checkService.php",
            type:"POST",
            dataType:"json",
            data:{
                status:status,
                desc:desc,
                id:id
            },
            success: function (data) {

            }
        });
    });
</script>
</body>
</html>
