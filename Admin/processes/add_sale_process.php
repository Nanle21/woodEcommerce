<?php
	
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$customer__id = isset($_POST['customer__id']) ? $_POST['customer__id']: '';
	$saler = isset($_POST['saler']) ? $_POST['saler']: '';
	$branch = isset($_POST['branch']) ? $_POST['branch']: '';

	

	if($customer__id == ""){
		$_SESSION['messaage'] = "Please do fill in the form to create sale";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_sale.php");
		exit();
	} 

	$sale_id = get_hire_id();
	$open_date = date('Y-m-d');
	$sale_detail = table_open("open_sale","open_date='$open_date'","","",__FILE__,__LINE__);
  if($sale_detail['error']!="")
  {
  	$_SESSION["message"] = "Sales haven't been open for today, Please do contact the administrator to open sales for today";
  	$_SESSION["messagetype"] = "alert alert-danger";
  	header("location: ../add_sale.php");
  	exit();
  }
  $open_sale_id = $sale_detail[0]['open_sale_id'];


	$value = array('sale_id'=>$sale_id, 'open_sale_id'=>$open_sale_id, 'customer__id'=>$customer__id, 'saler'=>$saler, 'branch'=>$branch);

$add_sales = table_add_record("sales",$value,__FILE__,__LINE__,"insert");

if($add_sales!="")
{
	$_SESSION['message'] = "Error encourtered creating new sale";
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_sale.php");
	exit();
}
else
{
	unset($_SESSION['buyer_name'], $_SESSION['buyer_number'], $_SESSION['buyer_email']);
	$_SESSION['message'] = "New sale has been successfully created please do add your products";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../add_sale_detail.php?sale_id=".$sale_id."");
	exit();
}



?>