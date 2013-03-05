<?php

    define("APP_NAME", "/CMS/");
    define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . APP_NAME);

    require_once(ROOT_PATH . "database/database.class.php");
    require_once(ROOT_PATH . "controllers/base.controller.php");

    if(!(isset($_COOKIE["initConnection"]))) {
        //BaseController::makeRedirect($_SERVER['SERVER_NAME'] . APP_NAME . "public/log.php");
    }
?>
