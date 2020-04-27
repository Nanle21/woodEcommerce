<?php
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");

	

	$companyName = isset($_POST['name']) ? $_POST['name']: '';
	$rccno = isset($_POST['rccno']) ? $_POST['rccno']: '';
	$address = isset($_POST['address']) ? $_POST['address']: '';
	$email = isset($_POST['email']) ? $_POST['email']: '';
	$website = isset($_POST['website']) ?	$_POST['website']: '';
	$pastproject1 = isset($_POST['pastproject1']) ? $_POST['pastproject1']: '';
	$projectdesc1 = isset($_POST['projectdesc1']) ? $_POST['projectdesc1']: '';
	$projectLocal1 = isset($_POST['projectLocal1']) ? $_POST['projectLocal1']: '';
	$yrcm1 = isset($_POST['yrcm1']) ? $_POST['yrcm1']: '';
	$ymfn1 = isset($_POST['ymfn1']) ? $_POST['ymfn1']: '';
	$project2 = isset($_POST['project2']) ? $_POST['project2']: '';
	$projectdesc2 = isset($_POST['projectdesc2']) ? $_POST['projectdesc2']: '';
	$projectLocale2 = isset($_POST['projectLocale2']) ? $_POST['projectLocale2']: '';
	$yrcm2 = isset($_POST['yrcm2']) ? $_POST['yrcm2']: '';
	$yrfn2 = isset($_POST['yrfn2']) ? $_POST['yrfn2']: '';
	$project3 = isset($_POST['project3']) ? $_POST['project3']: '';
	$projectdesc = isset($_POST['projectdesc']) ? $_POST['projectdesc']: '';
	$projectlocale3  = isset($_POST['projectlocale3']) ? $_POST['projectlocale3']: '';
	$profession = isset($_POST['profession']) ? $_POST['profession']: '';
	$yrcm3 = isset($_POST['yrcm3']) ? $_POST['yrcm3']: '';
	$yrfn3 = isset($_POST['yrfn3']) ? $_POST['yrfn3']: '';

	$image = $_FILES['image']['name'];
	$certifiedcoporate = $_FILES['certifiedcoporate']['name'];
	$relevantcerification = $_FILES['relevantcerification']['name'];
	$companyprofile = $_FILES['companyprofile']['name'];

	if($companyName == "" || $rccno == "" || $address == "" || $email == "" || $website == ""){
		$_SESSION['message'] = "Please fill in the form properly";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_specialist.php");
		exit();
	}
	$type = "Specialist";
	$check_product = table_open("contractor","name='$companyName' and type='$type'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Specialist Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_specialist.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Specialist ($companyName) already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_specialist.php");
		exit();
	}

	if(isset($_FILES['image'])){
		$file_name0 = $_FILES['image']['name'];
	    $file_size0 =$_FILES['image']['size'];
	    $file_tmp0 =$_FILES['image']['tmp_name'];
	    $file_type0=$_FILES['image']['type'];
	    $name0=$_POST['image'];
	    $codes0=$_POST['image'];
	}

	$extension0 = array("jpeg","jpg","png","pdf","docx");
	$file_ext0=explode('.',$_FILES['certifiedcoporate']['name'])	;
	$file_ext0=end($file_ext0);

	$file_ext0=strtolower(end(explode('.',$_FILES['image']['name']))); 
	if(in_array($file_ext0,$extensions0) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size0 > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp0,"../images/".$file_name0);
	    echo "Success";
	}else{
		echo "Failed to upload";
	} 

	if(isset($_FILES['certifiedcoporate'])){
		$file_name = $_FILES['certifiedcoporate']['name'];
	    $file_size =$_FILES['certifiedcoporate']['size'];
	    $file_tmp =$_FILES['certifiedcoporate']['tmp_name'];
	    $file_type=$_FILES['certifiedcoporate']['type'];
	    $name=$_POST['certifiedcoporate'];
	    $codes=$_POST['certifiedcoporate'];
	}

	$extension = array("jpeg","jpg","png","pdf","docx");
	$file_ext=explode('.',$_FILES['certifiedcoporate']['name'])	;
	$file_ext=end($file_ext);

	$file_ext=strtolower(end(explode('.',$_FILES['certifiedcoporate']['name']))); 
	if(in_array($file_ext,$extensions ) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp,"../images/".$file_name);
	    echo "Success";
	}else{
		echo "Failed to upload";
	} 

	if(isset($_FILES['relevantcerification'])){
		$file_name1 = $_FILES['relevantcerification']['name'];
	    $file_size1 =$_FILES['relevantcerification']['size'];
	    $file_tmp1 =$_FILES['relevantcerification']['tmp_name'];
	    $file_type1=$_FILES['relevantcerification']['type'];
	    $name1=$_POST['relevantcerification'];
	    $codes1=$_POST['relevantcerification'];
	}

	$extension1 = array("jpeg","jpg","png","pdf","docx");
	$file_ext1=explode('.',$_FILES['relevantcerification']['name'])	;
	$file_ext1=end($file_ext);

	$file_ext1=strtolower(end(explode('.',$_FILES['relevantcerification']['name']))); 
	if(in_array($file_ext,$extensions ) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size1 > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp1,"../images/".$file_name1);
	    echo "Success";
	}else{
		echo "Failed to upload";
	} 



	if(isset($_FILES['companyprofile'])){
		$file_name2 = $_FILES['companyprofile']['name'];
	    $file_size2 =$_FILES['companyprofile']['size'];
	    $file_tmp2 =$_FILES['companyprofile']['tmp_name'];
	    $file_type2=$_FILES['companyprofile']['type'];
	    $name2=$_POST['companyprofile'];
	    $codes2=$_POST['companyprofile'];
	}
	$extension2 = array("jpeg","jpg","png","pdf","docx");
	$file_ext2=strtolower(end(explode('.',$_FILES['relevantcerification']['name']))); 
	if(in_array($file_ext2,$extensions2 ) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size2 > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp2,"../images/".$file_name2);
	    echo "Success";
	}else{
		echo "Failed to upload";
	} 


	
	$contractor_id = get_contractor_id();

	$values = array('contractor_id'=>$contractor_id, 'name'=>$companyName, 'rccno'=>$rccno, 'address'=>$address, 'email'=>$email, 'website'=>$website, 'certifiedcoporate'=>$certifiedcoporate, 'photo_id'=>$photo_id, 'relevantcerification'=>$relevantcerification, 'companyprofile'=>$companyprofile, 'pastproject1'=>$pastproject1, 'projectdesc1'=>$projectdesc1, 'projectLocal1'=>$projectLocal1, 'yrcm1'=>$yrcm1, 'ymfn1'=>$ymfn1, 'project2'=>$project2, 'projectdesc2'=>$projectdesc2, 'projectLocale2'=>$projectLocale2, 'yrcm2'=>$yrcm2, 'yrfn2'=>$yrfn2, 'project3'=>$project3, 'projectdesc'=>$projectdesc, 'profession'=>$profession, 'projectlocale3'=>$projectlocale3, 'yrcm3'=>$yrcm3, 'yrfn3'=>$yrfn3, 'type'=>$type);

	$add_contractor = table_add_record("contractor", $values,__FILE__,__LINE__,"insert");
	if($add_contractor!="")
	{
		$_SESSION['message'] = "Error Adding New Specialist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_specialist.php");
		exit();
	}
	else{
		//unset($_SESSION['name'], $_SESSION['conLName'], $_SESSION['dob'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['address1'], $_SESSION['address2']);
		$_SESSION['message'] = "New Specialist ($name) has been successfully Added";
		$_SESSION['messagetype'] = "alert alert-success";
		header("location: ../add_specialist.php");
		exit();
	}
?>