<?php
require_once '../../framework/library/config/config.php';
require_once '../../framework/library/config/constant.php';

session_start();
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
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
</head>

<!--<body class="animsition">-->
<body>
<div class="page-wrapper">
    <?php include "../../framework/library/includes/admin/navmenu.php";
    ?>

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">


        <!--         WELCOME-->
        <section class="welcome py-5">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Report
                            <span>Details </span>


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
                <!--                        <div class="module-head">-->
                <!--                            <h3>Complaint Details</h3>-->
                <!--                        </div>-->
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0"
                           class="datatable-2 table table-bordered table-striped	 display" width="100%">


                        <thead>
                        <tr>
                            <?php $res = mysqli_query($con, "select * from staff where id='" . $_SESSION['id'] . "'");
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <th><b>Staff Fullname</b></th>
                                <td><?php echo htmlentities($row['fullname']); ?></th>

                                <th><b>Staff Department</b></th>
                                <th><?php echo htmlentities($row['department']); ?>
                                </th>
                                <?php ;
                            } ?>
                        </tr>

                        </thead>

                        <hr>
                        <tbody>
                        <?php $st = 'Reported';
                        $query = "select * from comreport where id='" . $_GET['cid'] . "' and rstatus ='$st'";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result))
                        { ?>
                        <tr>
                            <td>
                                <b>Report Number</b>:
                            </td>
                            <td> <?php echo htmlentities($row['id']); ?></td>

                            <td>

                                <b>Report Title</b>:
                            </td>
                            <td><?php echo htmlentities($row['rname']); ?>
                            </td>


                            <td colspan="2" class="small">
                                <b>Report Date</b>:
                            </td>
                            <td> <?php echo htmlentities($row['rdate']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Remarks </b></td>
                            <td colspan="4"><?php echo htmlentities($row['rremark']); ?></td>
                        </tr>
                        <tr>
                            <td><b>File/Document</b></td>
                            <td> <?php $cfile = $row['rfile'];
                                if ($cfile == "" || $cfile == "NULL") {
                                    echo "File Not Available";
                                } else {
                                    ?>
                                    <a type="button" class="btn btn-primary text-white btn-sm" data-toggle="modal"
                                       data-target="#exampleModal">
                                        View File
                                    </a>
                                <?php } ?></td>


                        </tr>


                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-transparent">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <img src="../_uploads/report/<?php echo $row['rfile']; ?>" class="img-thumbnail rounded">
                    </div>
                </div>
            </div>
        </div>


        <?php include "../../framework/library/includes/panel/footer.php"; ?>

        <?php ;
        } ?>
