<!-- view the cart if there has been added items using $_SESSION -->
<?php include('view/header.php'); $subtotal = 0; $shipping = 7.49; ?>
<div class="container-fluid" id="myFullCart" style="padding: 100px 15px 100px 15px;text-align: center">
	<?php if (empty($_SESSION['shopping_cart']) || count($_SESSION['shopping_cart']) == 0) : ?>
		<h3>Cart is Currently Empty!</h3>
		<a href="../index.php" class="btn btn-success">Return Home</a>
	<?php else: ?>
	<table class="table table-bordered table-hover table-responsive-lg">
		<thead class="thead-dark">
		<tr>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Cost</th>
		</tr>
		</thead>
	<?php foreach ($_SESSION['shopping_cart'] as $key => $item) : ?>
	<tr>
		<td><?php echo $item['productkey'];?></td>
		<td><?php echo $item['quantity'];?></td>
		<td>$<?php echo $item['cost'];?></td>
	</tr>
	<?php $subtotal += $item['total']; ?>
	<?php endforeach; ?>
		<thead class="thead-dark">
		<tr>
			<th></th>
			<th></th>
			<th>Subtotal</th>
		</tr>
		<tr>
			<td></td><td></td>
			<td>$<?php echo number_format($subtotal, 2); ?></td>
		</tr>
		</thead>
		<thead class="thead-dark">
		<tr>
			<th></th>
			<th></th>
			<th>Tax</th>
		</tr>
		<tr>
			<td></td><td></td>
			<td>$<?php echo number_format($tax = $subtotal * .07, 2); ?></td>
		</tr>
		</thead>
		<thead class="thead-dark">
		<tr>
			<th></th>
			<th></th>
			<th>Shipping</th>
		</tr>
		<tr>
			<td></td><td></td>
			<td>$<?php echo number_format($shipping, 2); ?></td>
		</tr>
		</thead>
		<thead class="thead-dark">
		<tr>
			<th></th>
			<th></th>
			<th>Total</th>
		</tr>
		<tr>
			<td></td><td></td>
			<td>$<?php echo number_format($subtotal + $tax + $shipping, 2); ?></td>
		</tr>
		</thead>
	</table>
	<form method="post" action="empty_cart.php" autocomplete="off" accept-charset="UTF-8">
		<button class="btn btn-danger" type="submit">Empty Cart</button>&nbsp;&nbsp;&nbsp;
		<a href="../index.php" class="btn btn-success">Return Home</a>
	</form>
	<br>
	<form method="post" action="checkout.php" autocomplete="off">
		<input type="hidden" name="salestax" value="<?php echo $tax; ?>">
		<input type="hidden" name="shipping" value="<?php echo $shipping; ?>">
		<input type="hidden" name="total" value="<?php echo $subtotal + $tax + $shipping; ?>">
		<button class="btn btn-primary">Checkout</button>
	</form>
	<?php endif; ?>
	
</div>
<?php include('view/footer.php'); ?>