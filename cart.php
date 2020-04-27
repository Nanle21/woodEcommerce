<?php
	session_start();
	$pagetitle = "Dandy Cart";
	include_once("db/config.php");
	include_once("db/functions.php");
	include_once("processes/cart_operator.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from www.autoshop.zytheme.com/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:11 GMT -->
<head>
<!-- Document Meta
    ============================================= -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--IE Compatibility Meta-->
<meta name="author" content="zytheme" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="construction html5 template">
<link href="assets/images/favicon/favicon.png" rel="icon">

<!-- Fonts
    ============================================= -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CRaleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CUbuntu:300,300i,400,400i,500,500i,700,700i' rel='stylesheet' type='text/css'>

<!-- Stylesheets
    ============================================= -->
<link href="assets/css/external.css" rel="stylesheet">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/custom.css" rel="stylesheet">
<script src="https://use.fontawesome.com/493a54cc3a.js"></script>	
<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<!-- Document Title
    ============================================= -->
<title><?php echo $pagetitle; ?> - Dandy Ndife</title>
</head>
<body>
<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="wrapper clearfix">
	<?php include_once("tpl/header.php"); ?>
	
	<!-- Page Title
============================================= -->
	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>Dandy shop cart</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">shop cart</li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #page-title end -->
	
	<!-- Shop Cart
============================================= -->
<?php
	$stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id where client_id='$client_id'");
	$count = $stmt->rowCount();
	if($count <= 0){
		?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="alert">
			
			<div class="alert alert-danger" align="center">
				<i class="fa fa-check-circle"></i>
				<h4>Empyt Cart.</h4>
				<p>Sorry you have no item in your cart please do add cart</p>
			</div>
		</div>
	</div>
		</div>
	
		<?php
	}
	else{
		?>
		<section id="shopcart" class="shop shop-cart">
		<div class="container">
		<div class="row">
			<div class="col-xs-12  col-sm-12  col-md-12">
				<div id="loader" align="center">
						<img src="assets/ajax-loader.gif"  >
				</div>
				<div class="cart-table table-responsive" id="cartviews">
						
		<table class="table table-bordered">
			<thead>
				<tr class="cart-product">
					<th class="cart-product-item">Product</th>
					<th class="cart-product-price">Price</th>
					<th class="cart-product-quantity">Quantity</th>
					<th class="cart-product-total">Total</th>
				</tr>
			</thead>
			<tbody>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<?php
		 while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             $sum2 += $row['product_fixPrice'] * $row['quantity'];
             ?>
 		<tr class="cart-product">
		<td class="cart-product-item">
			<div class="cart-product-remove">
				<a href="delete_cart.php?product_id=<?php echo $row['product_id']; ?>&client_id=<?php echo $client_id; ?>"><i class="fa fa-close"></i></a>
			</div>
			<div class="cart-product-img">
				<img class="img-responsive" style="max-height: 30px;" src="Admin/images/<?php echo $row['product_id']; ?>.jpg" alt="product"/>
			</div>
			<div class="cart-product-name">
				<h6><?php echo $row['product_name']; ?></h6>
			</div></td>
		<td class="cart-product-price"> <span>&#8358;</span> <?php echo number_format($row['product_fixPrice']); ?></td>
		<td class="cart-product-quantity"><div class="product-quantity">
				<input type="number" style="width: 70px;" name="qty[]" value="<?php echo $row['quantity']; ?>">
				<input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
				
			</div></td>
		<td class="cart-product-total"> <span>&#8358;</span> <?php echo number_format($row['product_fixPrice'] * $row['quantity']); ?></td>
						
					</tr>
             <?php  
             $nanle[] = $row['cart_id'];
	}

	?>
		<tr class="cart-product-action">
			<td  colspan="4"><div class="row clearfix">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-inline">
							
						</div>
					</div>
					<!-- .col-md-6 end -->
					<div class="col-xs-12 col-sm-6 col-md-6 text-right">
						<button name="submit" class="btn btn-secondary">update cart</button>
						<a class="btn btn-primary" href="javascript:;"  data-toggle="modal" data-target="#book_product">Proceed To Book Product</a>
					</div>
					<!-- .col-md-6 end -->
				</div></td>
		</tr>
			</form>
			</tbody>
												<?php
								
							}

							?>
								
							
						</table>
					</div>
					<!-- .cart-table end -->
				</div>
				<!-- .col-md-12 end -->
	<div class="modal fade" id="book_product" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
     	<div class="modal-dialog">
     		<div class="modal-content">
     			<div class="modal-header">
     				 <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                	</button>
		            <h4 class="modal-title" id="myModalLabel">
		                Add Booking Detail
		            </h4>
     			</div>
     			<div class="modal-body">
     				<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
     					<div class="form-group">
     						<label>Name</label>
     						<input type="text" name="name" class="form-control">
     					</div>
     					<div class="form-group">
     						<label>Phone Number</label>
     						<input type="text" name="mobile_num" class="form-control">
     					</div>
     					<div class="form-group">
     						<label>Email</label>
     						<input type="text" name="email" class="form-control">
     					</div>
     					<div class="form-group">
     						<button class="btn btn-sucess" name="bookProduct">Add Product Detail</button>
     					</div>
     				</form>
     			</div>
     		</div>
     	</div>
     </div>
				<?php
					//echo $count;
					if(isset($_POST['submit'])){
						for($i=0; $i<$count; $i++){
							//echo $_id[$i];
							$sql = "UPDATE cart set quantity='$qty[$i]' where cart_id='$nanle[$i]' and client_id='$client_id'";
							$hire_category = $connection->query($sql);
							if($hire_category == "false"){
								$_SESSION['message'] = "FAILED TO UPDATE CART";
								$_SESSION['messagetype'] = "alert alert-danger";
								header("location: cart");
							}
							else{
								$_SESSION['message'] = "CART HAS BEEN UPDATED";
								$_SESSION['messagetype'] = "alert alert-success";
								header("location: cart");
							}
							//$para = array('quantity'=>$qty[$i]);
							//$hire_category = table_update_record("cart","client_id",$client_id,$qty[$i],__FILE__,__LINE__);
						}
					}
					elseif (isset($_POST['bookProduct'])) {
					 	$name = isset($_POST['name']) ? $_POST['name']: '';
					 	$email = isset($_POST['email']) ? $_POST['email']: '';
					 	$mobile_num = isset($_POST['mobile_num']) ? $_POST['mobile_num']: '';

					 	$order_id = order_id();
					 	$values = array('name'=>$name, 'order_num'=>$order_id, 'email'=>$email, 'mobile_num'=>$mobile_num);
					 	$add_book = table_add_record("orders",$values,__FILE__,__LINE__,"insert");
					 	if($add_book != ""){
					 		$_SESSION['message'] = "Error occured";
					 		$_SESSION['messagetype'] = "alert alert-success";
					 		header("location: cart");
					 	}
					 	else{
					 		for($i=0; $i<$count; $i++){
					 		$sql = "UPDATE cart set client_id='$order_id' where cart_id='$nanle[$i]' and client_id='$client_id'";
							$hire_category = $connection->query($sql);
					 		}
					 		$_SESSION['message'] = "Sucessfully done booking";
					 		$_SESSION['messagetype'] = "alert alert-success";
					 		setcookie("client_id",$client_id,time()-0);
					 		header("location: index");
					 		
					 	}

					 } 
				?>
				
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #shopcart end -->
	
	<!-- Footer #1
============================================= -->
	<footer id="footer" class="footer footer-1">
		<!-- Footer Info
	============================================= -->
	<?php include_once("tpl/footer.php"); ?>
	</footer>
</div>
<!-- #wrapper end -->

<!-- Footer Scripts
============================================= -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/functions.js"></script>
<script src="js/app.js"></script>
</body>

<!-- Mirrored from www.autoshop.zytheme.com/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:12 GMT -->
</html>
