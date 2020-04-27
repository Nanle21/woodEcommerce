<?php
  ob_start();
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
  $pagetitle ="Add Sale Detail";
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo $pagetitle; ?> Dandywood</title>

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
    <script type="text/javascript">
     
    </script>
  </head>

  <body>
<?php
  $sale_id = isset($_GET['sale_id']) ? $_GET['sale_id']: '';

  //$username = isset($_GET['username']) ? $_GET['username']: '';
  if($sale_id == ""){
    $_SESSION['message'] = "Invalid Sale_id";
    $_SESSION['messagetype'] = "alert alert-danger";
    header("location: add_sale.php");
    exit();
  }

  $sales_detail = table_open("sales","sale_id='$sale_id'","","",__FILE__,__LINE__);
  if($sales_detail['error']!="")
  {
    $_SESSION["message"] = "Error encourtered accesing sale Details";
    $_SESSION["messagetype"] = "alert alert-danger";
    header("Location: add_sale.php");
    exit();
  }
  $sale_id = $sales_detail[0]['sale_id'];
  $buyer_name = $sales_detail[0]['buyer_name'];
  //$active = $user_detail[0]['active'];
?>
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
                    <li><a class="logout" href="logout.php">Logout</a></li>
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
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Add Sales Detail</h4>
                             <?php
              if(isset($_SESSION['message'])){
                ?>
                <div class="<?php echo $_SESSION['messagetype'] ?>" style="text-align: center;"><b><?php echo $_SESSION['message'] ?></b></div>
                <?php
                unset($_SESSION['message']);
              }
            ?>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-user"></i> Buyer: <?php echo $buyer_name; ?> </th>  
                              </tr>
                              </thead>
                          </table>
                          <div id="carting"></div>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

        </section>
       </section>

       <div class="modal fade" id="add_sale_product" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Add Product
                </h4>
            </div>

            <div class="modal-body">
              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label class="col-md-2">Select Product</label>
                  <div class="col-md-10">
                    <select class="form-control" id="product_id">
                      <option></option>
                       <?php
                                $stmt = $connection->query('SELECT * FROM products');

                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                                  ?>
                                  
                                  <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></option>
                                  <?php  } ?>
                    </select>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label class="col-md-2">Quantity</label>
                  <div class="col-md-10">
                    <input type="text" name="quantity" class="form-control" id="quantity">
                    <input type="hidden" name="" id="sale_id" value="<?php echo $sale_id; ?>">
                  </div>
                  
                </div>
                <div class="form-group">
                  <label class="col-md-2">Discount</label>
                  <div class="col-md-10">
                    <input type="number" name="discount" class="form-control" id="discount">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2">Amount Paid</label>
                  <div class="col-md-10">
                    <input type="number" name="amount_paid" class="form-control" id="amount_paid">
                  </div>
                </div>
                <div class="form-group" align="center">
                  <input type="button" name="" class="btn btn-success" value="Add to Cart" onclick="addtocart('<?php echo $sale_id; ?>')">
                </div>

              </form>
            </div>
         </div>
       </div>
     </div>
       
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
            var sale_id = document.getElementById('sale_id').value;

            $('#carting').load("view_cart.php",{sale_id:sale_id}, function(){
          $('#loading').fadeOut("fast", 
                function(){
                    $('#carting').fadeIn("slow");
            });
          });

        });
        
       

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }

        function addtocart(sale_id)
        {
          var product_id = document.getElementById('product_id').value;
          var quantity = document.getElementById('quantity').value;
          var discount = document.getElementById('discount').value;
          var amount_paid = document.getElementById('amount_paid').value;
          var sale_id = sale_id;
          var procedure = "add";
          var dataString = {product_id:product_id, quantity:quantity, sale_id:sale_id, procedure:procedure, discount:discount, amount_paid:amount_paid};

          $.ajax({
            type: "POST",
            url:"processes/cartoperator.php",
            data:dataString,
            cache:false,
            success: function(html){
              alert(html);
               $('#carting').load("view_cart.php",{sale_id:sale_id}, function(){
          $('#loading').fadeOut("fast", 
                function(){
                    $('#carting').fadeIn("slow");
            });
          });
              $('input[type="text"],textarea,input[type="email"],select,input[type="number"]').val('');
            }

          })

        }

        function checkout(sale_id,total){
          
          var action = "checkout";
          dataString = {sale_id: sale_id, procedure:action, finalTotal:total};

          $.ajax({
            type:"POST",
            url: "processes/cartoperator.php",
            data:dataString,
            cache: false,
            success: function(html){
              alert(html);
               window.location.href = "add_sale.php";
  
            },
            error: function(html){

            }
          })
        }
    </script>
  


  </body>
</html>
