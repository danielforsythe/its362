<?php
	// add an item to the cart
function add_item($key, $quantity, $cost) {
	global $products;
	if ($quantity < 1) return;
	
	// if item already exsists in cart, update quantity
	if (isset($_SESSION['shopping_cart'][$key])) {
		//$quantity += $_SESSION['shopping_cart'][$key]['quantity'];
		update_item($key, $quantity);
		return;
	}
	
	// Add Item
	$cost = $cost;
	$total = $cost * $quantity;
	$product_array = array(
		'productkey' => $key,
		'quantity' => $quantity,
		'cost' => $cost,
		'total' => $total
	);
	$_SESSION['shopping_cart'][$key] = $product_array;
}
function update_item($key, $quantity) {
	$quantity = (int) $quantity;
	if (isset($_SESSION['shopping_cart'][$key])) {
		if ($quantity <= 0) {
			unset($_SESSION['shopping_cart'][$key]);
	} else {
		$_SESSION['shopping_cart'][$key]['quantity'] = $quantity;
		$total = $_SESSION['shopping_cart'][$key]['cost'] * $_SESSION['shopping_cart'][$key]['quantity'];
		$_SESSION['shopping_cart'][$key]['total'] = $total;
		}
	}
}

// Get Cart Subtotal
function get_subtotal() {
	$subtotal = 0;
	foreach ($_SESSION['shopping_cart'] as $product_array) {
		$subtotal += $product_array['total'];
	}
	$subtotal_f = number_format($subtotal, 2);
	return $subtotal_f;
}