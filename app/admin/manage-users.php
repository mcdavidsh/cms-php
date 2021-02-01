<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';
session_start();
if (strlen($_SESSION['alogin']) == 0)
{
    header('location:login.php');
}
else{
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date('d-m-Y h:i:s A', time());

if (isset($_GET['uid']) && $_GET['action'] == 'del') {
    $userid = $_GET['uid'];
    $query = mysqli_query($con, "delete from users where id='$userid'");
    header('location:manage-users.php');
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
                        <h1 class="title-4">User
                            <span>Management</span>
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
                    <div class="offset-2">
                        <div class="row">
                            <div class="col-md-4 col-lg-3 text-center">
                                <?php
                                //                            $total_cp="Total Complaint";
                                $rt = mysqli_query($con, "SELECT * FROM staff");
                                $num1 = mysqli_num_rows($rt);
                                {
                                    ?>
                                    <div class="statistic__item">
                                        <h3 class="desc py-2">Total Staff</h3>
                                        <span class="fa-3x mbr-icon"><?php echo htmlentities($num1); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-4 col-lg-3 text-center">
                                <?php
                                //                            $total_cp="Total Complaint";
                                $rt = mysqli_query($con, "SELECT * FROM users");
                                $num1 = mysqli_num_rows($rt);
                                {
                                    ?>
                                    <div class="statistic__item">
                                        <h3 class="desc py-2">Total Users</h3>
                                        <span class="fa-3x mbr-icon"><?php echo htmlentities($num1); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-4 col-lg-3 text-center">
                                <?php
                                $status = "in Process";
                                $rt = mysqli_query($con, "SELECT * FROM admin");
                                $num1 = mysqli_num_rows($rt);
                                {
                                ?>
                                <div class="statistic__item">
                                    <h3 class="desc py-2">Total Admin</h3>
                                    <span class="fa-3x mbr-icon"><?php echo htmlentities($num1); ?></span>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
        </section>


        <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">User List</h3>

                        <div class="table table-responsive table-responsive-data2">
                            <table id="example" class="table nowrap table-data2" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone no.</th>
                                    <th>Reg Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                <?php $query = mysqli_query($con, "select * from users");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query))
                                {
                                ?>
                                <tr class="tr-shadow">
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td>
                                        <?php echo htmlentities($row['fullName']); ?>
                                    </td>
                                    <td><?php echo htmlentities($row['userEmail']); ?></td>
                                    <td><?php echo htmlentities($row['contactNo']); ?></td>
                                    <td><?php echo htmlentities($row['regDate']); ?></td>
                                    <td>

                                        <a href="manage-users.php?uid=<?php echo htmlentities($row['id']); ?>&&action=del"
                                           title="Delete" onClick="return confirm('Do you really want to delete ?')">
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </a>
                                    </td>
                                </tbody>
                                <?php $cnt = $cnt + 1;
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END DATA TABLE-->

        <!--        New Responsive Table-->


        <?php include "../../framework/library/includes/panel/footer.php"; ?>

        <?php } ?>

