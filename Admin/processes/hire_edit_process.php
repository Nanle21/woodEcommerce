<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
   $hire_id = isset($_GET['hire_id']) ? trim($_GET['hire_id']) : '';
   //$name=isset($_POST['name']) ? trim($_POST['name']) : '';
	$image=isset($_POST['image']) ? trim($_POST['image']) : '';
   $item = isset($_POST['item']) ? trim($_POST['item']) : '';
   $category_id = isset($_POST['category_id']) ? strtoupper($_POST['category_id']) : '';
   $description = isset($_POST['description']) ? $_POST['description'] : '';
   $supplier = isset($_POST['supplier']) ? $_POST['supplier']: '';

   $_SESSION['image'] = $image;
   $_SESSION['item'] = $item;
   $_SESSION['category_id'] = $category_id;
   $_SESSION['description'] = $description;
   $_SESSION['supplier'] = $supplier;
   

   if($item == "" || $category_id == "" || $description == "" || $supplier == "")
   {
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetpye'] = "alert alert-danger";
      header("location: ../view_hire.php");
      exit();
   }

   $para = array('item'=>$item, 'category'=>$category_id, 'description'=>$description, 'supplier_id'=>$supplier);

   $hire_category = table_update_record("hire","hire_id",$hire_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating Hire Category". $company_add;
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../view_hire.php");
      exit();
   }
   else{
      $_SESSION['message'] = "Hire Item ($item) Successfully Updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_hire.php");
      exit(); 
   }
   
   

?>


