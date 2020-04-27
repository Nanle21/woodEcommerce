<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	
	$content = isset($_POST['content']) ? $_POST['content']: '';
	$blog_title = isset($_POST['blog_title']) ? $_POST['blog_title']: '';
	$blog_category = isset($_POST['blog_category']) ? $_POST['blog_category']: '';
	$entered_by = $_SESSION['current_user'];



	//$_SESSION['name'] = $name;
	$_SESSION['blog_title'] = $blog_title;
	$_SESSION['blog_category'] = $blog_category;
	$_SESSION['content'] = $content; 


	if($blog_title == "" || $blog_category == "" || $content == "")
	{
		$_SESSION['message'] = "Please fill in the form";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_blog.php");
		exit();
	}


	$check_product = table_open("blog","blog_title='$blog_title'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Blog Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_blog.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Blog ($blog_title) Already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_blog.php");
		exit();
	}

   
   $blog_id = get_blog_id();

   if(is_uploaded_file($_FILES['image']['tmp_name']))
{
   $temporary_file="../images/".date("YmdHis").".jpg";
   $logo_filename="../images/". $blog_id .".jpg";
   if(move_uploaded_file($_FILES['image']['tmp_name'],$temporary_file))
   {
      process_pix($temporary_file,$logo_filename);
   }
}


   

$value = array('blog_id'=>$blog_id,'blog_title'=>$blog_title,'blog_category'=>$blog_category,'content'=>$content,'entered_by'=>$entered_by);

$add_product = table_add_record("blog", $value,__FILE__,__LINE__,"insert");

if($add_product!="")
{
	$_SESSION['message'] = "Error Adding Blog" . " ".$name. $add_product['error'];
	$_SESSION['messagetype'] = "alert alert-danger";
	header("location: ../add_blog.php");
	exit();
}
else
{
	unset($_SESSION['name']);
	$_SESSION['message'] = "New Book Category ($name) has been successfully added";
	$_SESSION['messagetype'] = "alert alert-success";
	header("location: ../view_blog.php");
	exit();
}

?>