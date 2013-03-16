<?php

    define("APP_NAME", "/CMS/");
    define("SITE_PATH", $_SERVER["DOCUMENT_ROOT"] . APP_NAME);
    define("CMS_PATH", $_SERVER["DOCUMENT_ROOT"] . APP_NAME . "CMS/");
    define("ABSOLUTE_PATH", "http://" . $_SERVER["SERVER_NAME"] . APP_NAME);

    require_once(SITE_PATH . "CMS/database/database.class.php");
    require_once(SITE_PATH . "core/helpers.php");

    function autoLoader($class) {
        $matches = array();
        preg_match("/[A-Z][a-z]+$/", $class, $matches);
        $directory = strtolower($matches[0]) . "s";
        if($directory == "models") {
            $directory = "CMS/" . $directory;
        }
        $filePath = SITE_PATH . "/" . $directory . "/" . $class . ".php";
        if (file_exists($filePath)) {
            require_once($filePath);
            return true;
        }
        trigger_error("class not found");
        return false;
    }
    
    spl_autoload_register("autoLoader");