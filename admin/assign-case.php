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
}

if(isset($_POST['submit'])) {
    $astatus= "Assigned";
      $complaintnumber = $_GET['cid'];
    $astaff = $_POST['astaff'];
    $aremark = $_POST['aremark'];


    $qury = mysqli_query($con, "insert into ascomplaints(acomplaintNumber,aremark,astatus,astaff) VALUES ('$complaintnumber','$aremark','$astatus','$astaff')");

    $sql=mysqli_query($con,"update tblcomplaints set astatus='$astatus',astaff='$astaff' where complaintNumber='$complaintnumber'");
      echo '<script>alert("Complaint is successfully assigned ")</script>';
      exit();

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
                        <h1 class="title-4">Assign
                            <span>Complaint</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>

        <div class="col-md-10 col-lg-10 offset-md-1">
            <div class="card">
                <div class="card-body card-block">

                    <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data">
                        <div class="card-title">

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Title" class=" form-control-label">Complaint ID</label>
                                        <input type="text" disabled name="cid" placeholder="<?php echo $_GET['cid'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label py-2">Staff & Department</label>

                                    <select class="form-control" name="astaff"
                                            required>
                                        <option value="">Select Staff</option>
                                        <?php $query = mysqli_query($con, "SELECT * FROM staff");

                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['fullname'] . " - " . $row['department'] ?></option> <?php }?>

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="description" class=" form-control-label">Remarks</label>
                                <textarea name="aremark"  required rows="9" class="form-control" placeholder="Type Remarks..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="btn-group-sm btn-block">
                            <input name="Submit2" type="submit" class="btn btn-success"
                                   value="Close this window " onClick="return f2();"/>
                            <button type="submit" class="btn btn-danger display-4" name="submit">Assign</button>

                        </div>

                    </form>

                </div>
            </div>
        </div>


<?php include "../includes/panel/footer.php"; ?>
