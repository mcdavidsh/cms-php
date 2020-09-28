<?php
//Site Info
$sitename = 'PCC – IMS';

$pageTitle =
    ucwords(str_replace(array('-', '/', '.php'), array(' '), basename($_SERVER['PHP_SELF']))).' | '.' '.$sitename;

//Site Logo
$logourl = '<img src="assets/images/logo/pcc-logo.png" class="ims-logo"> ';
$logourl2 = '<img src="../assets/images/logo/pcc-logo.png" class="ims-logo"> ';
$user_avatar ='<img src="../assets/panel/images/icon/u-avatar.png" alt="user"/>';

//Site Links
$homepage = 'index.php';

$contact ='contact.php';

$user_login = 'login.php';

$user_reg = 'register.php';

//Blog Images

$img_1 = 'assets/images/blog/img-1.jpg';
$img_2 = 'assets/images/blog/img-2.jpg';
$img_3 = 'assets/images/blog/img-3.jpg';

//Cpanel Links
$new_comp ='new.php';

$profile ='settings.php';

$status_comp ='status.php';

$logout ='../logout.php';
//Staff Links
$staff_login = 'staff/login.php';

$staff_home = 'index.php';
$staff_logout = 'logout.php';
$staff_login = 'staff/login.php';
$staff_login = 'staff/login.php';
$staff_login = 'staff/login.php';

//Admin Links
$admin_login = 'admin/login.php';

$admin_logout = 'logout.php';

$admin_home ='index.php';

$nt_proc = 'not-processed.php';

$proc = 'in-process.php';

$clos ='closed.php';

$mng_users = 'manage-users.php';

$mng_category ='manage-category.php';

$chng_pwd ='change-password.php';

$mng_sf ='manage-staff.php';


?>