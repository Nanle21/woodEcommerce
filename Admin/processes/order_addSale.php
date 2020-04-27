<?php
	
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$order_id = isset($_POST['order_id']) ? $_POST['order_id']: '';
	$finalTotal = isset($_POST['finalTotal']) ? $_POST['finalTotal']: '';
	$branch = isset($_POST['branch']) ? $_POST['branch']: '';
	$saler = isset($_POST['saler']) ? $_POST['saler']: '';

	
	$sale_id = get_hire_id();
	$open_date = date('Y-m-d');
	$sale_detail = table_open("open_sale","open_date='$open_date'","","",__FILE__,__LINE__);
  if($sale_detail['error']!="")
  {
  	echo "Sales haven't been open for today, Please do contact the administrator to open sales for today";
  	exit();
  }
  $open_sale_id = $sale_detail[0]['open_sale_id'];


  $check_product = table_open("sales","order_id='$order_id'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		echo "Error Encountered accessing sales Information! ". $check_product['error'];
		exit();
	}


	if($check_product['error'] == "")
	{
		echo "This order already exist in our sales. Please do contact the administrator";
		exit();
	}


$value = array('sale_id'=>$sale_id, 'open_sale_id'=>$open_sale_id, 'order_id'=>$order_id, 'saler'=>$saler, 'branch'=>$branch, 'total_amount'=>$finalTotal);

$add_sales = table_add_record("sales",$value,__FILE__,__LINE__,"insert");

if($add_sales!="")
{
	
	echo "Error encourtered creating adding order to sale";
	exit();
}
else
{
	unset($_SESSION['buyer_name'], $_SESSION['buyer_number'], $_SESSION['buyer_email']);
	echo "Order have been successfully added to today sale";
	$status = "true";
	$para = array('order_status'=>$status);
	$edit_product = table_update_record("orders","order_id",$order_id,$para,__FILE__,__LINE__);
	
	exit();
}


   
?>