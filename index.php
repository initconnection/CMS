<?php
	require_once("core/config.php");
	require_once(ROOT_PATH . "controllers/user.controller.php");
	
	$controller = new UserController();
	$controller->showAllUsers();
	
?>