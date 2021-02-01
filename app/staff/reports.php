<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';
session_start();

if (strlen($_SESSION['slogin']) == 0)
{
    header('location:login.php');
}
else{
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date('d-m-Y h:i:s A', time());
if (isset($_POST['report'])) {
    $rstatus = "Reported";
    $complaintnumber = $_GET['cid'];
    $rstaff = $_SESSION['id'];
    $rname = $_POST['rname'];
    $rremark = $_POST['rremark'];
    $rfile = $_FILES["rfile"]["name"];
    move_uploaded_file($_FILES["rfile"]["tmp_name"], "../../framework/assets/files/_uploads/report/" . $_FILES["rfile"]["name"]);
    $query = mysqli_query($con, "insert into comreport(rcomplaintNumber,rstaff,rname,rstatus,rremark,rfile) values ('$complaintnumber','$rstaff','$rname','$rstatus','$rremark','$rfile')");
    $sql = mysqli_query($con, "update tblcomplaints set status='$rstatus' where complaintNumber='$complaintnumber'");

    echo "<script>alert('Complaint details updated successfully');</script>";

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body class="animsition">
<div class="page-wrapper">
    <?php include "../../framework/library/includes/staff/navmenu.php"; ?>

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
        <div class="col-md-10 col-lg-10 offset-md-1">
            <div class="card">
                <div class="card-body card-block">

                    <form class="form-horizontal style-form" method="post" name="complaint"
                          enctype="multipart/form-data">
                        <div class="card-title">

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Title" class=" form-control-label">Complaint ID</label>
                                        <input type="text" disabled name="cid" placeholder="<?php echo $_GET['cid'] ?>"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Title" class=" form-control-label">Report Title</label>
                                        <input type="text" name="rname" placeholder="Enter Title" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="file-input" class=" form-control-label">Optional: File upload</label>

                                    <input type="file" name="rfile" class="form-control-file" value="" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="description" class=" form-control-label">Remarks</label>
                                <textarea name="rremark" required rows="9" class="form-control"
                                          placeholder="Type Remarks..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="btn-group-sm btn-block">
                            <input name="Submit2" type="submit" class="btn btn-danger"
                                   value="Close this window " onClick="return f2();"/>
                            <button type="submit" class="btn btn-success display-4" name="report">Report</button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
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
                        <?php } ?>
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
                                    <!--                                    <th>Complain Title</th>-->
                                    <th>Reg Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <!--                                    <th></th>-->
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                <?php
                                $query = mysqli_query($con, "select * from comreport");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr class="tr-shadow">
                                        <td><?php echo htmlentities($row['rcomplaintNumber']); ?></td>
                                        <td><?php echo htmlentities($row['rstatus']); ?></td>
                                        <!--                                            <td>-->
                                        <?php //echo htmlentities($row['rremark']);
                                        ?><!--</td>-->
                                        <td><?php echo htmlentities($row['rdate']); ?></td>

                                        <td><span type="button"
                                                  class="badge py-1 font-weight-bold badge-warning"><?php echo $status; ?></span>
                                        </td>

                                        <td><a class="btn btn-primary btn-sm"
                                               href="report-details.php?cid=<?php echo htmlentities($row['rcomplaintNumber']); ?>">
                                                View Details</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <!--                                    <tr class="spacer"></tr>-->


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
