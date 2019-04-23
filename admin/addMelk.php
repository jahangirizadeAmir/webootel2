<?php
/**
 * artiash.com
 */

include 'inc/inc.php';
/**
 * artiash.com
 */
/*
 * Created by PhpStorm.
 * User: amir
 * Date: 10/10/2017
 * Time: 2:45 PM
 */
?>
<style>
    .cropit-preview-image {
        border-radius: 0px !important;
    }
    .cropit-preview-image-container {
        border-radius: 0px !important;
    }
    .cropit-preview {
        margin: auto;
        background: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 0px;
        margin-top: 7px;
        width: 250px !important;
        height: 250px !important;
    }
    .cropit-preview-image-container {
        cursor: move;
    }
    .cropit-preview-background {
        opacity: .2;
        cursor: auto;
    }
    div#cropit-preview {
        width: 741px !important;
        height: 142px !important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-primary">
                    <header class="panel-heading">
                        ثبت ملک جدید
                    </header>
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="alert alert-success fade in" id="successMSG" style="display: none">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                ملک با موفقیت در سیستم اضافه شد.
                            </div>
                            <form class="form-horizontal tasi-form" method="get">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نوع معامله</label>
                                    <div class="col-sm-10">
                                        <select class="col-sm-12" onchange="getTransaction()" id="transaction">
                                            <option value="4">خرید و فروش</option>
                                            <option value="3">رهن و اجاره</option>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    function getTransaction(){
                                        var transaction = $('#transaction option:selected').val();
                                        if (transaction === "4"){
                                            $("#price").removeAttr('disabled').val();
                                            $("#priceSize").removeAttr('disabled').val();
                                            $("#rent").attr('disabled', 'disabld').val(0);
                                            $("#mortgage").attr('disabled', 'disabld').val(0);
                                        }else if (transaction === "3"){
                                            $("#price").attr('disabled', 'disabld').val(0);
                                            $("#priceSize").attr('disabled', 'disabld').val(0);
                                            $("#rent").removeAttr('disabled').val();
                                            $("#mortgage").removeAttr('disabled').val();
                                        }
                                    }
                                </script>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نوع ملک</label>
                                    <div class="col-sm-10">
                                        <select class="col-sm-12" onchange="checkThis()" id="type">
                                            <option value="1">آپارتمان اداری تجاری</option>
                                            <option value="2">آپارتمان مسکونی</option>
                                            <option value="3">پزشکی</option>
                                            <option value="4">تجاری مغازه</option>
                                            <option value="5">زمین و ویلایی</option>
                                            <option value="6">مشارکت در ساخت</option>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    function checkThis() {
                                        var model = $('#type').val();
                                        if(model==='4'){
                                            $('#areaFloorDiv').show();
                                            $('#areaBalkoonDiv').show();
                                        }else{
                                            $('#areaFloorDiv').hide();
                                            $('#areaBalkoonDiv').hide();
                                        }
                                    }
                                </script>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">منطقه</label>
                                    <div class="col-sm-10">
                                        <select class="col-sm-12" id="aria">
                                            <?php
                                            $selecTCity = mysqli_query($conn, "SELECT * FROM area WHERE area_cityId='1'");
                                            while ($RowCity = mysqli_fetch_assoc($selecTCity)) {
                                                echo '<option value="' . $RowCity['area_id'] . '">' . $RowCity['area_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام و نام خانوادگی مالک:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> شماره موبایل مالک:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام و شماره موبایل مستاجر:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="renterMobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> نام و شماره موبایل مشاور:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="agentMobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">خیابان اصلی:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="street" placeholder="مثلا اردیبهشت">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">خیابان فرعی:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" placeholder="مثلا بین آذر و دی">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">پلاک:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="num">
                                    </div>
                                </div>

                                <div class="form-group" style="display: none" id="areaFloorDiv">
                                    <label class="col-sm-2 control-label">متراژ کف:</label>
                                    <div class="col-sm-10">
                                        <input etype="Number" type="number" class="form-control" id="areaFloor">
                                    </div>
                                </div>
                                <div class="form-group" style="display: none" id="areaBalkoonDiv">
                                    <label class="col-sm-2 control-label">متراژ بالکن:</label>
                                    <div class="col-sm-10">
                                        <input etype="Number" type="number" class="form-control" id="areaBalkoon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">متراژ:</label>
                                    <div class="col-sm-10">
                                        <input etype="Number" type="number" class="form-control" id="area">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">سال ساخت</label>
                                    <div class="col-sm-10">
                                        <input etype="Number" type="number" class="form-control" id="year">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">تعداد اتاق</label>
                                    <div class="col-sm-10">
                                        <input etype="Number" type="number" class="form-control" id="bedroom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">تعداد واحد</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="unit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">تعداد طبقه</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="unitFloor">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> طبقه</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" id="floor">
                                    </div>
                                    <label class="checkbox-inline"><input type="checkbox" id="floorModelBack" value="">واحد عقب</label>
                                    <label class="checkbox-inline"><input type="checkbox" id="floorModelFront" value="">واحد جلو</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">قیمت فروش متری:</label>
                                    <div class="col-sm-10">
                                        <input data-allowZero=true data-precision="0" data-decimal=" "
                                               etype="Number" value="0" type="text" class="form-control"
                                               id="priceSize" placeholder="مثلا 3500000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">قیمت فروش:</label>
                                    <div class="col-sm-10">
                                        <input data-allowZero=true data-precision="0" data-decimal=" "
                                               etype="Number" value="0" type="text" class="form-control"
                                               id="price" placeholder="مثلا 75000000" >
                                    </div>
                                </div>
                                <script>
                                </script>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">رهن:</label>
                                    <div class="col-sm-10">
                                        <input data-allowZero=true data-precision="0" data-decimal=" "
                                               etype="Number" disabled="disabled" value="0" type="text"
                                               onkeypress="toMb()" class="form-control" id="mortgage" placeholder="مثلا 4300000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">اجاره:</label>
                                    <div class="col-sm-10">
                                        <input  data-allowZero=true data-precision="0" data-decimal=" "
                                                etype="Number" disabled="disabled" value="" type="text"
                                               onkeypress="toMc()" class="form-control" id="rent" value="0">
                                    </div>
                                </div>
                                <script>
                                    $("#priceSize").maskMoney();
                                    $("#price").maskMoney();
                                    $("#mortgage").maskMoney();
                                    $("#rent").maskMoney();
                                </script>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">سایر امکانات</label>
                                    <div class="col-sm-10">
                                        <label class="checkbox-inline"><input type="checkbox" id="show" value="">عدم نمایش در سایت</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data1" value="">آسانسور</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data2" value="">پارکینگ
                                            اختصاصی</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data3" value="">تک
                                            واحده</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data4" value="">انباری</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data5" value="">تخلیه</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data6" value="">کلید
                                            اول</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data7"
                                                                              value="">حیاط</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data8" value="">آبگرمکن</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data9"
                                                                              value="">هود</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data10" value="">گاز
                                            صفحه ای</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data11" value="">کمد
                                            دیواری</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data12" value="">پمپ
                                            آب</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data13" value="">درب
                                            ضد سرقت</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="pool"
                                                                              value="">استخر</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="garden" value="">تراس</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="special" value="">ملک
                                            ویژه</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data15" value="">پیش
                                            فروش</label>
                                        <label class="checkbox-inline"><input type="checkbox" id="data14" value="">تهاتر
                                            ( معاوضه )</label>
                                    </div>
                                </div>
                                <div class="modal-body" id="mappAdd">
                                    <input id="latbox" type="text" style="display: none">
                                    <input id="lngbox" style="display: none" type="text">
                                    <div id="map" style="width:100%;height: 500px;"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">توضیحات</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="detail" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">توضیحات کاربر</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="detailUser" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="image-editor" style="text-align: center;direction: ltr;">
                                        <input type="file" class="cropit-image-input" style="display:none;" id="img">
                                        <a type="button" onclick="show_img()" class="btn btn-info "><i
                                                    class="icon-plus"></i>اضافه
                                            کردن تصویر</a>
                                        <div class="cropit-preview">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="button" onclick="submit_admin()" class="btn btn-success" id="submit">ثبت
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </section>
            </div>
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
<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
<script src="assets/jquery.cropit.js"></script>
<script>
    $('input[etype="Number"]').keydown(function (event) {
        if (event.shiftKey && ((event.keyCode >= 48 && event.keyCode <= 57)
                || (event.keyCode >= 186 && event.keyCode <= 222))) {
            // Ensure that it is a number and stop the Special chars
            event.preventDefault();
        }
        else if ((event.shiftKey || event.ctrlKey) && (event.keyCode > 34 && event.keyCode < 40)) {
            // let it happen, don't do anything
        }
        else {
            // Allow only backspace , delete, numbers
            if (event.keyCode == 9  || event.keyCode == 46 ||
                event.keyCode == 8  || event.keyCode == 39 ||
                event.keyCode == 37 || (event.keyCode >= 48 &&
                    event.keyCode <= 57
                )) {
                // let it happen, don't do anything
            }
            else {
                // Ensure that it is a number and stop the key press
                event.preventDefault();
            }
        }
    });
    var map = L.map('map', {
        center: [31.3546676, 48.6822043],
        zoom: 15,
        preferCanvas: false,
        boxZoom: false,
        zoomAnimation: true
    });
    var latlng1 = L.latLng(31.3546676, 48.6822043);
    marker = L.marker(
        latlng1, {
            title: "test",
            description: 'London Eye',
            draggable: true
        }).addTo(map)
        .bindPopup('حرکت بده...');
    marker.on('dragend', function (event) {
        var marker = event.target;  // you could also simply access the marker through the closure
        var result = marker.getLatLng();  // but using the passed event is cleaner
        document.getElementById('latbox').value = result['lat'];
        document.getElementById('lngbox').value = result['lng'];
    });
    L.tileLayer('' +
        'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?' +
        'access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 30,
        attribution: '',
        id: 'mapbox.streets'
    }).addTo(map);
    //            var myCenter = new google.maps.LatLng(31.3546676, 48.6822043);
    //            var mapCanvas = document.getElementById("map");
    //            var mapOptions = {center: myCenter, zoom: 15};
    //            var map = new google.maps.Map(mapCanvas, mapOptions);
    //            var marker =  marker = new google.maps.Marker(
    //                {
    //                    map:map,
    //                    draggable:true,
    //                    animation: google.maps.Animation.DROP,
    //                    position: myCenter
    //                });
    //            marker.setMap(map);
    //
    //            google.maps.event.addListener(marker, 'dragend', function (event) {
    //                document.getElementById("latbox").value = this.getPosition().lat();
    //                document.getElementById("lngbox").value = this.getPosition().lng();
    //            });
    function geocodePosition(pos) {
        geocoder = new google.maps.Geocoder();
        geocoder.geocode
        ({
                latLng: pos
            },
            function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    $("#mapSearchInput").val(results[0].formatted_address);
                    $("#mapErrorMsg").hide(100);
                }
                else {
                    $("#mapErrorMsg").html('Cannot determine address at this location.' + status).show(100);
                }
            }
        );
    }
    function show_img() {
        $('#img').click();
    }
    (function ($) {
        $('.image-editor').cropit({
            exportZoom: 1.25,
            imageBackground: true,
            imageBackgroundBorderWidth: 20,
            imageState: {
                src: ''
            }
        });
        $('.image-editor1').cropit({
            exportZoom: 1.25,
            imageBackground: true,
            imageBackgroundBorderWidth: 20,
            imageState: {
                src: ''
            }
        });
    })(jQuery);

    function border_defult() {
        $('#successMSG').slideUp('fast');
    }
    function submit_admin() {
        var img = '';
        var imgprofile = $('.image-editor').cropit('export', {
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        if (typeof imgprofile !== 'undefined') // Any scope
        {
            img = imgprofile;
        }
        var data1 = '0';
        var data2 = '0';
        var data3 = '0';
        var data4 = '0';
        var data5 = '0';
        var data6 = '0';
        var data7 = '0';
        var data8 = '0';
        var data9 = '0';
        var data10 = '0';
        var data11 = '0';
        var data12 = '0';
        var data13 = '0';
        var data14 = '0';
        var data15 = '0';
        var show = '0';
        var yard = '0', garden = '0', pool = '0', special = '0';
        if ($('#data1').is(":checked")) {
            data1 = '1';
        }
        if ($('#show').is(":checked")) {
            show = '1';
        }
        if ($('#data2').is(":checked")) {
            data2 = '1';
        }
        if ($('#data3').is(":checked")) {
            data3 = '1';
        }
        if ($('#data4').is(":checked")) {
            data4 = '1';
        }
        if ($('#data5').is(":checked")) {
            data5 = '1';
        }
        if ($('#data6').is(":checked")) {
            data6 = '1';
        }
        if ($('#data7').is(":checked")) {
            data7 = '1';
        }
        if ($('#data8').is(":checked")) {
            data8 = '1';
        }
        if ($('#data9').is(":checked")) {
            data9 = '1';
        }
        if ($('#data10').is(":checked")) {
            data10 = '1';
        }
        if ($('#data11').is(":checked")) {
            data11 = '1';
        }
        if ($('#data12').is(":checked")) {
            data12 = '1';
        }
        if ($('#data13').is(":checked")) {
            data13 = '1';
        }
        if ($('#data14').is(":checked")) {
            data14 = '1';
        }
        if ($('#data15').is(":checked")) {
            data15 = '1';
        }
        if ($('#pool').is(":checked")) {
            pool = '1';
        }
        if ($('#yard').is(":checked")) {
            yard = '1';
        }
        if ($('#garden').is(":checked")) {
            garden = '1';
        }
        if ($('#special').is(":checked")) {
            special = '1';
        }
        var title = '';
        var transaction = $('#transaction option:selected').val();
        var type = $('#type option:selected').val();
        var aria = $('#aria option:selected').val();
        var price = $('#price').val();
        var mortgage = $('#mortgage').val();
        var rent = $('#rent').val();
        var address = $('#aria option:selected').text() + ' خیابان ' + $('#street').val().replace('خیابان', '') + ' ' + $('#address').val();
        var bedroom = $('#bedroom').val();
        var year = $('#year').val();
        if (year !== '0' && year.length < 4) {
            $('#year').css('border', '2px solid red');
            return;
        }
        if (price !== '0' && price !== '' && price.length < 6) {
            $('#price').css('border', '2px solid red');
            return;
        }
        if (mortgage !== '0' && mortgage !== '' && mortgage.length < 5) {
            $('#mortgage').css('border', '2px solid red');
            return;
        }
        if (rent !== '0' && rent !== '' && rent.length < 5) {
            $('#rent').css('border', '2px solid red');
            return;
        }
        var unit = $('#unit').val();
        var num = $('#num').val();
        var floor = $('#floor').val();
        var lat = $('#latbox').val();
        var unitFloor = $('#unitFloor').val();
        var lng = $('#lngbox').val();
        var detail = $('#detail').val();
        var mobile = $('#mobile').val();
        var detailUser = $('#detailUser').val();
        var name = $('#name').val();
        var area = $('#area').val();
        var agentMobile = $('#agentMobile').val();
        var renterMobile = $('#renterMobile').val();
        if (price != '' && price > 0){
            title = 'فروش';
        }else{
            if (mortgage != '' && mortgage > 0) {
                if (rent != '' && rent > 0) {
                    title = 'اجاره';
                } else {
                    title = 'رهن';
                }
            }
        }
        title += ' ' + $('#type option:selected').text();
        if (data3 == 1) {
            title += ' تک واحده';
        }
        if (data6 == 1) {
            title += ' کلید اول';
        }
        title += ' در ';
        title += $('#aria option:selected').text();
        title += ' خیابان ' + $('#street').val().replace('خیابان', '');
        if(type==='4'){
            var areaFlood = $('#areaFloor').val();
            var areaBalkoon = $('#areaBalkoon').val();
            if(areaFlood!='' && areaFlood!=0){
                detail +=  " متراژ‌ کف :" + areaFlood ;
            }
            if(areaBalkoon!='' && areaBalkoon!=0){
                detail +=  " متراژ‌ بالکن : " + areaBalkoon;
            }
        }
        if($('#floorModelBack').is(":checked")){
            floor+=" عقب ";
        }
        if($('#floorModelFront').is(":checked")){
            floor+=" جلو ";
        }
        $('#submit').attr("onclick","");

        $.ajax({
            url: 'ajax/addEstate.php',
            data: {
                data1: data1,
                data2: data2,
                data3: data3,
                data4: data4,
                data5: data5,
                data6: data6,
                data7: data7,
                data8: data8,
                data9: data9,
                data10: data10,
                num: num,
                renterMobile: renterMobile,
                agentMobile: agentMobile,
                data11: data11,
                data12: data12,
                data13: data13,
                data14: data14,
                show:show,
                data15: data15,
                special: special,
                transaction: transaction,
                type: type,
                unitFloor: unitFloor,
                aria: aria,
                title: title,
                price: price.replace(/,/g,''),
                mortgage: mortgage.replace(/,/g,''),
                rent: rent.replace(/,/g,''),
                address: address,
                bedroom: bedroom,
                year: year,
                unit: unit,
                floor: floor,
                lat: lat,
                lng: lng,
                detail: detail,
                area: area,
                mobile: mobile,
                name: name,
                yard: yard,
                garden: garden,
                pool: pool,
                img: img,
                detailUser: detailUser
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data['error'] === true) {
                    $('#userName').css('border', '2px solid red');
                } else {
                    $('#submit').attr("onclick","submit_admin()");
                    $('html,body').animate({scrollTop: 0}, 'slow');
                    $('#successMSG').slideDown('fast');
                    return;
                }
            }
        });
    }
    $(document).ready(function () {
        $("#price").on("paste copy cut keyup keydown", function () {
            var aria = $('#area').val();
            var a = $('#price').val();
            var b = a.replace(/,/g,'');
            $('#priceSize').val(Math.round(b/aria));
        });
        $("#priceSize").on("paste copy cut keyup keydown", function () {
            var aria = $('#area').val();
            var a = $('#priceSize').val().replace(/,/g,'');
                a = a * aria;
            $('#price').val(a);
        });
        $("#areaFloor").on("paste copy cut keyup keydown", function () {
            $('#area').val('');
            var area;
            var areaFlood = $('#areaFloor').val();
            var areaBalkoon = $('#areaBalkoon').val();
            if(areaBalkoon==='0' || areaBalkoon==='')
                area = areaFlood;
            else
                area = Math.round(parseInt(areaBalkoon)/3)+parseInt(areaFlood);
            $('#area').val(area);
        });
        $("#areaBalkoon").on("paste copy cut keyup keydown", function () {
            $('#area').val('');
            var  area;
            var areaFlood = $('#areaFloor').val();
            var areaBalkoon = $('#areaBalkoon').val();
            if(areaBalkoon==='0' || areaBalkoon==='')
                area = areaFlood;
            else
                area = Math.round(parseInt(areaBalkoon)/3)+parseInt(areaFlood);
                $('#area').val(area);
        });
    });

    $(document).ready(function() {
        document.title = 'ثبت ملک';
    });
</script>
</body>
</html>


