<?php
  ob_start();
	session_start();
	include_once("db/config.php");
  //include_once("db/functions.php");
  
   $product_id = isset($_GET['product_id']) ? trim($_GET['product_id']) : '';
   $client_id=isset($_GET['client_id']) ? trim($_GET['client_id']) : '';
	

   
   

   if($product_id == "" || $client_id == ""){
      $_SESSION['message'] = "Unable to delete cart";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: cart.php");
      exit();
   }

   $delete_query = "DELETE FROM cart where p_id='$product_id' and client_id='$client_id'";
   $check = $connection->query($delete_query);
   if($check != null)
   {
      $_SESSION['message'] = "Product has been Successfully Deleted! from cart";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: cart.php");
      exit(); 
   }


?>


