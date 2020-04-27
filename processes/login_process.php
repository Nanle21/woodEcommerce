<?php
	session_start();
	include_once("db/config.php");

	$email = isset($_POST['email']) ? $_POST['email']: "";
	$password = isset($_POST['password']) ? md5(sha1($_POST['password'])) : "";

	if($email == "" || $password == ""){
		$_SESSION['message'] = "Please fill in the form to Login";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../login.php");
		exit();
	}

	try{
		$para = array(':email'=>$email, ':password'=>$password);
		$thesql = "SELECT * FROM users where(email=	:email and password= :password)";
		$get_rec = $connection->prepare($thesql);
		$get_rec = execute($para);
	}
	catch(PDOException $e){
		$_SESSION['message'] = "Error encourted signing in! Please try again later";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../login.php");
		exit();
	}

	$get_rec = setFetchMode(PDO::FETCH_ASSOC);
	$total_get_rec = $get_rec->rowCount();

	if($total_get_rec <= 0){
		$_SESSION['message'] = "Invalid email and/or password";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../login.php");
		exit();

	}

	$row_get_fetch = $get_rec->fetch();
	$_SESSION['current_user']=$row_get_rec['email'];
	$_SESSION['start_time']=time();

	$this_file=isset($_SESSION['this_file']) ? $_SESSION['this_file'] : "../index.php";

	header("location: ../account.php");
	exit();
?>