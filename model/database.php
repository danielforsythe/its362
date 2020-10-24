<?php
	// connect to the database, using localhost root account, no password
	$dsn = 'mysql:host=localhost;dbname=its362';
	$db_user = 'root';
	$db_pass = '';
	// PDO connection
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	try {
		$db = new PDO($dsn, $db_user, $db_pass, $options);
	} catch (PDOException $e) {
		$error = $e->getMessage();
		echo $error;
		exit();
	}
?>