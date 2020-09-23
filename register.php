<?php
include "config/constant.php";
include "config/config.php";
error_reporting(E_ALL);
if(isset($_POST['submit']))
{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $contactno=$_POST['contactno'];
    $status=1;
    $query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
    $msg='<div class="alert alert-success" role="alert">Registration Successful! <a href="'.$user_login.'" class="text-white font-weight-bold">Login</a> to get started.</div>';
}
?>
<!DOCTYPE html>
<html >
<head>
    <title><?php echo $pageTitle; ?> </title>
    <?php include "includes/header.php";?>

</head>


<body class="animsition">

<?php include "includes/navmenu.php";?>

<!--	<div class="jumbotron jumbotron-fluid jb-wrap d-none d-sm-block">-->
<!--  <div class="jumbotron jb-item">-->
<!--    <p class="jb-title">LOGIN</p>-->
<!--  </div>-->
<!--		<div class="breadcrumb mbr-breadcrumb"> <a href="index.php" class="breadcrumb-item mbr-breadcrumb-item active ">Home</a>-->
<!--			<a href="login.php" class="breadcrumb-item mbr-breadcrumb-item mbr-active">Login</a>-->
<!--	  </div>-->
<!--</div>-->

<!--	Login Form-->
<section class="mbr-section form1 cid-qv7s7YQkMT" style="background: #f6f6f6;" id="form1-73" data-rv-view="2688">



    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="media-container-column col-lg-6 col-md-8 offset-sm" data-form-type="formoid">
                <div data-form-alert="" hidden="">Check your email for instructions!</div>

                <div  class="form1" data-form-type="formoid" style="background: #ffffff; ">

                    <?php if(isset($msg)){
                        echo ($msg);
                    }?>
                    <!-- Default form login -->
                    <form  method="post" class="text-center border border-light p-5">

                        <p class="h4 mb-4">Signup</p>
<!--                    Name    -->

                        <input type="text" name="fullname" id="defaultLoginFormName" class="form-control mb-4" placeholder="Fullname">

                        <!-- Email -->
                        <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                        <input type="text" name="contactno" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Phone No." maxlength="11">
                        <!-- Password -->
                        <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
<!--                        Confirm Password-->


                        <div class="d-flex justify-content-around py-2">
                            <div>
                                <!-- Remember me -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" required aria-required="true">
                                    <label class="custom-control-label" for="defaultLoginFormRemember"><a href="#">Terms & Conditions</a></label>
                                </div>
                            </div>
                        </div>

                        <!-- Sign in button -->
                        <span class="input-group-btn"><button  type="submit" name="submit" class="btn btn-primary btn-form display-4" style="border-radius:50px;">Login</button></span>

                        <!-- Register -->
                        <p class="py-2">
                            Already Have an Account?
                            <a href="<?php echo $user_login;?>">Login</a>
                        </p>

                    </form>
                    <!-- Default form login -->
                </div>

                <div class="form1" data-form-type="formoid">
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "includes/footer.php";?>
