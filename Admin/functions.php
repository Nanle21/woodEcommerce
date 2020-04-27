<?php
	ob_start();
include_once("db/config.php");
include_once("SimpleImage.php");

function get_organisation_name()
{
	return "Dandy Ndife";
}

function get_organisation_address($city)
{
	$result="";
	if($city=="Ilorin")
	{
		$result="Ilorin Nigeria";
	}
	elseif($city=="Ilorin")
	{
		$result="Ilorin Nigeria";
	}
	return $result;
}

function email_error_message($errmsg,$companyname)
{
	$errmsg="DateTime: ". date("D, d-M-Y h:i A")."\n\n===start".$errmsg."===end\n\n";
	mail("nanle_paul@nanleinc.com","Error message from: ". $companyname ,$errmsg);
	file_put_contents('PDOErrors.txt', $errmsg, FILE_APPEND);
}



function process_pix_category($old_file,$new_file)
{	
	$image=new SimpleImage();
	$image->load($old_file);
	
	if(file_exists($new_file))
	{
		unlink($new_file);
	}
	
	if(($image->getHeight())>430 ||  ($image->getWidth())>502)
	{
		if( ($image->getHeight()) > ($image->getWidth())  )
		{
			$image->resizeToHeight(501);
		}
		else
		{
			$image->resizeToWidth(501);
		}
	}
	
	$image->save($new_file);
	unlink($old_file);
}

function process_pix($old_file,$new_file)
{	
	$image=new SimpleImage();
	$image->load($old_file);
	
	if(file_exists($new_file))
	{
		unlink($new_file);
	}
	
	if(($image->getHeight())>266 ||  ($image->getWidth())>200)
	{
		if( ($image->getHeight()) > ($image->getWidth())  )
		{
			$image->resizeToHeight(366);
		}
		else
		{
			$image->resizeToWidth(300);
		}
	}
	
	$image->save($new_file);
	unlink($old_file);
}



function get_full_month_name($monthNumber)
{
	$monthName="";
	switch($monthNumber)
	{
		case 1:
			$monthName="January";
			break;
		case 2:
			$monthName="February";
			break;
		case 3:
			$monthName="March";
			break;
		case 4:
			$monthName="April";
			break;
		case 5:
			$monthName="May";
			break;
		case 6:
			$monthName="June";
			break;
		case 7:
			$monthName="July";
			break;
		case 8:
			$monthName="August";
			break;
		case 9:
			$monthName="September";
			break;
		case 10:
			$monthName="October";
			break;
		case 11:
			$monthName="November";
			break;
		case 12:
			$monthName="December";
			break;
	}
	
	return $monthName;
}

function required()
{
	echo "<span style='color:#F00; font-weight:bold;'>*</span>";
}

function get_info_from_any_table($table_name,$key_name,$key_value,$infoToGet,$file,$line)
{	
	global $connection;
	$table_name=addslashes($table_name);
	$key_name=addslashes($key_name);
	$key_value=addslashes($key_value);
	$infoToGet=addslashes($infoToGet);
	$continue=TRUE;
	$result="";
	try
	{
		$thesql="select * from $table_name where($key_name='$key_value')";
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute();
	}
	catch(PDOException $e)
	{
		email_error_message($file .": line ". $line .": \n\n (". $thesql .") \n\n". $e->getMessage(),get_organisation_name());
		$continue=FALSE;
	}
	if($continue)
	{
		$get_rec->setFetchMode(PDO::FETCH_ASSOC);
		$total_get_rec=$get_rec->rowCount();
		if($total_get_rec>0)
		{
			$all_data=$get_rec->fetchAll();
			$result= $all_data[0][$infoToGet];
		}
	}
	return $result;
}

function table_open($table_name,$criteria,$sort_column,$sort_order,$file,$line)
{
	$table_name=addslashes(trim($table_name));
	$criteria=trim($criteria);
	$sort_column=addslashes(trim($sort_column));
	$sort_order=strtoupper(addslashes(trim($sort_order)));

	global $connection;
	
	$continue=TRUE;
	$error="";
	try
	{
		$thesql="select * from $table_name";
		if($criteria!="")
		{
			$thesql=$thesql ." where($criteria)";
		}
		
		if($sort_column!="")
		{
			$thesql=$thesql ." order by $sort_column";
		}
		
		if($sort_order=="" || $sort_order=="DESC" || $sort_order=="ASC")
		{
			$thesql=$thesql ." $sort_order";
		}
		
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute();
	}
	catch(PDOException $e)
	{
		email_error_message($file .": line ". $line .": \n\n (". $thesql .") \n\n". $e->getMessage(),get_organisation_name());
		$error=$e->getMessage();
		$continue=FALSE;
		$result['total']=0;
	}
	if($continue)
	{
		$get_rec->setFetchMode(PDO::FETCH_ASSOC);
		$total_get_rec=$get_rec->rowCount();
		if($total_get_rec>0)
		{
			$result=$get_rec->fetchAll();
			$result['total']=$total_get_rec;
		}
		else
		{
			$error="No record found!";
			$result['total']=0;
		}
	}
	
	$result['error']=$error;
	
	return $result;
	
}

function table_open_sql($thesql,$file,$line)
{
	global $connection;
	
	$continue=TRUE;
	$error="";
	try
	{	
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute();
	}
	catch(PDOException $e)
	{
		email_error_message($file .": line ". $line .": \n\n (". $thesql .") \n\n". $e->getMessage(),get_organisation_name());
		$error=$e->getMessage();
		$continue=FALSE;
		$result['total']=0;
	}
	if($continue)
	{
		$get_rec->setFetchMode(PDO::FETCH_ASSOC);
		$total_get_rec=$get_rec->rowCount();
		if($total_get_rec>0)
		{
			$result=$get_rec->fetchAll();
			$result['total']=$total_get_rec;
		}
		else
		{
			$error="No record found!";
			$result['total']=0;
		}
	}
	
	$result['error']=$error;
	
	return $result;
	
}

function table_exec_action_sql($thesql,$file,$line)
{
	global $connection;
	
	$error="";
	try
	{	
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute();
	}
	catch(PDOException $e)
	{
		email_error_message($file .": line ". $line .": \n\n (". $thesql .") \n\n". $e->getMessage(),get_organisation_name());
		$error=$e->getMessage();
	}
	
	return $error;
}

function table_add_record($table_name,$column_to_values,$file,$line,$use_replace_insert="insert")
{
	if(!is_array($column_to_values))
	{
		return"Invalid options!";
	}
	
	global $connection;
	
	$table_name=remove_quotes($table_name);
	
	$sql_values="";
	$para=array();
	
	$use_replace_insert=addslashes($use_replace_insert);
	foreach($column_to_values as $column=>$values)
	{
		$col=addslashes($column);
		$val=addslashes($values);
		
		$sql_values .= $col. "= :".$col .", ";
		$para[$col]=$val;
	}
	$sql_values=trim($sql_values,", ");
	
	$msg="";
	try
	{
		$thesql="$use_replace_insert into $table_name set $sql_values";
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute($para);
	}
	catch(PDOException $e)
	{
		email_error_message($file .": line ". $line .": \n\n (". $thesql ."), (". implode("|",$para) .") \n\n". $e->getMessage(),get_organisation_name());
		$msg=$e->getMessage();
	}
	
	return $msg;
	
}

function table_update_record($table_name,$id_column,$id_value,$column_to_values,$file,$line)
{
	if(!is_array($column_to_values))
	{
		return"Invalid values!";
	}
	
	if($id_column=="" || $id_value=="")
	{
		return "Invalid IDs";
	}
	
	global $connection;
	
	$table_name=remove_quotes($table_name);
	$id_value=remove_quotes($id_value);
	$id_column=remove_quotes($id_column);
	
	$sql_values="";
	$para=array();
	
	foreach($column_to_values as $column=>$values)
	{
		$col=addslashes($column);
		$val=addslashes($values);
		
		$sql_values .= $col. "= :". $col .", ";
		$para[$col]=$val;
	}
	$sql_values=trim($sql_values,", ") . " where($id_column= :$id_column)";
	
	$para[$id_column]=$id_value;
	
	$msg="";
	try
	{
		$thesql="update $table_name set $sql_values";
		$get_rec=$connection->prepare($thesql);
		$get_rec->execute($para);
	}
	catch(PDOException $e)
	{
		email_error_message($file .": line ". $line .": \n\n (". $thesql ."), (". implode("|",$para) .") \n\n". $e->getMessage(),get_organisation_name());
		$msg=$e->getMessage();
	}
	
	return $msg;
	
}

function remove_quotes($thevar)
{
	return addslashes(trim($thevar));
}

function convert_number($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Million"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
}

function get_image1()
{
	$hire_id="E00000";
	$get_last_hire_id=table_open("design","","image1","DESC",__FILE__,__LINE__);
	if($get_last_design_id['error']=="")
	{
		$design_id=$get_last_hire_id[0]['image1'];
	}
	$new_id=strval(intval(substr($design_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("E".$new_id);
}

function dorder_id()
{
	$hire_id="Z00000";
	$get_last_hire_id=table_open("design_order","","dorder_id","DESC",__FILE__,__LINE__);
	if($get_last_design_id['error']=="")
	{
		$design_id=$get_last_hire_id[0]['dorder_id'];
	}
	$new_id=strval(intval(substr($design_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("Z".$new_id);
}




function get_new_users()
{
	$acc_id="A000000";
	$get_acc_id=table_open("users","","acc_id","DESC",__FILE__,__LINE__);
	if($get_acc_id['error']=="")
	{
		$acc_id=$get_acc_id[0]['acc_id'];
	}
	$new_acc_id=strval(intval(substr($acc_id,1,6))+1);
	while(strlen($new_acc_id)<6)
	{
		$new_acc_id="0".$new_acc_id;
	}
	return ("A". $new_acc_id);
}

function get_new_modular()
{
	$modular_id="M000000";
	$get_acc_id=table_open("modular_kitchen","","modular_id","DESC",__FILE__,__LINE__);
	if($get_acc_id['error']=="")
	{
		$modular_id=$get_acc_id[0]['modular_id'];
	}
	$new_acc_id=strval(intval(substr($modular_id,1,6))+1);
	while(strlen($new_acc_id)<6)
	{
		$new_acc_id="0".$new_acc_id;
	}
	return ("M". $new_acc_id);
}

function get_blog_id()
{
	$acc_id="B000000";
	$get_acc_id=table_open("blog","","blog_id","DESC",__FILE__,__LINE__);
	if($get_acc_id['error']=="")
	{
		$acc_id=$get_acc_id[0]['blog_id'];
	}
	$new_acc_id=strval(intval(substr($acc_id,1,6))+1);
	while(strlen($new_acc_id)<6)
	{
		$new_acc_id="0".$new_acc_id;
	}
	return ("B". $new_acc_id);
}

function get_specialist()
{
	$acc_id="S000000";
	$get_acc_id=table_open("specialist_professional","","s_id","DESC",__FILE__,__LINE__);
	if($get_acc_id['error']=="")
	{
		$acc_id=$get_acc_id[0]['s_id'];
	}
	$new_acc_id=strval(intval(substr($acc_id,1,6))+1);
	while(strlen($new_acc_id)<6)
	{
		$new_acc_id="0".$new_acc_id;
	}
	return ("S". $new_acc_id);
}

function cat_image_icon_id()
{
	$acc_id="V000000";
	$get_acc_id=table_open("categories","","icon_id","DESC",__FILE__,__LINE__);
	if($get_acc_id['error']=="")
	{
		$acc_id=$get_acc_id[0]['icon_id'];
	}
	$new_acc_id=strval(intval(substr($acc_id,1,6))+1);
	while(strlen($new_acc_id)<6)
	{
		$new_acc_id="0".$new_acc_id;
	}
	return ("V". $new_acc_id);
}


function get_admin_user()
{
	$user_id="U00000";
	$get_last_user_id=table_open("admin","","user_id","DESC",__FILE__,__LINE__);
	if($get_last_user_id['error']=="")
	{
		$user_id=$get_last_user_id[0]['user_id'];
	}
	$new_id=strval(intval(substr($user_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("U".$new_id);
}

function get_hire_id()
{
	$hire_id="I00000";
	$get_last_hire_id=table_open("sales","","sale_id","DESC",__FILE__,__LINE__);
	if($get_last_hire_id['error']=="")
	{
		$hire_id=$get_last_hire_id[0]['sale_id'];
	}
	$new_id=strval(intval(substr($hire_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("I".$new_id);
}

function get_design_id()
{
	$hire_id="D00000";
	$get_last_hire_id=table_open("design","","design_id","DESC",__FILE__,__LINE__);
	if($get_last_design_id['error']=="")
	{
		$design_id=$get_last_hire_id[0]['design_id'];
	}
	$new_id=strval(intval(substr($design_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("D".$new_id);
}

function get_product_id()
{
	$product_id="P00000";
	$get_last_product_id=table_open("products","","product_id","DESC",__FILE__,__LINE__);
	if($get_last_product_id['error']=="")
	{
		$user_id=$get_last_product_id[0]['product_id'];
	}
	$new_id=strval(intval(substr($user_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("P".$new_id);
}

function get_sale_id()
{
	$sale_id="S00000";
	$get_last_sale_id=table_open("open_sale","","open_sale_id","DESC",__FILE__,__LINE__);
	if($get_last_sale_id['error']=="")
	{
		$sale_id=$get_last_sale_id[0]['open_sale_id'];
	}
	$new_id=strval(intval(substr($sale_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("S".$new_id);
}

function get_customer_id()
{
	$contractor_id="C00000";
	$get_last_contractor_id=table_open("customers","","customer_id","DESC",__FILE__,__LINE__);
	if($get_last_contractor_id['error']=="")
	{
		$contractor_id=$get_last_contractor_id[0]['customer_id'];
	}
	$new_id=strval(intval(substr($contractor_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("C".$new_id);
}



function get_category_id()
{
	$catcon_id="C00000";
	$get_last_cat_con=table_open("categories","","_id","DESC",__FILE__,__LINE__);
	if($get_last_cat_con['error']=="")
	{
		$catcon_id=$get_last_cat_con[0]['_id'];
	}
	$new_id=strval(intval(substr($catcon_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("C".$new_id);
}

function get_bank_info($id,$info_to_get)
{
	$result="";
	
	$bank=table_open("banks","id='$id'","","",__FILE__,__LINE__);
	
	if($bank['error']=="")
	{
		$result=$bank[0][$info_to_get];
	}
	
	return $result;
}




function get_new_receipt_no()
{
	$company_id="R100000";
	$get_last_company_id=table_open("member_payments","receipt_number<>'' and receipt_number<>NULL","receipt_number","DESC",__FILE__,__LINE__);
	if($get_last_company_id['error']=="")
	{
		$company_id=$get_last_company_id[0]['receipt_number'];
	}
	$new_id=strval(intval(substr($company_id,1,6))+1);
	while(strlen($new_id)<6)
	{
		$new_id="0".$new_id;
	}
	return ("R".$new_id);
}






function get_info_email()
{
	return "info@linkingconstruction.com";
}

function send_html_mail($from_email,$to,$subject,$body)
{
	$headers = "From: " . strip_tags($from_email) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($from_email) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	if(!mail($to, $subject, $body, $headers))
	{
		mail("nanle_paul@nanleinc.com",get_organisation_name() ." Send Error!","Here is the message: ". $body);
		return FALSE;
	}
	
	return TRUE;
}
?>