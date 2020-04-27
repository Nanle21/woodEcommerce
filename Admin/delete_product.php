<?php
  ob_start();
	session_start();
	include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
   $product_id = isset($_GET['product_id']) ? trim($_GET['product_id']) : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
	

   
   

   if($product_id == ""){
      $_SESSION['message'] = "Product Id is missing";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: view_product.php");
      exit();
   }

   $delete_query = "DELETE FROM products where product_id='$product_id'";
   $check = $connection->query($delete_query);
   if($check != null)
   {
       $_SESSION['message'] = "Product Successfully Deleted!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: view_product.php");
      exit(); 
   }


?>


