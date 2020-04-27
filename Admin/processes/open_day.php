<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");


	$username = isset($_POST['username']) ? $_POST['username']: '';
	$password = isset($_POST['password']) ? $_POST['password']: '';

	if($username == "" || $password == ""){
		$_SESSION['message'] = "Please enter your username and password to open sale";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../index.php");
		exit();
	}

	try
	{
		$accountType = "authorised";
		$para=array(':username'=>$username, ':password'=>$password, ':accountType'=>$accountType);
		$thesql="select * from admin where(username= :username and password= :password and accountType= :accountType)";
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute($para);
	}
	catch(PDOException $e)
	{
		//email_error_message(__FILE__ .": line ". __LINE__ .": \n\n (". $thesql ."), (". implode("|",$para) .") \n\n". $e->getMessage(),get_organisation_name());
		$_SESSION['message']="Error encountered signing in! Please try again later";
		$_SESSION['messagetype']="alert alert-danger";
		header("location: ../index.php");
		exit();
	}
	
	$get_rec->setFetchMode(PDO::FETCH_ASSOC);
	$total_get_rec=$get_rec->rowCount();
	
	if($total_get_rec<=0)
	{
		$_SESSION['message']="So sorry you are not allowed to perform this operation, Please do call the administrator";
		$_SESSION['messagetype']="alert alert-danger";
		header("location: ../index.php");
		exit();
	}


	$open_date = date('Y-m-d');

	$check_open_sale = table_open("open_sale","open_date='$open_date'","","",__FILE__,__FILE__);
	if($check_open_sale['error']!="" && $check_open_sale['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Open Sales Information! Please contact the administrator";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../index.php");
		exit();
	}

	if($check_open_sale['error'] == "")
	{
		$_SESSION['message'] = "Open Sale ($open_date) Already Exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../index.php");
		exit();
	}
	
	$open_sale_id = get_sale_id();
	$open_value = "open";
	$open_date_month = date('m');
	$open_day = date('d');
	$open_year = date('Y');
    $month = get_full_month_name($open_date_month);

	$value = array('open_sale_id'=>$open_sale_id, 'open_date'=>$open_date, 'open_value'=>$open_value);
	$add_open_date = table_add_record('open_sale',$value,__FILE__,__LINE__,"insert");
	if($add_open_date!=""){
		$_SESSION['message'] = "Error opening sale for $month $open_day, $open_year";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../index.php");
		exit();
	}else{
		$_SESSION['message'] = "Sales have been open for $month $open_day, $open_year";
		$_SESSION['messagetype'] = "alert alert-success";
		header("location: ../index.php");
		exit();
	}


?>