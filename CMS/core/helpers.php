<?php

    function authorize($username, $password) {
        if(UserModel::checkLogin($username, $password)) {
            $_SESSION["logged_in"] = true;
            return true;
        }
    }
    
    function isAuthorized() {
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
            return true;
        }
        else {
            return false;
        }
    }

    function redirect($location) {
         header("Location: " .  ABSOLUTE_PATH . $location);
    }

    function titleToName($title) {
         return strtolower(str_replace(" ", "-", trim($title)));
    }