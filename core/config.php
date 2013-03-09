<?php

    define("APP_NAME", "/CMS/");
    define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . APP_NAME);
    define("ABSOLUTE_PATH", "http://" . $_SERVER["SERVER_NAME"] . APP_NAME);

    require_once(ROOT_PATH . "CMS/database/database.class.php");
    require_once(ROOT_PATH . "controllers/base.controller.php");
    require_once(ROOT_PATH . "core/helpers.php");
