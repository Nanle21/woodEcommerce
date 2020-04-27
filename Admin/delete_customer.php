<?php
  session_start();
  include_once("../db/config.php");
   include_once("../functions.php");
   $customer_id = isset($_GET['customer_id']) ? trim($_GET['customer_id']) : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
  

   
   

   if($customer_id == ""){
      $_SESSION['message'] = "Customer Id is missing";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../view_customer.php");
      exit();
   }
   
   $delete_query = "DELETE FROM customers where customer_id='$customer_id'";
   $check = $connection->query($delete_query);
   if($check != null)
   {
       $_SESSION['message'] = "Customer Information Successfully Deleted!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: view_customer.php");
      exit(); 
   }


?>


