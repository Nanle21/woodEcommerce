<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	
	$username=isset($_POST['username']) ? trim($_POST['username']) : "";
	$password=isset($_POST['password']) ? trim($_POST['password']) : "";
	
	$_SESSION['username']=$username;
	
	if($username=="" || $password=="")
	{
		$_SESSION['message']="Please enter username and password!";
		$_SESSION['messagetype']="error_msg";
		header("location: ../login.php");
		exit();
	}
	
	//h$password=md5($username.$password);
	try
	{
		$para=array(':username'=>$username, ':password'=>$password);
		$thesql="select * from admin where(username= :username and password= :password)";
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute($para);
	}
	catch(PDOException $e)
	{
		//email_error_message(__FILE__ .": line ". __LINE__ .": \n\n (". $thesql ."), (". implode("|",$para) .") \n\n". $e->getMessage(),get_organisation_name());
		$_SESSION['message']="Error encountered signing in! Please try again later";
		$_SESSION['messagetype']="redmessage";
		header("location: ../login.php");
		exit();
	}
	
	$get_rec->setFetchMode(PDO::FETCH_ASSOC);
	$total_get_rec=$get_rec->rowCount();
	
	if($total_get_rec<=0)
	{
		$_SESSION['message']="Invalid username and/or password!";
		$_SESSION['messagetype']="error_msg";
		header("location: ../login.php");
		exit();
	}
	
	$row_get_rec=$get_rec->fetch();
	
	/*if($row_get_rec['status']!="Active")
	{
		$_SESSION['message']="Your account is Inactive. Please contact the system administrator!";
		$_SESSION['messagetype']="error_msg";
		header("location: ../login.php");
		exit();
	}
	*/
	$_SESSION['user_id'] = $row_get_rec['user_id'];
	$_SESSION['current_user']=$row_get_rec['username'];
	$_SESSION['branch_name'] = $row_get_rec['branch_name'];
	$_SESSION['role']=$row_get_rec['role'];
	//$_SESSION['signed_in_usercategory']=$row_get_rec['usercategory'];
	$_SESSION['start_time']=time();
	//$_SESSION['institute']=get_organisation_name();
	
	
	//addLog("Successfully signed in!",$_SESSION['username'] ,$_SESSION['username']);
	
	$this_file=isset($_SESSION['this_file']) ? $_SESSION['this_file'] : "../index.php";
	
	header("location: $this_file");
	exit();
	
	
?>
