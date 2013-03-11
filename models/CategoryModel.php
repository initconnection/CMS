<?php

    class CategoryModel extends BaseModel {
        private static $table = "category";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }

        public static function insertCategory($title) {
            $category = array("title" => $title);
            return Database::insertElement(self::$table, $category);
        }
        
        public static function selectMenu() {
            $categoriesTemp = Database::selectAllElements(self::$table);
            $categories = array();
            foreach ($categoriesTemp as $category) {
                $name = $category["name"];
                $categories[$name] = PageModel::selectPagesByCategory($category["id"]);
            }
            
            return $categories;
        }
    }
