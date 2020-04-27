<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$category_name = isset($_POST['category_name']) ? $_POST['category_name']: '';
	$image = isset($_POST['image']) ? $_POST['image']: '';

	$_SESSION['category_name'] = $category_name;
	$_SESSION['image'] = $image;


	if($category_name == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_category.php");
		exit();
	}


	$check_product = table_open("categories","category_name='$category_name'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Category Information! ". $check_product['error'];
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_category.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Category ($category_name) Already Exist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_category.php");
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
            header("location: ../add_category.php");
            exit();
      }
   }


   $category_id = get_category_id();

   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
   $temporary_file="../images/".date("YmdHis").".jpg";
   $logo_filename="../images/". $category_id .".jpg";
   if(move_uploaded_file($_FILES['image']['tmp_name'],$temporary_file))
   {
      process_pix($temporary_file,$logo_filename);
   }
}

$value = array('_id'=>$category_id,'category_name'=>$category_name);

$add_product = table_add_record("categories", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Category!" . " ".$category_name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_category.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Category ($category_name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_category.php");
	exit();
}

?>