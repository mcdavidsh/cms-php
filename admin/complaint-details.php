<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';

session_start();
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
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
    <?php include "../includes/admin/navmenu.php";
    ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">


        <!--         WELCOME-->
        <section class="welcome py-5">
   <?php $st='closed';
                        $query=mysqli_query($con,"select tblcomplaints.*,users.fullName as name,users.contactNo as contact, users.address as address, category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
                        while($row=mysqli_fetch_array($query))
                        {   ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Complaint


                            <span>Details - <?php if($row['status']=="")
                                { echo "Not Process Yet";
                                } elseif($row['astatus']=="Assigned") {
                                    echo ucwords($row['astatus']);
                                }
                                else{
                                    
                                echo ucwords($row['astatus']);}
                                ?> </span>


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

                     
                        <thead>
                        <tr>
                            <th colspan="2">
                                <b>Complaint Number</b>:
                                <?php
                                echo htmlentities($row['complaintNumber']);?>
                            </th>
                            <th colspan="2">

                                <b>Title</b>:
                                <?php echo htmlentities($row['noc']);?>
                            </th>

                            <th colspan="2" class="small">
                                <b>Reg Date</b>:
                                <?php echo htmlentities($row['regDate']);?>
                            </th>
                        </tr>
                        </thead>
                        <hr>
                        <tbody>



                        <tr>
                            <td><b>User Fullname</b></td>
                            <td><?php echo htmlentities($row['name']);?></td>
                            <td><b>User Phone</b></td>
                            <td> <?php echo htmlentities($row['contact']);?></td>
                            <td><b>User Address</b></td>
                            <td><?php echo htmlentities($row['address']);?>
                            </td>
                        </tr>




                        <tr>
                            <td><b>Date of Occurrence</b></td>
                            <td><?php echo htmlentities($row['dateoc']);?></td>
                            <td><b>Department </b></td>
                            <td><?php echo ucwords($row['catname']);?></td>

                        </tr>


                        <tr>
                            <td><b>Name of Organization</b></td>
                            <td><?php echo ucwords($row['nameorg']);?></td>
                            <td><b>Address of Organization</b></td>
                            <td><?php echo ucwords($row['addorg']);?></td>
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
                                    <a type="button" class="btn btn-primary text-white btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        View File
                                    </a>
                                <?php } ?></td>

                        </tr>

                        <tr>
                            <td><b>Final Status</b></td>

                            <td><?php  if($row['status']=="")
                                { echo "Not Process Yet";
                                } else {
                                    echo htmlentities($row['status']);
                                }?>

                            </td>

                            <td><b>Priority</b></td>
                            <td><?php
                                // $high = '';

                                // $medium ='<div class="badge badge-warning">Medium</div>';

                                // $low ='<div class="badge badge-info">Low</div>';
                                if($row['priority']=="High"){

                                    echo'<div class="badge badge-danger">High</div>';
                                }

                                elseif ($row['priority']=="Medium")
                                {
                                    echo '<div class="badge badge-warning">Medium</div>';
                                }
                                else
                                {
                                    echo '<div class="badge badge-info">Low</div>';
                                }

                                ?></td>
                        </tr>


                        <?php $ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");

                        while($rw=mysqli_fetch_array($ret))
                        {

                        ?>

                        <tr>
                            <td><b>Remark</b></td>
                            <td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date :</b><?php echo  htmlentities($rw['rdate']); ?></td>
                            <?php }?>
                        </tr>



                        <?php if($row['status']=="closed" ){

                        } else {?>
                            <tr>
                            <td><b>Action</b></td>

                            <td>

                                <a href="javascript:void(0);" onClick="popUpWindow('update-complaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
                                    <button type="button" class="btn btn-primary">Take Action</button></td>
                            </a></td>
                            <?php if($row['status']=="in process") {

                            } else {?>
                                <td colspan="4">
                                    <a href="javascript:void(0);" onClick="popUpWindow('assign-case.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Assign To Staff">
                                        <button type="button" class="btn btn-primary">Assign</button></a></td>


                                </tr>
                                <?php } ?>
                        <?php } ?>
</tbody>
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
                        <img src="../_uploads/<?php echo $row['complaintFile'];?>" class="img-thumbnail rounded">
                    </div>
                </div>
            </div>
        </div>


        <?php include "../includes/panel/footer.php"; ?>


        <?php } ?>
    