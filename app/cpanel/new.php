<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';
session_start();
if (strlen($_SESSION['login']) == 0)
{
    header('location:index.php');
}
else{

if (isset($_POST['submit'])) {
    $uid = $_SESSION['id'];
    $category = $_POST['category'];
    $noc = $_POST['noc'];
    $nameorg = $_POST['nameorg'];
    $addorg = $_POST['addorg'];
    $dateoc = $_POST['dateoc'];
    $priority = $_POST['priority'];
    $complaintdetials = $_POST['complaindetails'];
    $compfile = $_FILES["compfile"]["name"];


    move_uploaded_file($_FILES["compfile"]["tmp_name"], "../../framework/assets/files/_uploads/" . $_FILES["compfile"]["name"]);
    $query = mysqli_query($con, "insert into tblcomplaints(userId,category,noc,complaintDetails,nameorg,addorg,dateoc,priority,complaintFile) values('$uid','$category','$noc','$complaintdetials','$nameorg','$addorg','$dateoc','$priority','$compfile')");
// code for show complaint number
    $sql = mysqli_query($con, "select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1 ");
    while ($row = mysqli_fetch_array($sql)) {
        $cmpn = $row['complaintNumber'];
    }
    $complainno = $cmpn;
    echo '<script> alert("Your complain has been successfully with number")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>

    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
    <link rel="stylesheet" href="../../framework/assets/panel/vendor/sweetalert2/dist/sweetalert2.min.css"
          type="text/css">
<script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body class="animsition">
<div class="page-wrapper">
    <?php include "../../framework/library/includes/panel/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">New
                            <span>Complaint</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!--         END WELCOME-->


        <!-- Complain Form-->

        <div class="col-md-10 col-lg-10 offset-md-1">
            <div class="card">

                <?php if (isset($successmsg)) {
                    ?>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span><?php echo htmlentities($successmsg); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <?php if (isset($errormsg)) {
                    ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Error!</span>
                        <?php echo htmlentities($errormsg); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="card-body card-block">

                    <form class="form-horizontal style-form" method="post" name="complaint"
                          enctype="multipart/form-data">
                        <div class="card-title">


                            <div class="row form-group">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="Title" class=" form-control-label">Title</label>
                                        <input type="text" required name="noc" placeholder="Enter Title"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">


                            <?php
                            $query = mysqli_query($con, "SELECT * from users WHERE  userEmail='" . $_SESSION['login'] . "'");

                            while ($row = mysqli_fetch_array($query))

                            {
                            ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Fullname</label>
                                    <input type="text" readonly disabled name="fname"
                                           placeholder="<?php echo $row['fullName']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Address</label>
                                    <input type="text" readonly disabled name="address"
                                           placeholder="<?php echo $row['address']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Phone No.</label>
                                    <input type="text" readonly disabled name="phone"
                                           placeholder="<?php echo $row['contactNo']; ?>" class="form-control">
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Name of Organization</label>
                                    <input type="text" required name="nameorg" placeholder="Enter Organization Name"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Address of Organization</label>
                                    <input type="text" required name="addorg"
                                           placeholder="<?php echo $row['fullName']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Date of Occurence</label>
                                    <input type="date" required name="dateoc" id="dateoc" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Department</label>
                                    <select name="category" required id="category" class="form-control"
                                            onChange="getCat(this.value);" required="">
                                        <option value="">Select Department</option>
                                        <?php $sql = mysqli_query($con, "select id,categoryName from category ");
                                        while ($rw = mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Priority</label>
                                    <select name="priority" required id="priority" class="form-control" required="">
                                        <option value="">Select Priority</option>
                                        <?php $sql = mysqli_query($con, "select priorityName from  priority ");
                                        while ($rw = mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?php echo htmlentities($rw['priorityName']); ?>"><?php echo htmlentities($rw['priorityName']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="description" class=" form-control-label">Description</label>
                                <textarea name="complaindetails" required="required" rows="9" class="form-control"
                                          maxlength="2000" placeholder="Type Complaint Details (max 2000 words).."
                                          class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="file-input" class=" form-control-label">Optional: File upload</label>

                                    <input type="file" name="compfile" class="form-control-file" value=""
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger display-4" name="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>


        <?php include "../../framework/library/includes/panel/footer.php"; ?>
        <script src="../../framework/assets/panel/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <script>
            <?php };?>

