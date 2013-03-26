<?php

    class UserModel extends BaseModel {

        private static $table = "user";

        public static function insertUser($data) {
            return Database::insertElement(self::$table, $data);
        }

        public static function selectAllUsers() {
            return Database::selectAllElements(self::$table);
        }

        public static function selectUser($conditions) {
            return Database::selectElements(self::$table, $conditions);
        }
        
        public static function checkLogin($username, $password) {
             $credentials = array("username" => $username, "password" => $password);
             $user = self::selectUser($credentials);
             if ($user) {
                 return true;
             }
        }

    }