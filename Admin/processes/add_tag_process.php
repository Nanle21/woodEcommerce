<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$tag_title = isset($_POST['tag_title']) ? $_POST['tag_title']: '';
	$level = isset($_POST['level']) ? $_POST['level']: '';

	$_SESSION['tag_title'] = $tag_title;
	$_SESSION['level'] = $level;


	if($tag_title == "" || $level == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_tag_category.php");
		exit();
	}


	$check_product = table_open("Tags","tag_title='$tag_title'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Blog Category Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_tag_category.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Tag Category ($tag_title) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_tag_category.php");
		exit();
	}

   
   


   

$value = array('tag_title'=>$tag_title,'level'=>$level);

$add_product = table_add_record("Tags", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Tag  Category!" . " ".$category_title. " ". $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_tag_category.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Blog Category ($category_title) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_tag_category.php");
	exit();
}

?>	