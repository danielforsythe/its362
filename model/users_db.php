<?php
	// check to see if user login is an admin or not
	function is_valid_admin_login($username, $password) {
		global $db;
		$query = 'SELECT password FROM admins WHERE username = :username';
		$statement = $db->prepare($query);
		$statement->bindValue(':username', $username);
		$statement->execute();
		$row = $statement->fetch();
		$statement->closeCursor();
		$hash = $row['password'];
		// verify the hashed password with the entered password
		return password_verify($password, $hash);
	}
	// check to see if the user login is a registered user or not
	function is_valid_user_login($username, $password) {
			global $db;
			$query = 'SELECT password FROM users WHERE username = :username';
			$statement = $db->prepare($query);
			$statement->bindValue(':username', $username);
			$statement->execute();
			$row = $statement->fetch();
			$statement->closeCursor();
			$hash = $row['password'];
			// verify the hashed password with the entered password
			return password_verify($password, $hash);
		}
	// pull and get the unique username from the database
	function get_username($username) {
		global $db;
		$query = 'SELECT username FROM users WHERE username = :username';
		$stmt = $db->prepare($query);
		$stmt->bindValue(':username', $username);
		$stmt->execute();
		$user = $stmt->fetch();
		$stmt->closeCursor();
		return $user;
	}
	// create and upload the created user into the database
	function create_user($username, $password) {
		global $db;
		// hash the password before upload
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$query = 'INSERT INTO users (username, password) VALUES (:username, :hash)';
		$stmt = $db->prepare($query);
		$stmt->bindValue(':username', $username);
		$stmt->bindValue(':hash', $hash);
		$stmt->execute();
	}
?>