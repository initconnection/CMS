<?php

    require_once("core/config.php");
    require_once(CMS_PATH . "core/loader.php");
    
    session_start();

    $loader = new Loader($_GET);
    $controller = $loader->createController();
    
    if($controller) {
        if(isAuthorized() || $controller->checkAction("login")) {
            $controller->executeAction();  
        } else {
            redirect("main/login");
        }       
    }
