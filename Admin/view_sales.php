<?php
  ob_start();
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
  $pagetitle ="View Sales";
  session_start();
  

  $start_date = isset($_GET['start_date']) ? $_GET['start_date']: "";
  $end_date = isset($_GET['end_date']) ? $_GET['end_date']: "";

  if($start_date == "" || $end_date == ""){
    $open_date = date('Y-m-d');
    $sale_open = table_open("open_sale","open_date='$open_date'","","",__FILE__,__LINE__);
    $open_sale_id = $sale_open[0]['open_sale_id'];
    $sales_info = table_open("sales","sale_id='$open_sale_id'","","",__FILE__,__LINE__);
    $sale_id = $sales_info[0]['sale_id'];
    $stmt = $connection->query("SELECT * from sales where open_sale_id='$open_sale_id'");
  }
  else{
    
    $open_sale_1 = table_open("open_sale","open_date='$start_date'","","",__FILE__,__LINE__);
  $open_sale_2 = table_open("open_sale","open_date='$end_date'","","",__FILE__,__LINE__);
  $open_date1 = $open_sale_1[0]['open_sale_id'];
  $open_date2 = $open_sale_2[0]['open_sale_id'];

      $stmt = $connection->query("SELECT * from sales where open_sale_id BETWEEN '$open_date1' and '$open_date2'");

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

    <title><?php echo $pagetitle; ?> - Dandywood</title>

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

       <section id="main-content">
        <section class="wrapper">
          <br>
          <p style="text-align: center;"><a href="add_sale.php">Add a new Sale</a></p>
            <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> View Sales</h4>
                             <?php
              if(isset($_SESSION['message'])){
                ?>
                <div class="<?php echo $_SESSION['messagetype'] ?>" style="text-align: center;"><b><?php echo $_SESSION['message'] ?></b></div>
                <?php
                unset($_SESSION['message']);
              } 

            ?>
            
            <form action="" method="post" id="myform">
              <div class="col-md-12">
              <div class="col-md-4">
                <div class="form-group">
                <label>From</label>
                <select class="form-control" name="start_date" id="start_date">
                  <option></option>
                  <?php 
                    $Jesus = $connection->query("SELECT * from open_sale");
                    while($JesusQ = $Jesus->fetch(PDO::FETCH_ASSOC)){
                      ?>
                        <option value="<?php echo $JesusQ['open_date']; ?>"><?php echo $JesusQ['open_date']; ?></option>
                      <?php
                    }
                  ?>



                </select>
              </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                <label>To</label>
                <select class="form-control" name="end_date" id="end_date">
                  <option></option>
                  <?php 
                    $Jesus = $connection->query("SELECT * from open_sale");
                    while($JesusQ = $Jesus->fetch(PDO::FETCH_ASSOC)){
                      ?>
                        <option value="<?php echo $JesusQ['open_date']; ?>"><?php echo $JesusQ['open_date']; ?></option>
                      <?php
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-4">
                    <button class="btn btn-primary" onclick="check_sales()">Check Sales</button>
                    <br>
              <br><br>
              <br>
              </div>
              </div>
            </div>
            </form>

      <script type="text/javascript">
              

                  function check_sales()
                {
                  var start_date = document.getElementById("start_date").value;
                   var end_date = document.getElementById("end_date").value;
                    if(start_date == "" || end_date == "" ){
                      alert("Please select the dates you want to view");
                      return null;
                    }
                    document.getElementById("myform").action="view_sales.php?start_date="+start_date+"&end_date="+end_date;
                    document.getElementById("myform").submit();
                }
                </script>

                    <hr>
                      <thead>
                      <tr>
                          <th><i class="fa fa-bullhorn"></i> Sales </th>
                          <th><i class="fa fa-bullhorn"></i> Amount </th>
                            
                                                           
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        
                        
                        
                        
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


                        ?>
                            <tr>
                              <td>
                                <?php
                                $customer_id = $row['customer__id'];
                                if($customer_id == ""){
                                  $order_id = $row['order_id'];
                                  $stmts = $connection->query("SELECT * from orders where order_id='$order_id '");
                                }else{
                                  $stmts = $connection->query("SELECT * from customers where customer_id='$customer_id'");
                                } 
                                
                        
                              while($rows = $stmts->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <a href="view_receipt.php?_id=<?php echo $row['sale_id']; ?>&customer_id=<?php echo $row['customer__id']; ?>&order_num=<?php echo $rows['order_num'] ?>" target="_blank"><?php echo $rows['surname']; echo " "; echo $rows['firstname']; echo $rows['name']; ?></a> 
                                <?php
                              }
                              ?>
                              </td>
                              <td>
                               &#8358; <?php  echo number_format($row['total_amount']); ?></td>
                            </tr> 
                            
                        <?php
                        
                      }
                      
                      ?>
                      </tbody>
                  </table>
              </div><!-- /content-panel -->
          </div><!-- /col-md-12 -->
      </div><!-- /row -->

</section>
</section>

       
      <footer class="site-footer">
          <div class="text-center">
              2017 - NanleInc
              <a href="#" class="go-top">
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
