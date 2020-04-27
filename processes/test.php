<?php
	session_start();
    include_once("../Admin/db/config.php");
    include_once("../Admin/functions.php");

    $count = isset($_POST['count']) ? $_POST['count']: '';
    $cart_id = isset($_POST['cart_id[]']) ? $_POST['cart_id[]']: '';

    die($cart_id);
    if($count == ""){
    	die("No count value available");
    }
    else if($cart_id == ""){
    	die("No cart id available");
    }

	
	if(isset($_POST['submit'])){
		for($i=0; $i<$count; $i++){
			echo $_id[$i];
			$sql = "UPDATE cart set quantity='$qty[$i]' where client_id='$client_id' and cart_id='$_id[$i]'";
			$hire_category = $connection->query($sql);
			
			//$para = array('quantity'=>$qty[$i]);
			//$hire_category = table_update_record("cart","client_id",$client_id,$qty[$i],__FILE__,__LINE__);
		}
	} 
							
?>