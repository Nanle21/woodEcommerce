<?php
	session_start();
    include_once("../Admin/db/config.php");
    include_once("../Admin/functions.php");

    $name = isset($_POST['name']) ? $_POST['name']: '';
	$email = isset($_POST['email']) ? $_POST['email']: '';
	$mobile_num = isset($_POST['mobile_num']) ? $_POST['mobile_num']:'';
	$order_ref = isset($_POST['order_ref']) ? $_POST['order_ref']: '';
	$message = isset($_POST['message']) ? $_POST['message']: '';

	$username = "nanle12";
    $password = "nanle21";
    $sender = "DANDY NDIFE NG LTD";
    $recipient = $mobile_num;
    $message = "Thanks for contacting Dandy Ndife Nigeria, Your will receive a response shortly!!";


	if($email == "" || $order_ref == "" || $message == ""){
		$_SESSION['mesasge'] = "Please fill in the form properly";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../contact.php");
		exit();
	}

	$values = array('name'=>$name, 'email'=>$email, 'mobile_num'=>$mobile_num, 'message'=>$message);
	$add_contact = table_add_record("contact_us",$values,__FILE__,__LINE__);
	if($add_contact != ""){
		$_SESSION['mesasge'] = "Failed to send your contact message, information please try again later";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../contact.php");
		exit();
	}
	else{
		$Curl_Session = curl_init('http://smsmobile24.com/components/com_spc/smsapi.php');
        curl_setopt ($Curl_Session, CURLOPT_POST, 1);
        curl_setopt ($Curl_Session, CURLOPT_POSTFIELDS, "username=$username&password=$password&sender=$sender&recipient=$recipient&message=$message");
        curl_setopt ($Curl_Session, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($Curl_Session, CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec ($Curl_Session);
		$_SESSION['mesasge'] = "Thanks for contacting Dandy Ndife Nigeria, Your will receive a response shortly!!";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../contact.php");
		exit();
	}
?>