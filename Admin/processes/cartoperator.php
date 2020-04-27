<?php
	
	ob_start();
	session_start();
	include_once("../db/config.php");
	include_once("../functions.php");


	$product_id = isset($_POST['product_id']) ? $_POST['product_id']: '';
	$quantity = isset($_POST['quantity']) ? $_POST['quantity']: '';
	$sale_id = isset($_POST['sale_id']) ? $_POST['sale_id']: '';
	$procedure = isset($_POST['procedure']) ? $_POST['procedure']: '';
	$cart_id =  isset($_POST['cart_id']) ? $_POST['cart_id']: '';
	$finalTotal = isset($_POST['finalTotal']) ? $_POST['finalTotal']: '';
	$discount = isset($_POST['discount']) ? $_POST['discount']: '';

	$open_date = date('Y-m-d');
	$sale_open = table_open("open_sale","open_date='$open_date'","","",__FILE__,__LINE__);
    $open_sale_id = $sale_open[0]['open_sale_id'];
	switch ($procedure) {
		case 'add':
			
			$product_sql = "SELECT * FROM products where product_id='$product_id'";
			$product_con = $connection->query($product_sql);
			$product_detail = $product_con->fetch(PDO::FETCH_ASSOC);
			$newqty = $product_detail['product_quantity'] - $quantity;
			if($product_detail['product_quantity'] < $quantity){
				echo "Oooops! Product can not be added to cart because its quantity is low";
				exit();
			}
			$checksql = "SELECT * FROM cart where sale_id='$sale_id'";
			$check = $connection->query($checksql);
				$value = array('p_id'=>$product_id, 'quantity'=>$quantity, 'sale_id'=>$sale_id, 'acc_id'=>$open_sale_id, 'discount'=>$discount, 'amount_paid'=>$amount_paid);
				$add_cart = table_add_record("cart",$value,__FILE__,__LINE__,"insert");
				if($add_cart!="")
				{
					echo "Error encourtered creating new cart";
					exit();
				}
				else
				{
					echo "Added to cart successfully";
					exit();
				}
			break;
		
		case 'delete':
			$delete_query = "DELETE FROM cart where cart_id='$cart_id'";
		    
		    $check = $connection->query($delete_query);
			   if($check != null)
			   {
			   		echo "Successfully Deleted";
			      
			      exit(); 
			   }
		break;

		case 'checkout':

			$update_sale = "UPDATE sales set total_amount='$finalTotal' where sale_id='$sale_id' and open_sale_id='$open_sale_id'";
			
			$sale_update = $connection->query($update_sale);

			$checksql = "SELECT * FROM cart where sale_id='$sale_id'";
			$check = $connection->query($checksql);
			$count_check = $check->rowCount();
			
			
			
				
			for($i=0; $i<$count_check; $i++){
				$total_cart[$i] = $check->fetch(PDO::FETCH_ASSOC);
				$product_id = $total_cart[$i]['p_id'];
				//echo $product_id;

				$product_sql = "SELECT * FROM products where product_id='$product_id'";
				$product_con = $connection->query($product_sql);
				$product_detail[$i] = $product_con->fetch(PDO::FETCH_ASSOC);

				$newqty = $product_detail[$i]['product_quantity'] - $total_cart[$i]['quantity'];
				//$product_id

				if( $product_detail[$i]['product_quantity'] < $total_cart[$i]['quantity']){
					echo "Oooops! Sale can not be continued because the quantity of your product is low";
					exit();
				}

				$update_sql = "UPDATE products set product_quantity='$newqty' where product_id='$product_id'";
				$update = $connection->query($update_sql);
				
				//echo $newqty;

			}
			if($update == "false"){
				echo "Failed to checkout";
			}
			else{
				echo "success";
			}	
			
			
		break;
		default:
			# code...
			break;
	}
?>