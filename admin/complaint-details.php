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

                <div class="container">
                    <div class="module">
<!--                        <div class="module-head">-->
<!--                            <h3>Complaint Details</h3>-->
<!--                        </div>-->
                        <div class="module-body table">
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">

                                <tbody>

                                <?php $st='closed';
                                $query=mysqli_query($con,"select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
                                while($row=mysqli_fetch_array($query))
                                {

                                    ?>
                                    <tr>
                                        <td><b>Complaint Number</b></td>
                                        <td><?php echo htmlentities($row['complaintNumber']);?></td>
                                        <td><b>Complainant Name</b></td>
                                        <td> <?php echo htmlentities($row['name']);?></td>
                                        <td><b>Reg Date</b></td>
                                        <td><?php echo htmlentities($row['regDate']);?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Category </b></td>
                                        <td><?php echo htmlentities($row['catname']);?></td>
<!--                                        <td><b>SubCategory</b></td>-->
<!--                                        <td> --><?php //echo htmlentities($row['subcategory']);?><!--</td>-->
                                        <td><b>Complaint Type</b></td>
                                        <td><?php echo htmlentities($row['complaintType']);?>
                                        </td>
                                    </tr>
                                    <tr>
<!--                                        <td><b>State </b></td>-->
<!--                                        <td>--><?php //echo htmlentities($row['state']);?><!--</td>-->
<!--                                        <td ><b>Nature of Complaint</b></td>-->
<!--                                        <td colspan="3"> --><?php //echo htmlentities($row['noc']);?><!--</td>-->

                                    </tr>
                                    <tr>
                                        <td><b>Complaint Details </b></td>

                                        <td colspan="5"> <?php echo htmlentities($row['complaintDetails']);?></td>

                                    </tr>

                                    </tr>
                                    <tr>
                                        <td><b>File(if any) </b></td>

                                        <td colspan="5"> <?php $cfile=$row['complaintFile'];
                                            if($cfile=="" || $cfile=="NULL")
                                            {
                                                echo "File NA";
                                            }
                                            else{?>
                                                <a href="../_uploads/<?php echo htmlentities($row['complaintFile']);?>" target="_blank"/> View File</a>
                                            <?php } ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Final Status</b></td>

                                        <td colspan="5"><?php if($row['status']=="")
                                            { echo "Not Process Yet";
                                            } else {
                                                echo htmlentities($row['status']);
                                            }?></td>

                                    </tr>

                                    <?php $ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
                                    while($rw=mysqli_fetch_array($ret))
                                    {
                                        ?>
                                        <tr>
                                            <td><b>Remark</b></td>
                                            <td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date :</b><?php echo  htmlentities($rw['rdate']); ?></td>
                                        </tr>

                                        <tr>
                                            <td><b>Status</b></td>
                                            <td colspan="5"><?php echo  htmlentities($rw['sstatus']); ?></td>
                                        </tr>
                                    <?php }?>





                                    <tr>
                                        <td><b>Action</b></td>

                                        <td>
                                            <?php if($row['status']=="closed"){

                                            } else {?>
                                            <a href="javascript:void(0);" onClick="popUpWindow('update-complaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
                                                <button type="button" class="btn btn-primary">Take Action</button></td>
                                        </a><?php } ?></td>
                                        <td colspan="4">
                                            <a href="javascript:void(0);" onClick="popUpWindow('assign.php?uid=<?php echo htmlentities($row['userId']);?>');" title="Update order">
                                                <button type="button" class="btn btn-primary">Assign</button></a></td>

                                    </tr>
                                <?php  } ?>

                            </table>
                        </div>
                    </div>
                </div>


        <!--        New Responsive Table-->


        <?php include "../includes/panel/footer.php"; ?>


        <?php } ?>
