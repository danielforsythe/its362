<?php 
	include('view/header.php');
	if(!isset($_SESSION["is_valid_user"]) || $_SESSION["is_valid_user"] !== true){
	header('Location: ../creation/index.php');
} 

?>
<div id="myCheckout">
	<h3>Checkout</h3>
	<?php 
	$tax = $_POST['salestax'];
	$shipping = $_POST['shipping'];
	$total = $_POST['total'];
	?>
	<form method="post" action="receipt.php" autocomplete="off" accept-charset="UTF-8">
		<div class="form-group">
			<label>First Name: </label>
			<input type="text" class="text form-control" name="fname" placeholder="First name..." required><br>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
			<label>&nbsp;</label>
			<label>Last Name: </label>
			<input type="text" class="text form-control" name="lname" placeholder="Last name..." required><br>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
			<label>&nbsp;</label>
			<label>Address: </label>
			<input type="text" class="text form-control" name="address" placeholder="Address..." required><br>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
			<label>&nbsp;</label>
			<label>E-Mail: </label>
			<input type="text" class="text form-control" name="email" placeholder="E-mail..." required><br>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
			<label>&nbsp;</label>
			<label>Credit Card: </label>
			<input type="text" class="text form-control" name="cc" placeholder="Credit Card..." required><br>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
			<label>&nbsp;</label>
			<label>CCV: </label>
			<input type="text" class="text form-control" name="ccv" placeholder="CCV..." required><br>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
			<label>&nbsp;</label>
		</div>
		<input type="hidden" name="salestax" value="<?php echo $tax; ?>">
		<input type="hidden" name="shipping" value="<?php echo $shipping; ?>">
		<input type="hidden" name="total" value="<?php echo $total; ?>">
		<button class="btn btn-success" type="submit">Complete Order</button>
	</form>
</div>
<?php
	include('view/footer.php');
?>
