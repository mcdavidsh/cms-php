<?php
session_start();
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';

if (strlen($_SESSION['slogin']) == 0) {
    header('location: login.php');
} else {

$hour = date('H');
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
    <title>Staff | <?php echo $sitename; ?></title>
    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body class="animsition">
<div class="page-wrapper">
    <?php include "../../framework/library/includes/staff/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7 py-5">


        <!-- WELCOME-->
        <section class="welcome p-t-10">
            <div class="container">
                <div class="row">
                    <?php $query = mysqli_query($con, "select username from staff where username='" . $_SESSION['slogin'] . "'");
                    while ($row = mysqli_fetch_array($query))
                    {
                    ?>
                    <div class="col-md-12">
                        <h1 class="title-4"><?php echo $greetings; ?>,

                            <span><?php echo ucwords($row['username']); ?></span>
                            <?php } ?>
                        </h1>
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
                            <div class="col-md-6 col-lg-3 text-center">
                                <?php
                                $cstatus = "Closed";
                                $rt = mysqli_query($con, "SELECT * FROM ascomplaints where astaff='" . $_SESSION['id'] . "' and  cstatus='$cstatus'");
                                $num1 = mysqli_num_rows($rt);
                                {
                                    ?>
                                    <div class="statistic__item">
                                        <h3 class="desc py-2"><?php echo $cstatus; ?></h3>
                                        <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center">
                                <?php
                                $cstatus = null;
                                $rt = mysqli_query($con, "SELECT * FROM ascomplaints where astaff='" . $_SESSION['id'] . "' and cstatus = '$cstatus'");
                                $num1 = mysqli_num_rows($rt);
                                {
                                    ?>
                                    <div class="statistic__item">
                                        <h3 class="desc py-2"><?php echo "Not Processed"; ?></h3>
                                        <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center">
                                <?php
                                $cstatus = "In Process";
                                $rt = mysqli_query($con, "SELECT * FROM ascomplaints where astaff='" . $_SESSION['id'] . "' and  cstatus='$cstatus'");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2"><?php echo $cstatus; ?></h3>
                                    <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1); ?>
                                </span>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-6 col-lg-3 text-center">
                                <?php
                                $total_cp = "Total Complaints";
                                $rt = mysqli_query($con, "SELECT * FROM ascomplaints WHERE astaff='" . $_SESSION['id'] . "'");
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


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END STATISTIC-->


        <?php include "../../framework/library/includes/panel/footer.php"; ?>
        <?php } ?>
