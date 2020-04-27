<?php
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
   $_id = isset($_GET['_id']) ? trim($_GET['_id']) : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
	

   
   

   if($_id == ""){
      $_SESSION['message'] = "Design Id is missing";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../view_design_cat.php");
      exit();
   }
   $status = "inactive";
   $para = array('status'=>$status);

   $hire_category = table_update_record("branch","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating branch Information! Please try again later";
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../view_branch.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Branch <b>($branch_name) </b> has been successfully been deactivated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_branch.php");
      exit(); 
   }


?>


