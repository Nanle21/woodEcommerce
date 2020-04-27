<?php
	$pagetitle = "Shop"; 
	include_once("db/config.php");
	include_once("db/functions.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from www.autoshop.zytheme.com/shop-product-grid-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:06 GMT -->
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
	
	<!-- Page Title
============================================= -->
	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>Dandy Shop</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
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
	
	<!-- Shop product grid right sidebar
============================================= -->
	<section id="shopgrid" class="shop shop-grid">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
					<!-- Categories
============================================= -->
					<div class="widget widget-categories">
						<div class="widget-title">
							<h5>categories</h5>
						</div>
						<div class="widget-content">
							<ul class="list-unstyled">
								<?php
										$stmt = $connection->query("SELECT * FROM categories where status='Active'");
										while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
											?>
							<li><a href="javascript:;" onclick="view_show('<?php echo $row['category_name']; ?>')"><i class="fa fa-angle-double-right"></i><?php echo $row['category_name']; ?></a></li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<!-- .widget-categories end -->
					
					<!-- Recent Products
============================================= -->
					
					<!-- .widget-tags end -->
				</div>
				<!-- .col-md-3 end -->
				<div class="col-xs-12 col-sm-12 col-md-9">
					<div class="row">
						<div class="col-xs-12  col-sm-12  col-md-12">
							<div class="shop-options">
								<div class="product-options2 pull-left pull-none-xs">
									<ul class="list-inline">
										<li>
											<div class="product-sort mb-15-xs">
												<span>sort by:</span>
												<i class="fa fa-angle-down"></i>
												<select>
													<option selected="" value="Default">Product Name</option>
												</select>
											</div>
										</li>
										<li>
											<div class="product-sort mb-15-xs">
												<span>Show:</span>
												<i class="fa fa-angle-down"></i>
												<select>
													<option value="18" <?php if($limit == 18){echo "SELECTED";} ?>>Show 18</option>
						                            <option value="20" <?php if($limit == 20){echo "SELECTED";} ?>>Show 20</option>
						                            <option value="50" <?php if($limit == 50){echo "SELECTED";} ?>>Show 50</option>
						                            <option value="100" <?php if($limit == 100){echo "SELECTED";} ?>>Show 100</option>
												</select>
											</div>
										</li>
									</ul>
								</div>
								<!-- .product-options end -->
							
								<!-- .product-num end -->
							</div>
							<!-- .shop-options end -->
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
					<div class="row">
						<!-- Product #1 -->
						
						<div id="shop_view"></div>
						<!-- .product end -->
												<!-- .product end -->		
					</div>
					<!-- .row end -->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<ul class="pagination">
								<li class="active">
									<a href="#">1</a>
								</li>
								<li>
									<a href="#">2</a>
								</li>
								<li>
									<a href="#">3</a>
								</li>
								<li>
									<a href="#" aria-label="Next">
									<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
									</a>
								</li>
							</ul>
						</div>
						<!-- .col-md-12 end -->
					</div>
				</div>
				<!-- .col-md-9 end -->
			</div>
			<!-- .row end -->
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

<!-- Mirrored from www.autoshop.zytheme.com/shop-product-grid-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:06 GMT -->
</html>