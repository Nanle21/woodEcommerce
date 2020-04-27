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
		header("location: ../edit_supplier.php?suppliers_id=$suppliers_id");
		exit();
	} 

	$check_supplier = table_open("Suppliers","CompanyName='$company_name'","","",__FILE__,__FILE__);
	if($check_supplier['error']!="" && $check_supplier['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Suppliers Information! ". $check_supplier['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../edit_supplier.php?suppliers_id=$suppliers_id");
		exit();
	}

   	try{
   		$para = array(':CompanyName'=>$company_name, ':contactFName'=>$contactFName, ':contactLName'=>$contactLName, ':contactTitle'=>$contactTitle, ':Address1'=>$Address1, ':Address2'=>$Address2, ':state'=>$state, ':country'=>$country, ':phone'=>$phone, ':email'=>$email, ':notes'=>$notes);

   		
      $thesql = "UPDATE suppliers set CompanyName=:CompanyName, contactFName=:contactFName, contactLName=:contactLName, contactTitle=:contactTitle, Address1=:Address1, Address2=:Address2, state=:state, country=:country, phone:=phone, email=:email, notes:=notes  where (suppliers_id=:suppliers_id)";
      $get_rec = $connection->prepare($thesql);
      $get_rec->execute($para);
      exit();
   	}
   	catch(PDOException $e){
   		email_error_message(__FILE__ .": line ". __LINE__ .": \n\n (". $thesql ."), (". implode("|",$para) .") \n\n". $e->getMessage(),get_organisation_name());
      $_SESSION['message'] = "Error encountered updating Product Information! Please try again later";
      $_SESSION['messagetype'] = "alert alert-danger";
      header("location: ../edit_supplier.php?suppliers_id=$suppliers_id");
      exit();  
   	}
   
?>