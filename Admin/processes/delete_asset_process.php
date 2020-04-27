<?php
  ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
   $_id = isset($_GET['_id']) ? trim($_GET['_id']) : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
	

   
   

   if($_id == ""){
      $_SESSION['message'] = "Asset Id is missing";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../view_asset.php");
      exit();
   }

   $status = "Inactive";

   $para = array('status'=>$status);

   $hire_category = table_update_record("assets","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating asset Information! Please try again later";
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../view_asset.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Asset has been successfully Deactivated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_asset.php");
      exit(); 
   }

?>


