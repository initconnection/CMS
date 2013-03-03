<?php
	require_once("core/config.php");
	require_once(ROOT_PATH . "controllers/user.controller.php");
	require_once(ROOT_PATH . "controllers/home.controller.php");
	require_once(ROOT_PATH . "core/loader.php");
		
	$loader = new Loader($_GET);
	$controller = $loader->createController();
	$controller->executeAction();
	
?>