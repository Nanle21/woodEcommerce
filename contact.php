<?php
	$pagetitle = "Contact";
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
	
	<!-- Hero #1
============================================= -->
<section class="google-maps pb-0">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div id="googleMap" style="width:100%;height:447px;">
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="contact">
		<div class="container">
			<div class="row">
				<div id="loader" align="center">
								<img src="assets/ajax-loader.gif"  >
							</div>
				<div class="col-xs-12 col-sm-12 col-md-8 widget-contact pl-0 pr-0 p-none-xs p-none-sm" id="contact_form">
					<form id="contact-form" action="processes/contact_process.php" method="post">
						<div class="col-md-6">
							<input type="text" class="form-control mb-30"  id="name" placeholder="Name :" required/>
						</div>
						<div class="col-md-6">
							<input type="email" class="form-control mb-30"  id="email" placeholder="Email :" required/>
						</div>
						<div class="col-md-12">
							<input type="text" class="form-control mb-30"  id="mobile_num" placeholder="Mobile :" required/>
						</div>
						<div class="col-md-12">
							<textarea class="form-control mb-30" id="message" rows="4" placeholder="Message" required></textarea>
						</div>
						<div class="col-md-12">
							<button class="btn btn-primary btn-block">SEND MESSAGE</button>
							
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
							<!--Alert Message-->
							<div id="contact-result">
							</div>
						</div>
					</form>
				</div>
				<!-- .col-md-8 end -->
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="contct-widget-content">
						<p class="mb-0">We really do want to hear from you. Please do fill the form to state your requests.</p>
						<div class="widget-contact-info mt-md">
							<div class="col-xs-12 col-sm-12 col-md-6 pl-0 mb-30-xs mb-30-sm">
								<h6>Phone :</h6>
								<p><i class="fa fa-phone"></i>+234 8062352450</p>
								<p class="mb-0"><i class="fa fa-fax"></i>+ 234 8090622077</p>
							</div>
							<!-- .col-md-6 end -->
							<div class="col-xs-12 col-sm-12 col-md-6">
								<h6>Email :</h6>
								<p class="mb-0"><i class="fa fa-envelope"></i>dandyndifelimited@yahoo.com</p>
							</div>
							<!-- .col-md-6 end -->
							<div class="col-xs-12 col-sm-12 col-md-12 pl-0 mt-30 mb-30-xs mb-30-sm">
								<h6>Address :</h6>
								<p class="mb-0"><i class="fa fa-map-marker"></i>2 53 old yidi road, ita-amodu, ilorin, kwara state.</p>
							</div>
							<!-- .col-md-12 end -->
						</div>
					</div>
				</div>
				<!-- .col-md-4 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>

	
	<!-- #hero -->
	
	<!-- Featured Items
============================================= -->

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
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.gmap.min.js"></script>
<script type="text/javascript">
	$('#googleMap').gMap({
		address: "Old Yidi Road , Ilorin, Kwara State",
		zoom: 15,
		markers:[
			{
				address: "Old Yidi Road, Kwara State",
				maptype:'ROADMAP',
			}
		]
	});
</script>
</body>
</html>