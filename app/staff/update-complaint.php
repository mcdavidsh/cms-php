<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';
session_start();
if (strlen($_SESSION['slogin']) == 0)
{
    header('location:login.php');
}
else {
if (isset($_POST['update'])) {
    $complaintnumber = $_GET['cid'];
    $cstatus = $_POST['cstatus'];
    $premark = $_POST['premark'];
    $query = mysqli_query($con, "update ascomplaints set cstatus ='$cstatus',premark='$premark' where acomplaintNumber='$complaintnumber'");
    $sql = mysqli_query($con, "update tblcomplaints set status='$cstatus' where complaintNumber='$complaintnumber'");

    echo "<script>alert('Complaint details updated successfully');</script>";

}

?>
<script language="javascript" type="text/javascript">
    function f2() {
        window.close();
    }

    ser

    function f3() {
        window.print();
    }
</script>
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
    <?php include "../../framework/library/includes/admin/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Update
                            <span>Complaint</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!--         END WELCOME-->

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
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label py-2"> Status</label>
                                    <select class="form-control" name="cstatus" required="required">
                                        <option value="">Select Status</option>
                                        <option value="in process">In Process</option>
                                        <option value="closed">Closed</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="description" class=" form-control-label">Remarks</label>
                                <textarea name="premark" required rows="9" class="form-control"
                                          placeholder="Type Remarks..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="btn-group-sm btn-block">
                            <input name="Submit2" type="submit" class="btn btn-danger"
                                   value="Close this window " onClick="return f2();"/>
                            <button type="submit" class="btn btn-success display-4" name="update">Update</button>

                        </div>

                    </form>

                </div>
            </div>
        </div>


        <?php include "../../framework/library/includes/panel/footer.php"; ?>


        <?php } ?>
