<?php
	session_start();
	include_once("db/config.php");
	include_once("db/functions.php");


	$category_id = isset($_POST['category_id']) ? $_POST['category_id']: '';

	if($category_id == ""){
		$stmt = $connection->query("SELECT * FROM products");
	}else{
		$stmt = $connection->query("SELECT * FROM products where product_category='$category_id'");
	}
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		?>

			<div class="col-xs-12 col-sm-6 col-md-4 product">
					<div class="product-img">
						<img class="img-responsive" style="max-height: 170px;"  src="Admin/images/<?php echo $row['product_id'] ?>.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-action">
								<a class="btn btn-primary" href="javascript:;" onclick="addtocart('<?php echo $row['product_id'] ?>','add')">Add To Cart</a>
								<a class="btn btn-primary" href="product_detail.php?p_id=<?php echo $row['product_id']; ?>">Item Details</a>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					<div class="product-bio">
						<div class="prodcut-cat">
							<a href="#"><?php echo $row['woodtype']; ?></a>
						</div>
						<!-- .product-cat end -->
						<div class="prodcut-title">
							<h3>
								<a href="#"><?php echo $row['product_name']; ?></a>
							</h3>
						</div>
						<!-- .product-title end -->
						<div class="product-price">
							<span><span>&#8358;</span> <?php echo number_format($row['product_fixPrice']); ?></span>
						</div>
						<!-- .product-price end -->
						
					</div>
					<!-- .product-bio end -->
			</div>
		<?php
	}
		
	
 ?>