<?php
include "framework/library/config/constant.php";
include "framework/library/config/config.php";
error_reporting(E_ALL);

$contactno = "";
$email = "";
if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $status = 1;
//    Check Duplicate User
    $sql_u = "SELECT * FROM users WHERE contactNo ='$contactno'";
    $sql_e = "SELECT * FROM users WHERE userEmail ='$email'";
    $res_u = mysqli_query($con, $sql_u);
    $res_e = mysqli_query($con, $sql_e);
    if (mysqli_num_rows($res_u) > 0) {
        $msg = '<div class="alert alert-warning" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>Email ' . $email . ' Already Exists, Try Again.</div>';
    } else if (mysqli_num_rows($res_e) > 0) {
        $msg = '<div class="alert alert-warning" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>Phone No. ' . $contactno . ' Already Exists, Try Again. </div>';
    } else {

        $query = mysqli_query($con, "insert into users(fullName,userEmail,password,contactNo,address,status) values('$fullname','$email','$password','$contactno','$address','$status')");
        $msg = '<div class="alert alert-success" role="alert">Registration Successful! <a href="' . $user_login . '" class="text-white font-weight-bold">Login</a> to get started.</div>';
    }
}
?>
<!DOCTYPE html>
<html >
<head>
    <title><?php echo $pageTitle; ?> </title>
    <?php include "framework/library/includes/header.php";?>
<script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>


<body class="animsition">

<?php include "framework/library/includes/navmenu.php";?>

<section class="mbr-section form1 cid-qv7s7YQkMT" style="background: #f6f6f6;" id="form1-73" data-rv-view="2688">



    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="media-container-column col-lg-6 col-md-8 offset-sm" data-form-type="formoid">

                <div  class="form1" data-form-type="formoid" style="background: #ffffff; ">
                    
                    <?php if(isset($msg)) {

                        echo $msg;
                       $msg = "";
                    }
;
                ?>
                    <!-- Default form login -->
                    <form  method="post" class="text-center border border-light p-5">

                        <p class="h4 mb-4">Registration Form</p>
<!--                    Name    -->

                        <input type="text" name="fullname" id="defaultLoginFormName" class="form-control mb-4" placeholder="Fullname">

                        <!-- Email -->
                        <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                        <input type="text" name="contactno" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Phone No." maxlength="11">
                        <input type="text" name="address" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Home Address">
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
                        <span class="input-group-btn"><button  type="submit" name="submit" class="btn btn-primary btn-form display-4" style="border-radius:50px;">Register</button></span>

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

<?php include "framework/library/includes/footer.php";?>
