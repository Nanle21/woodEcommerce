<?php
  ob_start();
  $pagetitle = "Add Product";
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");

  session_start();
  if(!isset($_SESSION["current_user"])){
    header("location: login.php");
    exit();
  }
  
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo $pagetitle; ?> - Dandywoods</title>

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
             <?php include_once("tpl/header_admin_name.php"); ?>
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
          <br>
          <p style="text-align: center;"><a href="view_product.php">View Products</a></p>
            <h3><i class="fa fa-angle-right"></i> Add Product</h3>
            <?php
              if(isset($_SESSION['message'])){
                ?>
                <div class="<?php echo $_SESSION['messagetype'] ?>" style="text-align: center;"><b><?php echo $_SESSION['message'] ?></b></div>
                <?php
                unset($_SESSION['message']);
              }
            ?>
            <div class="row-mt">
              <div class="col-md-6 col-md-offset-3">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Please Fill in the Form to Add a New Product</h4>
                  <form class="form-horizontal style-form" action="processes/add_product_process.php" method="post" enctype = "multipart/form-data" id="myform">

                    <div align="center">
                       <div class="">
                        <div class="">
                            <div class="">
                                <div class="photo">
                                  <img  class="img-responsive" alt="" id="test" src="#" >
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Product Image</label>
                      <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" onchange="readURL(this);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Product Name</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="product_name" required value="<?php echo $product_name; ?>">
                          </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Catergoy</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="category_id" required>
                          <option></option>
                          <?php
                          $stmt = $connection->query('SELECT * FROM categories');
                          while($cat = $stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                              <option value="<?php echo $cat['category_name']; ?>"><?php echo $cat['category_name']; ?></option>
                            <?php
                          } 
                        ?>
                        </select>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="description" required></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Quantity</label>
                      <div class="col-sm-10">
                        <input type="number" name="product_quantity" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Main Price</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="main_price" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Slash Price</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="slash_price" required>
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-10">
                      <button class="btn btn-primary">Add Product</button>
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
  
  </body>
</html>
