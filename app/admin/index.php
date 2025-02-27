<?php
session_start();
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';

//if (time() - $_SESSION['time'] > 600)
//    unset($_SESSION['time']);
//else
//    $_SESSION['time'] = time();//updating with latest timestamp


if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {

$hour = date('H');
//if ($hour >= 20) {
//    $greetings = "Good Night";
if ($hour > 17) {
    $greetings = "Good Evening";
} elseif ($hour > 11) {
    $greetings = "Good Afternoon";
} elseif ($hour < 12) {
    $greetings = "Good Morning";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | <?php echo $sitename; ?></title>
    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body class="animsition">
<div class="page-wrapper">
    <?php include "../../framework/library/includes/admin/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7 py-5">
        <!-- BREADCRUMB-->
        <!--        <section class="au-breadcrumb2">-->
        <!--            <div class="container">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-md-12">-->
        <!--                        <div class="au-breadcrumb-content">-->
        <!--                            <div class="au-breadcrumb-left">-->
        <!--                                <span class="au-breadcrumb-span">You are here:</span>-->
        <!--                                <ul class="list-unstyled list-inline au-breadcrumb__list">-->
        <!--                                    <li class="list-inline-item active">-->
        <!--                                        <a href="#">Home</a>-->
        <!--                                    </li>-->
        <!--                                    <li class="list-inline-item seprate">-->
        <!--                                        <span>/</span>-->
        <!--                                    </li>-->
        <!--                                    <li class="list-inline-item">Dashboard</li>-->
        <!--                                </ul>-->
        <!--                            </div>-->
        <!--                            <form class="au-form-icon&#45;&#45;sm" action="" method="post">-->
        <!--                                <input class="au-input&#45;&#45;w300 au-input&#45;&#45;style2" type="text"-->
        <!--                                       placeholder="Search for datas &amp; reports...">-->
        <!--                                <button class="au-btn&#45;&#45;submit2" type="submit">-->
        <!--                                    <i class="zmdi zmdi-search"></i>-->
        <!--                                </button>-->
        <!--                            </form>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </section>-->
        <!-- END BREADCRUMB-->

        <!-- WELCOME-->
        <section class="welcome p-t-10">
            <div class="container">
                <div class="row">
                    <?php $query = mysqli_query($con, "select username from admin where username='" . $_SESSION['alogin'] . "'");
                    while ($row = mysqli_fetch_array($query))
                    {
                    ?>
                    <div class="col-md-12">
                        <h1 class="title-4"><?php echo $greetings; ?>,

                            <span><?php echo ucwords($row['username']); ?></span>
                            <?php } ?>
                        </h1>
                        <!--                        <hr class="line-seprate">-->
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- STATISTIC-->
        <section class="statistic">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-lg-12 ">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <?php
                                $status = "Closed";
                                $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where userId='" . $_SESSION['id'] . "' and  status='$status'");
                                $num1 = mysqli_num_rows($rt);
                                {
                                    ?>
                                    <div class="statistic__item">
                                        <h3 class="desc py-2"><?php echo $status; ?></h3>
                                        <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-3 text-center">

                                <?php
                                $status = "Not Processed";
                                $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where astaff='" . $_SESSION['alogin'] . "' and  status is null");

                                $num1 = mysqli_num_rows($rt);
                                {
                                    ?>
                                    <div class="statistic__item">
                                        <h3 class="desc py-2"><?php echo $status; ?></h3>
                                        <span class="fa-3x mbr-icon">
<?php echo $num1; ?>
                                </span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-3 text-center">
                                <?php
                                $status = "In Process";
                                $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where userId='" . $_SESSION['id'] . "' and  status='$status'");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2"><?php echo $status; ?></h3>
                                    <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-3  text-center">
                                <?php
                                $total_as = "Total Assigned";
                                $rt = mysqli_query($con, "SELECT * FROM ascomplaints");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2"><?php echo $total_as; ?></h3>
                                    <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                </div>
                            </div>
                            <?php } ?>
                            <hr class="">
                            <div class="col-md-3 text-center">
                                <?php
                                $total_cp = "Total Complaint";
                                $rt = mysqli_query($con, "SELECT * FROM tblcomplaints ORDER BY complaintNumber");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2"><?php echo $total_cp; ?></h3>
                                    <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="col-md-3  text-center">
                                <?php
                                $total_dp = "Total Departments";
                                $rt = mysqli_query($con, "SELECT * FROM category");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2"><?php echo $total_dp; ?></h3>
                                    <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-3  text-center">
                                <?php
                                $total_st = "Total Staff";
                                $rt = mysqli_query($con, "SELECT * FROM staff");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2"><?php echo $total_st; ?></h3>
                                    <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-3  text-center">
                                <?php
                                $total_us = "Total Users";
                                $rt = mysqli_query($con, "SELECT * FROM users");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2"><?php echo $total_us; ?></h3>
                                    <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END STATISTIC-->


        <?php include "../../framework/library/includes/panel/footer.php"; ?>
        <?php } ?>
