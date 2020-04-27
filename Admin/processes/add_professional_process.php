<?php 
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");


	$name = isset($_POST['name']) ? $_POST['name']: '';
	$email = isset($_POST['email']) ? $_POST['email']: '';
	$mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number']: '';
	$pincode = isset($_POST['pincode']) ? $_POST['pincode']: '';
	$profession = isset($_POST['profession']) ? $_POST['profession']: '';
	$gender = isset($_POST['gender']) ? $_POST['gender']: '';
	$comment = isset($_POST['comment']) ? $_POST['comment']: '';
	$address = isset($_POST['address']) ? $_POST['address']: '';
	$state = isset($_POST['state']) ? $_POST['state']: '';
	$localgvt = isset($_POST['localgvt']) ? $_POST['localgvt']: '';
	$nationality = isset($_POST['nationality']) ? $_POST['nationality']: '';
	$educationalbg = isset($_POST['educationalbg']) ? $_POST['educationalbg']: '';
	$architecturectf = isset($_POST['architecturectf']) ? $_POST['architecturectf']: '';
	$engrctf = isset($_POST['engrctf']) ? $_POST['engrctf']: '';
	$project = isset($_POST['project']) ? $_POST['project']: '';
	$qtysurvey = isset($_POST['qtysurvey']) ? $_POST['qtysurvey']: '';
	$others = isset($_POST['others']) ? $_POST['others']: '';

	$certificate = $_FILES['certificate']['name'];
	$architecturectfile = $_FILES['architecturectfile']['name'];
	$engffile = $_FILES['engffile']['name'];
	$qtysurveyfile = $_FILES['qtysurveyfile']['name'];
	$othersfile = $_FILES['othersfile']['name'];
	$projectManage = $_FILES['projectManage']['name'];
	$passport = $_FILES['passport']['name'];
	$photo_id = $_FILES['photo_id']['name'];


	$type = "Professional";
	
	$check_product = table_open("contractor","name='$name'and type='$type'","","",__FILE__,__FILE__);
	if($check_product['error']!="" && $check_product['error']!="No record found!")
	{
		$_SESSION['message'] = "Error Encountered accessing Specialist Information! ". $check_product['error'];
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_professional.php");
		exit();
	}


	if($check_product['error'] == "")
	{
		$_SESSION['message'] = "Professional ($name) already Exist";
		$_SESSION['messagetpye'] = "alert alert-danger";
		header("location: ../add_professional.php");
		exit();
	}
	
	//First File Upload
	if(isset($_FILES['certificate'])){
		$file_name = $_FILES['certificate']['name'];
	    $file_size =$_FILES['certificate']['size'];
	    $file_tmp =$_FILES['certificate']['tmp_name'];
	    $file_type=$_FILES['certificate']['type'];
	   
	}

	$extension = array("jpeg","jpg","png","pdf","docx");
	$file_ext=explode('.',$_FILES['certificate']['name'])	;
	$file_ext=end($file_ext);

	$file_ext=strtolower(end(explode('.',$_FILES['certificate']['name']))); 
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

	//Second File Upload
	if(isset($_FILES['architecturectfile'])){
		$file_name1 = $_FILES['architecturectfile']['name'];
	    $file_size1 =$_FILES['architecturectfile']['size'];
	    $file_tmp1 =$_FILES['architecturectfile']['tmp_name'];
	    $file_type1=$_FILES['architecturectfile']['type'];
	    
	}

	$extension1 = array("jpeg","jpg","png","pdf","docx");
	$file_ext1=explode('.',$_FILES['architecturectfile']['name'])	;
	$file_ext1=end($file_ext);

	$file_ext1=strtolower(end(explode('.',$_FILES['architecturectfile']['name']))); 
	if(in_array($file_ext1,$extensions1 ) === false){
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

	//Third File Upload
	if(isset($_FILES['architecturectfile'])){
		$file_name2 = $_FILES['architecturectfile']['name'];
	    $file_size2 =$_FILES['architecturectfile']['size'];
	    $file_tmp2 =$_FILES['architecturectfile']['tmp_name'];
	    $file_type2=$_FILES['architecturectfile']['type'];
	    
	}

	$extension2 = array("jpeg","jpg","png","pdf","docx");
	$file_ext2=explode('.',$_FILES['architecturectfile']['name'])	;
	$file_ext2=end($file_ext);

	$file_ext2=strtolower(end(explode('.',$_FILES['architecturectfile']['name']))); 
	if(in_array($file_ext2,$extensions2) === false){
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


	//Fourth FIle Upload
	if(isset($_FILES['qtysurveyfile'])){
		$file_name3 = $_FILES['qtysurveyfile']['name'];
	    $file_size3 =$_FILES['qtysurveyfile']['size'];
	    $file_tmp3 =$_FILES['qtysurveyfile']['tmp_name'];
	    $file_type3=$_FILES['qtysurveyfile']['type'];
	    
	}

	$extension3 = array("jpeg","jpg","png","pdf","docx");
	$file_ext3=explode('.',$_FILES['qtysurveyfile']['name'])	;
	$file_ext3=end($file_ext);

	$file_ext3=strtolower(end(explode('.',$_FILES['qtysurveyfile']['name']))); 
	if(in_array($file_ext3,$extensions3) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size3 > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp3,"../images/".$file_name3);
	    echo "Success";
	}else{
		echo "Failed to upload";
	}

	//Fifth File Upload
	if(isset($_FILES['othersfile'])){
		$file_name4 = $_FILES['othersfile']['name'];
	    $file_size4 =$_FILES['othersfile']['size'];
	    $file_tmp4 =$_FILES['othersfile']['tmp_name'];
	    $file_type4=$_FILES['othersfile']['type'];
	    
	}

	$extension4 = array("jpeg","jpg","png","pdf","docx");
	$file_ext4=explode('.',$_FILES['othersfile']['name'])	;
	$file_ext4=end($file_ext);

	$file_ext4=strtolower(end(explode('.',$_FILES['othersfile']['name']))); 
	if(in_array($file_ext4,$extensions4) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size4 > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp4,"../images/".$file_name4);
	    echo "Success";
	}else{
		echo "Failed to upload";
	}

	//Sixth File Upload
	if(isset($_FILES['passport'])){
		$file_name5 = $_FILES['passport']['name'];
	    $file_size5 =$_FILES['passport']['size'];
	    $file_tmp5 =$_FILES['passport']['tmp_name'];
	    $file_type5=$_FILES['passport']['type'];
	    
	}

	$extension5 = array("jpeg","jpg","png","pdf","docx");
	$file_ext5=explode('.',$_FILES['passport']['name'])	;
	$file_ext5=end($file_ext);

	$file_ext5=strtolower(end(explode('.',$_FILES['passport']['name']))); 
	if(in_array($file_ext5,$extensions5) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size5 > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp5,"../images/".$file_name5);
	    echo "Success";
	}else{
		echo "Failed to upload";
	}

	//Seventh File Upload
	if(isset($_FILES['photo_id'])){
		$file_name6 = $_FILES['photo_id']['name'];
	    $file_size6 =$_FILES['photo_id']['size'];
	    $file_tmp6 =$_FILES['photo_id']['tmp_name'];
	    $file_type6=$_FILES['photo_id']['type'];
	    
	}

	$extension6 = array("jpeg","jpg","png","pdf","docx");
	$file_ext6=explode('.',$_FILES['photo_id']['name'])	;
	$file_ext6=end($file_ext);

	$file_ext6=strtolower(end(explode('.',$_FILES['photo_id']['name']))); 
	if(in_array($file_ext6,$extensions6) === false){
		$errors[]= "extension not allowed";

	}
	if($file_size6 > 2097152){
		$errors[]='File size must be less tham 2 MB';
	}
	if(empty($errors)==true){
	    move_uploaded_file($file_tmp6,"../images/".$file_name6);
	    echo "Success";
	}else{
		echo "Failed to upload";
	}

	
	$contractor_id = get_contractor_id();

	$values = array('contractor_id'=>$contractor_id, 'name'=>$name, 'email'=>$email, 'mobile_number'=>$mobile_number, 'pincode'=>$pincode, 'profession'=>$profession, 'gender'=>$gender, 'comment'=>$comment, 'address'=>$address, 'state'=>$state, 'localgvt'=>$localgvt, 'nationality'=>$nationality, 'educationalbg'=>$educationalbg, 'certificate'=>$certificate, 'architecturectf'=>$architecturectf, 'architecturectfile'=>$architecturectfile, 'engrctf'=>$engrctf, 'engffile'=>$engffile, 'project'=>$project, 'projectManage'=>$projectManage, 'qtysurvey'=>$qtysurvey, 'qtysurveyfile'=>$qtysurveyfile, 'others'=>$others, 'othersfile'=>$othersfile, 'passport'=>$passport, 'photo_id'=>$photo_id,'type'=>$type);


	$add_contractor = table_add_record("contractor", $values,__FILE__,__LINE__,"insert");
	if($add_contractor!="")
	{
		$_SESSION['message'] = "Error Adding New Specialist";
		$_SESSION['messagetype'] = "alert alert-danger";
		header("location: ../add_professional.php");
		exit();
	}
	else{
		//unset($_SESSION['name'], $_SESSION['conLName'], $_SESSION['dob'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['address1'], $_SESSION['address2']);
		$_SESSION['message'] = "New Specialist ($name) has been successfully Added";
		$_SESSION['messagetype'] = "alert alert-success";
		header("location: ../add_professional.php");
		exit();
	}
?>