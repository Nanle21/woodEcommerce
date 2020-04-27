<?php
    if(isset($_POST['submit'])){

      for($i=0; $i<2; $i++){
      echo $_POST['fixPrice'][$i];
      echo $_POST['addedPrice'][$i]; 
      echo $_POST['qty'][$i]; 
      }
    }
  ?>

  <?php
      if(isset($_POST['submit'])){

                                for($i=0; $i<$count; $i++){
                               

      $sql = "UPDATE products set product_fixPrice='".$_POST['fixPrice'][$i]."', product_addedPrice='" .$_POST['addedPrice'][$i] . "', product_quantity='" .$_POST['fixPrice'][$i]."' where product_id='P000001'";
                      $hire_category = $connection->query($sql);
                      if($hire_category == "false"){
                        $_SESSION['message'] = "FAILED TO UPDATE PRODUCT";
                        $_SESSION['messagetype'] = "alert alert-danger";
                        header("location: multiple_price.php");
                        exit();
                      }
                      else{
                        $_SESSION['message'] = "PRODUCT HAS BEEN SUCCESSFULLY UPDATED";
                        $_SESSION['messagetype'] = "alert alert-success";
                        header("location: multiple_price.php");
                        exit();
                      }

                                }
                              } 
     
                             ?>