<?php

    class PageModel extends BaseModel {
        private static $table = "page";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }

        public static function insertPage($title, $content, $description, $keywords, 
                $module, $category) {
            $page = array("title" => $title, "content" => $content,
                "description" => $description, "keywords" => $keywords, 
                "module" => $module, "category" => $category);
            return Database::insertElement(self::$table, $page);
        }

        public static function selectPage($id) {
            $conditions = array("id" => $id);
            $result = Database::selectElements(self::$table, $conditions);
            return $result[0];
        }
        
        public static function selectPagesByCategory($category) {
            $conditions = array("category" => $category);
            $result = Database::selectElements(self::$table, $conditions);
            return $result;
        }

    }
