<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
    }
if(isset($_GET['mailid']) && $_GET['action']=='del')
{
    $userid=$_GET['uid'];
    $query=mysqli_query($con,"delete from mail where mailid='$mailid'");
    header('location:mail.php');
}

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><?php echo $pageTitle; ?></title>
        <?php
        include "../includes/panel/header.php";
        ?>
    </head>

<body class="animsition">
<div class="page-wrapper">
    <?php include "../includes/admin/navmenu.php"; ?>

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

    <!--         END WELCOME-->
    <!-- STATISTIC-->
<!--    <section class="statistic">-->
<!--        <div class="section__content section__content--p30">-->
<!--            <div class="container-fluid">-->
<!--                <div class="">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6 col-lg-6 offset-md-3">-->
<!--                            <div class="card">-->
<!--                                <div class="card-header">-->
<!--                                    Staff Registration-->
<!--                                </div>-->
<!--                                --><?php //if (isset($msg)) {
//                                    ?>
<!--                                    --><?php //echo $msg; ?>
<!---->
<!--                                --><?php //} ?>
<!---->
<!--                                <div class="card-body card-block">-->
<!---->
<!--                                    <form class="form-horizontal style-form" method="post" name="complaint"-->
<!--                                          enctype="multipart/form-data">-->
<!---->
<!--                                        <div class="row form-group">-->
<!--                                            <div class="col-8">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label for="Title" class=" form-control-label">Username</label>-->
<!--                                                    <input type="text" name="username" placeholder="Enter your username"-->
<!--                                                           class="form-control">-->
<!--                                                    <label for="Title" class=" form-control-label">Fullname</label>-->
<!--                                                    <input type="text" name="fullname" placeholder="Enter your fullname"-->
<!--                                                           class="form-control">-->
<!---->
<!---->
<!--                                                    <label for="postal-code"-->
<!--                                                           class=" form-control-label">Department</label>-->
<!--                                                    <select name="department" class="form-control"-->
<!--                                                            onChange="getCat(this.value);" required>-->
<!--                                                        <option value="">Select Department</option>-->
<!--                                                        --><?php //$sql = mysqli_query($con, "select categoryName from category ");
//                                                        while ($rw = mysqli_fetch_array($sql)) {
//                                                            ?>
<!--                                                            <option value="--><?php //echo$rw['categoryName']; ?><!--">--><?php //echo $rw['categoryName']; ?><!--</option>-->
<!--                                                            --><?php
//                                                        }
//                                                        ?>
<!--                                                    </select>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-8">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label for="Title" class=" form-control-label">Email</label>-->
<!--                                                    <input type="email" name="email" placeholder="Enter your email"-->
<!--                                                           class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-8">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label for="Title" class=" form-control-label">Phone no</label>-->
<!--                                                    <input type="text" name="phone" placeholder="Enter your Phone No."-->
<!--                                                           class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-8">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label for="Title" class=" form-control-label">Password</label>-->
<!--                                                    <input type="password" name="password"-->
<!--                                                           placeholder="Enter your Password" class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <button type="submit" class="btn btn-danger display-4" name="submit">Register-->
<!--                                            Staff-->
<!--                                        </button>-->
<!--                                    </form>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--    </section>-->


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
                                <td><?php echo ($row['mailid']); ?></td>
                                <td><?php echo ($row['sender']); ?></td>
                                <td><?php echo ($row['subject']); ?></td>
                                <td><?php echo ($row['maildate']); ?></td>
                                <td>

                     <a href="view-mail.php?cid=<?php echo htmlentities($row['mailid']);?>" class="px-2"><i class="fas fa-eye"></i></a>
                     <a href="mail.php?uid=<?php echo htmlentities($row['mailid']);?>&&action=del" title="Delete" onClick="return confirm('Do you really want to delete ?')"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                                <!--                                    <tr class="spacer"></tr>-->
                                <?php } ?>


                            </tbody>
                            <!--                                <tfoot>-->
                            <!--                                <tr>-->
                            <!--                                    <th>Name</th>-->
                            <!--                                    <th>Position</th>-->
                            <!--                                    <th>Office</th>-->
                            <!--                                    <th>Age</th>-->
                            <!--                                    <th>Start date</th>-->
                            <!--                                    <th>Salary</th>-->
                            <!--                                </tr>-->
                            <!--                                </tfoot>-->
                        </table>


                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->

    <!--        New Responsive Table-->


    <?php include "../includes/panel/footer.php"; ?>


<?php //} ?>