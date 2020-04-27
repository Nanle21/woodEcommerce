<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$type_name = isset($_POST['type_name']) ? $_POST['type_name']: '';

	$_SESSION['type_name'] = $type_name;
	


	if($type_name == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_type.php");
		exit();
	}


	$check_product = table_open("type","type_name='$type_name'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing type Information! ". $check_product['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_type.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Type ($type_name) Already Exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_type.php");
		exit();
	}


$value = array('type_name'=>$type_name);

$add_product = table_add_record("Type", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Type!" . " ".$type_name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_type.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Type ($type_name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_type.php");
	exit();
}

?>