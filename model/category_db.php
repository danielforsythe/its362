<?php
	// pull the list of categories from the database
	function get_categories() {
		global $db;
		
		$query = 'SELECT * FROM categories';
		$stmt = $db->prepare($query);
		$stmt->execute();
		$categories = $stmt->fetchAll();
		$stmt->closeCursor();
		return $categories;
	}
	// get each category name from the database
	function get_category_name($category_id) {
		global $db;
		
		$query = 'SELECT * FROM categories WHERE category_id = :category_id';
		$stmt = $db->prepare($query);
		$stmt->bindValue(':category_id', $category_id);
		$stmt->execute();
		$category = $stmt->fetch();
		$stmt->closeCursor();
		$category_name = $category['category_name'];
		return $category_name;
	}
?>