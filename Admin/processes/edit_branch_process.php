<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $_id=isset($_GET['_id']) ? $_GET['_id'] : '';
	//$status=isset($_POST['status']) ? trim($_POST['status']) : '';
   $branch_name=isset($_POST['branch_name']) ? trim($_POST['branch_name']) : '';
   

   $_SESSION['category_name']=$category_name;
   $_SESSION['status'] = $status;
   $_SESSION['category_id'] = $category_id;
   

   if($branch_name == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../edit_branch.php?_id=".$_id."");
      exit();
   }

   $para = array('branch_name'=>$branch_name);

   $hire_category = table_update_record("branch","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating branch Information! Please try again later";
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../edit_branch.php?_id=".$_id."");
      exit();
   }
   else{
      $_SESSION['message'] = "Branch <b>($branch_name) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_branch.php");
      exit(); 
   }

   

?>


