<?php 
	$subtotal = 0;
	include('view/header.php');
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$tax = $_POST['salestax'];	
	$shipping = $_POST['shipping'];
	$total = $_POST['total'];
	$email = $_POST['email']

?>
<div class="container-fluid" id="myReceipt">
	<h3>Billing/Shipping Information</h3>
	<?php 
	echo "<table class='table table-bordered table-hover table-responsive-lg'>";
	echo "<tr><th style='text-align: center'>Receipt</th></tr>";
	echo "<tr><td style='font-weight: bold'>First Name: $fname</td></tr>";
	echo "<tr><td style='font-weight: bold'>Last Name: $lname</td></tr>";
	echo "<tr><td style='font-weight: bold'>E-Mail: $email</td></tr>";
	echo "<tr><td style='font-weight: bold'>Shipping Address: $address</td></tr>";
	echo "<tr><td style='font-weight: bold'>Tax: $$tax </td></tr>";
	echo "<tr><td style='font-weight: bold'>Shipping Cost: $$shipping</td></tr>";
	echo "<tr><td style='font-weight: bold'>Total: $$total</td></tr>";
	echo "</table>";
	?>
	<h3>Products Ordered</h3>
	<table class="table table-bordered table-hover table-responsive-lg'">
	<thead>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
		</tr>
	</thead>
	<?php foreach ($_SESSION['shopping_cart'] as $key => $item) : ?>
	<tr>
		<td><?php echo $item['productkey'];?></td>
		<td><?php echo $item['quantity'];?></td>
	</tr>
	<?php $subtotal += $item['total']; ?>
	<?php endforeach; ?>
	</table>
<div style="text-align: center">
<a href="../index.php" class="btn btn-success">Return Home</a>
</div>
</div>
<?php 
	include('view/footer.php');
	unset($_SESSION['shopping_cart']);
?>