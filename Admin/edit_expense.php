<?php
  ob_start();
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");
  $pagetitle ="Edit Expense";
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

    <title> <?php echo $pagetitle; ?> - Dandywood</title>

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
<?php
	$_id = isset($_GET['_id']) ? $_GET['_id']: '';

	//$username = isset($_GET['username']) ? $_GET['username']: '';
  if($_id == ""){
  	$_SESSION['message'] = "Invalid Category";
  	$_SESSION['messagetype'] = "alert alert-danger";
  	header("location: view_expense.php");
  	exit();
  }

  $user_detail = table_open("expense","_id='$_id'","","",__FILE__,__LINE__);
  if($user_detail['error']!="")
  {
  	$_SESSION["message"] = "Error encourtered accesing Expense Details";
  	$_SESSION["messagetype"] = "alert alert-danger";
  	header("Location: view_expense.php");
  	exit();
  }
  $_id = $user_detail[0]['_id'];
  $expense_name = $user_detail[0]['expense_name'];
  $category_name = $user_detail[0]['category_name'];
  $expense_description = $user_detail[0]['expense_description'];
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
                    <li><a class="logout" href="loginout.php">Logout</a></li>
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
            <h3><i class="fa fa-angle-right"></i> Edit Expense</h3>
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
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Please Fill in the Form to Edit Expense</h4>


                  <form class="form-horizontal style-form" action="processes/edit_expense_process.php?_id=<?php echo $_id; ?>" method="post" enctype="multipart/form-data">

                  <div align="center">
                       
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Expense Name</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="expense_name" required="" value="<?php echo $expense_name; ?>">
                          </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Expense Descritption</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="expense_description"><?php echo $expense_description; ?></textarea>
                      </div>
                    </div>

  
                    
                    <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Category</label>
                      <div class="col-sm-10">
                        <select name="category_name" class="form-control">
                          <option value=""></option>
                         <?php $stmt = $connection->query("SELECT * FROM categories where status='Active'");
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
                    <div class="col-sm-10">
                      <button class="btn btn-primary">Update Expense</button>
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
       
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
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