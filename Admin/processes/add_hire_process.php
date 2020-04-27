<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$image=isset($_POST['image']) ? trim($_POST['image']) : '';
	$item = isset($_POST['item']) ? trim($_POST['item']) : '';
	$category_id = isset($_POST['category_id']) ? strtoupper($_POST['category_id']) : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$supplier = isset($_POST['supplier']) ? $_POST['supplier']: '';
	$peritem = isset($_POST['peritem']) ? $_POST['peritem']: '';
	$specifications = isset($_POST['specifications']) ? $_POST['specifications']: '';
	$description = isset($_POST['description']) ? $_POST['description']: '';
	$main_price = isset($_POST['main_price']) ? $_POST['main_price']: '';


	$_SESSION['image'] = $image;
	$_SESSION['item'] = $item;
	$_SESSION['category_id'] = $category_id;
	$_SESSION['description'] = $description;
	$_SESSION['supplier'] = $supplier;
	


	if($item == "" || $category_id == "" || $description == "" || $supplier == "" || $peritem == "" || $main_price == "" || $specifications == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_hire.php");
		exit();
	}


	$check_product = table_open("hire","item='$item'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Hire Item Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_hire.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Product ($item) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_hire.php");
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
            header("location: ../add_hire.php");
            exit();
      }
   }


   $hire_id = get_hire_id();

   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
   $temporary_file="../images/".date("YmdHis").".jpg";
   $logo_filename="../images/". $hire_id .".jpg";
   if(move_uploaded_file($_FILES['image']['tmp_name'],$temporary_file))
   {
      process_pix($temporary_file,$logo_filename);
   }
}



$value = array('hire_id'=>$hire_id, 'item'=>$item, 'category'=>$category_id, 'description'=>$description, 'supplier_id'=>$supplier, 'peritem'=>$peritem, 'main_price'=>$main_price, 'specifications'=>$specifications);

$add_product = table_add_record("hire", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding New Product!" . " ".$item. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_hire.php");
	exit();
}
else
{
	unset($_SESSION['image'], $_SESSION['item'], $_SESSION['category_id'], $_SESSION['description'], $_SESSION['supplier']);
	$_SESSION['message'] = "New Item ($item) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_hire.php");
	exit();
}

?>