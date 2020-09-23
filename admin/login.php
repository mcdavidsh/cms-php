<?php
error_reporting(E_ALL);

require_once "../config/constant.php";
require_once "../config/config.php";

session_start();
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $extra="admin-home.php";//
        $_SESSION['alogin']=$_POST['username'];
        $_SESSION['id']=$num['id'];
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else
    {
        $_SESSION['errmsg']="<div class=\"alert alert-danger\" role=\"alert\">Invalid username or password</div>";
        $extra="login.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "Admin".'-'.$pageTitle; ?> </title>
    <?php include "../includes/admin/header.php";?>
</head>


<body class="animsition">

<!--	Login Form-->
<section class="mbr-section form1 cid-qv7s7YQkMT" style="background: #f6f6f6;" id="form1-73" data-rv-view="2688">



    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="media-container-column col-lg-6 offset-sm" data-form-type="formoid">

                <div class="form1" data-form-type="formoid" style="background: #ffffff; ">
                    <?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?>
                    <!-- Default form login -->
                    <form class="text-center border border-light p-5" method="post">

                        <p class="h4 mb-4">Admin login</p>

                        <!-- Email -->
                        <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username">

                        <!-- Password -->
                        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password">

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
                        <button class="btn btn-primary btn-block my-5" name="submit" type="submit">Sign in</button>

                        <!-- Register -->
                        <p>
                            <a href="../index.php">Go To Homepage</a>
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
<!--	Footer -->
<!--<section class="cid-r6Vq2EonjM" id="footer4-f">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-12 text1 col-lg-6">-->
<!--                <p class="mbr-text mbr-bold links mbr-fonts-style align-left display-7"> IMS 2020 &copy; All Rights Reserved </p>-->
<!--            </div>-->
<!--            &lt;!&ndash;-->
<!--                  <div class="col-md-12 copyright align-right text2 col-lg-6">-->
<!--                    <p class="mbr-text mbr-bold mbr-fonts-style display-5"> Premium Bootstrap Templates </p>-->
<!--                  </div>-->
<!--            &ndash;&gt;-->
<!--            <div class="col-lg-4 col-md-12"> </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<script src="../assets/web/assets/jquery/jquery.min.js"></script>
<script src="../assets/popper/popper.min.js"></script>
<script src="../assets/tether/tether.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/smooth-scroll/smooth-scroll.js"></script>
<script src="../assets/dropdown/js/script.min.js"></script>
<script src="../assets/jarallax/jarallax.min.js"></script>
<script src="../assets/jquery-mb-ytplayer/jquery.mb.ytplayer.min.js"></script>
<script src="../assets/jquery-mb-vimeo_player/jquery.mb.vimeo_player.js"></script>
<script src="../assets/touch-swipe/jquery.touch-swipe.min.js"></script>
<script src="../assets/theme/js/script.js"></script>
<script src="../assets/formoid/formoid.min.js"></script>
</body>
</html>
