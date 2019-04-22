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
                                ثبت قرارداد
                            </header>

                            <div class="row" style="padding:20px 100px 20px 100px ;display: none" id="printer">

                                <p>تعداد
                                    <span id="count">3</span>
                                    عدد قرارداد به
                                    <span id="namePrint">رضا</span>
                                    به شماره پروانه
                                    <span id="numberPrint">۲۲۲</span></p>
                                <p>از شماره
                                    <span id="start">۱۱۰</span>
                                    <span id="serial">الف</span>
                                    تا شماره
                                    <span id="end">۱۴۰</span>
                                    <span id="duplication">

                                    </span>
                                    تحویل گردید
                                و مبلغ <span id="price">۵۰۰۰</span> از ایشان دریافت گردید</p>
                                <input type="button" value="چاپ" class="btn btn-primary" onclick="printer()">
                                <script>
                                    function printer() {


                                                var a = $('#printer').html();
                                                var popupWin = window.open('', '_blank', 'width=500,height=800');
                                                popupWin.document.open();
                                                popupWin.document.write('<html><style>p{direction: rtl}</style><body onload="window.print()">' + a + '</html>');
                                                popupWin.document.close();

                                    }
                                </script>

                            </div>
                            <div class="row" style="padding: 20px 100px 20px 100px;" id="form">
                               <input type="text"
                                      class="form-control"
                                      id="number"
                                      placeholder="شماره پروانه">
                                <h4 id="result" style="display: none;"></h4>
                                <br>
                                <br>
                                <input type="button" class="btn btn-primary" id="add" style="display: none" value="ثبت وکیل جدید">
                                <br>
                                <br>

                                <div class="col-md-12 col-lg-12" style="display: none" id="addDiv">
                                    <input type="text" placeholder="نام" id="name" class="form-control">
                                    <br>
                                    <input type="text" placeholder="نام خانوادگی" id="family" class="form-control">
                                    <br>
                                    <input type="text" placeholder="کدملی" id="nationalCode" class="form-control">
                                    <br>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="" id="Guest">وکیل مهمان</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="" id="Intern">کارآموز</label>
                                    </div>
                                    <br>
                                    <input style="display: none" type="text" placeholder="شهر محل وکالت" id="city" class="form-control">
                                    <br>
                                </div>

                                <div class="col-md-6 col-lg-6" style="padding:1px">
                                    <div class="col-md-4">
                                        <select class="form-control" id="sort">
                                            <option disabled selected>سری</option>
                                            <option value="الف">الف</option>
                                            <option value="ب">ب</option>
                                            <option value="پ">پ</option>
                                            <option value="ت">ت</option>
                                            <option value="ث">ث</option>
                                            <option value="ج">ج</option>
                                            <option value="چ">چ</option>
                                            <option value="ح">ح</option>
                                            <option value="خ">خ</option>
                                            <option value="د">د</option>
                                            <option value="ذ">ذ</option>
                                            <option value="ر">ر</option>
                                            <option value="ز">ز</option>
                                            <option value="ژ">ژ</option>
                                            <option value="س">س</option>
                                            <option value="ش">ش</option>
                                            <option value="ص">ص</option>
                                            <option value="ض">ض</option>
                                            <option value="ط">ط</option>
                                            <option value="ظ">ظ</option>
                                            <option value="ع">ع</option>
                                            <option value="غ">غ</option>
                                            <option value="ف">ف</option>
                                            <option value="ق">ق</option>
                                            <option value="ک">ک</option>
                                            <option value="گ">گ</option>
                                            <option value="ل">ل</option>
                                            <option value="م">م</option>
                                            <option value="ن">ن</option>
                                            <option value="و">و</option>
                                            <option value="ه">ه</option>
                                            <option value="ی">ی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" id="from" placeholder="از" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6" style="padding: 1px;">
                                    <input type="text" class="form-control" id="to" placeholder="تا">
                                </div>
                                <input type="button" id="submit" value="ثبت" class="btn btn-large btn-primary" style="margin-top: 20px">
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
        var name,family,number,guest,intern,sort,from,to,NCode,city;
        name = $('#name').val();
        NCode = $('#nationalCode').val();
        family = $('#family').val();
        city= $('#city').val();
        number = $('#number').val();
        if($('#Guest').prop('checked')){
           guest="1";
        }else{
            guest="0";
        }
        if($('#Intern').prop('checked')){
           intern="1";
        }else{
            intern="0";
        }
        if(guest==="0"){
            city='مهمان نیست';
        }
        sort = $('#sort').val();
        from = $('#from').val();
        to = $('#to').val();

        $('#form').hide();
        $('#printer').show();

        $.ajax({
            url:"request/addContract.php",
            type:"POST",
            dataType:"json",
            data:{
                number:number,
                name:name,
                city:city,
                family:family,
                guest:guest,
                intern:intern,
                sort:sort,
                from:from,
                to:to,
                NCode:NCode,
            },
            success: function (data) {
                if(data['error']===true){
                    alert(data['MSG']);
                }else{
                    $('#form').hide();
                    $('#printer').show();
                }
            }
        });

    });
    $('#number').on('keyup keypress keydown cut delete paste',function () {
        var number = $('#number').val();
        $.ajax({
            url:"request/getLawyer.php",
            type:"POST",
            dataType:"json",
            data:{
             number:number
            },
            success: function (data) {
                if(data["result"]){
                    $('#result').show().html(data['name']+" "+data["family"]+" با کد ملی "+data["NationalCode"]);

                    $("#add").hide();
                    $("#addDiv").hide();
                    $("#number").css("border","1px solid #e2e2e4");
                }else{
                    $("#number").css("border","2px solid red");
                    $("#add").show();
                }
            }
        });
    });
    $("#add").on('click',function () {
        $("#addDiv").show("slow");
    });

    $("#Guest").change(function() {
        if(this.checked) {
            $('#city').show();
        }else{
            $('#city').hide();
        }
    });
</script>

</body>
</html>
