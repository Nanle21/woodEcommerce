<?php
  ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
   $hire_id = isset($_GET['hire_id']) ? trim($_GET['hire_id']) : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
	

   
   

   if($hire_id == ""){
      $_SESSION['message'] = "Hire Id is missing";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../view_hire.php");
      exit();
   }

   $delete_query = "DELETE FROM hire where hire_id='$hire_id'";
   $check = $connection->query($delete_query);
   if($check != null)
   {
       $_SESSION['message'] = "Hire Item Successfully Deleted!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_hire.php");
      exit(); 
   }


?>


