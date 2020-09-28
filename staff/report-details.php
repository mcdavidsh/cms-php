<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();

if (strlen($_SESSION['slogin']) == 0) {
    header('location:login.php');
} else {


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
        <?php $st='closed';
        $query=mysqli_query($con,"select comreport.*,staff.fullName as name,staff.department as dept category.categoryName as catname from comreport join users on users.id=comreport.userId join category on category.id=comreport.category where comreport.rcomplaintNumber='".$_GET['cid']."'");
        while($row=mysqli_fetch_array($query))
        {   ?>
        <!--         WELCOME-->
        <section class="welcome py-5">
            <?php

            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Report


                            <span>Details </span>


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
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-2 table table-bordered table-striped	 display" width="100%">

                        <caption></caption>
                        <thead>
                        <tr>
                            <th colspan="2">
                                <b>Complaint Number</b>:
                                <?php echo htmlentities($row['rcomplaintNumber']);?>
                            </th>
                            <th colspan="2">

                                <b>Title</b>:
                                <?php echo htmlentities($row['rstatus']);?>
                            </th>
                            <th colspan="2" class="small">
                                <b>Reg Date</b>:
                                <?php echo htmlentities($row['rdate']);?>
                            </th>
                        </tr>
                        </thead>
                        <hr>
                        <tbody>



                        <tr>
                            <td><b>Staff Fullname</b></td>
                            <td><?php echo htmlentities($row['name']);?></td>
                            <td><b>Staff Department</b></td>
                            <td> <?php echo htmlentities($row['dept']);?></td>
                        </tr>

                        <tr>
                            <td><b>Complaint Details </b></td>

                            <td colspan="5"> <?php echo htmlentities($row['rremark']);?></td>

                        </tr>

                        </tr>
                        <tr>
                            <td><b>File(if any) </b></td>

                            <td colspan="5"> <?php $cfile=$row['rfile'];
                                if($cfile=="" || $cfile=="NULL")
                                {
                                    echo "File Not Available";
                                }
                                else{?>
                                    <a type="button" class="btn btn-primary text-white btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        View File/Download
                                    </a>
                                <?php } ?></td>

                        </tr>
<!--                        <tr>-->
<!--                                <td><b>Action</b></td>-->
<!---->
<!--                                <td>-->
<!---->
<!--                                    <a href="javascript:void(0);" onClick="popUpWindow('update-complaint.php?cid=--><?php //echo htmlentities($row['complaintNumber']);?>//');" title="Update order">
//                                        <button type="button" class="btn btn-primary">Take Action</button></td>
//                                </a></td>
//                            </tr>
                        <?php } ?>
                        <?php  } ?>

                    </table>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-transparent">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <img src="../_uploads/<?php echo $row['rfile'];?>" class="img-thumbnail rounded">
                    </div>
                </div>
            </div>
        </div>


        <?php include "../includes/panel/footer.php"; ?>


        <?php } ?>
        <?php } ?>
        <?php } ?>
