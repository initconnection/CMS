<?php
	define("APP_NAME", "CMS");
	define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . "/" . APP_NAME . "/");
        
     	require_once(ROOT_PATH . "database/database.class.php");
        require_once(ROOT_PATH . "controllers/base.controller.php");
        
        $baseController = new BaseController();
              
        if(!(isset($_COOKIE["initConnection"]))) {
            //$baseController->makeRedirect($_SERVER['SERVER_ADDR'] . "/CMS/public/log.php");
        }
?>
