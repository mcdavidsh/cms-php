<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';

session_start();
if (strlen($_SESSION['login']) == 0)
{
    header('location:index.php');
}
else{
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date('d-m-Y h:i:s A', time());


if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['password']) . "' && userEmail='" . $_SESSION['login'] . "'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $con = mysqli_query($con, "update users set password='" . md5($_POST['newpassword']) . "', updationDate='$currentTime' where userEmail='" . $_SESSION['login'] . "'");
        $successmsg = "Password Changed Successfully";
    } else {
        $errormsg = "Old Password not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.password.value == "") {
                alert("Current Password Filed is Empty !!");
                document.chngpwd.password.focus();
                return false;
            } else if (document.chngpwd.newpassword.value == "") {
                alert("New Password Filed is Empty !!");
                document.chngpwd.newpassword.focus();
                return false;
            } else if (document.chngpwd.confirmpassword.value == "") {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body class="animsition">
<div class="page-wrapper">
    <?php include "../../framework/library/includes/panel/navmenu.php"; ?>


    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Account
                            <span>Settings</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!--         END WELCOME-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 offset-md-3">
                        <div class="card">
                            <div class="card-header">Change Password</div>
                            <?php if (isset($successmsg)) {
                                ?>

                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Success</span><?php echo htmlentities($successmsg); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <?php if (isset($errormsg)) {
                                ?>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">Error!</span>
                                    <?php echo htmlentities($errormsg); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <div class="card-body card-block">
                                <form class="form-horizontal style-form" method="post" name="chngpwd"
                                      onSubmit="return valid();">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>
                                            <input placeholder="Current Password" type="password" name="password"
                                                   required="required" autofocus class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>
                                            <input type="password" name="newpassword" required="required"
                                                   class="form-control" placeholder="New Password">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>
                                            <input type="password" name="confirmpassword" required="required"
                                                   class="form-control" placeholder="Confirm New Password">

                                        </div>
                                    </div>

                                    <div class="form-actions form-group">
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include "../../framework/library/includes/panel/footer.php"; ?>
        <?php } ?>
