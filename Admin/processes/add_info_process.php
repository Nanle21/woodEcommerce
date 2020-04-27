<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$title = isset($_POST['title']) ? $_POST['title']: '';
	$info_cat = isset($_POST['info_cat']) ? $_POST['info_cat']: '';
	$info = isset($_POST['info']) ? $_POST['info']: '';

	$_SESSION['title'] = $title;
	$_SESSION['info_cat'] = $info_cat;
	$_SESSION['info'] = $info;

	if($title == "" || $info_cat == "" || $info == ""){
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_information.php");
		exit();
	}


	$check_info = table_open("information","title='$title","","",__FILE__,__LINE__);
	if($check_info['error']!="" && $check_info['error']=="No record found!"){
		$_SESSION['message'] = "Error Encountered accessing Category Information! ". $check_product['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_information.php");
		exit();
	}

	if($check_info['error']=="")
	{
		$_SESSION['message'] = "Information already exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_information.php");
		exit();

	}


	$value = array('title'=>$title,'info_cat'=>$info_cat,'info'=>$info);
	$add_information = table_add_record("information",$value,__FILE__,__LINE__,"insert");
	if($add_information!=""){
		$_SESSION['message'] = "Error Adding New Category!" . " ".$title. $add_info_cat['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_info_cat.php");
		exit();
	}
	else{
		unset($_SESSION['title'],$_SESSION['info_cat'],$_SESSION['info']);
		$_SESSION['message'] = "New Information has been successfully added";
		$_SESSION['messagetype'] = "alert alert-success";
		header("location: ../view_information.php");
		exit();
	}
?>