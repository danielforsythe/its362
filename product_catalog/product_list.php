<!-- full display of all products in database -->
<!-- $row_ct is for two rows per product -->
<!-- $cat_ct is for two rows per container -->
<!-- $cat_style_id is for unique id identifer for the category -->
<?php $row_ct = 0; $cat_ct = 0; $cat_style_id = 'my' . $category_name; ?>
<?php echo "<div class='container-fluid my_products' id='$cat_style_id'>"; ?>
<h3><?php echo $category_name; ?></h3>
<?php echo '<div class="row">'; ?>
	<!-- foreach loop pulls all the product data from the database -->
	<?php foreach ($products as $product) : ?>	
	<?php $row_ct++; $cat_ct++; ?>
		<?php 	$code = $product['product_code'];
				$quantity = $product['product_quantity'];
				$image_filename = 'images/' . $code . '.jpg';
				$image_alt = 'Image: ' . $code . '.jpg'; 
				// various variables pull and assign each attribute from products table
		?>
	<!-- each product displayed in bootstrap rows, with the same column sizes, 3 per row -->
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">		
		<div class="card">
			<img class="card-img-top" src="<?php echo $image_filename; ?>" alt="<?php echo $image_alt; ?>" style="width:100%"/>
			<div class="card-body">
				<h4 class="card-title"><?php echo $product['product_name']; ?></h4>
				<p class="card-text"><?php echo $product['short_description']; ?></p><br><br>
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
					<input type="submit" value="Add to Cart" class="btn btn-primary">
				</form>
				<!-- action will view individual product details instead of full list -->
				<br><a href="?action=view_product&amp;product_id=<?php echo $product['product_id'];?>" class="btn btn-info">More Info</a>
			</div>
		</div>
<div class="spacer"></div>
	</div>
<!-- if statements for count to provide multiple rows and div elements -->
<?php if ($row_ct > 2) { echo '</div>';  } ?>
<?php if ($row_ct > 2 && $cat_ct < $product_count[0]) { echo '<div class="row">'; $row_ct = 0; } ?>
<?php if ($cat_ct > 5) { echo '</div>'; $cat_ct = 0; }?>
<?php endforeach; ?>
<?php
	if($action == 'add') {
		include('../users/index.php');
	}
?>