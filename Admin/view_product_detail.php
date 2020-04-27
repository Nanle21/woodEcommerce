<?php
  ob_start();
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
  $pagetitle ="View Product Details";

  session_start();

  if(!isset($_SESSION["current_user"])){
    header("location: login.php");
    exit();
  }
  
?>

<?php
	
	$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "";
	if($product_id == ""){
		$_SESSION["message"] = "Invalid Product Selected";
		$_SESSION["messagetype"] = "alert alert-danger";
		header("location: view_product.php");
		exit();
	}
	$productsDetail = table_open("products","product_id='$product_id'","","",__FILE___,__LINE__);
	if($productsDetail['error']!="")
	{
		$_SESSION["message"] = "Error encourtered accessing Product";
		$_SESSION["messagetype"] = "alert alert-danger";
		header("location: view_product.php");
		exit();
	} 
	$product_category=$productsDetail[0]['product_category'];
	$productName = $productsDetail[0]['product_name'];
	$description = $productsDetail[0]['product_description'];
	$mainPrice = number_format($productsDetail[0]['product_fixPrice']);
	$slashPrice = number_format($productsDetail[0]['slashPrice']);
	$discountAvailable = $productsDetail[0]['discountAvailable'];


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo $pagetitle; ?> ?> - Dandywoods</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link rel="stylesheet" type="text/css" href="assets/css/nanlestyles.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="../assets/images/logo.png">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Dandywood Admin</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Logout</a></li>
            	</ul>
            </div>
        </header>

      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?php include_once("tpl/header.php") ?>

      
      <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                  <div class="col-md-7 col-md-offset-2">
                      <div class="content-panel productDetails">
                          
                          <p align="center"><a href="view_product.php">Back To View Products</a></p>
                          <br>
                          <h4 align="center">Products Details for <?php echo $productName; ?></h4>
                         <br>

                          		<div class="row">
                          	<div class="col-md-6">
								<div align="center">
									<div class="">
										<div class="">
										<div class="">
										<div class="photo">
										<img  class="img-responsive" alt="" id="" src="images/<?php echo $product_id ?>.jpg" >
										</div>

										</div>
									</div>
								</div>
                          	</div>
                          	
                          </div>

                          			<div class="col-md-6">
                          		<div class="products">
                          			<p><b>Product Name: </b> <?php echo $productName; ?></p>
                                <br>
                          			<p><b>Product Category: </b> <?php echo $product_category; ?></p>
                                <br>
                          			<p><b>Product Main Price: </b> <span>&#8358;</span> <?php echo $mainPrice; ?></p>
                          		<!--	<p><b>Product Per Amount: </b> 20KG</p> -->
                          		<!--	<p><b>Product Discount: </b> <?php echo $discountAvailable; ?></p> -->
                                  <p><strong>Product Details:</strong></p>
                          		<p> <?php echo $description ?></p>
                          		</div>
                          	</div>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section>
       </section>

      <footer class="site-footer">
          <div class="text-center">
              2017 - NanleInc
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
  <script src="assets/js/zabuto_calendar.js"></script>  
  
  
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>