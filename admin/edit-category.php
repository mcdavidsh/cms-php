<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();
if(strlen($_SESSION['alogin'])==0)
{
    header('location:login.php');
}
else{
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $description=$_POST['description'];
    $id=intval($_GET['id']);
    $sql=mysqli_query($con,"update category set categoryName='$category',categoryDescription='$description' where id='$id'");
    $_SESSION['msg']='<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button>Category Updated</div>';

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
                    <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from category where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="Title" class=" form-control-label">Type Name</label>
                                <input type="text" name="category" placeholder="Enter Name" class="form-control" value="<?php echo  htmlentities($row['categoryName']);?>" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="description" class=" form-control-label">Description</label>
                        <textarea name="description" required="required" rows="9" class="form-control" maxlength="2000" placeholder="Enter type description" class="form-control" ><?php echo  htmlentities($row['categoryDescription']);?></textarea>
                    </div>
<?php } ?>
                    <button type="submit" class="btn btn-danger display-4" name="submit">Update</button>
                </form>

            </div>
        </div>
    </div>


    <!--        New Responsive Table-->


    <?php include "../includes/panel/footer.php";?>
        <?php } ?>
