<?php

    define("APP_NAME", "/CMS/");
    define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . APP_NAME);
    define("ABSOLUTE_PATH", "http://" . $_SERVER["SERVER_NAME"] . APP_NAME);

    require_once(ROOT_PATH . "CMS/database/database.class.php");
    require_once(ROOT_PATH . "core/helpers.php");

    function autoLoader($class) {
        $matches = array();
        preg_match("/[A-Z][a-z]+$/", $class, $matches);
        $directory = strtolower($matches[0]) . "s";
        if($directory == "models") {
            $directory = "CMS/" . $directory;
        }
        $filePath = ROOT_PATH . "/" . $directory . "/" . $class . ".php";
        if (file_exists($filePath)) {
            require_once($filePath);
            return true;
        }
        trigger_error("class not found");
        return false;
    }
    
    spl_autoload_register("autoLoader");