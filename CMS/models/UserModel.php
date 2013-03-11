<?php

    class UserModel extends BaseModel {
        private static $table = "user";

        public static function insert($data) {
                return Database::insertElement(self::$table, $data);
        }

        public static function selectAll() {
                return Database::selectAllElements(self::$table);
        }

        public static function select($conditions) {
            return Database::selectElements(self::$table, $conditions);
        }
        
        public static function checkLogin($username, $password) {
             $credentials = array("username" => $username, "password" => $password);
             $user = self::select($credentials);
             if ($user) {
                 return true;
             }
        }
    }