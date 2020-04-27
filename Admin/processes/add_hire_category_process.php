<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$name = isset($_POST['name']) ? $_POST['name']: '';

	$_SESSION['name'] = $name;
	


	if($name == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_hire_category.php");
		exit();
	}


	$check_product = table_open("hire_category","name='$name'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Hire Category Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_hire_category.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Product ($name) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_hire_category.php");
		exit();
	}

   
   


   

$value = array('name'=>$name);

$add_product = table_add_record("hire_category", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding New Hire Category!" . " ".$name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_hire_category.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Product ($name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../v_hire_category.php");
	exit();
}

?>