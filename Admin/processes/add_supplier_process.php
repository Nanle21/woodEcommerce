<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$image=isset($_POST['image']) ? strtoupper(trim($_POST['image'])) : '';
	$company_name = isset($_POST['company_name']) ? strtoupper(trim($_POST['company_name'])) : '';
	$contactFName = isset($_POST['contactFName']) ? trim($_POST['contactFName']) : '';
	$contactLName = isset($_POST['contactLName']) ? trim($_POST['contactLName']) : '';
	$contactTitle = isset($_POST['contactTitle']) ? trim($_POST['contactTitle']) : '';
	$Address1 = isset($_POST['Address1']) ? $_POST['Address1'] : '';
	$Address2 = isset($_POST['Address2']) ? $_POST['Address2'] : '';
	$state = isset($_POST['state']) ? trim($_POST['state']) : '';
	$country = isset($_POST['country']) ? trim($_POST['country']) : '';
	$phone =  isset($_POST['phone']) ? trim($_POST['phone']) : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$notes = isset($_POST['notes']) ? $_POST['notes'] : '';
	$_SESSION['image'] = $image;
	$_SESSION['company_name'] = $company_name;
	$_SESSION['contactFName'] = $contactFName;
	$_SESSION['contactLName'] = $contactLName;
	$_SESSION['contactTitle'] = $contactTitle;
	$_SESSION['Address1'] = $Address1;
	$_SESSION['Address2'] = $Address2;
	$_SESSION['state'] = $state;
	$_SESSION['country'] = $country;
	$_SESSION['phone'] = $phone;
	$_SESSION['email'] = $email;



	if($company_name == "" || $contactFName == "" || $contactLName == "" || $contactTitle == "" || $Address1 == "" || $Address2 == "" || $state == "" || $country == "" || $phone == "" || $email == "")
	{
		$_SESSION['message'] = "Please fill in the form to Add Supplier";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_supplier.php");
		exit();
	}

	$check_supplier = table_open("Suppliers","CompanyName='$company_name'","","",__FILE__,__FILE__);
	if($check_supplier['error']!="" && $check_supplier['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Suppliers Information! ". $check_supplier['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_supplier.php");
		exit();
	}

	if($check_supplier['error'] == ""){
		$_SESSION['message'] = "Supplier ($company_name) Already Exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_supplier.php");
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
            header("location: ../add_supplier.php");
            exit();
      }
   }

   $suppliers_id = get_supplier_id();

   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
   $temporary_file="../images/".date("YmdHis").".jpg";
   $logo_filename="../images/". $suppliers_id .".jpg";
   if(move_uploaded_file($_FILES['image']['tmp_name'],$temporary_file))
   {
      process_pix($temporary_file,$logo_filename);
   }
}

	$values = array('Suppliers_id'=>$suppliers_id,'CompanyName'=>$company_name, 'ContactFName'=>$contactFName, 'contactLName'=>$contactLName, 'Address1'=>$Address1, 'Address2'=>$Address2, 'state'=>$state, 'country'=>$country, 'phone'=>$phone, 'email'=>$email, 'notes'=>$notes);

	$add_supplier = table_add_record("suppliers",$values,__FILE__,__LINE__,"insert");
	if($add_supplier!=""){
		$_SESSION['message'] = "Error Adding New Supplier" ." ". $suppliers_id;
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_supplier.php");
		exit();
	}
	else{
		unset($_SESSION['company_name'], $_SESSION['contactFName'], $_SESSION['contactLName'], $_SESSION['contactTitle'], $_SESSION['Address1'], $_SESSION['Address2'], $_SESSION['state'], $_SESSION['country'], $_SESSION['phone'], $_SESSION['email']);

		$_SESSION['message'] = "New Suppliers ($company_name) has been successfully Added!";
		$_SESSION['messagetype'] = "alert alert-success";
		header("location: ../view_supplier.php");
		exit();
	}
?>