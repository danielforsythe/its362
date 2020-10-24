<?php
    require_once('valid_admin.php');  // require a valid admin user
	include('view/header.php');
?>
<!-- admin menu, allows for data manipulation of database, regular users can't access -->
<div class="container-fluid" id="myAdminPage">
	<h3>Admin Page</h3>
	<p>This is the admin page where the site administrator can adjust the database</p>
		<h3>Sales Search Form</h3>
		<!-- submit will send the inputted data to display.php which requires and sends the data to the prcocess.php page -->
		<form method="post" action="" role="form" accept-charset="UTF-8">
		<strong>Search Type:</strong>&nbsp;&nbsp;
		<input type="radio" name="radioBtn" required<?php if(isset($searchType) && $searchType == "date_range") echo "checked";?> value="date_range">Date Range&nbsp;&nbsp;
		<input type="radio" name="radioBtn" <?php if (isset($searchType) && $searchType == "username") echo "checked";?> value="username">Username&nbsp;&nbsp;
		<input type="radio" name="radioBtn" <?php if (isset($searchType) && $searchType == "product_name") echo "checked";?> value="product_name">Product Name&nbsp;&nbsp;
		<br><br><input class="form-control" type="text" name="mySearch" autofocus="" size="40" required placeholder="Search by keyword..."><br>
		<input type="submit" name="submit" value="Search" class="btn btn-info">
		</form>
	<form method="post" action="" role="form" accept-charset="UTF-8">
		<h3>Delete an Item From Database</h3>
		<input class="form-control" type="text" name="delete" autofocus="" size="25" required placeholder="Delete by product code..."><br>
		<input type="submit" name="submit" value="Delete" class="btn btn-info">
	</form>
		<form method="post" action="" role="form" accept-charset="UTF-8">
		<h3>Edit an Item From Database</h3>
		<input class="form-control" type="text" name="edit" autofocus="" size="25" required placeholder="Edit by product code..."><br>
		<input type="submit" name="submit" value="Edit" class="btn btn-info">
	</form>
		<form method="post" action="" role="form" accept-charset="UTF-8">
		<h3>Add an Item From Database</h3>
		<input class="form-control" type="text" name="product_code" autofocus="" size="25" required placeholder="Product code..."><br>
		<input class="form-control" type="text" name="product_name" autofocus="" size="25" required placeholder="Product name..."><br>
		<input class="form-control" type="text" name="long_desc" autofocus="" size="25" required placeholder="Long description..."><br>
		<input class="form-control" type="text" name="short_desc" autofocus="" size="25" required placeholder="Short description..."><br>
		<input class="form-control" type="text" name="list_price" autofocus="" size="25" required placeholder="List price..."><br>
		<input class="form-control" type="text" name="quantity" autofocus="" size="25" required placeholder="Total quantity..."><br>
		<input type="submit" name="submit" value="Add" class="btn btn-info">
	</form>
	<form method="post" action="logout.php" autocomplete="off" accept-charset="UTF-8">
		<button class="btn btn-warning" type="submit">Logout</button>&nbsp;&nbsp;&nbsp;
		<a href="../index.php" class="btn btn-success">Return Home</a>
	</form>
</div>

<?php include('view/footer.php'); ?>