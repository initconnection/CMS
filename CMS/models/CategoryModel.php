<?php

    class CategoryModel extends BaseModel {
        private static $table = "category";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }
        
        public static function insert($title) {
            $name = strtolower(str_replace(" ", "-", $title));
            
            $category = array("title" => $title, "name" => $name);
            return Database::insertElement(self::$table, $category);
        }
        
        public static function selectPages() {
            $categories = Database::selectAllElements(self::$table);
            for ($i = 0; $i < count($categories); $i++) {
                $categories[$i]["pages"] = PageModel::selectWithCategory($categories[$i]["id"]);
            }
            return $categories;
        }
    }
