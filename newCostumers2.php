<?php
session_start();
if(isset($_SESSION['number']) && !empty($_SESSION['number'])) {
    include "inc/header.php";

    ?>

    <div class="registerHNNBack">
        <div class="registerHNN">
            <div class="registerHNNTeksto">
                <h1 class="registerHNNTekstomem">
                    مراحل ثبت نام مشترکین جدید
                </h1>
            </div>

            <div class="registerHNNbildujo">
                <div class="registerHNNbildo">
                    <img src="Images/Register.svg" alt="Register" class="registerHNNbildomem">
                </div>

                <div class="registerHNNpasxujo">
                    <div class="registerHNNpasxoj" id="smootScrollReveno">

                        <div class="registerHNNpasxo"> <!--pasxo 1-->
                            <h2 class="registerHNNpasxoN">
                                ۱
                            </h2>
                            <h4 class="registerHNNpasxoT">
                                درخواست امکان سنجی
                            </h4>
                        </div>

                        <div class="registerHNNpasxo registerHNNpasxoActive"> <!--pasxo 2-->
                            <h2 class="registerHNNpasxoN">
                                ۲
                            </h2>
                            <h4 class="registerHNNpasxoT">
                                تکمیل اطلاعات
                            </h4>
                        </div>

                        <div class="registerHNNpasxo"> <!--pasxo 3-->
                            <h2 class="registerHNNpasxoN">
                                ۳
                            </h2>
                            <h4 class="registerHNNpasxoT">
                                انتخاب طرح یا تعرفه
                            </h4>
                        </div>

                        <div class="registerHNNpasxo"> <!--pasxo 4-->
                            <h2 class="registerHNNpasxoN">
                                ۴
                            </h2>
                            <h4 class="registerHNNpasxoT">
                                پرداخت حق تعرفه
                            </h4>
                        </div>

                        <div class="registerHNNpasxo"> <!--pasxo 5-->
                            <h2 class="registerHNNpasxoN">
                                ۵
                            </h2>
                            <h4 class="registerHNNpasxoT">
                                تحویل سرویس
                            </h4>
                        </div>


                    </div>
                </div>

            </div><!--registerHNNbildujo-->
        </div>

    </div>


    <h3 class="NCsubaPartoTekstomem NCsubaPartoTekstomemHaHo">
        برای تکمیل اطلاعات در ابتدا انتخاب کنید می‌خواهید سرویس خود را به عنوان شخص حقیقی یا حقوقی دریافت کنید.
    </h3>

    <div class="ncpasxo2bildujo">

        <a href="#smootScrollReveno"><img src="Images/Haghighi.svg" alt="Haghighi" class="HaghighiBildo" id="HaghighiN"></a>
        <a href="#smootScrollReveno"><img src="Images/Hoghughi.svg" alt="Hoghughi" class="HoghughiBildo" id="HoghughiN"></a>

    </div>


    <div class="NCsubaParto4" id="NCIHa">
        <div class="NCsubaPartoTekstujo">
            <h3 class="NCsubaPartoTekstomem">
                در این قسمت اطلاعات خود را به صورت دقیق و کامل وارد نمایید.
            </h3>
            <h4 class="registerFormHeader" style="color: red;display: none;" id="userSubmitError">
                موارد ستاره دار اجباری می باشد. </h4>
            <h4 class="registerFormHeader">
                <form class="formujo2">
                    جنسیت *
            </h4>
            <label class="lcontainer">
                <h6 class="RadioText">
                    مرد
                </h6>
                <input type="radio" checked="checked" name="radio" id="man">
                <span class="checkmark"></span>
            </label>


            <label class="lcontainer">
                <h6 class="RadioText">
                    زن
                </h6>
                <input type="radio" checked="checked" name="radio" id="woman">
                <span class="checkmark"></span>
            </label>


            <br>
            <h4 class="registerFormHeader">
                نام و نام خانوادگی *
            </h4>

            <input class="textInput" type="text" id="name">

            <h4 class="registerFormHeader">
                شماره ملی *
            </h4>

            <input class="textInput" type="text" placeholder="کد ملی ده رقمی" id="Nationalnumber" maxlength="10"
                   minlength="10">


            <h4 class="registerFormHeader">
                نام پدر *
            </h4>

            <input class="textInput" type="text" id="fatherName">


            <h4 class="registerFormHeader">
                محل صدور *
            </h4>

            <input class="textInput" type="text" id="MahaleSodur">

            <h4 class="registerFormHeader">

                تاریخ تولد *
            </h4>
            <input type="text" id="‌birthDate" class="textInput birthdateujo">


            <h4 class="registerFormHeader">
                شماره تلفن ثابت * </h4>

            <input class="textInput" type="text" placeholder="شماره‌ی ۸ رقمی تلفن ثابت" id="Telephone" maxlength="8"
                   minlength="8">


            <h4 class="registerFormHeader">
                ایمیل *
            </h4>

            <input class="textInput" type="email" id="email">


            <h4 class="registerFormHeader">
                آدرس *
            </h4>

            <input class="textInput" type="text" id="adress">


            <h4 class="registerFormHeader">
                شماره شناسنامه *
            </h4>

            <input class="textInput" type="text" id="shenasname">

            <h4 class="registerFormHeader">
                نام معرف
            </h4>

            <input class="textInput" type="text" id="agent">

            <h4 class="registerFormHeader">
                کد پستی *
            </h4>

            <input class="textInput" type="text" placeholder="کد پستی ده رقمی" id="postalCode" maxlength="10"
                   minlength="10">

            <a href="#" class="downloadQardad">
                دانلود فایل قرارداد
            </a>

            <input type="checkbox" name="qarardad" value="qarardad" class="qarardadInput">
            <h5 class="formText">
                مفاد قرارداد را خوانده و می‌پذیرم.
            </h5>

            </form>

        </div>
        <div class="NCsubaPartoButonoj">
    <span class="NCsubaPartoButonojmem1" id="" onclick="submit()">
تایید
</span>
            <a href="#smootScrollReveno" class="NCsubaPartoButonojmem2" id="revenoHaghighi">
                بازگشت
            </a>
        </div>

    </div> <!--Haghighi-->


    <script>
        function submit() {
            var gender, name, nationalCode, fatherName, bLocation
                , birthDate, tell, email, address, shsh, agent, postCode;
            gender = $('#man').attr('checked') ? "0" : "";
            gender = $('#woman').attr('checked') ? "1" : "";
            name = $('#name').val();
            nationalCode = $('#Nationalnumber').val();
            fatherName = $('#fatherName').val();
            bLocation = $('#MahaleSodur').val();
            birthDate = $('#‌birthDate').val();
            tell = $('#Telephone').val();
            email = $('#email').val();
            address = $('#adress').val();
            shsh = $('#shenasname').val();
            agent = $('#agent').val();
            postCode = $('#postalCode').val();

            $.ajax({
                url: "ajax/submitUser.php",
                data: {
                    gender: gender,
                    name: name,
                    nationalCode: nationalCode,
                    fatherName: fatherName,
                    bLocation: bLocation,
                    birthDate: birthDate,
                    tell: tell,
                    email: email,
                    address: address,
                    shsh: shsh,
                    agent: agent,
                    postCode: postCode
                },
                dataType: 'json',
                type: 'post',
                success: function (data) {
                    if (data['error']) {
                        $('#userSubmitError').html(data['MSG']).show();
                        $('html, body').animate({
                            scrollTop: $("#userSubmitError").offset().top-30
                        }, 600);
                    }else{
                        if(data['serviceModel']==="1"){
                            window.location.href="newCostumers3ADSL.php";
                        }
                        else if (data['serviceModel']==='2'){
                            window.location.href="newCostumers3Wireless.php";
                        }
                        else if(data['serviceModel ']==='3'){
                            window.location.href="newCostumers3TDLTE.php";
                        }
                    }
                }
            });

        }
    </script>

    <div class="NCsubaParto4" id="NCIHo">
        <div class="NCsubaPartoTekstujo">
            <h3 class="NCsubaPartoTekstomem">
                در این قسمت اطلاعات خود را به صورت دقیق و کامل وارد نمایید.
            </h3>

            <form class="formujo2">
                <h4 class="registerFormHeader">
                    نوع شرکت *
                </h4>

                <div class="hoTypeujo">
                    <i class="fas fa-angle-down angledown"></i>
                    انتخاب
                </div>

                <div class="hoTypeelektujo">
                    <div class="hoTypeelektujoRow">
                        <div class="hoTypeElekto">
                            سهامی عام
                        </div>
                        <div class="hoTypeElekto">
                            سهامی خاص
                        </div>
                    </div>
                    <div class="hoTypeelektujoRow">
                        <div class="hoTypeElekto">
                            با مسئولیت محدود
                        </div>
                        <div class="hoTypeElekto">
                            تضامنی
                        </div>
                    </div>
                    <div class="hoTypeelektujoRow">
                        <div class="hoTypeElekto">
                            مختلط غیرسهامی
                        </div>
                        <div class="hoTypeElekto">
                            مختلط سهامی
                        </div>
                    </div>
                    <div class="hoTypeelektujoRow">
                        <div class="hoTypeElekto">
                            نسبی
                        </div>
                        <div class="hoTypeElekto">
                            تعاونی
                        </div>
                    </div>
                    <div class="hoTypeelektujoRow">
                        <div class="hoTypeElekto">
                            دولتی
                        </div>
                        <div class="hoTypeElekto">
                            وزارتخانه
                        </div>
                    </div>

                    <div class="hoTypeelektujoRow">
                        <div class="hoTypeElekto">
                            سفارتخانه
                        </div>
                        <div class="hoTypeElekto">
                            مسجد
                        </div>
                    </div>
                    <div class="hoTypeelektujoRow">
                        <div class="hoTypeElekto">
                            مدرسه
                        </div>
                        <div class="hoTypeElekto">
                            NGO
                        </div>
                    </div>
                </div>


                <br>
                <h4 class="registerFormHeader">
                    نام شرکت *
                </h4>

                <input class="textInput" type="text" name="nameCompany">

                <h4 class="registerFormHeader">
                    شماره ثبت *
                </h4>

                <input class="textInput" type="text" name="sabtnumber" maxlength="10" minlength="10">


                <h4 class="registerFormHeader">
                    شناسه ملی
                </h4>

                <input class="textInput" type="text" name="fatherName">


                <h4 class="registerFormHeader">
                    تاریخ ثبت شمسی
                </h4>

                <input class="textInput" type="text" name="sabtdata">

                <h4 class="registerFormHeader">

                    محل ثبت *
                </h4>
                <input type="text" id="‌birthDate" class="textInput birthdateujo" name="locsabt">


                <h4 class="registerFormHeader">
                    موبایل شرکت * </h4>

                <input class="textInput" type="text" name="mobileCompany">

                <h4 class="registerFormHeader">
                    نام مدیر عامل </h4>

                <input class="textInput" type="text" name="nameEstro">

                <h4 class="registerFormHeader">
                    کد اقتصادی </h4>

                <input class="textInput" type="text" name="nameEstro">


                <h4 class="registerFormHeader">
                    نام رابط * </h4>

                <input class="textInput" type="text" name="rabetName">

                <h4 class="registerFormHeader">
                    نام خانوادگی رابط * </h4>

                <input class="textInput" type="text" name="rabetFamilyName">

                <h4 class="registerFormHeader">
                    نام پدر رابط * </h4>

                <input class="textInput" type="text" name="rabetFatherName">

                <h4 class="registerFormHeader">
                    تاریخ تولد شمسی رابط * </h4>

                <input class="textInput" type="text" name="rabetbirthday">

                <h4 class="registerFormHeader">
                    شماره شناسنامه رابط * </h4>

                <input class="textInput" type="text" name="rabetidentitynumber">

                <h4 class="registerFormHeader">
                    موبایل رابط * </h4>

                <input class="textInput" type="text" name="rabetphone">

                <h4 class="registerFormHeader">
                    شماره ملی رابط * </h4>

                <input class="textInput" type="text" name="rabetnationalnumber">

                <h4 class="registerFormHeader">
                    تلفن
                </h4>

                <input class="textInput" type="email" name="phonenumber">


                <h4 class="registerFormHeader">
                    ایمیل
                </h4>

                <input class="textInput" type="email" name="email">

                <h4 class="registerFormHeader">
                    کد پستی
                </h4>

                <input class="textInput" type="text" placeholder="کد پستی ده رقمی" name="Phone" maxlength="10"
                       minlength="10">


                <h4 class="registerFormHeader">
                    آدرس
                </h4>

                <input class="textInput" type="text" name="adress">


                <h4 class="registerFormHeader">
                    توضیحات
                </h4>

                <input class="textInput" type="text" name="information">

                <h4 class="registerFormHeader">
                    نام کاربری معرف
                </h4>

                <input class="textInput" type="text" name="moarefUser">

                <h4 class="registerFormHeader">
                    سریال کارت تخفیف
                </h4>

                <input class="textInput" type="text" name="takhfif">


            </form>

        </div>
        <div class="NCsubaPartoButonoj">
            <a class="NCsubaPartoButonojmem1" id="PetoPorEbleco" href="newCostumers2.php">
                تایید
            </a>
            <a href="#smootScrollReveno" class="NCsubaPartoButonojmem2" id="revenoHoghughi">
                بازگشت
            </a>
        </div>

    </div> <!--Haghighi-->


    <?php
    include "inc/footer.php";
    ?>

    </body>
    </html>
    <?php
}else{
    header("location:newCostumers1.php");
}
    ?>