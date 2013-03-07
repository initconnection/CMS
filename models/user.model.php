<?php

    require_once(ROOT_PATH . "models/base.model.php");

    class UserModel extends BaseModel {
        private static $table = "user";

        public static function insert($data) {
                return Database::insertElement(self::$table, $data);
        }

        public static function selectAll() {
                return Database::selectAllElements(self::$table);
        }
    }
?>
