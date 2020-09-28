<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();
if(strlen($_SESSION['login'])==0)
{
    header('location:../login.php');
}
else{

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
    <?php include "../includes/panel/navmenu.php";?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Status
                            <span>Report</span>
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
                        <div class="col-md-4 col-lg-3 text-center">
                             <?php
//                            $total_cp="Total Complaint";
                            $rt = mysqli_query($con,"SELECT * FROM tblcomplaints");
                            $num1 = mysqli_num_rows($rt);
                            {?>
                            <div class="statistic__item">
                                <h3 class="desc py-2">Total Complaint</h3>
                                <span class="fa-3x mbr-icon"><?php echo htmlentities($num1) ;?></span>
                            </div>
                            <?php } ?>
                        </div>
    <div class="col-md-4 col-lg-3 text-center">
        <?php
        $status="in Process";
        $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
        $num1 = mysqli_num_rows($rt);
        {?>
        <div class="statistic__item">
            <h3 class="desc py-2">In Process Complaint</h3>
            <span class="fa-3x mbr-icon"><?php echo htmlentities($num1);?></span>
        </div>
    </div>
                        <?php }?>
    <div class="col-md-4 col-lg-3" style="text-align: center;">
                                        <?php

$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and status is null");
$num1 = mysqli_num_rows($rt);
{?>
        <div class="statistic__item">
            <h3 class="desc py-2">Open Complaint</h3>
            <span class="fa-3x mbr-icon"><?php echo htmlentities($num1);?></span>
        </div>
        <?php}?>
    </div>
    <div class="col-md-6 col-lg-3" style="text-align: center;" >
                              <?php
//  $status="closed";
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
        <div class="statistic__item" >
            <h3 class="desc py-2">Closed Complaint</h3>
            <span class="fa-3x mbr-icon"><?php echo htmlentities($num1);?></span>
        </div>

    </div>
                        <?php } ?>
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
                        <h3 class="title-5 m-b-35">Complain History</h3>

                        <div class="table table-responsive table-responsive-data2">
                            <table id="example" class="table nowrap table-data2" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Registration Date</th>
                                    <th>Last Update</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                <?php $query=mysqli_query($con,"select * from tblcomplaints where userId='".$_SESSION['id']."'");
                                while($row=mysqli_fetch_array($query))
                                {
                                ?><tr class="tr-shadow">
                                    <td><?php echo htmlentities($row['complaintNumber']);?></td>
                                    <td>
                                        <?php echo htmlentities($row['noc']);?>
                                    </td>
                                    <td><?php echo htmlentities($row['complaintType'])?></td>
                                    <td><?php echo htmlentities($row['regDate']);?></td>
                                    <td><?php echo  htmlentities($row['lastUpdationDate']);?></td>
                                    <td align="center"><?php
                                        $status=$row['status'];
                                        if($status=="" or $status=="NULL")
                                        { ?>
                                            <span class="badge badge-info" style="font-size: 14px;">Not Process Yet</span>
                                        <?php }
                                        if($status=="in process"){ ?>
                                           <span class="badge badge-warning" style="font-size: 14px;">In Process</span>
                                        <?php }
                                        if($status=="closed") {
                                            ?>
                                            <span class="badge badge-danger" style="font-size: 14px;">Closed</span>
                                        <?php } ?>
                                    <td align="center">
                                        <a href="complaint-details-old.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
                                            <button type="button" class="btn btn-sm btn-danger rounded">View Details</button></a>
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


        <?php include "../includes/panel/footer.php";?>

        <?php } ?>
        <?php } ?>
