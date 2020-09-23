<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();
if(strlen($_SESSION['alogin'])==0)
{
    header('location:login.php');
}
else {
if(isset($_POST['update']))
{
    $complaintnumber=$_GET['cid'];
    $status=$_POST['status'];
    $remark=$_POST['remark'];
    $query=mysqli_query($con,"insert into complaintremark(complaintNumber,status,remark) values('$complaintnumber','$status','$remark')");
    $sql=mysqli_query($con,"update tblcomplaints set status='$status' where complaintNumber='$complaintnumber'");

    echo "<script>alert('Complaint details updated successfully');</script>";

}

?>
<script language="javascript" type="text/javascript">
    function f2()
    {
        window.close();
    }ser
    function f3()
    {
        window.print();
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <?php
    include "../includes/panel/header.php";
    ?>
</head>

<body class="animsition" >
<div class="page-wrapper">
    <?php include "../includes/admin/navmenu.php"; ?>

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
        <!-- STATISTIC-->
        <section class="statistic">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="">
                        <div class="row">

                            <div class="col-md-6 col-lg-6 offset-md-2  ">
                                <div class="card">
                                    <div class="card-header">

                                    </div>

                                    <div class="card-body card-block">

                                        <form class="form-horizontal style-form"name="updateticket" id="updatecomplaint" method="post"
                                              enctype="multipart/form-data">

                                            <div class="row ml-auto mr-auto form-group">
                                                <div class="col-md-8 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="Title" class=" form-control-label">Complaint Id</label>
                                                        <input type="text"placeholder="<?php echo htmlentities($_GET['cid']); ?>" disabled
                                                               class="form-control">
                                                        <label for="Title" class=" form-control-label py-2"> Status</label>
                                                        <select class="form-control" name="status" required="required">
                                                            <option value="">Select Status</option>
                                                            <option value="in process">In Process</option>
                                                            <option value="closed">Closed</option>

                                                        </select>

                                                </div>
                                                <div class="col-md-8 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="Title" class=" form-control-label">Remark</label>
                                                        <textarea name="remark" required style="overflow:hidden; text-align: left; margin: 0; padding: 0;"
                                                                  class="form-control" rows="9">
                                                    </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group-sm">
                                            <button type="submit" name="update" class="btn btn-danger display-4" name="submit">Update
                                            </button>
                                                <input name="Submit2" type="submit" class="btn btn-success" value="Close this window " onClick="return f2();"  />
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!--        New Responsive Table-->


        <?php include "../includes/panel/footer.php"; ?>


        <?php } ?>
