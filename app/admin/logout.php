<?php
session_start();
include("../../framework/library/config/config.php");
$_SESSION['alogin'] == "";
date_default_timezone_set('Africa/Lagos');
$ldate = date('d-m-Y h:i:s A', time());
session_unset();

?>
<script type="text/javascript">
    document.location = "login.php";
</script>
