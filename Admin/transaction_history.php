<?php
  ob_start();
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
  $pagetitle ="Transaction History";
  session_start();

  if(!isset($_SESSION["current_user"])){
    header("location: login.php");
    exit();
  }
  
  $category = isset($_GET['category']) ? $_GET['category']: '';
  $search = isset($_GET['search']) ? $_GET['search']: '';
  
  if($category == ""){
    $stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id");
    $count = $stmt->rowCount();
     if($search == ""){
      $stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id");
      $count = $stmt->rowCount();
      
    }else{
      $stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id where product_name like '$search'");
      $count = $stmt->rowCount();
      
    } 
  }
  else{
    $stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id where product_category = '$category'");
    $count = $stmt->rowCount();
    
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
            <div class="row mt">
                  <div class="col-md-12">
                    <!-- <p style="text-align: center;"><a href="add_product.php">Add a new Product</a></p> -->

                    <form id="myform" method="post" action="">
              <div class="col-md-12">
                <h4><i class="fa fa-angle-right"></i> Transaction History</h4>
              <div class="col-md-4">
                <div class="form-group">
                <label>Categories</label>
                <select class="form-control" id="category" onchange="categoryChange()">
                  <option></option>
                  <?php
                    $stmtS = $connection->query("SELECT * FROM categories");
                    while($cat = $stmtS->fetch(PDO::FETCH_ASSOC)){
                      ?>
                        <option value="<?php echo $cat['category_name']; ?>" <?php if($category === $cat['category_name']){echo "SELECTED";} ?>> <?php echo $cat['category_name']; ?></option>
                      <?php
                    } 
                  ?>
                </select>
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Search</label>
                  <input type="text" id="search" class="form-control" onchange="seachrQ()">
                </div>
              </div>
            </div>
            </form>
                      <div class="content-panel table table-responsive">
                          <table class="table  table-striped table-advance table-hover">
                           
                             <?php
              if(isset($_SESSION['message'])){
                ?>
                <div class="<?php echo $_SESSION['messagetype'] ?>" style="text-align: center;"><b><?php echo $_SESSION['message'] ?></b></div>
                <?php
                unset($_SESSION['message']);
              }
            ?>
              
            
            
            <script type="text/javascript">
              function categoryChange()
                {
                  var category = document.getElementById("category").value;
                   //var end_date = document.getElementById("end_date").value;
                    if(category == ""){
                      alert("Please select the category you want to view");
                      return null;
                    }
                    document.getElementById("myform").action="multiple_price.php?category="+category;
                    document.getElementById("myform").submit();
                }

                function seachrQ()
                {
                  var search = document.getElementById("search").value;
                   //var end_date = document.getElementById("end_date").value;
                    if(search == ""){
                      alert("Please select the category you want to view");
                      return null;
                    }
                    document.getElementById("myform").action="multiple_price.php?search="+search;
                    document.getElementById("myform").submit();
                }
            </script>
                            <hr>
                              <thead>
                              
                                <tr>
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bullhorn"></i> products Name 
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                                  <th>
                                    <div class="th-inner sortable">
                                       <i class="fa fa-question-circle"></i> Category 
                                    </div>
                                    <div class="fht-cell"></div>
                                   </th>  
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bookmark"></i>  Amount 
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bookmark"></i> Discount Amount 
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bookmark"></i> Total Amount 
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bookmark"></i> Amount Paid
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bookmark"></i> Remaining Bal 
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bookmark"></i> Transac Reason 
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                                  <th>
                                    <div class="th-inner sortable">
                                      <i class="fa fa-bookmark"></i> Date 
                                    </div>
                                    <div class="fht-cell"></div>
                                  </th>
                              </tr>
                              
                              </thead>
                              <tbody>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <?php
                                //
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  $sum += $row['product_fixPrice'];
                                  ?>
                              <tr>
                                  <td><a href="#"><?php echo $row['product_name']; ?></a></td>
                                  <td class="hidden-phone"><?php echo $row['product_category']; ?></td>
                                  <td>
                                    <?php
                                      $total = $sum * $row['quantity'];
                                      echo $total; 
                                    ?>
                                  </td>
                                  <td>
                                    <?php echo $row['discount']; ?>
                                  </td>
                                  <td>

                                    <?php
                                      $final = $total - $row['discount'];
                                     echo $final; ?>
                                  </td>
                                  <td>
                                    <?php
                                      echo $row['amount_paid']; 
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                      $remain = $final - $row['amount_paid'];
                                      echo $remain; 
                                    ?>
                                  </td>
                                  <td>
                                    <?php echo "Normal Sale"; ?>
                                  </td>
                                  <td>
                                    <?php echo $row['dateCreated']; ?>
                                  </td>
                              </tr>
                              <?php
                                  //$ = 
                                }
                              ?> 
      
                               
                          </form>
                             </tbody>
                             <?php
                                if(isset($_POST['submit'])){

                                for($i=0; $i<$count; $i++){
                               

      $sql = "UPDATE products set product_fixPrice='" .$_POST['fixPrice'][$i] . "', product_addedPrice='" .$_POST['addedPrice'][$i] . "', product_quantity='" .$_POST['qty'][$i] . "' where product_id='".$_POST['product_id'][$i]."'";
                      $hire_category = $connection->query($sql);
                      if($hire_category == "false"){
                        $_SESSION['message'] = "FAILED TO UPDATE PRODUCT";
                        $_SESSION['messagetype'] = "alert alert-danger";
                        header("location: multiple_price.php");
                        
                      }
                      else{
                        $_SESSION['message'] = "PRODUCT HAS BEEN SUCCESSFULLY UPDATED";
                        $_SESSION['messagetype'] = "alert alert-success";
                        header("location: multiple_price.php");
                        
                      }

                                }
                              } 
     
                             ?>

                          </table>
                                
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
  
  <script type="text/javascript">

      function check(){
          if($('input#cost_price:checked').length>0){
            //$('#testing').readOnly=true;
            document.getElementById('cost_price_value').readOnly=true;
          }
          else{
            document.getElementById('cost_price_value').readOnly=false;
          }
      }

      function check1(){
          if($('input#selling_price:checked').length>0){
            //$('#testing').readOnly=true;
            document.getElementById('selling_price_value').readOnly=true;
          }
          else{
            document.getElementById('selling_price_value').readOnly=false;
          }
      }

      function check2(){
          for($i=0; $i<=2; $i++){
            if($('input#qty:checked').length>0){
            //$('#testing').readOnly=true;
            document.getElementById('quantity[]').readOnly=true;
            }
          else{
              document.getElementById('quantity[]').readOnly=false;
            }
          }
      }
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
  
  <?php
    
  ?>

  </body>
</html>
