<?php
	$pagetitle = "TERMS AND CONDTITIONS";
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
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>TERMS AND CONDTITIONS</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">TERMS AND CONDTITIONS</li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>

	<section id="featured1" class="featured featured-1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="heading">
						<p class="subheading">TERMS AND CONDTITIONS</p>
						
					</div>
					<!-- .heading end -->
					<div class="about-accordion">
						<ul>
							<li style="padding:16px">
								•	All booked products are expected be collected from shop at most 3 days from the day of booking with “Booking ID” presented.
							</li>

							<li style="padding:16px">
								•	All booked products will be registered as sold only when specified products have been fully paid for in shop using the correct “Booking ID”.
							</li>

							<li style="padding:16px">
								•	Any booked products that exceeds three (3) working days from the day of booking without payment and collection may be sold out.
							</li>

							<li style="padding:16px">
								•	Payment for booked products must be made in full before products can be collected from shop.
							</li>
						</ul>

											
					</div>
					<!-- .about-accordion end -->
				</div>
				<!-- .col-md-6 end -->
				
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	
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