<?php
include "config/constant.php";
include "config/config.php";

date_default_timezone_set('Africa/Lagos');// change according timezone

$yjdate = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST["msgsend"])) {

    $sender = $_POST['sender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $receiver = $_POST['receiver'];

    $sql = mysqli_query($con, "INSERT INTO mails(sender,email,subject,message,maildate,receiver) VALUES
('$sender','$email','$subject','$message','$yjdate','$receiver')");

    $msgsuccess = '<div class="alert alert-success" role="alert">Message Sent Successfully. You will receive a reply shortly</div>';

}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?> </title>
    <?php include "includes/header.php";?>
</head>


<body class="animsition">
<?php include "includes/navmenu.php" ?>

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
        <div class="row justify-content-center py-5 " style="background: #ffffff; ">
            <div class="media-container-column col-lg-10 offset-sm" data-form-type="formoid">


                <div class="form1" data-form-type="formoid">

                 
                    <?php if(isset($msgsuccess)) {

                        echo $msgsuccess;
                        $msgsuccess = "";
                    }
                    ?>
                    <!-- Default form login -->
                    <form class="text-center border border-light p-5" method="post">

                        <p class="h4 mb-4">Contact Us</p>
                        <!--                    Name    -->
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" id="defaultLoginFormName" name="sender" class="form-control mb-4" placeholder="Fullname">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4"
                                       placeholder="E-mail" name="email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <select name="receiver" class="form-control" hidden>
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM admin");
                            while($rows = mysqli_fetch_array($result))
                            {?>
                                <option value="<?php echo $rows['username'];?>"></option>
                            <?php
                            }
                            ?>
                        </select>
                        </div>
                        <!-- Password -->
                        <input type="text" id="default" class="form-control mb-4"
                               placeholder="Subject" name="subject">
                        <div class="form-group">
                            <!--                            <label for="exampleFormControlTextarea3" class="align-left">Message</label>-->
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea3" rows="7"
                                      placeholder="Type Message......."></textarea>
                        </div>


                        <!-- Sign in button -->
                        <span class="input-group-btn float-left">
                            <button type="submit" name="msgsend"
                                    class="btn btn-primary btn-form display-4"
                                                                         style="border-radius:50px;">Send</button></span>

                        <!-- Register -->
                        <p>
                    </form>
                    <!-- Default form login -->
                </div>

                <div class="form1" data-form-type="formoid">
                </div>
            </div>
        </div>
    </div>
<!--    --><?php //mail($subject ,$sender, $email, $message );?>
</section>
<?php include "includes/footer.php";?>
<?php //}?>
