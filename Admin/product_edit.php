<?php
  ob_start();
  $pagetitle = "Edit Product";
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
  if(!isset($_SESSION["current_user"])){
    header("location: login.php");
    exit();
  }

  session_start();
  

  $category_id_value = isset($_POST['category_id']) ? $_POST['category_id']: "";
  $subcategory_id_value = isset($_GET['sub_c']) ? $_GET['sub_c']: "";
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo $pagetitle; ?> -  Dandywood </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="images/favicon/favicon.png" rel="icon">
    
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
            <h3><i class="fa fa-angle-right"></i> Edit Products</h3>
            <?php
              if(isset($_SESSION['message'])){
                ?>
                <div class="alert alert-danger" style="text-align: center;"><b><?php echo $_SESSION['message'] ?></b></div>
                <?php
                unset($_SESSION['message']);
              }
            ?>
            <div class="row-mt">
              <div class="col-md-6 col-md-offset-3">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Please Fill in the Form to Update  Products</h4>
                  <?php 
                      $product_id = isset($_GET['product_id']) ? $_GET['product_id']: "";
                      if($product_id == ""){
                        $_SESSION['message'] = "Invalid Products";
                        $_SESSION['messagetype'] = "alert alert-danger";
                        header("Location: view_product.php");
                        exit();
                      }
                      $product_detail = table_open("products","product_id='$product_id'","","",__FILE__,__LINE__);
                      if($product_detail['error'])
                      {
                        $_SESSION['message'] = "Error Encoutered Accessing Product Details";
                        $_SESSION['messagetype'] = "alert alert-danger";
                        header("location: view_product.php");
                        exit();
                      }

                     $productName = $product_detail[0]['product_name'];
                     $category_id = $product_detail[0]['product_category'];
                     $type = $product_detail[0]['type'];
                     $description = $product_detail[0]['product_description'];
                     $supplier_id = $product_detail[0]['woodtype'];
                     $mainPrice = $product_detail[0]['product_fixPrice'];
                     $slashPrice = $product_detail[0]['product_addedPrice'];


                   ?>
                  <form class="form-horizontal style-form" action="processes/edit_product_process.php" method="post">

            

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Product Name</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="product_name" required="" value="<?php echo $productName; ?>">
                              <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                          </div>
                    </div>
                    

                    <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea name="product_description" class="form-control"><?php echo $description; ?></textarea>
                      </div>
                    </div>

            

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Main Price</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="product_fixPrice" required="" value="<?php echo $mainPrice; ?>">
                          </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Slash Price</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="product_addedPrice" required="" value="<?php echo $slashPrice; ?>">
                          </div>
                    </div>


                    <div class="form-group">
                    <div class="col-sm-10" align="center">
                      <button class="btn btn-primary">Update Product</button>
                    </div>
                      
                    </div>


                  </form>

                  <script type="text/javascript">
                   function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                        $('#test').attr('src', e.target.result);
                       }
                        reader.readAsDataURL(input.files[0]);
                       }
                    }
                  </script>

                </div>
              </div>
            </div>
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
