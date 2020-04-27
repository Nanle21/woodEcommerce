<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$title = isset($_POST['title']) ? $_POST['title']: '';
	$faq_cat = isset($_POST['faq_cat']) ? $_POST['faq_cat']: '';
	$faq = isset($_POST['faq']) ? $_POST['faq']: '';

	$_SESSION['title'] = $title;
	$_SESSION['faq_cat'] = $faq_cat;
	$_SESSION['faq'] = $faq;

	if($title == "" || $faq_cat == "" || $faq == ""){
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_faq.php");
		exit();
	}


	$check_info = table_open("faqs","title='$title","","",__FILE__,__LINE__);
	if($check_info['error']!="" && $check_info['error']=="No record found!"){
		$_SESSION['message'] = "Error Encountered accessing Category Information! ". $check_product['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_faq.php");
		exit();
	}

	if($check_info['error']=="")
	{
		$_SESSION['message'] = "Information already exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_faq.php");
		exit();

	}


	$value = array('title'=>$title,'faq_cat'=>$faq_cat,'faq'=>$faq);
	$add_information = table_add_record("faqs",$value,__FILE__,__LINE__,"insert");
	if($add_information!=""){
		$_SESSION['message'] = "Error Adding New Category!" . " ".$title. $add_info_cat['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_faq.php");
		exit();
	}
	else{
		unset($_SESSION['title'],$_SESSION['faq_cat'],$_SESSION['faq']);
		$_SESSION['message'] = "New Information has been successfully added";
		$_SESSION['messagetype'] = "alert alert-success";
		header("location: ../view_faq.php");
		exit();
	}
?>