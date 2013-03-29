<?php

    define("APP_NAME", "/CMS/CMS/");
    define("CMS_PATH", $_SERVER["DOCUMENT_ROOT"] . APP_NAME);
    define("ABSOLUTE_PATH", "http://" . $_SERVER["SERVER_NAME"] . APP_NAME);

    require_once(CMS_PATH . "database/Database.php");
    require_once(CMS_PATH . "core/helpers.php");
    require_once("localization.php");

    function autoLoader($class) {
        $matches = array();
        preg_match("/[A-Z][a-z]+$/", $class, $matches);
        $directory = strtolower($matches[0]) . "s";
        $filePath = CMS_PATH . "/" . $directory . "/" . $class . ".php";
        if (file_exists($filePath)) {
            require_once($filePath);
            return true;
        }
        trigger_error("class not found: " . $class);
        return false;
    }
    
    spl_autoload_register("autoLoader");
