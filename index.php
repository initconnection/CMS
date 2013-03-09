<?php

    require_once("core/config.php");
    require_once(ROOT_PATH . "core/loader.php");
    require_once(ROOT_PATH . "controllers/home.controller.php");
    
    session_start();

    $loader = new Loader($_GET);
    $controller = $loader->createController();
    
    if($controller) {
        $controller->executeAction();          
    }