<?php
	$pagetitle = "Category";
	include_once("db/config.php");
	include_once("db/functions.php");
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from www.autoshop.zytheme.com/shop-category-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:06 GMT -->
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

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<!-- Document Title
    ============================================= -->
<title>Autoshop | E-commerce Html5 Template</title>
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
					<h1>shop grid right sidebar</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.html">Home</a>
						</li>
						<li class="active">grid</li>
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
								<li>
									<a href="#"><i class="fa fa-angle-double-right"></i>opel<span>(5)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-angle-double-right"></i>Subaru<span>(77)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-angle-double-right"></i>BMW<span>(6)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-angle-double-right"></i>Toyota<span>(11)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-angle-double-right"></i>Audi<span>(54)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-angle-double-right"></i>Chevrolet<span>(22)</span></a>
								</li>
							</ul>
						</div>
					</div>
					<!-- .widget-categories end -->
					
					<!-- Recent Products
============================================= -->
					<div class="widget widget-recent-products">
						<div class="widget-title">
							<h5>Recent Items</h5>
						</div>
						<div class="widget-content">
							<!-- Product #1 -->
							<div class="product">
								<img src="../internet.lmu.edu.ng/loginbe0f.html" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
										<a href="#">Front LIGHTING</a>
									</div>
									<div class="product-meta">
										<span class="color-theme">$13.99</span>
									</div>
								</div>
							</div>
							<!-- .recent-product end -->
							
							<!-- Product #2 -->
							<div class="product">
								<img src="../internet.lmu.edu.ng/login6855.html" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
										<a href="#">Thermal Fan</a>
									</div>
									<div class="product-meta">
										<span class="color-theme">$15.99</span>
									</div>
								</div>
							</div>
							<!-- .recent-product end -->
							
							<!-- Product #3 -->
							<div class="product">
								<img src="../internet.lmu.edu.ng/logindec2.html" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
										<a href="#">Cold Air System</a>
									</div>
									<div class="product-meta">
										<span class="color-theme">$11.99</span>
									</div>
								</div>
							</div>
							<!-- .recent-product end -->
						</div>
						<!-- .widget-content end -->
					</div>
					<!-- .widget-recent-product end -->
					
					<!-- Filter
============================================= -->
					<div class="widget widget-filter">
						<div class="widget-title">
							<h5>Filter By Price</h5>
						</div>
						<div class="widget-content">
							<div id="slider-range"></div>
							<p>
								<label for="amount">Price: </label>
								<input type="text" id="amount" readonly>
							</p>
							<a class="btn btn-secondary" href="#">filter</a>
						</div>
					</div>
					<!-- .widget-filter end -->
					
					<!-- Select Brand
============================================= -->
					<div class="widget widget-brands">
						<div class="widget-title">
							<h5>Brands</h5>
						</div>
						<div class="widget-content">
							<form>
								<!-- Check #1 -->
								<div class="check-option">
									<input type="checkbox" class="checkbox-style" name="brands"   id="Opel" value="Opel">
									<label for="Opel" class="checkbox-label" >Opel <span>(5)</span></label>
								</div>
								<!-- Check #2 -->
								<div class="check-option">
									<input type="checkbox" class="checkbox-style" name="brands"  id="Subaru" value="Subaru">
									<label for="Subaru" class="checkbox-label" >Subaru <span>(77)</span></label>
								</div>
								<!-- Check #3 -->
								<div class="check-option">
									<input type="checkbox" class="checkbox-style" name="brands" id="BMW" value="BMW">
									<label for="BMW" class="checkbox-label" >BMW <span>(16)</span></label>
								</div>
								<!-- Check #4 -->
								<div class="check-option">
									<input type="checkbox" class="checkbox-style" name="brands"   id="Toyota" value="Toyota">
									<label for="Toyota" class="checkbox-label" >Toyota <span>(11)</span></label>
								</div>
								<!-- Check #5 -->
								<div class="check-option">
									<input type="checkbox" class="checkbox-style" name="brands"   id="Audi" value="Audi">
									<label for="Audi" class="checkbox-label" >Audi <span>(54)</span></label>
								</div>
								<!-- Check #6 -->
								<div class="check-option">
									<input type="checkbox" class="checkbox-style" name="brands"   id="Chevrolet" value="Chevrolet">
									<label for="Chevrolet" class="checkbox-label" >Chevrolet <span>(22)</span></label>
								</div>
							</form>
						</div>
					</div>
					<!-- .widget-brand end -->
					
					<!-- Recent Products
============================================= -->
					<div class="widget widget-recent-products">
						<div class="widget-title">
							<h5>Best Sellers</h5>
						</div>
						<div class="widget-content">
							<!-- Product #1 -->
							<div class="product">
								<img src="../internet.lmu.edu.ng/login0180.html" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
										<a href="#">Front LIGHTING</a>
									</div>
									<div class="product-meta">
										<span class="color-theme">$13.99</span>
									</div>
								</div>
							</div>
							<!-- .recent-product end -->
							
							<!-- Product #2 -->
							<div class="product">
								<img src="../internet.lmu.edu.ng/login1836.html" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
										<a href="#">Thermal Fan</a>
									</div>
									<div class="product-meta">
										<span class="color-theme">$15.99</span>
									</div>
								</div>
							</div>
							<!-- .recent-product end -->
							
							<!-- Product #3 -->
							<div class="product">
								<img src="../internet.lmu.edu.ng/login1836.html" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
										<a href="#">Cold Air System</a>
									</div>
									<div class="product-meta">
										<span class="color-theme">$11.99</span>
									</div>
								</div>
							</div>
							<!-- .recent-product end -->
						</div>
						<!-- .widget-content end -->
					</div>
					<!-- .widget-recent-product end -->
					
					<!-- Tag Clouds
============================================= -->
					<div class="widget widget-tags">
						<div class="widget-title">
							<h5>tag clouds</h5>
						</div>
						<div class="widget-content">
							<a href="#">responsive</a>
							<a href="#">modern</a>
							<a href="#">corporate</a>
							<a href="#">business</a>
							<a href="#">fresh</a>
							<a href="#">awesome</a>
							<a href="#">business</a>
							<a href="#">fresh</a>
							<a href="#">corporate</a>
							<a href="#">autoshop</a>
						</div>
					</div>
					<!-- .widget-tags end -->
				</div>
				<!-- .col-md-3 end -->
				<div class="col-xs-12 col-sm-12 col-md-9">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="product-num pull-left pull-none-xs">
								<h3>Showing 1 : 16 of <span class="color-theme">245</span> product</h3>
							</div>
							<!-- .product-num end -->
							<div class="product-options pull-right text-right pull-none-xs">
								<i class="fa fa-angle-down"></i>
								<select>
									<option selected="" value="Default">Default Sorting</option>
									<option value="Larger">Newest Items</option>
									<option value="Larger">oldest Items</option>
									<option value="Larger">Hot Items</option>
									<option value="Small">Highest Price</option>
									<option value="Medium">Lowest Price</option>
								</select>
							</div>
							<!-- .product-options end -->
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
					<div class="row">
						<!-- Product #1 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login5ccf.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Opel</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Brake Discs</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>68.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #2 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login03ae.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Subaru</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">OIL FILTER</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>40.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #3 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login0219.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Opel</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Belt Car Engine</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>180.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #4 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login02fa.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Bmw</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Front LIGHTING</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>28.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #5 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login5431.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Audi</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Thermal Fan</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>240.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #6 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login15f5.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Toyota</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Cold Air System</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>68.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #7 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login5ccf.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Opel</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Brake Discs</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>68.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #8 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login03ae.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Subaru</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">OIL FILTER</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>40.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #9 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login0219.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Opel</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Belt Car Engine</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>180.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #10 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login02fa.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Bmw</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Front LIGHTING</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>28.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #11 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login5431.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Audi</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Thermal Fan</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>240.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
						<!-- .product end -->
						
						<!-- Product #12 -->
						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="../internet.lmu.edu.ng/login15f5.html" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="#">Add To Cart</a>
										<a class="btn btn-primary" href="#">Item Details</a>
									</div>
								</div>
								<!-- .product-overlay end -->
							</div>
							<!-- .product-img end -->
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="#">Toyota</a>
								</div>
								<!-- .product-cat end -->
								<div class="prodcut-title">
									<h3>
										<a href="#">Cold Air System</a>
									</h3>
								</div>
								<!-- .product-title end -->
								<div class="product-price">
									<span class="symbole">$</span><span>68.00</span>
								</div>
								<!-- .product-price end -->
								
							</div>
							<!-- .product-bio end -->
						</div>
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
	<!-- #shopgrid end -->
	
	<!-- Footer #1
============================================= -->
	<footer id="footer" class="footer footer-1">
		<!-- Footer Info
	============================================= -->
		<div class="footer-info">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="panel-info">
							<div class="info-icon">
								<i class="icon icon-Truck"></i>
							</div>
							<div class="info-content">
								<h4>Free Shipping</h4>
								<p>Lorem ipsum dolor siamet, adipiscing condimen tristique vel.</p>
							</div>
						</div>
					</div>
					<!-- .col-md-3 end -->
					
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="panel-info">
							<div class="info-icon">
								<i class="icon icon-Dollars"></i>
							</div>
							<div class="info-content">
								<h4>Fair Prices</h4>
								<p>Lorem ipsum dolor siamet, adipiscing condimen tristique vel.</p>
							</div>
						</div>
					</div>
					<!-- .col-md-3 end -->
					
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="panel-info">
							<div class="info-icon">
								<i class="icon icon-Shield"></i>
							</div>
							<div class="info-content">
								<h4>Secure Shopping</h4>
								<p>Lorem ipsum dolor siamet, adipiscing condimen tristique vel.</p>
							</div>
						</div>
					</div>
					<!-- .col-md-3 end -->
					
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="panel-info">
							<div class="info-icon">
								<i class="icon icon-Headset"></i>
							</div>
							<div class="info-content">
								<h4>Customer Support</h4>
								<p>Lorem ipsum dolor siamet, adipiscing condimen tristique vel.</p>
							</div>
						</div>
					</div>
					<!-- .col-md-3 end -->
				</div>
			</div>
			<!-- .container end -->
		</div>
		<!-- .footer-info end -->
		
		<!-- Footer Widget
	============================================= -->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 footer-widget-about">
						<div class="footer-widget-title">
							<h5>About Us</h5>
						</div>
						<div class="footer-widget-content">
							<p>Lorem ipsum dolor sit amet, adipiscing condimentum tristique vel, eleifend sed turpis. Amet, consectetur adipising elit Integer.</p>
							<div class="footer-social">
								<a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
								<a class="share-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
								<a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
								<a class="share-pinterest" href="#"><i class="fa fa-pinterest"></i></a>
								<a class="share-vimeo" href="#"><i class="fa fa-vimeo"></i></a>
								<a class="share-rss" href="#"><i class="fa fa-rss"></i></a>
							</div>
						</div>
					</div>
					<!-- .col-md-4 end -->
					
					<div class="col-xs-12 col-sm-6 col-md-2 footer-widget-link">
						<div class="footer-widget-title">
							<h5>My Account</h5>
						</div>
						<div class="footer-widget-content">
							<ul class="list-unstyled">
								<li>
									<a href="#">My Account</a>
								</li>
								<li>
									<a href="#">Order History</a>
								</li>
								<li>
									<a href="#">Wish List</a>
								</li>
								<li>
									<a href="#">Newsletter</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- .col-md-2 end -->
					
					<div class="col-xs-12 col-sm-6 col-md-2 footer-widget-link">
						<div class="footer-widget-title">
							<h5>Information</h5>
						</div>
						<div class="footer-widget-content">
							<ul class="list-unstyled">
								<li>
									<a href="#">About Us</a>
								</li>
								<li>
									<a href="#">Delivery Information</a>
								</li>
								<li>
									<a href="#">Privacy Policy</a>
								</li>
								<li>
									<a href="#">Terms & Conditions</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- .col-md-2 end -->
					
					<div class="col-xs-12 col-sm-6 col-md-2 footer-widget-link">
						<div class="footer-widget-title">
							<h5>Customer Service</h5>
						</div>
						<div class="footer-widget-content">
							<ul class="list-unstyled">
								<li>
									<a href="#">Contact Us</a>
								</li>
								<li>
									<a href="#">Returns</a>
								</li>
								<li>
									<a href="#">Site Map</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- .col-md-2 end -->
					
					<div class="col-xs-12 col-sm-6 col-md-2 footer-widget-link">
						<div class="footer-widget-title">
							<h5>Extras</h5>
						</div>
						<div class="footer-widget-content">
							<ul class="list-unstyled">
								<li>
									<a href="#">Brands</a>
								</li>
								<li>
									<a href="#">Gift Vouchers</a>
								</li>
								<li>
									<a href="#">Affiliates</a>
								</li>
								<li>
									<a href="#">Specials</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- .col-md-2 end -->
				</div>
			</div>
			<!-- .container end -->
		</div>
		<!-- .footer-widget end -->
		
		<!-- Footer Bar
	============================================= -->
		<div class="footer-bar">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="powered">
							<p>Car Shop &copy; All Rights Reserved. With Made With Love By
								<a href="http://themeforest.net/user/7oroof/portfolio?ref=7oroof">7oroof.com</a>
							</p>
							<ul class="list-inline mb-0">
								<li>
									<a href="#">Privacy Policy</a>
								</li>
								<li>
									<a href="#">Terms of Use</a>
								</li>
								<li>
									<a href="#">Stores</a>
								</li>
								<li>
									<a href="#">About Us</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="payment-methods text-right">
							<ul class="list-inline mb-0">
								<li><img src="assets/images/footer/visa.png" alt="payment"></li>
								<li><img src="assets/images/footer/mastercard.png" alt="payment"></li>
								<li><img src="assets/images/footer/american-express.png" alt="payment"></li>
								<li><img src="assets/images/footer/delta.png" alt="payment"></li>
								<li><img src="assets/images/footer/cirrus.png" alt="payment"></li>
								<li><img src="assets/images/footer/paypal.png" alt="payment"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- .container end -->
		</div>
		<!-- .footer-copyright end -->
	</footer>
</div>
<!-- #wrapper end -->

<!-- Footer Scripts
============================================= -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="../internet.lmu.edu.ng/login932e.html"></script>
<script src="../internet.lmu.edu.ng/login65a4.html"></script>
</body>

<!-- Mirrored from www.autoshop.zytheme.com/shop-category-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 11:24:06 GMT -->
</html>