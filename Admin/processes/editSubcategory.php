<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $id=isset($_GET['id']) ? $_GET['id'] : '';
	
   $subcategory_name=isset($_POST['subcategory_name']) ? trim($_POST['subcategory_name']) : '';
   

   $_SESSION['subcategory_name'] = $subcategory_name;
   

   if($subcategory_name == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../view_subcategory.php");
      exit();
   }

   $para = array('subcategory_name'=>$subcategory_name);

   $hire_category = table_update_record("subCategories","id",$id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating User Information! Please try again later". $company_add;
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../view_subcategory.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Subcategory <b>($subcategory_name) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_subcategory.php");
      exit(); 
   }

   

?>


