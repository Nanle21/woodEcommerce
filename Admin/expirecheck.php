<?php
	ob_start();
session_start();
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

error_reporting(E_ALL);
error_reporting (0);
	
//$last_url=isset($_SERVER['REQUEST_URI']) ? 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "";

$duration=isset($_SESSION['start_time']) ? abs(time() - $_SESSION['start_time']) : 60000000;

//$_SESSION['institute']=isset($_SESSION['institute']) ? $_SESSION['institute'] : "";

$username=isset($_SESSION['current_user']) ? $_SESSION['current_user'] : "";
$branch=isset($_SESSION['branch']) ? $_SESSION['branch']: "";

//$institute=isset($_SESSION['institute']) ? $_SESSION['institute'] : "";

if ($duration>(60*60) || $username=="")
{
	$_SESSION['message']="Your session has expired. Please log in in again to continue...";
	$_SESSION['messagetype']="error_msg";
	$_SESSION['this_file']=$last_url;
	/*die($_SESSION['this_file']); */
	unset($_SESSION['current_user'], $_SESSION['current_user']);
	header("location: login.php");
	exit();
}
$_SESSION['start_time']=time();
set_time_limit(300000000000000000000000);
date_default_timezone_set("Africa/Lagos");
?>