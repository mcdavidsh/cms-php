<?php
require_once '../config/config.php';
require_once '../config/constant.php';

session_start();
error_reporting(E_ALL);
if(strlen($_SESSION['login'])==0)
{
    header('location:index.php');
}
else{

    if(isset($_POST['submit']))
    {
        $uid=$_SESSION['id'];
        $category=$_POST['category'];
        $noc=$_POST['noc'];
        $complaintdetials=$_POST['complaindetails'];
        $compfile=$_FILES["compfile"]["name"];



        move_uploaded_file($_FILES["compfile"]["tmp_name"],"../_uploads/".$_FILES["compfile"]["name"]);
        $query=mysqli_query($con,"insert into tblcomplaints(userId,category,noc,complaintDetails,complaintFile) values('$uid','$category','$noc','$complaintdetials','$compfile')");
// code for show complaint number
        $sql=mysqli_query($con,"select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
        while($row=mysqli_fetch_array($sql))
        {
            $cmpn=$row['complaintNumber'];
        }
        $complainno=$cmpn;
        echo '<script> alert("Your complain has been successfully filled on queue with number  "+"'.$complainno.'")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
<!--    <link href="../assets/panel/vendor/sweetalert2/dist/css/sweetalert2.min.css" rel="stylesheet" media="all">-->
    <?php
    include "../includes/panel/header.php";
    ?>
    <link rel="stylesheet" href="../assets/panel/vendor/sweetalert2/dist/sweetalert2.min.css" type="text/css">
<!--    <script>-->
<!--        function getCat(val) {-->
<!--            //alert('val');-->
<!---->
<!--            $.ajax({-->
<!--                type: "POST",-->
<!--                url: "getsubcat.php",-->
<!--                data:'catid='+val,-->
<!--                success: function(data){-->
<!--                    $("#subcategory").html(data);-->
<!---->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    </script>-->

</head>

<body class="animsition">
<!--<body>-->
<div class="page-wrapper">
    <?php include "../includes/panel/navmenu.php";?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

<!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">New
                            <span>Complain</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
<!--         END WELCOME-->


<!-- Complain Form-->

        <div class="col-md-6 col-lg-6 offset-md-3">
            <div class="card">
                <div class="card-header">

                </div>
                <?php if(isset($successmsg))
                {?>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span><?php echo htmlentities($successmsg);?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }?>

                <?php if(isset($errormsg))
                {?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Error!</span>
                        <?php echo htmlentities($errormsg);?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }?>
                <div class="card-body card-block">

                    <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data">

                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Tile</label>
                                    <input type="text" name="noc" placeholder="Enter your Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="postal-code" class=" form-control-label">Category</label>
                                    <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
                                        <option value="">Select Category</option>
                                        <?php $sql=mysqli_query($con,"select id,categoryName from category ");
                                        while ($rw=mysqli_fetch_array($sql)) {
                                        ?>
                                            <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="description" class=" form-control-label">Description</label>
                            <textarea name="complaindetails" required="required" rows="9" class="form-control" maxlength="2000" placeholder="Type Complaint Details (max 2000 words).." class="form-control"></textarea>
                        </div>
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                <label for="file-input" class=" form-control-label">Optional: File upload</label>

                                <input type="file" name="compfile" class="form-control-file" value="" placeholder="">
                            </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger display-4" name="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>



<!-- End Complain Form-->

        <?php include "../includes/panel/footer.php";?>
        <script src="../assets/panel/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <script>
        <?php };?>
