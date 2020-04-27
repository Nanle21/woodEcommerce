<?php
   ob_start();
  session_start();
  include_once("../db/config.php");
   include_once("../functions.php");
   $_id = isset($_GET['_id']) ? trim($_GET['_id']) : '';
   $name=isset($_POST['name']) ? trim($_POST['name']) : '';
  

   $_SESSION['name']=$name;
   

   if($name == "" || $_id == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../view_design_cat.php");
      exit();
   }

   $para = array('name'=>$name);

   $hire_category = table_update_record("design_category","_id",$_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating Design Category". $company_add;
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../view_design_cat.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Design Category Successfully Updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_design_cat.php");
      exit(); 
   }
   
   

?>


