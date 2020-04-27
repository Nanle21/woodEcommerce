<?php
	session_start();
	include_once("db/config.php");
	include_once("db/functions.php");
	include_once("processes/cart_operator.php");

	
$stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id where client_id='$client_id'");
        if($total <= 0){
        				$p_id =  $_SESSION['p_id'];
                        $_SESSION['client_id'] = $client_id;

                        $stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id where client_id='$client_id'");
                        $total_cart = $stmt->rowCount();
        	?>
        		<div class="cart-icon">
							<i class="fa fa-shopping-cart"></i>
							<span class="title">shop cart</span>
							<span class="cart-label"><?php echo $total_cart; ?></span>
						</div>
						<div class="cart-box">
							<div class="cart-overview">
								<ul class="list-unstyled">
								<?php
									while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            		$sum2 += $row['product_fixPrice'] * $row['quantity']; 

								?>
									<li>
										<img class="img-responsive" src="Admin/images/<?php echo $row['product_id']; ?>.jpg" alt="product"/>
										<div class="product-meta">
											<h5 class="product-title"><?php echo $row['product_name']; ?></h5>
											<p class="product-price">Price: <span>&#8358;</span><?php echo number_format($row['product_fixPrice']); ?> </p>
											<p class="product-quantity">Quantity: <?php echo $row['quantity']; ?></p>
										</div>
										<a class="cancel" href="javascript:;" onclick="removecart('remove','<?php echo $row['product_id'] ?>')">cancel</a>
									</li>
									<?php 
								}
								?>
								</ul>
							</div>
							<div class="cart-total">
								<div class="total-desc">
									<h5>TOTAL :</h5>
								</div>
								<div class="total-price">
									<h5><span>&#8358;</span><?php echo number_format($sum2); ?></h5>
								</div>
							</div>
							<div class="clearfix">
							</div>
							<div class="cart-control">
								<a class="btn btn-primary btn-block" href="cart.php">view cart</a>
								
							</div>
						</div>
        	<?php
        }
        else{
        	?>
        		<div class="cart-icon">
							<i class="fa fa-shopping-cart"></i>
							<span class="title">shop cart</span>
							<span class="cart-label">2</span>
						</div>
						<div class="cart-box">
							<div class="cart-overview">
								<ul class="list-unstyled">
									<?php
									$stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id where client_id='$client_id'");
							             while($total = $stmt->fetch(PDO::FETCH_ASSOC)){
							                            $sum2 += $total['product_fixPrice'] * $total['quantity'];     
							                        }
            							?>
									<li>
										<img class="img-responsive" src="assets/images/shop/thumb/1.jpg" alt="product"/>
										<div class="product-meta">
											<h5 class="product-title">Belt Car Engine</h5>
											<p class="product-price">Price: <span>&#8358;</span>68.00 </p>
											<p class="product-quantity">Quantity: 2</p>
										</div>
										<a class="cancel" href="home-1.html#">cancel</a>
									</li>
								</ul>
							</div>
							<div class="cart-total">
								<div class="total-desc">
									<h5>CART SUBTOTAL :</h5>
								</div>
								<div class="total-price">
									<h5><span>&#8358;</span><?php echo $sum2; ?></h5>
								</div>
							</div>
							<div class="clearfix">
							</div>
							<div class="cart-control">
								<a class="btn btn-primary btn-block" href="cart.php">view cart</a>
								
							</div>
						</div>
        	<?php
        }
?>
						
				