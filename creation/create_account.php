<!-- include the header/footer files, the user creation form -->
<?php include('view/header.php'); ?>
<div class="container_fluid" id="myCreation">
	<h3>Create An Account</h3>
	<div class="form-group">
		<!-- form posts entered information and redirects to the index.php to decide next step -->
		<form action="../creation/." method="post" class="was-validated">
			<div class="form-group">
				<input type="hidden" name="action" value="create">
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
			<!-- submit the form under the action = 'create' -->
			<button type="submit" class="btn btn-primary" value="Create">Create Account</button>
		</form>
	</div>
</div>
<?php include('view/footer.php'); ?>