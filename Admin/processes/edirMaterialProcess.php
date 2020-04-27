<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $_id=isset($_GET['_id']) ? $_GET['_id'] : '';
	
   $material=isset($_POST['material']) ? trim($_POST['material']) : '';
   

   $_SESSION['material'] = $material;
   

   if($material == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../editshopMaterial.php");
      exit();
   }

   $para = array('size'=>$size);

   $hire_category = table_update_record("shopSize","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating User Information! Please try again later". $company_add;
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../editshopMaterial.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Shop Type <b>($material) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_shop_by_material.php");
      exit(); 
   }

   

?>


