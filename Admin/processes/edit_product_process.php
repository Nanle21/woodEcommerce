<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
   
	$product_id = isset($_POST['product_id']) ? $_POST['product_id']: "";
	$product_name = isset($_POST['product_name']) ? strtoupper($_POST['product_name']) : '';
	$product_description = isset($_POST['product_description']) ? $_POST['product_description'] : '';
	$product_fixPrice = isset($_POST['product_fixPrice']) ? $_POST['product_fixPrice']: '';
	$product_addedPrice = isset($_POST['product_addedPrice']) ? $_POST['product_addedPrice']: '';

	
	$_SESSION['product_name'] = $product_name;
	$_SESSION['product_description'] = $product_description;
	$_SESSION['product_fixPrice'] = $product_fixPrice;
	$_SESSION['product_addedPrice'] = $product_addedPrice;


	

	$check_product = table_open("products","product_name='$product_name'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Product Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../product_edit.php?product_id=$product_id");
		exit();
	}


	$para = array('product_name'=>$product_name, 'product_description'=>$product_description,  'product_fixPrice'=>$product_fixPrice, 'product_addedPrice'=>$product_addedPrice);

	$edit_product = table_update_record("products","product_id",$product_id,$para,__FILE__,__LINE__);
   if($edit_product!="")
   {
      $_SESSION['message'] = "Error encountered updating Product Information! Please try again later";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../product_edit.php?product_id=$product_id");
      exit();  
   }
   else{
      $_SESSION['message'] = "Product has been successfully updated";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_product.php");
      exit();
   }

   
?>