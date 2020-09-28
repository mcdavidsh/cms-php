<?php
error_reporting(E_ALL);
require_once '../config/config.php';
require_once '../config/constant.php';
session_start();
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

}

if(isset($_POST['submit'])){
    $to = $_POST['recmail']; // this is your Email address
    $from = "demo@enetcode.com"; // this is the sender's Email address
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    $subject = $_POST['subject'];
    $message =  $_POST['message'];

    $headers = "From:" . $from;
    // $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
 
   $msg ='<div class="alert alert-success" role="alert">Email Sent Successfully</div>';
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
//     if (isset($_POST['submit'])) {
//         $headers = 'From:' .''. $sitename;
//         $recmail = $_POST['recmail'];
//         $subject = $_POST['subject'];
//         $message = $_POST['message'];

//         mail($recmail, $subject, $headers);
//         $msg ='<div class="alert alert-success" role="alert">Email Sent Successfully</div>';
//   }


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><?php echo $pageTitle; ?></title>
        <?php
        include "../includes/panel/header.php";
        ?>
        <script>
            function callOnPageLoad(){
                document.getElementById("textareaEx").style.height="1px";
                document.getElementById("textareaEx").style.height=(25+document.getElementById("textareaEx").scrollHeight)+"px";
            }
        </script>
    </head>

<body class="animsition" onload="callOnPageLoad()">
<div class="page-wrapper">
    <?php include "../includes/admin/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

    <!--         WELCOME-->
    <section class="welcome py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-4">Read
                        <span>Mail</span>
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
                        <div class="col-md-6 col-lg-6">
                            <div class="card">
                                <?php $st='closed';
                                $query=mysqli_query($con,"SELECT maildate,sender,subject,email, message FROM mails WHERE mailid='".$_GET['cid']."'");

                                while($row=mysqli_fetch_array($query))
                                {

                                    ?>
                                    <div class="card-header">
                                        <small class="float-right"><?php echo ($row['maildate']); ?></small>
                                        <?php echo ($row['subject']); ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">

                                                <div class="col card-title" style="font-size: 18px; font-weight: 600;">Sender: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo ($row['sender']); ?></span></div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="col card-title"  style="font-size: 18px; font-weight: 600;">Email: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo ($row['email']); ?></span></div>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-md-8 col-lg-8">
                                                <div class="col card-title"  style="font-size: 18px; font-weight: 600;">Subject: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo ($row['subject']); ?></span></div>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-md-10 col-lg-10">
                                                <div class="col card-title"  style="font-size: 18px; font-weight: 600;">Message: <span class="card-text pl-2" style="font-weight: lighter; font-size: 14px;"><?php echo ($row['message']); ?></span></div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 ">
                            <div class="card">
                                <div class="card-header">
                                  Reply Mail
                                </div>
                                <?php if (isset($msg)) {
                                    ?>
                                    <?php echo $msg; ?>

                                <?php } ?>

                                <div class="card-body card-block">

                                    <form class="form-horizontal style-form" method="post" name="complaint"
                                          enctype="multipart/form-data">

                                        <div class="row ml-auto mr-auto form-group">
                                            <div class="col-md-8 col-lg-8">
                                                <div class="form-group">
                                                    <label for="Title" class=" form-control-label"></label>
                                                    <input type="text" name="sender"  placeholder="<?php echo "Replying as".' '. ucwords($_SESSION['alogin']); ?>" disabled
                                                           class="form-control">
                                                    <label for="Title" class=" form-control-label py-2"> <?php echo "Send to:" .' '.ucwords($row['sender']); ?></label>
                                                    <input type="text" name="recmail" placeholder="<?php echo $row['email']; ?>"
                                                           class="form-control">
                                                    <label for="Title" class=" form-control-label">Subject</label>
                                                    <input type="text" required name="subject" placeholder="Enter Subject"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-8">
                                                <div class="form-group">
                                                    <label for="Title" class=" form-control-label">Message</label>
                                                    <textarea name="message" required onkeyup="callOnPageLoad()" id="textareaEx" style="overflow:hidden; text-align: left; margin: 0; padding: 0;"
                                                              class="form-control" rows="9">"
                                                        <?php
                                                        echo "Replying".'"'.$row['subject'].'"'.$row['message'];
                                                        ?>
"
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger display-4" name="submit">Reply Email
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
    </section>


    <!--        New Responsive Table-->


    <?php include "../includes/panel/footer.php"; ?>


        <?php } ?>
