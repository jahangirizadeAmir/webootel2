<?php
include "inc/header.php";


?>

        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                ثبت دسته بندی
                            </header>


                            <section class="panel-body">


                                <div class="alert alert-success"
                                     id="error"
                                     style="display: none"
                                >دسته بندی با موفقیت اضافه شد</div>

                            <div class="row" style="padding: 20px 100px 20px 100px;" id="form">
                               <input type="text"
                                      class="form-control"
                                      id="number"
                                      placeholder="نام دسته بندی">
                                <h4 id="result" style="display: none;"></h4>
                                <br>
                                <br>
                                <input type="button" class="btn btn-primary" id="add" style="display: none" value="ثبت وکیل جدید">
                                <input type="button" id="submit" value="ثبت" class="btn btn-large btn-primary" style="margin-top: 20px">
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                مدیریت دسته بندی ها
                            </header>
                            <section class="panel-body">
                            <div class="row" style="padding: 20px 100px 20px 100px;" id="form">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>ردیف</td>
                                            <td>نام دسته بندی</td>
                                            <td>تعداد خبر</td>
                                            <td>عملیات</td>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $r = $db::Query("SELECT * FROM cat");
                                    $i =1;
                                    $cot="'";
                                    while ($RowR = mysqli_fetch_assoc($r)){

                                        $catId = $RowR['catId'];
                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td><input id="txt'.$catId.'" type="text" value="'.$RowR['catName'].'"></td>
                                            <td>'.$db::Query("SELECT * FROM news where newsCatId='$catId'",$db::$NUM_ROW).'</td>
                                            <td><span style="cursor: pointer;color:blue;"  onclick="edit('.$cot.$catId.$cot.')">ویرایش</span></td>
                                        </tr>';
                                        $i++;
                                    }
                                    ?>

                                    </tbody>
                                </table>

                            </div>
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
    $("#submit").on("click",function () {
        var from;
        from = $('#number').val();

        $.ajax({
            url:"request/addCat.php",
            type:"POST",
            dataType:"json",
            data:{
                name:from
            },
            success: function (data) {
                if(data['error']===true){

                }else{
                    $('#error').show();
                }
            }
        });

    });

    function edit(id) {
        var text = $('#txt'+id).val();
        $.ajax({
            url:"request/EditCat.php",
            type:"POST",
            dataType:"json",
            data:{
                name:text,
                id:id
            },
            success: function (data) {

            }
        });

    }

</script>

</body>
</html>
