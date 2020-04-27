<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $_id=isset($_GET['_id']) ? $_GET['_id'] : '';
	//$status=isset($_POST['status']) ? trim($_POST['status']) : '';
   $expense_name = isset($_POST['expense_name']) ? $_POST['expense_name']: '';
  $expense_description = isset($_POST['expense_description']) ? $_POST['expense_description']: '';
  $category_name = isset($_POST['category_name']) ? $_POST['category_name']: '';

   

   $_SESSION['expense_name'] = $expense_name;
  $_SESSION['expense_description'] = $expense_description;
  $_SESSION['category_name'] = $category_name; 
  //$_SESSION['description'] = $description;
   
   if($expense_name == "" || $expense_description == "" || $category_name == "")
  {
    $_SESSION['message'] = "Please fill in the form";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../edit_expense.php?_id=".$_id."");
    exit();
  }

  

   $para = array('expense_name'=>$expense_name,'expense_description'=>$expense_description,'category_name'=>$category_name);

   $hire_category = table_update_record("expense","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating asset Information! Please try again later";
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../edit_expense.php?_id=".$_id."");
      exit();
   }
   else{
      $_SESSION['message'] = "Expense <b>($expense_name) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_expense.php");
      exit(); 
   }

   

?>


