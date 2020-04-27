<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$close = isset($_POST['close']) ? $_POST['close']: 'close';
	

	//$open_sale_id = get_sale_id();
	$open_date = date('Y-m-d');

	$open_date_month = date('m');
	$open_day = date('d');
	$open_year = date('Y');
    $month = get_full_month_name($open_date_month);
    $open_value = "close";
	$para = array('open_value'=>$open_value);

	//$add_product = table_add_record("open_sale", $value,__FILE__,__LINE__,"insert");
	$add_product = table_update_record("open_sale","open_date",$open_date,$para,__FILE__,__LINE__);
	if($add_product!="")
	{
		$_SESSION['message'] = "Error closing sales for $month $open_day, $open_year";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../index.php");
		exit();
	}
	else
	{
		unset($_SESSION['name']);
		$_SESSION['message'] = "Sales have been closed for $month $open_day, $open_year";
		$_SESSION['messagetype'] = "alert alert-success";
		header("location: ../index.php");
		exit();
	}

?>	