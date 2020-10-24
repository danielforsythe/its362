<?php
    require_once('valid_user.php');  // require a valid user
	include('view/header.php');
?>
<!-- user menu that is only viewable by a logged in user -->
<div class="container-fluid" id="myUser">
	<form method="post" action="logout.php" autocomplete="off" accept-charset="UTF-8">
		<h3>Welcome to the user home page</h3>
		<button class="btn btn-warning" type="submit">Logout</button>&nbsp;&nbsp;&nbsp;
		<a href="../index.php" class="btn btn-success" role="button">Return Home</a>
	</form>
</div>
<?php
	include('view/footer.php');
?>