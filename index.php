<?php

    require_once("core/config.php");
    
    session_start();

    $controller = new PageController("show", $_GET);
    $controller->executeAction();
