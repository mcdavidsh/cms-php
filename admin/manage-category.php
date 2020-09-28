<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}
else{
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $description=$_POST['description'];
    $sql=mysqli_query($con,"insert into category(categoryName,categoryDescription) values('$category','$description')");
    $_SESSION['msg']= '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button>Department created</div>';

}

if(isset($_GET['del']))
{
    mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
    $_SESSION['delmsg']='<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button>Department deleted</div>';
}


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
                        <h1 class="title-4">Manage
                            <span>Catergory</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!--         END WELCOME-->
        <div class="col-md-6 col-lg-6 offset-md-3">
            <div class="card">
                <div class="card-header">
Create Category
                </div>
                <?php if(isset($_POST['submit']))
                {?>

                	<?php echo $_SESSION['msg'];?>

                    <?php echo $_SESSION['msg']="";?>
                <?php }?>
                <?php if(isset($_GET['del']))
                {?>

                       	<?php echo $_SESSION['delmsg'];?><?php echo $_SESSION['delmsg']="";?>

                <?php } ?>


                <div class="card-body card-block">

                    <form class="form-horizontal style-form" method="post" name="Category" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="Title" class=" form-control-label">Type Name</label>
                                    <input type="text" name="category" placeholder="Enter Name" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="description" class=" form-control-label">Description</label>
                            <textarea name="description" required="required" rows="9" class="form-control" maxlength="2000" placeholder="Enter type description" class="form-control" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger display-4" name="submit">Create</button>
                    </form>

                </div>
            </div>
        </div>

        <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Manage Categories</h3>

                        <div class="table table-responsive table-responsive-data2">
                            <table id="example" class="table nowrap table-data2" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Creation date</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                    <!--                                    <th></th>-->
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                <?php $query=mysqli_query($con,"select * from category");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                    ?>
                                    <tr class="tr-shadow">
                                        <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php echo htmlentities($row['categoryName']);?></td>
                                        <td><?php echo htmlentities($row['categoryDescription']);?></td>
                                        <td> <?php echo htmlentities($row['creationDate']);?></td>
                                        <td><?php echo htmlentities($row['updationDate']);?></td>

                                        <td>
                                            <a href="edit-category.php?id=<?php echo $row['id']?>" ><i class="fas fa-edit"></i></a>
                                            <a href="manage-category.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fas fa-times-circle"></i></a></td>
                                    </tr>

                                    <?php $cnt=$cnt+1; } ?>
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
<?php } ?>