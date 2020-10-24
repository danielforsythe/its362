<?php 
include('view/header.php');
// logout the user and destroy the session 
    if(!session_destroy())
    {
        echo "Failed to log out";
    }
?>
<div class="container-fluid" style="padding: 75px 15px 100px 10px; text-align: center">
	<h3>Logged Out Successfuly!</h3>
		<form method="post" action="../index.php" autocomplete="off" accept-charset="UTF-8">
	<button class="btn btn-success" type="submit">Return Home</button>
</form>
</div>
<?php include('view/footer.php'); ?>