<?php

require_once "../../framework/library/config/constant.php";
require_once "../../framework/library/config/config.php";
require_once "../../framework/library/includes/accounts.php";

session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM staff WHERE username='$username' and password='$password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "index.php";//
        $_SESSION['slogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['errmsg'] = "<div class=\"alert alert-danger\" role=\"alert\">Invalid username or password</div>";
        $extra = "login.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "Staff" . '-' . $pageTitle; ?> </title>
    <?php include "../../framework/library/includes/admin/header.php"; ?>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>


<body class="animsition">

<!--	Login Form-->
<section class="mbr-section form1 cid-qv7s7YQkMT" style="background: #f6f6f6;" id="form1-73" data-rv-view="2688">


    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="media-container-column col-lg-6 offset-sm" data-form-type="formoid">

                <div class="form1" data-form-type="formoid" style="background: #ffffff; ">
                    <?php if (isset($_SESSION['errmsg'])) {

                        echo $_SESSION['errmsg'];
                        $_SESSION['errmsg'] = "";
                    }
                    ?>
                    <!-- Default form login -->
                    <form class="text-center border border-light p-5" method="post">

                        <p class="h4 mb-4">Staff login</p>

                        <!-- Email -->
                        <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4"
                               placeholder="Username">

                        <!-- Password -->
                        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4"
                               placeholder="Password" name="password">

                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Remember me -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember
                                        me</label>
                                </div>
                            </div>
                            <div>
                                <!-- Forgot password -->
                                <a href="">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Sign in button -->
                        <button class="btn btn-primary btn-block my-5" name="submit" type="submit">Sign in</button>
  <?php echo $staff_a;?>
                        <!-- Register -->
                        <p class="py-2">
                            <a href="../../index.php">Go To Homepage</a>
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

<?php include "../../framework/library/includes/footer.php"; ?>
</body>
</html>
