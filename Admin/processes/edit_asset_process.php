<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $_id=isset($_GET['_id']) ? $_GET['_id'] : '';
	//$status=isset($_POST['status']) ? trim($_POST['status']) : '';
   $bank_name = isset($_POST['bank_name']) ? $_POST['bank_name']: '';
  $account_number = isset($_POST['account_number']) ? $_POST['account_number']: '';
  $category = isset($_POST['category']) ? $_POST['category']: '';
  $description = isset($_POST['description']) ? $_POST['description']: '';

   

   $_SESSION['bank_name'] = $bank_name;
  $_SESSION['account_number'] = $account_number;
  $_SESSION['category'] = $category; 
  $_SESSION['description'] = $description;
   
   if($bank_name == "" || $account_number == "" || $category == "" || $description == "")
  {
    $_SESSION['message'] = "Please fill in the form";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../edit_asset.php?_id=".$_id."");
    exit();
  }

  

   $para = array('bank_name'=>$bank_name,'account_number'=>$account_number,'description'=>$description,'category'=>$category);

   $hire_category = table_update_record("assets","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating asset Information! Please try again later";
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../edit_asset.php?_id=".$_id."");
      exit();
   }
   else{
      $_SESSION['message'] = "Asset <b>($bank_name) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_asset.php");
      exit(); 
   }

   

?>


