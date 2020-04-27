<?php
   ob_start();
  session_start();
  include_once("../db/config.php");
   include_once("../functions.php");
   $customer_id = isset($_GET['customer_id']) ? trim($_GET['customer_id']) : '';
   $surname=isset($_POST['surname']) ? trim($_POST['surname']) : '';
   $firstname=isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
   $gender=isset($_POST['gender']) ? $_POST['gender'] : '';
   $c_address=isset($_POST['c_address']) ? $_POST['c_address'] : '';
   $phone_number=isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
  

   //$_SESSION['name']=$name;
   

   if($surname == "" || $firstname == "" || $gender == "" || $c_address == "" || $phone_number == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../edit_customer.php?customer_id=".$customer_id."");
      
      exit();
   }

   $para = array('surname'=>$surname, 'firstname'=>$firstname, 'gender'=>$gender, 'c_address'=>$c_address, 'phone_number'=>$phone_number);

   $hire_category = table_update_record("customers","customer_id",$customer_id,$para,__FILE__,__LINE__);
   if($hire_category!="")
   {
      $_SESSION['message']="Error encountered updating Customer information";
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../edit_customer.php?customer_id=".$customer_id."");
      exit();
   }
   else{
      $_SESSION['message'] = "Customer information Successfully Updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_customer.php");
      exit(); 
   }
   
   

?>


