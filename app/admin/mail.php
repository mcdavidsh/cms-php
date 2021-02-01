<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';
session_start();
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
}
if (isset($_GET['mailid']) && $_GET['action'] == 'del') {
    $userid = $_GET['uid'];
    $query = mysqli_query($con, "delete from mail where mailid='$mailid'");
    header('location:mail.php');
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
                        <h1 class="title-4">Staff
                            <span>Management</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h3 class="title-5 m-b-35">User List</h3>

                        <div class="table table-responsive table-responsive-data2">
                            <table id="example" class="table nowrap table-data2" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Sender</th>
                                    <th>Subject</th>
                                    <th>Sent Date</th>
                                    <th>Action</th>
                                    <!--                                    <th></th>-->
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                <?php $query = mysqli_query($con, "select * from mails");
                                while ($row = mysqli_fetch_array($query))
                                {
                                ?>
                                <tr class="tr-shadow">
                                    <td><?php echo($row['mailid']); ?></td>
                                    <td><?php echo($row['sender']); ?></td>
                                    <td><?php echo($row['subject']); ?></td>
                                    <td><?php echo($row['maildate']); ?></td>
                                    <td>

                                        <a href="view-mail.php?cid=<?php echo htmlentities($row['mailid']); ?>"
                                           class="px-2"><i class="fas fa-eye"></i></a>
                                        <a href="mail.php?uid=<?php echo htmlentities($row['mailid']); ?>&&action=del"
                                           title="Delete" onClick="return confirm('Do you really want to delete ?')"><i
                                                    class="fas fa-trash text-danger"></i></a>
                                    </td>

                                    <?php } ?>
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

