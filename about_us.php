<?php
	$pagetitle = "About Us";
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
<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>about</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.html">Home</a>
						</li>
						<li class="active">about</li>
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
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="heading">
						<p class="subheading">History</p>
						<h2>The Company</h2>
					</div>
					<!-- .heading end -->
					<div class="about-accordion">
						<div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="true">
							
							<!-- Panel 01 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-1" aria-expanded="true" aria-controls="collapse02-1">About COMPANY</a>
										<span class="icon"></span>
									</h4>
								</div>
								<div id="collapse02-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
									<div class="panel-body">
										<div class="pull-left pr-30">
											<img src="assets/images/logo/New logo.png" alt="Woodshop" width="140px" height="60px" >
										</div>
										<br>
										<div> <p style="text-align: justify;">
											What began in 1972 as a small plywood supply business in the heart of Kwara State Nigeria, Dandy Ndife Nigeria limited has grown into one of central leading plywood suppling company to many parts of the country. Our company now occupies a firm site serving the major cities in West and East of Nigeria, and though it’s been a long journey from our first small shop to our current status, one thing has remained the same: our commitment to quality
										</p> </div>
									</div>
								</div>
							</div>
							
							<!-- Panel 02 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-2" aria-expanded="false" aria-controls="collapse02-2"> Our Mission </a>
									</h4>
								</div>
								<div id="collapse02-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
									<div class="panel-body"> <p style="text-align: justify;">
										The creativity and excitement of plywood supply has always been the driving force behind what we do, and our shop features all the standard categories of plywood. Everything we sell is manufactured from the highest quality wood from different parts of the world and all of our products can be custom designed to suit a project.  
									</p></div>
								</div>
							</div>
							
							<!-- Panel 03 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-3" aria-expanded="false" aria-controls="collapse02-3">Our VISION</a>
									</h4>
								</div>
								<div id="collapse02-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
									<div class="panel-body"><p style="text-align: justify;">
										 To be a world-renowned brand supplying all imaginable plywood sheets and resources with a sizeable & loyal customer base.
									</p> </div>
								</div>
							</div>
							
							<!-- Panel 04 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-4" aria-expanded="false" aria-controls="collapse02-4"> Our Goals </a>
									</h4>
								</div>
								<div id="collapse02-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
									<div class="panel-body" style="text-align: justify;"> With our great accomplishments, we are able to supply products that are affordable, sustainable, easy to install, and of course, beautiful. </div>
								</div>
							</div>
						</div>
						<!-- .accordion end -->
					</div>
					<!-- .about-accordion end -->
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="heading">
						<p class="subheading">We Are Good</p>
						<h2>Our Features</h2>
					</div>
					<!-- .heading end -->
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel">
								<div class="feature-icon">
									<i class="icon icon-Time"></i>
								</div>
								<h4 class="text-uppercase">Always Available</h4>
								<p><?php echo "always available"; ?></p>
							</div>
						</div>
						<!-- .col-md-6 end -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel">
								<div class="feature-icon">
									<i class="icon icon-Shield"></i>
								</div>
								<h4 class="text-uppercase">Qualified Agents</h4>
								<p><?php echo "qualified agents"; ?></p>
							</div>
						</div>
						<!-- .col-md-6 end -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel mb-0">
								<div class="feature-icon">
									<i class="icon icon-Wallet"></i>
								</div>
								<h4 class="text-uppercase">Fair Prices</h4>
								<p>you can be 100% sure that it will be delivered right on time, within the set budget limits</p>
							</div>
						</div>
						<!-- .col-md-6 end -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel mb-0">
								<div class="feature-icon">
									<i class="icon icon-Star"></i>
								</div>
								<h4 class="text-uppercase">Best Offers</h4>
								<p><?php echo "best offers will be given"; ?></p>
							</div>
						</div>
					</div>
				</div>
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