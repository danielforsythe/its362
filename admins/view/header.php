<?php
// if session hasn't been started, start one
if(!isset($_SESSION))
{
	session_start();
}
// Check if the user is logged in, displays top right of navbar
if(!isset($_SESSION["is_valid_user"]) || $_SESSION["is_valid_user"] !== true){
	$logged_in = "Not Logged In";
	$user_logged = "";
} else { 
	$logged_in = "Logged In";
	$user_logged = " As " . $_SESSION['logged_in'];
}
if(isset($_SESSION["is_valid_admin"])){
	$logged_in = "Logged In";
	$user_logged = " As " . $_SESSION['logged_user'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width initial-scale=1.0">
<meta charset="utf-8" content="text/html" http-equiv="Content-Type">
<title>Musical Instruments Store</title>
<!-- CSS -->
<link rel="stylesheet" href="default.css" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: rgba(223,223,223,0.55)">
<!-- bootstrap navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(29,29,29,1.00)">
	<a class="navbar-brand" href="index.php">Musical Instruments Store</a>
	<!-- mobile/tablet toggle button for nav links -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- dropdown nav links during mobile/tablet view -->
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">		
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Categories</a>
				<div class="dropdown-menu" style="background-color: rgba(29,29,29,1.0)">
					<a class="dropdown-item my_dropdown_link" href="#myGuitars">Guitars</a>
					<a class="dropdown-item my_dropdown_link" href="#myBasses">Basses</a>
					<a class="dropdown-item my_dropdown_link" href="#myDrums">Drums</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="creation/index.php">Create An Account</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="accounts/index.php">User Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="admins/index.php">Admin Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cart/index.php">Cart</a>
			</li>
		</ul>
		<!-- displays if user is logged in, or not on top right of nav bar -->
		<span class="navbar-text"><?php echo $logged_in . $user_logged;?></span>
	</div>
</nav>