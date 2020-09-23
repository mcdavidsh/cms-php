<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
require_once '../config/PHPMailer.php';
session_start();

if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {

if(isset($_POST["submit"])) {

    $sender = $_POST['sender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $receiver = $_POST['receiver'];

    $sql = mysqli_query($con, "INSERT INTO stfcomplaints(sender,email,subject,message,maildate,receiver) VALUES
('$sender','$email','$subject','$message','$yjdate','$receiver')");

    $msgsuccess = '<div class="alert alert-success" role="alert">Message Sent Successfully. You will receive a reply shortly</div>';

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <?php
    include "../includes/panel/header.php";
    ?>
    <script language="javascript" type="text/javascript">
        var popUpWin=0;
        function popUpWindow(URLStr, left, top, width, height)
        {
            if(popUpWin)
            {
                if(!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
        }

    </script>
</head>

<!--<body class="animsition">-->
<body>
<div class="page-wrapper">
    <?php include "../includes/admin/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Complaint
                            <span>Details</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!--         END WELCOME-->
        <!-- STATISTIC-->

                <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-md-1">
                                <div class="card">
                                    <?php $st='closed';
                                    $query=mysqli_query($con,"select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
                                    while($row=mysqli_fetch_array($query))
                                    {

                                    ?>
                                    <div class="card-header">
                                        <small class="float-right"><?php echo htmlentities($row['regDate']);?></small>
                                        <div class="card-title">Complaint Name: <?php echo htmlentities($row['name']);?></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">

                                                <div class="card-title" style="font-size: 18px; font-weight: 600;">Complaint No: <span class="card-text pl-2" style="font-weight: 500; font-size: 15px;"><?php echo htmlentities($row['complaintNumber']);?></span></div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="card-title"  style="font-size: 18px; font-weight: 600;">Category: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo ($row['catname']); ?></span></div>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="col card-title"  style="font-size: 18px; font-weight: 600;">File: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php $cfile=$row['complaintFile'];
                                                        if($cfile=="" || $cfile=="NULL")
                                                        {
                                                            echo "File NA";
                                                        }
                                                        else{?>
                                                            <a href="../_uploads/<?php echo htmlentities($row['complaintFile']);?>" target="_blank"/> View File</a>
                                                        <?php } ?></span></div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="col card-title"  style="font-size: 18px; font-weight: 600;">Final Status: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php if($row['status']=="")
                                                        { echo "Not Process Yet";
                                                        } else {
                                                            echo htmlentities($row['status']);
                                                        }?></span></div>
                                            </div>

                                        </div>
                                        <div class="row py-3">
                                            <?php $ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
                                            while($rw=mysqli_fetch_array($ret))
                                            {?>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="col card-title"  style="font-size: 18px; font-weight: 600;">Remarks: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo  htmlentities($rw['remark']); ?>
                                                    </span></div></div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class=" card-title"  style="font-size: 18px; font-weight: 600;">Remark Date: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo  htmlentities($rw['rdate']); ?>
                                                    </span></div></div>
                                        </div>

                                    </di>
                                        <div class="row py-3">
                                            <div class="col-md-4 col-lg-6">
                                                <div class="card-title"  style="font-size: 18px; font-weight: 600;">Status: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo  htmlentities($rw['sstatus']); ?>
                                                    </span>
                                                </div>

                                            </div>
                                            <?php }?>
                                        </div>
                                    <div class="row py-3">
                                        <div class="col-md-4 col-lg-6">
                                            <div class="col card-title"  style="font-size: 18px; font-weight: 600;">Complain Deatils: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;">
 <?php echo htmlentities($row['complaintDetails']);?>
                                                    </span>
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row ml-2">
                                            <div class="card-title px-4"><h5>Action:</h5></div>

                                            <div class="btn-group-sm btn-block">
                                                <?php if($row['status']=="closed"){

                                                } else {?>                                              <a href="javascript:void(0);" onClick="popUpWindow('update-complaint.php?cid=<?php echo $row['complaintNumber'];?>');" title="Update order">
                                                        <button type="button" class="btn btn-primary">Update</button></a><?php } ?>

                                                    <button type="submit" name="submit" class="btn btn-primary">Forward</button>

                                            </div>

                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>


        <!--        New Responsive Table-->


        <?php include "../includes/panel/footer.php"; ?>


        <?php } ?>
