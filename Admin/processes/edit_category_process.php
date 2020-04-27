<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $category_id=isset($_GET['category_id']) ? $_GET['category_id'] : '';
	$status=isset($_POST['status']) ? trim($_POST['status']) : '';
   $category_name=isset($_POST['category_name']) ? trim($_POST['category_name']) : '';
   

   $_SESSION['category_name']=$category_name;
   $_SESSION['status'] = $status;
   $_SESSION['category_id'] = $category_id;
   

   if($category_name == "" || $status == "" ){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../edit_category.php?_id=".$category_id."");
      exit();
   }

   $para = array('category_name'=>$category_name, 'status'=>$status);

   $hire_category = table_update_record("categories","_id",$category_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating Category Information! Please try again later";
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../edit_category.php?_id=".$category_id."");
      exit();
   }
   else{
      $_SESSION['message'] = "Category <b>($category_name) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_category.php");
      exit(); 
   }

   

?>


