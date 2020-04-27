<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
	$gender = isset($_POST['gender']) ? $_POST['gender']: '';
	$c_address = isset($_POST['c_address']) ? $_POST['c_address']: '';
	$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number']: '';

	

	


	$check_product = table_open("customers","surname='$surname' and firstname='$firstname'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		 echo("Error Encountered accessing customers Information! ". $check_product['error']);
		//$_SESSION['messagetpye'] = "alert alert-danger";
		//header("location: ../add_customer.php");
		exit();
	}

	if($check_product['error'] == "")
	{
		echo("Customer Information Already Exist");
		//$_SESSION['messagetpye'] = "alert alert-danger";
		//header("location: ../add_customer.php");
		exit();
	}   

   $customer_id = get_customer_id();


$value = array('customer_id'=>$customer_id, 'surname'=>$surname, 'firstname'=>$firstname, 'gender'=>$gender, 'c_address'=>$c_address, 'phone_number'=>$phone_number);

$add_product = table_add_record("customers",$value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	echo "Error Adding New customers!"." ". $add_product['error'];
	
	//$_SESSION['messagetype'] = "alert alert-danger";
	//header("location: ../add_customer.php");
	exit();
}
else
{
	 echo("New Customer has been successfully added");
	//$_SESSION['messagetype'] = "alert alert-success";
	//header("location: ../view_customer.php");
	exit();
}

?>