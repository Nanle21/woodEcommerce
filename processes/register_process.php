<?php
	session_start();
	include_once("db/config.php");

	 $first_name = isset($_POST['first_name']) ? $_POST['first_name']: '';
	 $last_name = isset($_POST['last_name']) ? $_POST['last_name']: '';
	 $email = isset($_POST['email']) ? $_POST['email']: '';
	 $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number']: '';
	 $password = isset($_POST['password']) ? md5(sha1($_POST['password'])): '';
	 $passwordnew =isset($_POST['passwordnew']) ? md5(sha1($_POST['passwordnew'])): '';


	 if($first_name == "" || $last_name == "" || $email == ""  || $phone_number == "" $passwordnew == "" || $password == ""){
	 	$_SESSION['message'] = "Please fill in the form properly to register";
	 	$_SESSION['messagetype'] = "alert alert-danger";
	 	header("location: ../login.php");
	 	exit();
	 }
	 elseif($password != $passwordnew){
	 	$_SESSION['message'] = "Please your password does not match";
	 	$_SESSION['messagetype'] = "alert alert-danger";
	 	header("location: ../login.php");
	 	exit();
	 }
	 else{
	 	$check_user = table_open("users","email='$email'","","",__FILE__,__LINE__);

	 if($check_user['error']!="" && $check_user['error']!="No record found!")
	 {
	 	$_SESSION['message'] = "Error encourtered accessing users account information!php";
	 	$_SESSION['messagetype'] = "alert alert-danger";
	 	header("location: ../login.php");
	 	exit();
	 }

	 if($check_user['error'] == ""){
	 	$_SESSION['message'] = "User ($email) already exist";
	 	$_SESSION['messagetype'] = "alert alert-danger";
	 	header("location: ../login.php");
	 	exit();
	 }

	 $values = array('first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'phone_number'=>$phone_number, 'password'=>$password);
	 $add_user = table_add_record("users",$values,__FILE__,__LINE__,"insert");
	 if($add_user != ""){
	 	$_SESSION['message'] = "Error encourtered adding account!";
	 	$_SESSION['messagetype'] = "alert alert-danger";
	 	header("location: ../login.php");
	 	exit();
	 }
	 else{
	 	$_SESSION['acc_id'] = $acc_id;
   		$_SESSION['first_name'] = $first_name;
   		$_SESSION['last_name'] = $last_name;
   		$_SESSION['message']="Your Account has been successfully created!";
   		$_SESSION['messagetype']="alert alert-success";
  		header("location: ../account.php");
  		exit();
	 }

	 }

	 
?>