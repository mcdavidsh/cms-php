<?php
error_reporting(E_ALL);
include "../config/constant.php";
//include "../config/config.php";



?>
<!-- HEADER DESKTOP-->
<header class="header-desktop3 bg-white d-none d-lg-block p">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="<?php echo $admin_home;  ?>" ><?php echo $logourl2; ?>
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li>
                        <a href="<?php echo $admin_home; ?>" class="text-dark">
                            <i class="fas fa-home"></i>Home
                            <span class="bot-line"></span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="#" class="text-dark">
                            <i class="fas fa-tasks"></i>
                            <span class="bot-line"></span>Manage Complain</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <?php
//                                $status="Not Processed";
                                $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null");
                                $num1 = mysqli_num_rows($rt);
                                {?>
                                <a href="<?php echo $nt_proc; ?>">Not Processed <span class="badge badge-info "><?php echo htmlentities($num1) ;?></span></a>
                                <?php }?>
                            </li>
                            <li>
                                <?php
                                $status="In Process";
                                $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                                $num1 = mysqli_num_rows($rt);
                                {?>
                                <a href="<?php echo $proc; ?>">In Process <span class="badge badge-warning"><?php echo htmlentities($num1) ;?></span></a>
                                <?php }?>
                            </li>
                            <li>
                                <?php
                                $status="closed";
                                $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                                $num1 = mysqli_num_rows($rt);
                                {?>
                                <a href="<?php echo $clos; ?>">Closed <span class="badge badge-success "><?php echo htmlentities($num1) ;?></span></a>
                                <?php }?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo "mail.php" ?>" class="text-dark">
                            <i class="fas fa-envelope"></i>Mail
                            <span class="bot-line"></span>
                        </a>
                    </li>
                    <li class="has-sub" >
                        <a href="#" class="text-dark">
                            <i class="fas fa-cogs"></i>
                            <span class="bot-line"></span>Settings</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="<?php echo $mng_users; ?>">Manage Users</a>
                            </li>
                            <li>
                                <a href="<?php echo $mng_sf; ?>">Manage Staff</a>
                            </li>
                            <li>
                                <a href="<?php echo $mng_category; ?>">Manage Department</a>
                            </li>
                            <li>
                                <a href="<?php echo $chng_pwd; ?>">Change Password</a>
                            </li>
                        </ul>
                    </li>
                    <!--                        <li>-->
                    <!--                            <a href="reports.html">-->
                    <!--                                <i class="fas fa-info"></i>-->
                    <!--                                <span class="bot-line"></span>Report</a>-->
                    <!--                        </li>-->
                    <li >
                        <a href="<?php echo $admin_logout; ?>" class="text-dark">
                            <i class="fas fa-power-off"></i>
                            <span class="bot-line"></span>Logout</a>
                    </li>
                </ul>
            </div>
            <div class="header__tool">
                <?php $query = mysqli_query($con,"SELECT username FROM admin WHERE username='".$_SESSION['alogin']."'");
                while($row=mysqli_fetch_array($query))
                {
                ?>
                <div class="header-button-item js-item-menu">
                    <h4 style="font-weight: 500;"><?php echo ucwords($row['username']);?></h4>
                                    </div>
                <?php }?>
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                          <!--user Avatar-->
                            <?php echo $user_avatar;?>
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile bg-white header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner" >
                <a class="logo text-white "style="height: 40px; width: auto;" href="<?php echo $homepage; ?>"><?php echo $logourl2; ?>
                </a>
                <button class="hamburger hamburger--slider bg-dark" type="button">
                            <span class="hamburger-box text-dark">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="<?php echo $admin_home; ?>" class="text-dark">
                        <i class="fas fa-home"></i>Home
                        <span class="bot-line"></span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="#" class="text-dark js-arrow">
                        <i class="fas fa-tasks"></i>
                        <span class="bot-line"></span>Manage Complain</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <?php
                            //                                $status="Not Processed";
                            $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null");
                            $num1 = mysqli_num_rows($rt);
                            {?>
                                <a href="<?php echo $nt_proc; ?>">Not Processed <span class="badge badge-info "><?php echo htmlentities($num1) ;?></span></a>
                            <?php }?>
                        </li>
                        <li>
                            <?php
                            $status="In Process";
                            $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                            $num1 = mysqli_num_rows($rt);
                            {?>
                                <a href="<?php echo $proc; ?>">In Process <span class="badge badge-warning"><?php echo htmlentities($num1) ;?></span></a>
                            <?php }?>
                        </li>
                        <li>
                            <?php
                            $status="closed";
                            $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                            $num1 = mysqli_num_rows($rt);
                            {?>
                                <a href="<?php echo $clos; ?>">Closed <span class="badge badge-success "><?php echo htmlentities($num1) ;?></span></a>
                            <?php }?>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="<?php echo $mng_users; ?>" class="text-dark">
                        <i class="fas fa-users"></i>
                        <span class="bot-line"></span>Manage Users</a>
                <li >
                <li class="has-sub">
                    <a href="#" class="text-dark js-arrow">
                        <i class="fas fa-cogs"></i>
                        <span class="bot-line"></span>Settings</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="<?php echo $mng_users; ?>">Manage Users</a>
                        </li>
                        <li>
                            <a href="<?php echo $mng_sf; ?>">Manage Staff</a>
                        </li>
                        <li>
                            <a href="<?php echo $mng_category; ?>">Manage Complain Type</a>
                        </li>
                        <li>
                            <a href="<?php echo $chng_pwd; ?>">Change Password</a>
                        </li>
                    </ul>
                </li>

                <li >
                    <a href="<?php echo $admin_logout; ?>" class="text-dark">
                        <i class="fas fa-power-off"></i>
                        <span class="bot-line"></span>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
<!--        <div class="header-button-item js-item-menu">-->
<!--            <i class="zmdi zmdi-setting text-dark"><a href="--><?php //echo $profile;?><!--"></a> </i>-->
<!--        </div>-->
        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <!--user Avatar-->
                    <?php echo $user_avatar;?>
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#"></a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <!--user Avatar-->
                                <?php echo $user_avatar;?>
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
<!--                                <a href="#">--><?php //echo ($row['fullName']);?><!--</a>-->
                            </h5>
                            <?php //} ?>
                            <span class="email"></span>
                        </div>
                        <?php //} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER MOBILE -->