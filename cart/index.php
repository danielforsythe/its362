<?php
	// start session management and include necessary functions
if(!isset($_SESSION))
{
	session_start();
}

//create a cart array if needeed
if (empty($_SESSION['shopping_cart'])) { $_SESSION['shopping_cart'] = array(); }

	// get the action to perform
	$action = filter_input(INPUT_POST, 'action');
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL) {
			$action = 'empty_cart';
		}
	}
	// if the cart has an item in it, show cart
	if(isset($_SESSION['shopping_cart'])) {
		$action = 'show_cart';
	} 

	// perform the specified action
	switch($action) {
		case 'show_cart':
			include('full_cart.php');
			break;
		case 'empty_cart':
			include('empty_cart.php');
			break;
		case 'checkout':
			echo "Checkout";
			break;
	}
?>