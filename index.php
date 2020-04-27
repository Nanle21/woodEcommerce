<?php
	session_start();
	$pagetitle = "Home";
	include_once("db/config.php");
	include_once("db/functions.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
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
	
	<!-- Hero #1
============================================= -->
	<section id="hero" class="hero">
		<div id="hero-slider" class="hero-slider ">
			<!-- Slide #1 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="assets/images/sliders/welcome_banner.jpg" alt="Background" class="img-responsive" />
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-icon" align="center">
									<img src="assets/images/logo/Tree.png">
								</div>
								<div class="slide-heading"></div>
								<div class="slide-title">
									<h2> BUILD AND DESIGN BETTER WITH <span class="color-theme">DANDY</span></h2>
								</div>
								<div class="slide-desc">
									Thank you for your interest in Dandy Ndife Nigeria Limited. We are a plywood company located 53 old yidi road, ita-amodu, ilorin, kwara state.
								</div>
								<div class="slide-action">
									<a href="shop.php" class="btn btn-primary">CHECK IT NOW</a>
									<a href="shop.php" class="btn btn-primary btn-white">PURCHASE NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
			<!-- Slide #2 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="assets/images/sliders/welcome_banner2.jpg" alt="Background" class="img-responsive"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-title">
									<h2>OUR <span class="color-theme">VISION</span></h2>
								</div>
								<div class="slide-desc">
									To be a world-renowned brand supplying all imaginable plywood sheets and resources with a sizeable & loyal customer base.
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
			<!-- Slide #3 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="assets/images/sliders/welcome_banner3.jpg" alt="Background" class="img-responsive"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-title">
									<h2>OUR <span class="color-theme">GOALS</span></h2>
								</div>
								<div class="slide-desc">
									With our great accomplishments, we are able to supply products that are affordable, sustainable, easy to install, and of course, beautiful. 
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .container end -->
			</div>

			
			<!-- .slide end -->
			
		</div>
		<!-- #hero-slider end -->
	</section>
	<!-- #hero -->
	
	<!-- Featured Items
============================================= -->
	<section id="featuredItems" class="shop">
		<div class="container">
			<div class="row product-boxes">
				<!-- Product Box #1 -->
				<?php
					$stmt = $connection->query("SELECT * FROM categories where status='Active' order by _id desc limit 0,4");
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						?>
				<div class="col-xs-12 col-sm-3 col-md-3 product-box">
					<a href="shop.php">
					<div class="product-img">
						<img  src="Admin/images/<?php echo $row['_id'] ?>.jpg" alt="category"/>
						<div class="product-hover">
							<div class="product-link">
								<h4 style="color: white;"><?php echo $row['category_name']; ?></h4>
								<?php //<p>Best wood</p> ?>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					</a>
				</div>
				<?php 
			}
			?>
				<!-- .product-box end -->
				
				<!-- Product Box #2 -->
								
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">we get</p>
					<h2>New Items</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row product-carousel text-center">
				<!-- Product #1 -->
				<?php
					$stmt = $connection->query("SELECT * FROM products order by product_id desc limit 0,4");
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						?>
				<div class="product">
					<div class="product-img">
						<img  src="Admin/images/<?php echo $row['product_id']; ?>.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-action">
								<a class="btn btn-primary" href='javascript:;' onclick="addtocart('<?php echo $row['product_id'] ?>','add')">Add to cart</p>
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
								<a href="product_detail.php?p_id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
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
				
				
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #featuredItems end -->
	
	
	
	<!-- Footer #2
============================================= -->
	<footer id="footer" class="footer footer-2">
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
</html>