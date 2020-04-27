<?php
	session_start();
	include_once("db/config.php");
	include_once("db/functions.php");
	$pagetitle = "Product Detail";

	$p_id = isset($_GET['p_id']) ? $_GET['p_id']: ''; 

	$productDetails = table_open("products","product_id='$p_id'","","",__FILE__,__LINE__);
	if($productDetails['error']!=""){
		header("location: index.php");
	}
	else{
		$product_name = $productDetails[0]['product_name'];
		$product_category = $productDetails[0]['product_category'];
		$product_description = $productDetails[0]['product_description'];
		$product_quantity = $productDetails[0]['product_quantity'];
		$product_fixPrice = $productDetails[0]['product_fixPrice'];
		$product_addedPrice = $productDetails[0]['product_addedPrice'];
		$woodtype = $productDetails[0]['woodtype'];
	}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from www.autoshop.zytheme.com/shop-single-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:07 GMT -->
<head>
<!-- Document Meta
    ============================================= -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--IE Compatibility Meta-->
<meta name="author" content="zytheme" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="construction html5 template">
<link href="assets/images/favicon/favicon.ico" rel="icon">

<!-- Fonts
    ============================================= -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CRaleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CUbuntu:300,300i,400,400i,500,500i,700,700i' rel='stylesheet' type='text/css'>

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
					<h1><?php echo $product_name; ?> Product Detail</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.html">Home</a>
						</li>
						<li class="active">shop</li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #page-title end -->
	
	<!-- Shop Single right sidebar
============================================= -->
	<section id="shopgrid" class="shop shop-single">
		<div class="container shop-content">
			
			<!-- .row end -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5">
					<div class="prodcut-images">
						<div class="product-img-slider">
							<img src="Admin/images/<?php echo $p_id; ?>.jpg" alt="product image">
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-7">
					<div class="product-title text-center-xs">
						<h3><?php echo $product_name; ?></h3>
					</div>
					<!-- .product-title end -->
					<div class="product-meta mb-30">
						<div class="product-price pull-left pull-none-xs">
							<p><span class="discount"><span>&#8358;</span><?php echo number_format($product_addedPrice); ?></span><span>&#8358;</span><?php echo number_format($product_fixPrice); ?></p>
						</div>
						<!-- .product-price end -->
						<div class="product-review text-right text-center-xs">
							<span class="product-rating">
							
							</span>
						</div>
						<!--- .product-review end -->
					</div>
					<!-- .product-img end -->
					
					<div class="product-desc text-center-xs">
						<p class="mb-0"><?php echo $product_description; ?></p>
					</div>
					<!-- .product-desc end -->
					
					<hr class="mt-30 mb-30">
					<div class="product-details text-center-xs">
						<h5>Other Details :</h5>
						<ul class="list-unstyled">
							<li>Product : <span>Air System</span></li>
							<li>Availabiltity : <span>Available</span></li>
							<li>Qty: <span><?php echo $product_quantity; ?></span></li>
							<li>Wood Type : <span><?php echo $woodtype; ?></span></li>
						</ul>
					</div>
					<!-- .product-details end -->
					<hr class="mt-30 mb-30">
					<div class="product-action">
						<div class="product-quantity pull-left pull-none-xs">
							<span class="qua">Quantity:</span>
							<span>
							
							<input type="number" value="2" id="qtynanle" style="width: 50px;">
							
							</span>
						</div>
						<div class="product-cta text-right text-center-xs">
							<a class="btn btn-primary" href="javascript:;" onclick="addtocartwithqty('<?php echo $p_id ?>','add')">add to cart</a>
						</div>
					</div>
					<!-- .product-action end -->
					<hr class="mt-30 mb-30">
					<!--<div class="product-share  text-center-xs">
						<h5 class="share-title">share product: </h5>
						<a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
						<a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
						<a class="share-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
						<a class="share-pinterest" href="#"><i class="fa fa-pinterest"></i></a>
						<a class="share-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
					</div> -->
					<!-- .product-share end -->
				</div>
			</div>
			<!-- .row end -->
	
			<!-- .row end -->
			<!-- Pager -->
			
			<!-- .row end -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="widget-related-product">
						<div class="widget-title">
							<h4>Related Products</h4>
						</div>
						<div class="widget-content">
							<div class="row">
								<!-- Product #1 -->
								<?php
									$stmt = $connection->query("SELECT * FROM products order by product_id desc limit 0,8");
										while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
										?> 
										<div class="col-xs-12 col-sm-6 col-md-3 product">
									<div class="product-img">
										<img  src="Admin/images/<?php echo $row['product_id']; ?>.jpg" alt="Product"/>
										<div class="product-hover">
											<div class="product-action">
												<a class="btn btn-primary" href="javascript:;" onclick="addtocart('<?php echo $row['product_id'] ?>','add')">Add To Cart</a>
												<a class="btn btn-primary" href="product_detail.php?p_id=<?php echo $row['product_id']; ?>">Item Details</a>
											</div>
										</div>
										<!-- .product-overlay end -->
									</div>
									<!-- .product-img end -->
									<div class="product-bio">
										<div class="prodcut-cat">
											<a href="#"><?php echo $row['woodtype']; ?></a>
										</div>
										<!-- .product-cat end -->
										<div class="prodcut-title">
											<h3>
												<a href="#"><?php echo $row['product_name']; ?></a>
											</h3>
										</div>
										<!-- .product-title end -->
										<div class="product-price">
											<span class="symbole"><span>&#8358;</span></span><span><?php echo number_format($row['product_fixPrice']); ?></span>
										</div>
										<!-- .product-price end -->
										
									</div>
									<!-- .product-bio end -->
								</div>
									<?php 
								}
											 ?>
								
								<!-- .product end -->
								
								<!-- Product #2 -->
								
								<!-- .product end -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .product-related end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #blog end -->
	
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

<!-- Mirrored from www.autoshop.zytheme.com/shop-single-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:11 GMT -->
</html>