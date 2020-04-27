<?php
	date_default_timezone_get("Africa/Lagos");

	error_reporting(E_ALL);
 	error_reporting(0);

 	$db_host = "localhost";
 	$db_user = "root";
 	$db_pass = "";
 	$db_name = "dandywood";

 	try{
 		$connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 	}
 	catch(PDOException $e){
 		$msg=" | ".date("Y-m-d H:i:s").$e->getMessage();
		mail("nanle_paul@nanleinc.com","Error message from: www.dandywoods.com" ,$msg);
    	file_put_contents('PDOErrors.txt', $msg, FILE_APPEND);
		die( "I'm sorry, Dandy. I'm afraid I can't do that.");
		exit();
 	}

 	
?>