<?php
session_start();
include("../config/config.php");
$_SESSION['slogin']=="";
date_default_timezone_set('Africa/Lagos');
$ldate=date( 'd-m-Y h:i:s A', time () );
//mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE username = '".$_SESSION['alogin']."' ORDER BY id DESC LIMIT 1");
session_unset();

?>
<script language="javascript">
    document.location="login.php";
</script>