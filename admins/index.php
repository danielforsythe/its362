<?php
	// start session management and include necessary functions
if(!isset($_SESSION))
{
	session_start();
}
	require_once('../model/database.php');
	require_once('../model/users_db.php');

	// get the action to perform, if NULL then auto "show_admin_menu"
	$action = filter_input(INPUT_POST, 'action');
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL) {
			$action = 'show_admin_menu';
		}
	}
	
	// if the user isn't logged in, force the user to login
	if(!isset($_SESSION['is_valid_admin'])) {
		$action = 'login';
	}

	// perform the specified action
	switch($action) {
		case 'login':
			// if user fills out login form, check for validity from database
			$username = filter_input(INPUT_POST, 'username');
			$password = filter_input(INPUT_POST, 'password');
			if(is_valid_admin_login($username, $password)) {
				$_SESSION['is_valid_admin'] = true;
				$_SESSION['is_valid_user'] = true;
				$_SESSION['logged_user'] = $username;
				include('admin_menu.php');
			} else {
				$login_message = 'You must be logged in to view this page.';
				include('login.php');
			}
			break;
			// if admin is logged in, allow admin_menu.php access
		case 'show_admin_menu':
			include('admin_menu.php');
			break;
		case 'logout':
			$_SESSION = array(); // clear all session data from memory
			session_destroy(); // clean up the session ID
			$login_message = 'You have been logged out';
			include('login.php');
			break;
	}
?>