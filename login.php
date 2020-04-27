<?php
	$pagetitle = "Login";
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
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
							<div class="col-md-6">
						<h3>Already Registered?</h3>
							<form action="processes/login_process.php" method="post">
								<div class="form-group">
									<label>Email:</label>
									<input type="text" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label>Password:</label>
									<input type="text" name="password" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Login</button>
								</div>
							</form>
						</div>
						<div class="col-md-6">
							<h3>Create an account</h3>
							<form action="processes/register_process.php" method="post">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="first_name" class="form-control">
								</div>
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="last_name" class="form-control">
								</div>
								<div class="form-group">
									<label>Email address</label>
									<input type="text" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" name="phone_number" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="text" name="passwordnew" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- #hero -->
	
	<!-- Featured Items
============================================= -->

	<!-- #featuredItems end -->
	
	
	
	<!-- Footer #2
============================================= -->
	<footer id="footer" class="footer footer-2">
		<!-- Footer Info
		-->
		<?php include_once("tpl/footer.php"); ?>
	</footer>
</div>
<!-- #wrapper end -->

<!-- Footer Scripts
============================================= -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/functions.js"></script>
</body>
</html>