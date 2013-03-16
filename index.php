<?php

    require_once("core/config.php");
    require_once(SITE_PATH . "core/loader.php");
    
    session_start();

    $loader = new Loader($_GET);
    $controller = $loader->createController();
    
    if($controller) {
        $controller->executeAction();          
    }
