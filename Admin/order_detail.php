<?php
  ob_start();
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
  $pagetitle ="View Order Details";

  session_start();

  if(!isset($_SESSION["current_user"])){
    header("location: login.php");
    exit();
  }
  
?>

<?php
	
	$order_num = isset($_GET['order_num']) ? $_GET['order_num'] : "";
  //$customer_id = isset($_GET['customer_id']) ? $_GET['customer_id']: "";
	if($order_num == ""){
		$_SESSION["message"] = "Invalid Product Selected";
		$_SESSION["messagetype"] = "alert alert-danger";
		header("location: orders.php");
		exit();
	}
	
  $customerDetail = table_open("orders","order_num='$order_num'","","",__FILE___,__LINE__);
  if($customerDetail['error']!="")
  {
    $_SESSION["message"] = "Error encourtered accessing Product";
    $_SESSION["messagetype"] = "alert alert-danger";
    header("location: orders.php");
    exit();
  }
  $order_id = $customerDetail[0]['order_id']; 
  $custmoer_surname=$customerDetail[0]['name'];
  $customer_firstname = $customerDetail[0]['mobile_num'];
  $customer_address = $customerDetail[0]['email'];
  //die($order_id);

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
          <p align="center"><a href="orders.php">Back To View Orders</a></p>
            <br>
            

            <div class="row mt">
              <div class="col-md-12">
                <div style="background-color: #e21c1d; padding: 20px; text-align: center;">
                  <h3 style="color: white;">Dandy Plywood Nigeria LTD</h3>
                </div>
              </div>
            </div>
            <div class="row mt">
              <div class="col-md-12" align="center">
                <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <p>Head Office:</p>
                      <p>53 Old yidi road,</p>
                      <p>Itaramodu, Ilorin, Kwara State</p>
                      <p>08062352450.</p>
                    </td>
                    <td>
                      <p>Branch Office 1:</p>
                      <p>73 Old yidi road, Itamodu,</p>
                      <p>Ilorin, Kwara State.</p>
                    </td>
                    <td>
                      <p>Branch Office 2:</p>
                      <p>85 Iwo Road, Beside Zenith Bank,</p>
                      <p>Ibadan, Oyo State</p>
                      <p>08050507736</p>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>

            <div class="row mt">
              <h3 align="center">ORDER DETAILS</h3>
            </div>

            <div class="row mt">
              <div class="col-md-4">
                <table class="table table-striped table-advance table-hover table-bordered">
                <tbody>
                  <tr>
                    <td>Name: <b><?php echo $custmoer_surname; ?> </b></td>
                  </tr>
                  <tr>
                    <td>Address: <b><?php echo  $customer_address?></b></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>

            <div class="row mt" >
              <div class="col-md-12" >
                <table class="table table-striped table-advance table-hover table-bordered">
                  <thead>
                    <th>DESCRIPTION OF GOODS</th>
                    <th>QTY</th>
                    <th>Rate</th>
                    <th>Amount</th>
                  </thead>

                  <tbody>
                    
                      <?php
                             
                        $stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id WHERE client_id='$order_num'");

                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                          $sum += $row['product_fixPrice'];

                          ?>

                    <tr>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td> &#8358;<?php echo number_format($row['product_fixPrice']); ?></td>
                        <td> &#8358;<?php echo $total = $sum * $row['quantity']; ?></td>
                        
                      </tr>
                      <?php 
                      $finalTotal += $total;
                    }
                    ?>


                  </tbody>
                </table>
                <p align="right" style="padding-right:30px"><b>Total: &#8358;</b><?php echo number_format($finalTotal) ; ?></p>

               
               <?php  $newnumber = convert_number($finalTotal);
               //echo $newnumber;
               ?>

               <table class="table table-striped table-advance table-hover table-bordered">
                 <tbody>
                  <tr>
                   <td><b>Amount in Words</b> <?php echo $newnumber; ?> Naira.</td>
                  </tr>
                 <tr>
                  <td><b>Naira</b> &#8358;<?php echo number_format($finalTotal); ?>.00</td>
                </tr>
                <tr>
                  <td><b>Customer Sign:</b></td>
                </tr>
                <tr>
                  <td><b>Managers Sign:</b></td>
                </tr>
                 </tbody>
               </table>
              </div>
            </div>

            <div align="center">
              <input type="button" class="btn btn-danger" onclick="addSale('<?php echo $order_id; ?>','<?php echo $finalTotal; ?>')" value="Add to today sales">
              <a class="btn btn-success" href="javascript:window.print()">Print Receipt</a>
            </div>
            <input type="hidden" id="saler" value="<?php echo $_SESSION['current_user']; ?>">
            <input type="hidden" id="branch" value="<?php echo $_SESSION['branch_name']; ?>">
        </section>
       </section>

      <footer class="site-footer">
          <div class="text-center">
              2017 - NanleInc
              <a href="index.php#" class="go-top">
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
  <script src="assets/js/sweetalert.min.js"></script>  
  
  
  
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

        function addSale(order_id,finalTotal){
          var saler = document.getElementById('saler').value;
          var branch = document.getElementById('branch').value;
          dataString = {order_id:order_id, finalTotal:finalTotal, saler:saler, branch:branch}

          $.ajax({
            type:"POST",
            url:"processes/order_addSale.php",
            data:dataString,
            success: function(html){
              swal(html)
            }
          })
          
        }  
    </script>
  

  </body>
</html>