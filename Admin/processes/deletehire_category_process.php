<?php
  ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
   $_id = isset($_GET['_id']) ? trim($_GET['_id']) : '';
  // $name=isset($_POST['name']) ? trim($_POST['name']) : '';
	

   
   

   if($_id == ""){
      $_SESSION['message'] = "Hire Id is missing";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../v_hire_category.php");
      exit();
   }

   $delete_query = "DELETE FROM hire_category where _id='$_id'";
   $check = $connection->query($delete_query);
   if($check != null)
   {
       $_SESSION['message'] = "Hire Category Successfully Deleted!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../v_hire_category.php");
      exit(); 
   }


?>


