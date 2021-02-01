<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';
require_once '../../framework/library/config/PHPMailer.php';
session_start();

if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {

if (isset($_POST["submit"])) {

    $sender = $_POST['sender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $receiver = $_POST['receiver'];

    $sql = mysqli_query($con, "INSERT INTO stfcomplaints(sender,email,subject,message,maildate,receiver) VALUES
('$sender','$email','$subject','$message','$yjdate','$receiver')");

    $msgsuccess = '<div class="alert alert-success" role="alert">Message Sent Successfully. You will receive a reply shortly</div>';

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <?php
    include "../../framework/library/includes/panel/header.php";
    ?>
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }

    </script>
    <script data-ad-client="ca-pub-7432919353877864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<!--<body class="animsition">-->
<body>
<div class="page-wrapper">
    <?php include "../../framework/library/includes/panel/navmenu.php"; ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!--         WELCOME-->
        <section class="welcome py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Complaint
                            <span>Details</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!--         END WELCOME-->
        <!-- STATISTIC-->

        <div class="container">
            <div class="module">
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0"
                           class="datatable-1 table table-bordered table-striped	 display" width="100%">

                        <tbody>

                        <?php $st = 'closed';
                        $query = mysqli_query($con, "select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='" . $_GET['cid'] . "'");
                        while ($row = mysqli_fetch_array($query))
                        {

                        ?>
                        <tr>
                            <td><b>Complaint Number</b></td>
                            <td><?php echo htmlentities($row['complaintNumber']); ?></td>
                            <td><b>Title</b></td>
                            <td> <?php echo htmlentities($row['noc']); ?></td>
                            <td><b>Reg Date</b></td>
                            <td><?php echo htmlentities($row['regDate']); ?>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Department </b></td>
                            <td><?php echo ucwords($row['catname']); ?></td>

                        </tr>
                        <tr>
                            <td><b>Complaint Details </b></td>

                            <td colspan="5"> <?php echo htmlentities($row['complaintDetails']); ?></td>

                        </tr>


                        <tr>
                            <td><b>Final Status</b></td>

                            <td colspan="5"><?php if ($row['status'] == "") {
                                    echo "Not Process Yet";
                                } else {
                                    echo htmlentities($row['status']);
                                } ?></td>

                        </tr>

                        <?php $ret = mysqli_query($con, "select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='" . $_GET['cid'] . "'");
                        while ($rw = mysqli_fetch_array($ret)) {
                            ?>
                            <tr>
                                <td><b>Remark</b></td>
                                <td colspan="5"><?php echo htmlentities($rw['remark']); ?> <b>Remark Date
                                        :</b><?php echo htmlentities($rw['rdate']); ?></td>
                            </tr>

                            <tr>
                                <td><b>Status</b></td>
                                <td colspan="5"><?php echo htmlentities($rw['sstatus']); ?></td>
                            </tr>
                        <?php } ?>


                    </table>
                </div>
            </div>
        </div>


        <!--        New Responsive Table-->


        <?php include "../../framework/library/includes/panel/footer.php"; ?>


        <?php } ?>
        <?php } ?>

