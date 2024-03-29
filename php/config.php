<?php
ob_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
//start Session
session_start();


//create constants to store non repeating values
define('SITEURL', 'http://localhost/campkash/');
define('LOCALHOST', 'localhost');

define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'campkash');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>
