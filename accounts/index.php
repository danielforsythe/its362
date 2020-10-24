<?php
	// start session management and include necessary functions
if(!isset($_SESSION))
{
	session_start();
}
	require_once('../model/database.php');
	require_once('../model/users_db.php');

	// get the action to perform
	$action = filter_input(INPUT_POST, 'action');
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL) {
			$action = 'show_user_login';
		}
	}
	
	// if the user isn't logged in, force the user to login
	if(!isset($_SESSION['is_valid_user'])) {
		$action = 'login';
	}

	// perform the specified action
	switch($action) {
		case 'login':
			$username = filter_input(INPUT_POST, 'username');
			$password = filter_input(INPUT_POST, 'password');
			if(is_valid_user_login($username, $password)) {
				$_SESSION['is_valid_user'] = true;
				header('Location: user_menu.php');
				$_SESSION['logged_in'] = $username;
			} else {
				$login_message = 'You must be logged in to view this page.';
				include('login.php');
			}
			break;
		case 'show_user_login':
			include('user_menu.php');
			break;
		case 'logout':
			$_SESSION = array(); // clear all session data from memory
			session_destroy(); // clean up the session ID
			$login_message = 'You have been logged out';
			include('login.php');
			break;
	}
?>