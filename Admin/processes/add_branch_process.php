<?php
     ob_start();
	session_start();
	include_once("../db/config.php");
   include_once("../functions.php");
    $branch_name = isset($_POST['branch_name']) ? $_POST['branch_name']: '';

    $SESSION['branch_name'] = $branch_name;

    if($branch_name == ""){
        $_SESSION['message'] = "Please fill in the form to add branch";
        $_SESSION['messagetype'] = "alert alert-danger";
        header("location: ../add_branch.php");
        exit();
    }


    $check_user=table_open("branch","branch_name='$branch_name'","","",__FILE__,__LINE__);
   //$check_user = table_open("admin","username=>'$username'","","",__FILE__,__FILE__);
   if($check_user['error']!="" && $check_user['error']!="No record found!")
   {
      $_SESSION['message'] = "Error encountered accessing Admin User information! ". $check_user['error'];
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../add_branch.php");
      exit();

   }

   if($check_user['error'] == ""){
      $_SESSION['message'] = "This User ($branch_name) already Exist";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../add_branch.php");
      exit();
   }

   


   
$values=array('branch_name'=>$branch_name);
$add_user=table_add_record("branch",$values,__FILE__,__LINE__,"insert");

if($add_user!="")
{
   $_SESSION['message']="Error encountered adding new User. ". $add_user;
   $_SESSION['messagetype']="alert alert-danger";
   header("location: ../add_branch.php");
   exit();
}
else
{
   unset($_SESSION['branch_name']);

   $_SESSION['message']="New Branch ($branch_name) has been succesfully added!";
   $_SESSION['messagetype']="alert alert-success";
   header("location: ../view_branch.php");
   exit();
}
?>