<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");


$title = isset($_POST['title']) ? $_POST['title']: '';

$_SESSION['title'] = $title;


if($title == ""){
	$_SESSION['message'] = "Please fill in the form";
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_faq_cat.php");
	exit();
}

$check = table_open("faq_cats","title='$title'","","",__FILE__,__LINE__);
if($check['error']!="" && $check['error']!="No record found!")
{
	$_SESSION['message'] = "Error Encountered accessing Category Information! ". $check_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_faq_cat.php");
	exit();
}

if($check['error'] == ""){
	$_SESSION['message'] = "Faq Category already exist";
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_faq_cat.php");
}

$value = array('title'=>$title);

$add_info_cat = table_add_record("faq_cats",$value,__FILE__,__LINE__,"insert");
if($add_info_cat!=""){
	$_SESSION['message'] = "Error Adding New Category!" . " ".$title. $add_info_cat['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_faq_cat.php");
	exit();
}
else{
	unset($_SESSION['title']);
	$_SESSION['message'] = "New Information Category has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_info_cat.php");
	exit();
}

?>