<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$name = isset($_POST['name']) ? $_POST['name']: '';
	$image = isset($_POST['image']) ? $_POST['image']: '';
	$type = isset($_POST['type']) ? $_POST['type']: '';

	$_SESSION['name'] = $name;
	$_SESSION['image'] = $image;
	$_SESSION['type'] = $type;
	


	if($name == "" || $type == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_contractor_cat.php");
		exit();
	}


	$check_product = table_open("contract_cat","name='$name'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Contractor Category Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_contractor_cat.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Contractor category ($name) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_contractor_cat.php");
		exit();
	}

   

   $catcon_id = get_contractor_cat_ID();

   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
   $temporary_file="../images/".date("YmdHis").".jpg";
   $logo_filename="../images/". $catcon_id .".jpg";
   if(move_uploaded_file($_FILES['image']['tmp_name'],$temporary_file))
   {
      process_pix($temporary_file,$logo_filename);
   }
}
   


   

$value = array('catcon_id'=>$catcon_id,'name'=>$name,'type'=>$type);

$add_product = table_add_record("contract_cat", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding New Contractor Category!" . " ".$name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_contractor_cat.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Contractor Category has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_contractor_cat.php");
	exit();
}

?>