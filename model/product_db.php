<?php
	// pull the products by category from the database
	function get_products_by_category($category_id) {
		global $db;
		$query = 'SELECT * FROM products WHERE products.category_id = :category_id';
		$stmt = $db->prepare($query);
		$stmt->bindValue(":category_id", $category_id);
		$stmt->execute();
		$products = $stmt->fetchAll();
		$stmt->closeCursor();
		return $products;
	}
	// get the list of products from the database
	function get_product($product_id) {
		global $db;
		$query = 'SELECT * FROM products WHERE product_id = :product_id';
		$stmt = $db->prepare($query);
		$stmt->bindValue(":product_id", $product_id);
		$stmt->execute();
		$product = $stmt->fetch();
		$stmt->closeCursor();
		return $product;
	}
	// count the products from the database
	function count_product($category_id) {
		global $db;
		$query = 'SELECT COUNT(*) FROM products WHERE products.category_id = :category_id';
		$stmt = $db->prepare($query);
		$stmt->bindValue(":category_id", $category_id);
		$stmt->execute();
		$prod_count = $stmt->fetch();
		$stmt->closeCursor();
		return $prod_count;
	}
?>