<?php include('view/header.php'); ?>
<!-- login form for admin page -->
<div class="container_fluid" id="myLogin">
	<h3>Admin Login</h3>
	<div class="form-group">
		<form action="../admins/." method="post" class="was-validated">
			<div class="form-group">
				<input type="hidden" name="action" value="login">
				<label>Username:</label>
				<input type="text" class="text form-control" name="username" placeholder="Enter username..." required><br>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label>Password: </label>
				<input type="password" class="text form-control" name="password" placeholder="Enter password..." required><br>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
				<label>&nbsp;</label>
			</div>
			<!-- login using the action = 'login' -->
			<button type="submit" class="btn btn-secondary" value="Login">Login</button>
		</form>
	</div>
</div>
<?php include('../view/footer.php'); ?>