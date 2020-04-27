<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$category_title = isset($_POST['category_title']) ? $_POST['category_title']: '';

	$_SESSION['category_title'] = $category_title;
	


	if($category_title == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_blog_category.php");
		exit();
	}


	$check_product = table_open("blog_category","category_title='$category_title'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Blog Category Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_blog_category.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Blog Category ($name) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_blog_category.php");
		exit();
	}

   
   


   

$value = array('category_title'=>$category_title);

$add_product = table_add_record("blog_category", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Blog  Category!" . " ".$category_title. " ". $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_blog_category.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Blog Category ($category_title) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_blog_category.php");
	exit();
}

?>	