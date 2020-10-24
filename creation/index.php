<?php
	// start session management and include necessary functions
if(!isset($_SESSION))
{
	session_start();
}
	require_once('../model/database.php');
	require_once('../model/users_db.php');

	// get the action to perform, if NULL default to 'new_user'
	$action = filter_input(INPUT_POST, 'action');
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL) {
			$action = 'new_user';
		}
	}
	
	// if the user is logged in, don't allow account creation
	if(isset($_SESSION['is_valid_user'])) {
		$action = 'logged_in';
	}

	// perform the specified action
	switch($action) {
		// new_user redirects to account creation
		case 'new_user':
			include('create_account.php');
			break;
		case 'create':
			// if account is created, filter input and insert into database
			$username = filter_input(INPUT_POST, 'username');
			$password = filter_input(INPUT_POST, 'password');
			if(is_valid_user_login($username, $password)) {
				$_SESSION['is_valid_user'] = true;
			} else {
				create_user($username, $password);
				header('Location: ../accounts/index.php');
			}
			break;
			// if user is logged in redirect to homepage
		case 'logged_in':
			include('../index.php');
			break;
		case 'logout':
			$_SESSION = array(); // clear all session data from memory
			session_destroy(); // clean up the session ID
			$login_message = 'You have been logged out';
			include('../index.php');
			break;
	}
?>