<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/20/2017
 * Time: 2:36 PM
 */
?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="index.php">
                    <i class="icon-dashboard"></i>
                    <span>صفحه اصلی</span>
                </a>
            </li>
            <?php
            if($_SESSION['level']=='1' || $_SESSION['level']=='0') {
                if($_SESSION['level']=='1' || $_SESSION['level']=='0') {
                    ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>مدیریت مدیران</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="add_admin.php">اضافه کردن مدیر</a></li>
                            <li><a class="" href="admin_list.php">لیست مدیران</a></li>
                        </ul>
                    </li>
                    <?php
                }if($_SESSION['level']=='1') {
                    ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>تیم متخصص</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="add_ourTeam.php">اضافه کردن</a></li>
                            <li><a class="" href="ourTeamList.php">لیست مدیران</a></li>
                        </ul>
                    </li>
                    <!--                <li class="sub-menu">-->
                    <!--                    <a href="javascript:;" class="">-->
                    <!--                        <i class="icon-ellipsis-vertical"></i>-->
                    <!--                        <span>مدیریت منو</span>-->
                    <!--                        <span class="arrow"></span>-->
                    <!--                    </a>-->
                    <!--                    <ul class="sub">-->
                    <!--                        <li><a class="" href="add_menu.php">اضافه کردن منو</a></li>-->
                    <!--                        <li><a class="" href="menu_list.php">لیست منو ها</a></li>-->
                    <!--                    </ul>-->
                    <!--                </li>-->
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-edit"></i>
                            <span>مطلب</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="add_post.php">اضافه کردن مطلب</a></li>
                            <li><a class="" href="post_list.php">لیست مطالب</a></li>
                        </ul>
                    </li>
                    <!--                <li class="sub-menu">-->
                    <!--                    <a href="javascript:;" class="">-->
                    <!--                        <i class="icon-tasks"></i>-->
                    <!--                        <span>مجموعه</span>-->
                    <!--                        <span class="arrow"></span>-->
                    <!--                    </a>-->
                    <!--                    <ul class="sub">-->
                    <!--                        <li><a class="" href="add_collection.php">اضافه کردن مجموعه</a></li>-->
                    <!--                        <li><a class="" href="add_collectionStyle.php">اضافه کردن نمای مجموعه</a></li>-->
                    <!--                        <li><a class="" href="collection_list.php">لیست مجموعه</a></li>-->
                    <!--                        <li><a class="" href="collectionStyle_list.php">لیست نمای مجموعه</a></li>-->
                    <!--                    </ul>-->
                    <!--                </li>-->
                    <!--                <li class="sub-menu">-->
                    <!--                    <a href="javascript:;" class="">-->
                    <!--                        <i class="icon-cogs"></i>-->
                    <!--                        <span>ماژول</span>-->
                    <!--                        <span class="arrow"></span>-->
                    <!--                    </a>-->
                    <!--                    <ul class="sub">-->
                    <!--                        <li><a class="" href="add_module.php">اضافه کردن ماژول</a></li>-->
                    <!--                        <li><a class="" href="module_list.php">لیست ماژول</a></li>-->
                    <!--                    </ul>-->
                    <!--                </li>-->
                    <li class="">
                        <a class="" href="userList.php">
                            <i class="icon-user"></i>
                            <span>کاربران</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="requestList.php">
                            <i class="icon-user"></i>
                            <span>لیست املاک درخواستی</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="slider.php">
                            <i class="icon-user"></i>
                            <span>اضافه کردن اسلایدر</span>
                        </a>
                    </li>
                    <?php
                }
            }
            if($_SESSION['level']!='6') {
                if($_SESSION['level']!='1') {
                    ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-home"></i>
                            <span>املاک </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">

                            <li><a class="" href="addMelk.php">ثبت ملک</a></li>

                            <li><a class="" href="melkList.php">لیست ملک</a></li>

                            <li><a class="" href="melkListEx.php">لیست املاک منقضی</a></li>

                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-mobile-phone"></i>
                            <span>دفتر تلفن </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="addContact.php">ثبت تلفن</a></li>
                            <li><a class="" href="contactList.php">لیست تلفن</a></li>
                        </ul>
                    </li>
                    <?php
                }
            }else{
                ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-edit"></i>
                        <span>مطلب</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="add_post.php">اضافه کردن مطلب</a></li>
                        <li><a class="" href="post_list.php">لیست مطالب</a></li>
                    </ul>
                </li>
            <?php
            }
            ?>

<!--            <li class="sub-menu">-->
<!--                <a href="javascript:;" class="">-->
<!--                    <i class="icon-tasks"></i>-->
<!--                    <span>ابزارهای فرم</span>-->
<!--                    <span class="arrow"></span>-->
<!--                </a>-->
<!--                <ul class="sub">-->
<!--                    <li><a class="" href="form_component.html">کامنت فرم</a></li>-->
<!--                    <li><a class="" href="form_wizard.html">فرم Wizard</a></li>-->
<!--                    <li><a class="" href="form_validation.html">ارزیابی فرم</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="sub-menu">-->
<!--                <a href="javascript:;" class="">-->
<!--                    <i class="icon-th"></i>-->
<!--                    <span>اطلاعات جدول</span>-->
<!--                    <span class="arrow"></span>-->
<!--                </a>-->
<!--                <ul class="sub">-->
<!--                    <li><a class="" href="basic_table.html">جدول ساده</a></li>-->
<!--                    <li><a class="" href="dynamic_table.html">جدول داینامیک</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a class="" href="inbox.html">-->
<!--                    <i class="icon-envelope"></i>-->
<!--                    <span>ایمیل </span>-->
<!--                    <span class="label label-danger pull-right mail-info">2</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="sub-menu">-->
<!--                <a href="javascript:;" class="">-->
<!--                    <i class="icon-glass"></i>-->
<!--                    <span>عناصر اضافی</span>-->
<!--                    <span class="arrow"></span>-->
<!--                </a>-->
<!--                <ul class="sub">-->
<!--                    <li><a class="" href="blank.html">صفحه خالی</a></li>-->
<!--                    <li><a class="" href="profile.html">پروفایل</a></li>-->
<!--                    <li><a class="" href="invoice.html">فاکتور</a></li>-->
<!--                    <li><a class="" href="404.html">404 Error</a></li>-->
<!--                    <li><a class="" href="500.html">500 Error</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a class="" href="login.html">-->
<!--                    <i class="icon-user"></i>-->
<!--                    <span>صفحه ورود به سایت</span>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
