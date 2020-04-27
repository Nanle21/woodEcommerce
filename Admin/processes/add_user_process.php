<?php
   ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");

   $logo=isset($_POST['image']) ? trim($_POST['logo']) : '';
	$username=isset($_POST['username']) ? strtoupper(trim($_POST['username'])) : '';
   $password=isset($_POST['password']) ? strtoupper(trim($_POST['password'])) : '';
   $email=isset($_POST['email']) ? strtoupper(trim($_POST['email'])) : '';
   $role=isset($_POST['role']) ? strtoupper(trim($_POST['role'])) : '';
   $branch_name = isset($_POST['branch_name']) ? $_POST['branch_name']: '';

   $_SESSION['logo']=$logo;
   $_SESSION['username'] = $username;
   $_SESSION['password'] = $password;
   $_SESSION['email'] = $email;
   $_SESSION['role'] = $role;

   if($username == "" || $password == "" || $email == "" || $role == "" || $branch_name == ""){
      $_SESSION['message'] = "Please fill in the form";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../add_user.php");
      exit();
   }

   $check_user=table_open("admin","username='$username'","","",__FILE__,__LINE__);
   //$check_user = table_open("admin","username=>'$username'","","",__FILE__,__FILE__);
   if($check_user['error']!="" && $check_user['error']!="No record found!")
   {
      $_SESSION['message'] = "Error encountered accessing Admin User information! ". $check_user['error'];
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../add_user.php");
      exit();

   }

   if($check_user['error'] == ""){
      $_SESSION['message'] = "This User ($username) already Exist";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../add_user.php");
      exit();
   }

   

   $user_id=get_admin_user();

   
   $values=array('user_id'=>$user_id,'username'=>$username, 'password'=>$password, 'email'=>$email, 'role'=>$role, 'branch_name'=>$branch_name);
   $add_user=table_add_record("admin",$values,__FILE__,__LINE__,"insert");

   if($add_user!="")
   {
      $_SESSION['message']="Error encountered adding new User. ". $add_user;
      $_SESSION['messagetype']="error_msg";
      header("location: ../add_user.php");
      exit();
   }
   else
   {
      unset($_SESSION['username'], $_SESSION['password'], $_SESSION['email'], $_SESSION['role']);

      $_SESSION['message']="New User ($username) has been succesfully added!";
      $_SESSION['messagetype']="alert alert-success";
      header("location: ../view_user.php");
      exit();
   }


?>


