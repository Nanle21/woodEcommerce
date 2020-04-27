<?php
	ob_start();
  $pagetitle = "View Sale";
  include_once("functions.php");
  include_once("db/config.php");
  include_once("expirecheck.php");

  session_start();
  if(!isset($_SESSION["current_user"])){
    header("location: login.php");
    exit();
  }

  $sale_id = isset($_POST['sale_id']) ? $_POST['sale_id']: '';

?>

<table class="table table-striped table-advance table-hover">
	<thead>
		<tr>
			<td>Product</td>
			<td>Quantity</td>
			<td>Amount</td>
			<td>Discount</td>
			<td>Amount Paid</td>
			<td>Total</td>
		</tr>
	</thead>
	<tbody>
			<?php
				 
                $stmt = $connection->query("SELECT * FROM products INNER JOIN cart on products.product_id = cart.p_id WHERE sale_id='$sale_id'");

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                	$sum += $row['product_fixPrice'];

                	?>
					<tr>
						<td><?php echo $row['product_name']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td> &#8358; <?php echo number_format($row['product_fixPrice']); ?></td>
						<td> &#8358; <?php echo $row['discount'] ?></td>
						<td> &#8358; <?php echo $row['amount_paid']; ?></td>
						<td>
							&#8358;
							<?php 
								$total = $sum * $row['quantity'];
								$finalKnownTotal = $total - $row['discount'];
								echo $finalKnownTotal;
							?>
								
						</td>

						<td>
							<input type="button" name="" class="btn btn-danger" onclick="deletecat('<?php echo $row['cart_id'] ?>')" value="Delete">
						</td>
					</tr>

		<?php
			$finalTotal += $finalKnownTotal;
		 }

		?>
		<input type="hidden" value="<?php echo $sale_id ?>" id="sale_id">
	</tbody>
</table>
<p align="right" style="padding:10px"><b>Total: &#8358;</b><?php echo number_format($finalTotal) ; ?></p>

<div id="carting"></div>
      <div class="form-group" align="center">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_sale_product">Add Sale product</button>
              <button class="btn btn-success" onclick="checkout('<?php echo $sale_id; ?>', '<?php echo $finalKnownTotal; ?>')">check out</button>
      </div>
<script type="text/javascript">
	function deletecat(_id){
		var _id = _id;
		var sale_id = document.getElementById("sale_id").value;
		var procedure = "delete";
		var dataString = {cart_id:_id, procedure:procedure};
		$.ajax({
			type: "POST",
			url:"processes/cartoperator.php",
			data: dataString,
			cache: false,
			success: function(html){
				//alert(html);
               $('#carting').load("view_cart.php",{sale_id:sale_id}, function(){
		          $('#loading').fadeOut("fast", 
		                function(){
		                    $('#carting').fadeIn("slow");
		            });
          		});
			}
		})
	} 
</script>