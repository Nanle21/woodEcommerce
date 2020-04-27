<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$subcategory_name = isset($_POST['subcategory_name']) ? $_POST['subcategory_name']: '';
	$category_id = isset($_POST['category_id']) ? $_POST['category_id']: '';
	$_SESSION['sub_category_name'] = $sub_category_name;
	$_SESSION['category_id'] = $category_id;
	


	if($subcategory_name == "" || $category_id == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_subcategory.php");
		exit();
	}


	$check_product = table_open("subCategories","subcategory_name='$subcategory_name' and category_id='$category_id'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Category Information! ". $check_product['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_subcategory.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Sub Category ($subcategory_name) Already Exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_subcategory.php");
		exit();
	}





$value = array('category_id'=>$category_id,'subcategory_name'=>$subcategory_name);

$add_product = table_add_record("subCategories", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Category!" . " ".$sub_category_name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_subcategory.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Book Category ($subcategory_name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_subcategory.php");
	exit();
}

?>