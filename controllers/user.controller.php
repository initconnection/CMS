<?php

    //require_once("core/config.php");
    require_once(ROOT_PATH . "controllers/base.controller.php");	
    require_once(ROOT_PATH . "models/user.model.php");

    class UserController extends BaseController {

        public function showAll() {
            $view = new BaseView();
            $view->title = "Users";
            $view->users = UserModel::selectAll();
            $view->render("user/users.php");
        }
    }

?>
