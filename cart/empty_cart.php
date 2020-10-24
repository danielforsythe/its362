<?php 
// logout the user and destory the session
    session_start();
    if(!session_destroy())
    {
        echo "Failed to empty cart!";
    }
    else
    {
        echo "Successfully emptied cart!";
    }
include('view/header.php');
?>
	<form method="post" action="../index.php" autocomplete="off" accept-charset="UTF-8">
	<button class="btn btn-default" type="submit">Return Home</button>
</form>
<!-- view the empty cart if nothing has been added -->
<div class="container-fluid" id="myEmptyCart" style="padding: 100px 15px 100px 15px;text-align: center">
	<h3>Cart is Currently Empty!</h3>
	<a href="../index.php" class="btn btn-success">Return Home</a>
</div>
<?php include('view/footer.php'); ?>