<?php
  ob_start();
  session_start();
  include_once("../db/config.php");
  include_once("../functions.php");

  
  $vendor_name = isset($_POST['vendor_name']) ? $_POST['vendor_name']: '';
  $vendor_description = isset($_POST['vendor_description']) ? $_POST['vendor_description']: '';
  $vendor_phone_no = isset($_POST['vendor_phone_no']) ? $_POST['vendor_phone_no']: '';
  $product_name = isset($_POST['product_name']) ? $_POST['product_name']: '';
  $entered_by = $_SESSION['current_user'];



  //$_SESSION['name'] = $name;
  $_SESSION['vendor_name'] = $vendor_name;
  $_SESSION['vendor_description'] = $vendor_description;
  $_SESSION['vendor_phone_no'] = $vendor_phone_no; 
  $_SESSION['product_name'] = $product_name;


  if($vendor_name == "" || $vendor_description == "" || $vendor_phone_no == "" || $product_name == "")
  {
    $_SESSION['message'] = "Please fill in the form";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_liability.php");
    exit();
  }


  $check_product = table_open("liability","vendor_name='$vendor_name'","","",__FILE__,__FILE__);
  if($check_product['error']!="" && $check_product['error']!="No record found!")
  {
    $_SESSION['message'] = "Error Encountered accessing liability Information! ". $check_product['error'];
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_liability.php");
    exit();
  }


  if($check_product['error'] == "")
  {
    $_SESSION['message'] = "liability ($vendor_name) Already Exist";
    $_SESSION['messagetpye'] = "alert alert-danger";
    header("location: ../add_liability.php");
    exit();
  }

     

$value = array('vendor_name'=>$vendor_name,'vendor_description'=>$vendor_description,'vendor_phone_no'=>$vendor_phone_no,'product_name'=>$product_name);

$add_product = table_add_record("liability", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
  $_SESSION['message'] = "Error Adding liability" . " ".$vendor_name. $add_product['error'];
  $_SESSION['messagetype'] = "alert alert-danger";
  header("location: ../add_liability.php");
  exit();
}
else
{
  unset($_SESSION['name']);
  $_SESSION['message'] = "New liability Category ($vendor_name) has been successfully added";
  $_SESSION['messagetype'] = "alert alert-success";
  header("location: ../view_liability.php");
  exit();
}

?>