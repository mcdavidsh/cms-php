<?php
require_once "framework/library/config/constant.php";
require_once "framework/library/config/config.php";
require_once "framework/library/includes/accounts.php";
session_start();
error_reporting(0);
if(isset($_POST['submit']))
{
    $ret=mysqli_query($con,"SELECT * FROM users WHERE userEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
    var_dump($ret);
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $extra="app/cpanel";//
        $_SESSION['login']=$_POST['username'];
        $_SESSION['id']=$num['id'];
        $host=$_SERVER['HTTP_HOST'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=1;
        $log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else
    {
        $_SESSION['login']=$_POST['username'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=0;
        mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
        $errormsg='<div class="alert alert-danger" role="alert">Invalid username or password</div>';
        $extra="login.php";

    }
}



if(isset($_POST['change']))
{
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT * FROM users WHERE userEmail='$email' and contactNo='$contact'");
    $num=mysqli_fetch_array($query);
    if($num>0)
    {
        mysqli_query($con,"update users set password='$password' WHERE userEmail='$email' and contactNo='$contact' ");
        $msg='<div class="alert alert-success" role="alert">Password Changed Successfully</div>';

    }
    else
    {
        $errormsg='<div class="alert alert-danger" role="alert">Invalid email id or Contact no</div>';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?> </title>
<?php include "framework/library/includes/header.php";?>
    <script type="text/javascript">
        function valid()
        {
            if(document.forgot.password.value!= document.forgot.confirmpassword.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.forgot.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>


<body class="animsition">

<?php include "framework/library/includes/navmenu.php";?>
    <section class="mbr-section form1 cid-qv7s7YQkMT" style="background: #f6f6f6;" id="form1-73" data-rv-view="2688">



        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="media-container-column col-lg-6 offset-sm" data-form-type="formoid">

                    <div class="form1" data-form-type="formoid" style="background: #ffffff; ">

                        <?php if(isset($errormsg)){
                            echo $errormsg;
                        }?>

                            <?php if(isset($msg)){
                                echo ($msg);
                            }?>
                        <!-- Default form login -->
             <form class="text-center border border-light p-5" method="post" name="frmLogin" id="frmLogin">

                            <p class="h4 mb-4">Login</p>

<!--                            <input type="text" name="utype" hidden value="customer">-->
                            <!-- Email -->
                            <input type="text" required name="username" class="form-control mb-4" placeholder="Email" autofocus>

                            <!-- Password -->
                            <input type="password" required name="password" class="form-control mb-4" placeholder="Password">

                            <div class="d-flex justify-content-around">
                                <div>
                                    <!-- Remember me -->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                                    </div>
                                </div>
                                <div>
                                    <!-- Forgot password -->
                                    <a href="">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Sign in button -->
                            <span class="input-group-btn py-3"><button  type="submit"  name="submit" class="btn btn-primary btn-form display-4" style="border-radius:50px;">Login</button></span>
<?php echo $user_a; ?>
                            <!-- Register -->
                            <p class="py-3">
                                Don't Have an Account Yet?
                                <a href="register.php">Signup</a>
                            </p>

                        </form>

                    </div>

                    <div class="form1" data-form-type="formoid">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include "framework/library/includes/footer.php"; ?>
</html>
