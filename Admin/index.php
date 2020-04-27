<?php
  ob_start();
  $pagetitle ="Home";
  session_start();
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");

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
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_data"></span>
                  <?php
                    $stmt = $connection->query("SELECT * FROM products");
                    $total_products = $stmt->rowCount();

                  ?>
					  			<h3><?php echo $total_products ?></h3>
                  			</div>
					  			<p>Have <?php echo $total_products ?> Products</p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_shop"></span>
                  <?php $orderstmp = $connection->query("SELECT * from orders where order_status='false'");
                    $total_orders= $orderstmp->rowCount();
                   ?>
					  			<h3><?php echo $total_orders; ?></h3>
                  			</div>
					  			<p>Have <?php echo $total_orders; ?> unattended orders</p>
                  		</div>


                      <?php
                     
                     $open_sale_date = date('Y-m-d');
                    $check_open_sale = table_open("open_sale","open_date='$open_sale_date'","","",__FILE__,__FILE__);
                    $open_sale_id = $check_open_sale[0]['open_sale_id'];

                      //echo $open_sale_id;
                      //echo $newvalue;
                      ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_banknote"></span>
                  <?php $sales = $connection->query("SELECT * FROM sales where open_sale_id='$open_sale_id'");
                      $salesCount = $sales->rowCount();
                      
                   ?>
					  			<h3><?php echo number_format($salesCount); ?></h3>
                  			</div>
					  			<p>You have sold <?php echo number_format($salesCount); ?> products today</p>
                  		</div>

                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_mail"></span>
                  <?php $contact = $connection->query("SELECT * FROM contact_us where status='false'");
                      $contact_count = $contact->rowCount();
                      
                   ?>
                  <h3><?php echo $contact_count; ?></h3>
                        </div>
                  <p>You have <?php echo $contact_count; ?> unread messages.</p>
                      </div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_world"></span>
					  			
					  			<h3>OK!</h3>
                  			</div>
					  			<p>Your server is working perfectly. Relax & enjoy.</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
                  
                    <?php
              if(isset($_SESSION['message'])){
                ?>
                <div class="<?php echo $_SESSION['messagetype'] ?>" style="text-align: center;"><b><?php echo $_SESSION['message'] ?></b></div>
                <?php
                unset($_SESSION['message']);
              }
            ?>

            <?php  
              $open_date = date('Y-m-d');
              $open_date_month = date('m');
              $month = get_full_month_name($open_date_month);
              
              $check_open_sale = table_open("open_sale","open_date='$open_date'","","",__FILE__,__FILE__);
            if($check_open_sale['error']!="" && $check_open_sale['error']!="No record found!")
            {
              $_SESSION['message'] = "Error Encountered accessing Open Sales Information! Please contact the administrator";
              $_SESSION['messagetype'] = "alert alert-danger";
              //header("location: index.php");
              exit();
            }
            if($check_open_sale['error'] == "")
                {
                    $open_value = "close";
                    $check_open_value = table_open("open_sale","open_value='$open_value' and open_date='$open_date'","","",__FILE__,__FILE__);
                  if($check_open_value['error']!="" && $check_open_value['error']!="No record found!")
                  {
                    $_SESSION['message'] = "Error Encountered accessing close Sales Information! Please contact the administrator";
                    $_SESSION['messagetype'] = "alert alert-danger";
                    //header("location: index.php");
                    exit();
                  }
                  if($check_open_value['error'] == ""){

                  }else{


                  
                      ?>
                      <div align="center">
                          <form action="processes/close_day.php" method="post">
                              <div class="form-group">
                                <?php if($_SESSION['role'] == "administrator"){
                                  ?>
                                  <button href="javascript:;" class="btn btn-danger" name="close">CLOSE DAY</button>
                                  <?php
                                }else{
                                  ?>

                                  <?php
                                } ?>
                                
                              </div>
                          </form>
                        </div>
                      
                    <?php
                 }   
                }
            else{
              ?>
                  <div align="center">
                        <form >
                          <div class="form-group">
                            <?php if($_SESSION['role'] == "administrator"){
                              ?>
                              <a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#open_day">OPEN DAY</a>
                              <?php
                            }else{
                              ?>
                              
                              <?php
                            } ?>
                          </div>
                        </form>
                      </div>
                    
              <?php
            }
            ?>
                                      
           </div>       

  <div class="modal fade" id="open_day" tabindex="-1" role="dialog" 
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
                    Open Day Login
                </h4>
          </div>
          <div class="modal-body">
            <form class="" action="processes/open_day.php" method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="password" required>
              </div>
              <div class="form-group" align="center">
                <button class="btn btn-success">Open Day for <?php  echo $month ." "; echo date('d').", "; echo date('Y'); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
     </div>
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						
                                        
                      <!-- First Action -->
                      

                       <!-- USERS ONLINE SECTION -->
						<h3>TEAM MEMBERS</h3>
                      <!-- First Member -->
                      <?php
                      $stmt = $connection->query("SELECT * FROM admin");
                      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                          <div class="desc">
                        
                        <div class="details" style="margin: 10px;">
                          <p><a href="#"><?php echo $row['username']; ?></a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                        <?php
                      }
                      ?>
                      
                      <!-- Second Member -->
                      

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
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
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dandy!',
            // (string | mandatory) the text inside the notification
            text: 'Please do have a nice experience when useing this application',
            // (string | optional) the image to display on the left
           // image: 'images/logo-light.png.',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
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
  

    <style type="text/css">
      #faIcons{
        font-size: 60px;
      }
    </style>
  </body>
</html>
