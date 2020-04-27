<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	$image=isset($_POST['image']) ? strtoupper(trim($_POST['image'])) : '';
	$product_name = isset($_POST['product_name']) ? strtoupper($_POST['product_name']) : '';
	$category_id = isset($_POST['category_id']) ? strtoupper($_POST['category_id']) : '';
	//$subcategory_id = isset($_POST['subcategory_id']) ? $_POST['subcategory_id'] : '';
	$description = isset($_POST['description']) ? strtoupper($_POST['description']) : '';
	$supplier = isset($_POST['supplier']) ? strtoupper($_POST['supplier']): '';
	$main_price = isset($_POST['main_price']) ? $_POST['main_price']: '';
	$slash_price = isset($_POST['slash_price']) ? $_POST['slash_price']: '';

	$_SESSION['image'] = $image;
	$_SESSION['product_name'] = $product_name;
	$_SESSION['category_id'] = $category_id;
	$_SESSION['description'] = $description;
	$_SESSION['supplier'] = $supplier;
	$_SESSION['main_price'] = $main_price;
	$_SESSION['slash_price'] = $slash_price;


	if($product_name == "" || $category_id == "" || $description == "" || $supplier == "" || $main_price == "" || $slash_price == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_book.php");
		exit();
	}


	$check_product = table_open("products","productName='$product_name'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Product Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_book.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Product ($product_name) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_book.php");
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
            header("location: ../add_book.php");
            exit();
      }
   }


   $product_id = get_product_id();

   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
   $temporary_file="../images/".date("YmdHis").".jpg";
   $logo_filename="../images/". $product_id .".jpg";
   if(move_uploaded_file($_FILES['image']['tmp_name'],$temporary_file))
   {
      process_pix($temporary_file,$logo_filename);
   }
}

$type = 1;

$value = array('product_id'=>$product_id, 'productName'=>$product_name, 'book_category'=>$category_id, 'description'=>$description, 'supplier_id'=>$supplier, 'mainPrice'=>$main_price, 'slashPrice'=>$slash_price, 'type'=>$type);

$add_product = table_add_record("products", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding New Product!" . " ".$product_name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_book.php");
	exit();
}
else
{
	unset($_SESSION['image'], $_SESSION['product_name'], $_SESSION['category_id'], $_SESSION['subcategory_id'], $_SESSION['description'], $_SESSION['supplier'], $_SESSION['main_price'], $_SESSION['slash_price']);
	$_SESSION['message'] = "New Product ($product_name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_book.php");
	exit();
}

?>