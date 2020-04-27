<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $_id=isset($_GET['_id']) ? $_GET['_id'] : '';
	
   $shopBrand=isset($_POST['shopBrand']) ? trim($_POST['shopBrand']) : '';
   

   $_SESSION['shopBrand'] = $shopBrand;
   

   if($shopBrand == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../view_shop_by_brand.php");
      exit();
   }

   $para = array('shopBrand'=>$shopBrand);

   $hire_category = table_update_record("shopBrand","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating User Information! Please try again later". $company_add;
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../view_shop_by_brand.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Shop Type <b>($shopBrand) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_shop_by_brand.php");
      exit(); 
   }

   

?>


