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
		header("location: ../add_book_cat.php");
		exit();
	}


	$check_product = table_open("book_cat","name='$name'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Design Category Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_book_cat.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Book Category ($name) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_book_cat.php");
		exit();
	}

   
   


   

$value = array('name'=>$name);

$add_product = table_add_record("book_cat", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Book  Category!" . " ".$name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_book_cat.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Book Category ($name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_book_cat.php");
	exit();
}

?>