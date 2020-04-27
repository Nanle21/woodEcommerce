<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  
                  <br>
                  <h5 class="centered">
                  <?php
              if(isset($_SESSION['current_user']))
        {
          ?>
                    <p><?php echo $_SESSION['current_user']; ?></p>
                    <?php
        }
            ?>
            
                  </h5>
                    
                  <li class="mt">
                      <a  href="index.php" <?php
              if($pagetitle=="Home")
              {
                echo "class='active'";
              }
             ?>>
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($pagetitle=="Add Assets" || $pagetitle=="Add Branch" || $pagetitle == "Add Category" || $pagetitle == "Add Customer" || $pagetitle == "Add Expense" || $pagetitle == "Add Liability" || $pagetitle == "Add Product" || $pagetitle == "Add Sale" || $pagetitle == "Add Sale Detail" || $pagetitle == "Add User" || $pagetitle == "View Assets" || $pagetitle == "View Branch" || $pagetitle == "View Category" || $pagetitle == "View Customer" || $pagetitle == "View Expense" || $pagetitle == "View Liability" || $pagetitle == "View Product" || $pagetitle == "View User"){echo "class='active'";}  ?>>
                          <i class="fa fa-pied-piper"></i>
                          <span>Registrations</span>
                      </a>
                      <ul class="sub">
                         <?php if($_SESSION['role'] == "administrator"){
                          ?>
                          <li><a  href="view_user.php">Users</a></li>
                          <li><a  href="view_product.php">Products</a></li>
                          <li><a  href="view_asset.php">Assets</a></li>
                          <li><a  href="view_expense.php">Expenses</a></li>
                          <li><a  href="view_liability.php">Liability</a></li>
                          <li><a  href="view_customer.php">Customer</a></li>
                          <li><a  href="view_branch.php">Company Branch</a></li>
                          <li><a  href="view_category.php">Category</a></li>
                          <?php
                         }else{
                          ?>
                          <li><a  href="view_asset.php">Assets</a></li>
                          <li><a  href="view_expense.php">Expenses</a></li>
                          <li><a  href="view_liability.php">Liability</a></li>
                          <li><a  href="view_customer.php">Customer</a></li>
                          <li><a  href="view_branch.php">Company Branch</a></li>
                          <li><a  href="view_category.php">Category</a></li>
                          <?php
                         } ?> 
                      </ul> 
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($pagetitle == "View Sales" || $pagetitle=="Orders" || $pagetitle == "Add Faqs Category" || $pagetitle == "View Faqs Category"){echo "class='active'";}  ?>>
                          <i class="fa fa-money"></i>
                          <span>Operations</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="orders.php">Orders</a></li>
                          <li><a  href="view_sales.php">Sales</a></li>
                      </ul> 
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($pagetitle == "Multiple Price Update" || $pagetitle=="cost and selling price" || $pagetitle == "transaction history"){echo "class='active'";}  ?>>
                          <i class="fa fa-book"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <?php if($_SESSION['role'] == "administrator"){
                            ?>
                            <li><a  href="multiple_price.php">Multiple Price Update</a></li>
                            <li><a  href="transaction_history.php">Transaction History</a></li>
                            <?php
                          }else{
                            ?>
                           <li><a  href="transaction_history.php">Transaction History</a></li>
                            <?php
                          } ?>
                      </ul> 
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($pagetitle == "Account Statement"){echo "class='active'";}  ?>>
                          <i class="fa fa-bank"></i>
                          <span>Records</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="accounts_record.php">Account Statement</a></li>
                      </ul> 
                  </li>

                

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>