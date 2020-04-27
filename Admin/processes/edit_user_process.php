<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $user_id=isset($_GET['user_id']) ? $_GET['user_id'] : '';
	$username=isset($_POST['username']) ? trim($_POST['username']) : '';
   //$password=isset($_POST['password']) ? trim($_POST['password']) : '';
   $email=isset($_POST['email']) ? trim($_POST['email']) : '';
   $role=isset($_POST['role']) ? trim($_POST['role']) : '';
   $branch_name = isset($_POST['branch_name']) ? $_POST['branch_name']: '';

   $_SESSION['username'] = $username;
   $_SESSION['email'] = $email;
   $_SESSION['role'] = $role;
   $_SESSION['branch_name'] = $branch_name;

   if($username == ""  || $email == "" || $role == "" || $branch_name == "" || $user_id == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../edit_user.php?user_id=".$user_id);
      exit();
   }

   $para = array('username'=>$username, 'email'=>$email, 'role'=>$role, 'branch_name'=>$branch_name);

   $update_user = table_update_record("admin","user_id",$user_id,$para,__FILE__,__LINE__);
   if($update_user!="")
   {
      $_SESSION['message']="Error encountered updating User Information! Please try again later". $update_user;
      $_SESSION['messagetype']="alert alert-danger";
      header("location: ../edit_user.php?user_id=".$user_id);
      exit();
   }
   else{
      $_SESSION['message'] = "User <b>($username) </b> has been successfully updated!";
      $_SESSION['messagetype'] = "alert alert-success";
      header("location: ../view_user.php");
      exit(); 
   }

   

?>


