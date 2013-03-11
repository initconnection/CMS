<?php

    class UserController extends BaseController {

        public function showAll() {
            $this->title = "Users";
            $this->users = UserModel::selectAll();
            $this->render("user/users.php");
        }
    }