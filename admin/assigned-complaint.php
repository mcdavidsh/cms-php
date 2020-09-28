<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();

$_SESSION['page_one'] = time();
if(strlen($_SESSION['alogin'])==0)
{
    header('location:login.php');
}
else{
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );



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
    <?php include "../includes/admin/navmenu.php";?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Assigned
                            <span>Complaints</span>
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
                            <div class="col-md-6 col-lg-3" style="text-align: center;" >

                            </div>
                            <div class="col-md-6 col-lg-3 offset-1 text-center">
                                <?php
                                $status="Assigned";
                                $rt = mysqli_query($con,"SELECT * FROM tblcomplaints where  astatus='$status'");
                                $num1 = mysqli_num_rows($rt);
                                {?>
                                    <div class="statistic__item">
                                        <h3 class="desc py-2"><?php echo $status;?></h3>
                                        <span class="fa-3x mbr-icon">
<?php echo htmlentities($num1) ;?>
                                </span>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <?php }?>
                        <div class="col-md-4 col-lg-3" style="text-align: center;">

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
                        <h3 class="title-5 m-b-35">Assigned List</h3>

                        <div class="table table-responsive table-responsive-data2">
                            <table id="example" class="table nowrap table-data2" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Complain Title</th>
                                    <th>Department</th>
                                    <th>Reg Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <!--                                    <th></th>-->
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                <?php
                                $st='Assigned';
                                $query=mysqli_query($con,"select tblcomplaints.*,users.fullName as name, category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.astatus='$st'");
                                while($row=mysqli_fetch_array($query))
                                {
                                    ?>
                                    <tr class="tr-shadow">
                                        <td><?php echo htmlentities($row['complaintNumber']);?></td>
                                        <td><?php echo htmlentities($row['name']);?></td>
                                        <td><?php echo htmlentities($row['catname']);?></td>
                                        <td><?php echo htmlentities($row['regDate']);?></td>

                                        <td><span type="button" class="badge py-1 font-weight-bold badge-warning"><?php echo $status;?></span></td>

                                        <td>   <a class="btn btn-primary btn-sm" href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"> View Details</a>
                                        </td>
                                    </tr>
                                <?php }?>
                             
                                <!--                                    <tr class="spacer"></tr>-->



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
