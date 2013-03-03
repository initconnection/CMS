<?php
	require_once("core/config.php");
	require_file("controllers/user.controller.php");
	
	$controller = new UserController();
	$controller->showAllUsers();
	
?>