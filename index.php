<?php
	require_once("core/config.php");
	require_file("models/user.model.php");
	
	$user = new UserModel("user");
	
	$user_data = array("username" => "Krutas", "password" => "2412412");
	
	if ($user->insert($user_data)) {
		echo "Success!";
	} else {
		echo "Failure!";
	}
?>