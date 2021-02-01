<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';
session_start();

$_SESSION['page_one'] = time();
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
</head>

<body class="animsition">
<div class="page-wrapper">
    <?php include "../../framework/library/includes/admin/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Complaint
                            <span>Report</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!--         END WELCOME-->
        <!-- STATISTIC-->
        <section class="statistic">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-lg-3" style="text-align: center;">

                            </div>
                            <div class="col-md-6 col-lg-3 offset-1 text-center">
                                <?php
                                $status = "Available Reports";
                                $rt = mysqli_query($con, "SELECT * FROM comreport ");
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
                        </div>

                        <div class="col-md-4 col-lg-3" style="text-align: center;">

                        </div>


                    </div>
                </div>
            </div>
        </section>


        <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Available Reports</h3>

                        <div class="table table-responsive table-responsive-data2">
                            <table id="example" class="table nowrap table-data2" style="width:100%">
                                <thead>
                                <tr>

                                    <th>S/N</th>
                                    <th>Report Title</th>
                                    <th>Remark</th>
                                    <th>Report Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody class="text-left">
                                <?php
                                $st = 'Reported';
                                $query = mysqli_query($con, "select * from comreport where rstatus='$st' and rstaff='" . $_SESSION['id'] . "'");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr class="tr-shadow">
                                        <td><?php echo htmlentities($row['id']) ?></td>
                                        <td><?php echo htmlentities($row['rname']) ?></td>

                                        <td><?php echo htmlentities($row['rremark']) ?></td>
                                        <td><?php echo htmlentities($row['rdate']) ?></td>
                                        <td>
                                            <span class="badge py-2 badge-warning"><?php echo htmlentities($row['rstatus']) ?></span>
                                        </td>
                                        <td><a class="btn btn-primary btn-sm"
                                               href="report-details.php?cid=<?php echo htmlentities($row['id']); ?>">
                                                View Details</a></td>

                                    </tr>
                                    <?php echo "ok";
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END DATA TABLE-->

        <!--        New Responsive Table-->


        <?php include "../../framework/library/includes/panel/footer.php"; ?>
