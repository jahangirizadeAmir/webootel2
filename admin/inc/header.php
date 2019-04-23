<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 8/20/2017
 * Time: 2:35 PM
 */
?>
<body>

<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
        </div>
        <!--logo start-->
        <a href="#" class="logo">وب و تل</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <?php
                $adminId =mysqli_real_escape_string($conn, $_SESSION['id']);
                $selectJobsMe = mysqli_query($conn,"SELECT * FROM adminjobs 
                  WHERE adminJobsAdminId = '$adminId' AND adminJobsPercent < '100'");
                ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-tasks"></i>
                        <span class="badge bg-success"><?php echo mysqli_num_rows($selectJobsMe)?></span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">شما <?php echo mysqli_num_rows($selectJobsMe)?> برنامه در دست کار دارید</p>
                        </li>

                        <?php
                        $arrayColor = array('success','info','warning','danger');
                        $randomColor = array_rand($arrayColor,1);

                        while ($myJobselect  = mysqli_fetch_assoc($selectJobsMe)){
                            echo '
                            <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">'.$myJobselect['adminJobsText'].'</div>
                                    <div class="percent">'.$myJobselect['adminJobsPercent'].'%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-'.$arrayColor[array_rand($arrayColor)].'" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$myJobselect['adminJobsPercent'].'%">
                                        <span class="sr-only">'.$myJobselect['adminJobsPercent'].'% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                            ';
                        }
                        ?>
                        <li class="external">
                            <a href="profile_admin_act.php">برنامه های بیشتر</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope-alt"></i>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">پیام های جدید</p>
                        </li>
                        <?php
                        $selectMsg = mysqli_query($conn,"SELECT * FROM adminmsg,admin
                          WHERE adminMsgAdminId != '$adminId' AND adminId = adminMsgAdminId
                           ORDER BY date(adminMsgRegDate) DESC,time(adminMsgRegTime) LIMIT 7");
                        while($getShowMsg = mysqli_fetch_assoc($selectMsg)){
                            echo '
                            <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="img/upload/'.$getShowMsg['adminImage'].'.jpg"></span>
                                <span class="subject">
                                    <span class="from">'.$getShowMsg['adminName'].'</span>
                                    </span>
                                <span class="message">
                                '.$getShowMsg['adminMsgText'].'
                                    </span>
                            </a>
                        </li>
                            ';
                        }
                        ?>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->

                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">

                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="<?php echo $_SESSION['img']?>" style="max-width: 23px;">
                        <span class="username"><?php echo $_SESSION['name'].' '.$_SESSION['lastName'] ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>

                        <li><a href="ajax/logout.php"><i class="icon-key"></i> خروج</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
