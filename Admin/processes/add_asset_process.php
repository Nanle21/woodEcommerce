<?php
  ob_start();
  session_start();
  include_once("../db/config.php");
  include_once("../functions.php");

  
  $bank_name = isset($_POST['bank_name']) ? $_POST['bank_name']: '';
  $account_number = isset($_POST['account_number']) ? $_POST['account_number']: '';
  $category = isset($_POST['category']) ? $_POST['category']: '';
  $description = isset($_POST['description']) ? $_POST['description']: '';
  $entered_by = $_SESSION['current_user'];



  //$_SESSION['name'] = $name;
  $_SESSION['bank_name'] = $bank_name;
  $_SESSION['account_number'] = $account_number;
  $_SESSION['category'] = $category; 
  $_SESSION['description'] = $description;


  if($bank_name == "" || $account_number == "" || $category == "" || $description == "")
  {
    $_SESSION['message'] = "Please fill in the form";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_assets.php");
    exit();
  }


  $check_product = table_open("assets","bank_name='$bank_name'","","",__FILE__,__FILE__);
  if($check_product['error']!="" && $check_product['error']!="No record found!")
  {
    $_SESSION['message'] = "Error Encountered accessing Asset Information! ". $check_product['error'];
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_assets.php");
    exit();
  }


  if($check_product['error'] == "")
  {
    $_SESSION['message'] = "Bank ($bank_name) Already Exist";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_assets.php");
    exit();
  }

   
   //$blog_id = get_blog_id();

  


   

$value = array('bank_name'=>$bank_name,'account_number'=>$account_number,'description'=>$description,'category'=>$category);

$add_product = table_add_record("assets", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
  $_SESSION['message'] = "Error Adding Asset" . " ".$name. $add_product['error'];
  $_SESSION['messagetype'] = "alert alert-danger";
  header("location: ../add_assets.php");
  exit();
}
else
{
  unset($_SESSION['name']);
  $_SESSION['message'] = "New Asset ($bank_name) has been successfully added";
  $_SESSION['messagetype'] = "alert alert-success";
  header("location: ../view_asset.php");
  exit();
}

?>