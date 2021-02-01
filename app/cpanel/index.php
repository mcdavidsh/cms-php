<?php
session_start();
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';


if (strlen($_SESSION['login']) == 0) {
    header('location: ../login.php');
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
    <title>Cpanel | <?php echo $sitename; ?></title>
    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>


<body class="animsition">
<div class="page-wrapper">
    <?php include "../../framework/library/includes/panel/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7 py-5">
        <!-- WELCOME-->
        <section class="welcome p-t-10">
            <div class="container">
                <div class="row">
                    <?php $query = mysqli_query($con, "select fullName from users where userEmail='" . $_SESSION['login'] . "'");
                    while ($row = mysqli_fetch_array($query))
                    {
                    ?>
                    <div class="col-md-12">
                        <h1 class="title-4"><?php echo $greetings; ?>,

                            <span><?php echo ucwords($row['fullName']); ?></span>
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
                    <div class="col-lg-12 offset-md-2">
                        <div class="row">

                            <a href="<?php echo $new_comp; ?>" class="col-md-4 col-lg-3 mbr-add-item">
                                <div class="statistic__item">
                                    <h3 class="desc py-2">New Complain</h3>
                                    <i class="fa fa-plus fa-3x mbr-icon"></i>
                                </div>
                            </a>
                            <div class="col-md-6 col-lg-3 text-center">
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
                            <div class="col-md-6 col-lg-3 text-center">
                                <?php
                                $total_cp = "Total Complaint";
                                $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where userId='" . $_SESSION['id'] . "'");
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
