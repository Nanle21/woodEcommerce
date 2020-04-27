<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$image=isset($_POST['image']) ? strtoupper(trim($_POST['image'])) : '';
	$conFName = isset($_POST['conFName']) ? strtoupper(trim($_POST['conFName'])) : '';
	$conLName = isset($_POST['conLName']) ? strtoupper(trim($_POST['conLName'])) : '';
	$dob = isset($_POST['dob']) ? $_POST['dob'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
	$address1 = isset($_POST['address1']) ? $_POST['address1'] : '';
	$address2 = isset($_POST['address2']) ? $_POST['address2'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$category = isset($_POST['category']) ? $_POST['category'] : '';
	if($conFName == "" || $conLName == "" || $dob == "" || $email == "" || $phone == "" || $address1 == "" || $address2 == "" || $description == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_contractor.php");
		exit();
	}

	$check_contractors = table_open("contractor", "conFName='$conFName'","","",__FILE__,__FILE__);
	if($check_contractors['error']!="" && $check_contractors['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Product Information! ". $check_contractors['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_contractor.php");
		exit();
	}

	if($check_contractors == "")
	{
		$_SESSION['message'] = "Contractor ($conFName) already Exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_contractor.php");
		exit();
	}

	$full_filename = isset($_FILE['image']['name']) ? $_FILE['image']['name'] : "";
   $extension = "";
   $filename = "";

   if($full_filename !=""){
      $extension=substr($full_filename, -3);
      $filename = substr($full_filename,0, strlen($full_filename) -4);
      if(strtolower($extension)!="jpg" || "png"){
            $_SESSION['message']="Please upload a (.jpg) or (.png) file!";
            $_SESSION['messagetype']="alert alert-danger";
            header("location: ../add_contractor.php");
            exit();
      }
   }

   $contractor_id = get_contractor_id();
   
   $type = "Contractor";

   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
   $temporary_file="../images/".date("YmdHis").".jpg";
   $logo_filename="../images/". $contractor_id .".jpg";
   if(move_uploaded_file($_FILES['image']['tmp_name'],$temporary_file))
   {
      process_pix($temporary_file,$logo_filename);
   }
}

$values = array('contractor_id'=>$contractor_id, 'conFName'=>$conFName, 'conLName'=>$conLName, 'dob'=>$dob, 'email'=>$email, 'phone'=>$phone, 'address1'=>$address1, 'address2'=>$address2, 'description'=>$description, 'category'=>$category);

$add_contractor = table_add_record("contractor", $values,__FILE__,__LINE__,"insert");
if($add_contractor!="")
{
	$_SESSION['message'] = "Error Adding New Contractor". " ". $add_contractor['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_contractor.php");
	exit();
}
else{
	unset($_SESSION['conFName'], $_SESSION['conLName'], $_SESSION['dob'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['address1'], $_SESSION['address2']);
	$_SESSION['message'] = "New Contractor ($conFName) has been successfully Added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_contractor.php");
	
}
?>