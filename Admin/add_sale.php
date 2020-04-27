<?php
  ob_start();
  $pagetitle = "Add Sale";
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

    <title><?php echo $pagetitle; ?> - Dandywoods </title>

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
          <p style="text-align: center;"><a href="view_sales.php">View Sales</a></p>
            <h3><i class="fa fa-angle-right"></i> Add a New Sale</h3>
            <?php
              if(isset($_SESSION['message'])){
                ?>
                <div class="<?php echo $_SESSION['messagetype'] ?>" style="text-align: center;"><b><?php echo $_SESSION['message'] ?></b></div>
                <?php
                unset($_SESSION['message']);
              }
            ?>
            <div class="row-mt">
              <div class="col-md-8 col-md-offset-2">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Please Fill in the Form to Add a New Sale</h4>
                  <form class="form-horizontal style-form" action="processes/add_sale_process.php" method="post" enctype = "multipart/form-data" id="myform">

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Buyer Name</label>

                      <div class="col-sm-10">
                        <select class="form-control" name="customer__id">
                          <option></option>
                          <?php
                            $stmt = $connection->query("SELECT * from customers");
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                  <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['surname']; echo " "; echo $row['firstname']; ?></option>
                                <?php
                            }
                          ?>
                        </select>      
                      </div>
                    </div>
                    
                    <input type="hidden" name="saler" value="<?php echo $_SESSION['current_user']; ?>">
                    <input type="hidden" name="branch" value="<?php echo $_SESSION['branch_name']; ?>">
                    <div class="form-group">
                    <div class="col-sm-10" align="center">
                      <button class="btn btn-primary" >Create Sales</button>
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
  <script src="assets/js/tinymce/tinymce.min.js"></script>
  <script language="javascript">
        tinymce.init({
            selector:'#item_value_div', 
            plugins: "table advlist autolink link image lists charmap print preview textcolor",
            toolbar: 'table insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons'
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
  

  </body>
</html>
