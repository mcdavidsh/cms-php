<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

define('DB_SERVER','127.0.0.1');
define('DB_USER','enetcode_pcc');
//define('DB_USER','root');
define('DB_PASS' ,'wave1094');
//define('DB_PASS' ,'');
define('DB_NAME', 'enetcode_pcc');
//define('DB_NAME', 'cp-3');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
