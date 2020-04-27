<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
   $id = isset($_GET['id']) ? $_GET['id'] : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
	

  

   $para = array('status'=>$id);

   $hire_category = table_update_record("hired_items","id",$id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered activating hired items". $hire_category;
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../item_hired.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Hire item has been successfully Updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../item_hired.php");
      exit(); 
   }
   
   

?>


