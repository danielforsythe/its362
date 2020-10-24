<?php
	// start session management and include necessary functions
if(!isset($_SESSION))
{
	session_start();
}

//create a cart array if needeed
if (empty($_SESSION['shopping_cart'])) { $_SESSION['shopping_cart'] = array(); }
	// require database connection, product mysql functions, category mysql functions
	require('model/database.php');
	require('model/product_db.php');
	require('model/category_db.php');

	// if no action is set, default to 'list_products'
	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL) {
		$action = filter_input(INPUT_GET, 'action');
		if ($action == NULL) {
			$action = 'list_products';
		}
	}  
	// if action is 'list_products', pull and display each category and product detail
	if ($action == 'list_products') {
		$category_id = 1;
		$categories = get_categories();
		$product_count = count_product($category_id);
		$category_name = get_category_name($category_id);
		$products = get_products_by_category($category_id);
		include 'product_catalog/product_list.php';

		$category_id = 2;
		$categories = get_categories();
		$category_name = get_category_name($category_id);
		$products = get_products_by_category($category_id);
		include 'product_catalog/product_list.php';

		$category_id = 3;
		$categories = get_categories();
		$category_name = get_category_name($category_id);
		$products = get_products_by_category($category_id);
		include 'product_catalog/product_list.php';
		
		// if action = 'view_product', pull and view individual product details
	} else if ($action == 'view_product') {
		$product_id = filter_input(INPUT_GET, 'product_id', 
				FILTER_VALIDATE_INT);   
		if ($product_id == NULL || $product_id == FALSE) {
			$error = 'Missing or incorrect product id.';
			include('../errors/error.php');
		} else {
			$categories = get_categories();
			$product = get_product($product_id);

			// Get product data
			$name = $product['product_name'];
			$list_price = $product['list_price'];
			$code = $product['product_code'];

			// Get image URL and alternate text
			$image_filename = 'images/' . $code . '.jpg';
			$image_alt = 'Image: ' . $code . '.jpg';

			include 'product_catalog/product_view.php';
		}
	}
	if ($action == 'add') {
			$product_key = filter_input(INPUT_POST, 'productkey');
			$cart_quantity = filter_input(INPUT_POST, 'quantity');
			$cost = filter_input(INPUT_POST, 'cost');
			include('cart/cart.php');
			add_item($product_key, $cart_quantity, $cost);
			header("Location: index.php");
	}
?>