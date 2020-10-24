<!-- view individual product details -->
<?php $quantity = $product['product_quantity']; ?>
<div class="container d-flex h-100 single_product" style="margin: 0 0 150px 0; padding: 100px 0 0 0">
	<div class="row algin-self-center w-100">
		<div class="col-6 mx-auto">
			<div class="card" style="width:400px"> <!-- gets $product from database, chosen by main list "view more" button -->
				<img class="card-img-top" src="<?php echo $image_filename; ?>" alt="<?php echo $image_alt; ?>" style="width:100%"/>
				<div class="card-body">
					<h4 class="card-title"><?php echo $product['product_name']; ?></h4>
					<p class="card-text"><?php echo $product['long_description']; ?></p><br><br>
					<p><span class="bold_span">Price: $<?php echo $product['list_price']; ?> USD</span></p>
					<form action="." method="post">
				<select class="form-control" name="quantity">
					<?php while($quantity > 0) {
						echo "<option name='$quantity'>$quantity</option>";
						$quantity--;
					}?>
				</select><br>
					<!-- hidden input allows for setting of the action to be done -->
					<input type="hidden" name="action" value="add">
					<!-- hidden input allows for the post of the product name -->
					<input type="hidden" name="cost" value="<?php echo $product['list_price']; ?>">
					<input type="hidden" name="productkey" value="<?php echo $product['product_name']; ?>">
					<input type="submit" value="Add to Cart" class="btn btn-primary"><br>
				</form>
					<br><a href="index.php" class="btn btn-success">Return Home</a>
				</div>
			</div>
		</div>
	</div>
</div>