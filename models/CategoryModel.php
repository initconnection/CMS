<?php

    class CategoryModel extends BaseModel {
        private static $table = "category";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }

        public static function insert($title) {
            $category = array("title" => $title);
            return Database::insertElement(self::$table, $category);
        }
        
        public static function selectMenu() {
            $categoriesTemp = Database::selectAllElements(self::$table);
            $categories = array();
            foreach ($categoriesTemp as $category) {
                $name = $category["name"];
                $categories[$name] = PageModel::selectByCategory($category["id"]);
            }
            
            return $categories;
        }
    }
