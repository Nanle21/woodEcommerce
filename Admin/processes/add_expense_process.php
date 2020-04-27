<?php
  ob_start();
  session_start();
  include_once("../db/config.php");
  include_once("../functions.php");

  
  $expense_Name = isset($_POST['expense_Name']) ? $_POST['expense_Name']: '';
  $description = isset($_POST['description']) ? $_POST['description']: '';
  $category_name = isset($_POST['category_name']) ? $_POST['category_name']: '';

  $entered_by = $_SESSION['current_user'];



  //$_SESSION['name'] = $name;
  $_SESSION['expense_Name'] = $expense_Name;
  $_SESSION['description'] = $description;
  $_SESSION['category_name'] = $category_name; 
 // $_SESSION['description'] = $description;


  if($expense_Name == "" || $description == "" || $category_name == "")
  {
    $_SESSION['message'] = "Please fill in the form";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_expense.php");
    exit();
  }


  $check_product = table_open("expense","expense_Name='$expense_Name'","","",__FILE__,__FILE__);
  if($check_product['error']!="" && $check_product['error']!="No record found!")
  {
    $_SESSION['message'] = "Error Encountered accessing Expense Information!";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_expense.php");
    exit();
  }


  if($check_product['error'] == "")
  {
    $_SESSION['message'] = "Expense ($expense_Name) Already Exist";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_expense.php");
    exit();
  }

   
   //$blog_id = get_blog_id();

  


   

$value = array('expense_Name'=>$expense_Name,'expense_description'=>$description,'category_name'=>$category_name);

$add_product = table_add_record("expense", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
  $_SESSION['message'] = "Error Adding Asset" . " ".$expense_Name. $add_product['error'];
  $_SESSION['messagetype'] = "alert alert-danger";
  header("location: ../add_expense.php");
  exit();
}
else
{
  unset($_SESSION['name']);
  $_SESSION['message'] = "New Expense ($expense_Name) has been successfully added";
  $_SESSION['messagetype'] = "alert alert-success";
  header("location: ../view_expense.php");
  exit();
}

?>