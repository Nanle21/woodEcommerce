<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$subcategory_id = isset($_POST['subcategory_id']) ? $_POST['subcategory_id']: '';
	$category_id = isset($_POST['category_id']) ? $_POST['category_id']: '';
	$shopBrand = isset($_POST['shopBrand']) ? $_POST['shopBrand']: '';
	$_SESSION['sub_category_name'] = $sub_category_name;
	$_SESSION['category_id'] = $category_id;
	$_SESSION['shopBrand'] = $shopBrand;
	


	if($subcategory_id == "" || $category_id == "" || $shopBrand == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_shop_by_brand.php");
		exit();
	}


	$check_product = table_open("shopBrand","shopBrand='$shopBrand' and subcategory_id='$subcategory_id' and category_id='$category_id'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Category Information! ". $check_product['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_shop_by_brand.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Sub Category ($shopType) Already Exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_shop_by_brand.php");
		exit();
	}





$value = array('subcategory_id'=>$subcategory_id,'category_id'=>$category_id,'shopBrand'=>$shopBrand);

$add_product = table_add_record("shopBrand", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Category!" . " ".$sub_category_name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_shop_by_brand.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Book Category ($subcategory_name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_shop_by_brand.php");
	exit();
}

?>