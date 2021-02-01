<?php
//Site Info
$sitename = 'CMS | PHP Script';

$pageTitle =
    ucwords(str_replace(array('-', '/', '.php'), array(' '), basename($_SERVER['PHP_SELF']))) . ' | ' . ' ' . $sitename;

//Site Logo
$logourl = '<img src="framework/assets/images/logo/cms-logo.png" class="ims-logo"> ';
$logourl2 = '<img src="../../framework/assets/images/logo/cms-logo.png" class="ims-logo"> ';
$favicon = 'framework/assets/images/logo/favicon.png';
$favicon2 = '../../framework/assets/images/logo/favicon.png';
$user_avatar = '<img src="../../framework/assets/panel/images/icons/u-avatar.png" alt="user"/>';

//Site Links
$homepage = 'index.php';

$contact = 'contact.php';
$about = 'about.php';

$user_login = 'login.php';

$user_reg = 'register.php';

//Blog Images

$img_1 = 'framework/assets/images/blog/img-1.jpg';
$img_2 = 'framework/assets/images/blog/img-2.jpg';
$img_3 = 'framework/assets/images/blog/img-3.jpg';

//Cpanel Links
$new_comp = 'new.php';

$profile = 'settings.php';

$status_comp = 'status.php';

$logout = '../../logout.php';
//Staff Links
$staff_login = 'staff/login.php';

$staff_home = 'index.php';
$staff_logout = 'logout.php';
$staff_login = 'app/staff/login.php';

//Admin Links
$admin_login = 'app/admin/login.php';

$admin_logout = 'logout.php';

$admin_home = 'index.php';

$nt_proc = 'not-processed.php';

$proc = 'in-process.php';

$clos = 'closed.php';

$mng_users = 'manage-users.php';

$mng_category = 'manage-category.php';

$chng_pwd = 'change-password.php';

$mng_sf = 'manage-staff.php';


?>
