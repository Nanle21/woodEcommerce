<?php
  ob_start();
	session_start();
	include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
   $user_id = isset($_GET['user_id']) ? trim($_GET['user_id']) : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
	

   
   

   if($user_id == ""){
      $_SESSION['message'] = "User Id is missing";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: view_user.php");
      exit();
   }

   $delete_query = "DELETE FROM admin where user_id='$user_id'";
   $check = $connection->query($delete_query);
   if($check != null)
   {
       $_SESSION['message'] = "User Successfully Deleted!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: view_user.php");
      exit(); 
   }


?>


