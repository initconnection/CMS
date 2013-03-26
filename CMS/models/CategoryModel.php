<?php

    class CategoryModel extends BaseModel {
        private static $table = "category";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }
        
        public static function selectAllCategories() {
            $category[] = array("id" => 0, "title" => _("No category"), "name" => "none");
            $categories = array_merge($category, self::selectAll());
            return $categories;
        }

        public static function insert($title) {
            $name = strtolower(str_replace(" ", "-", $title));
            
            $category = array("title" => $title, "name" => $name);
            return Database::insertElement(self::$table, $category);
        }
        
        public static function selectCategoriesAndPages() {
            $categories = self::selectAll();
            $categoriesArray = array();
            for ($i = 0; $i < count($categories); $i++) {
                $name = $categories[$i]["name"];
                $categoriesArray[$name] = $categories[$i];
                $pages = PageModel::selectWithCategory($categories[$i]["id"]);
                $categoriesArray[$name]["pages"] = $pages;
            }
            return $categoriesArray;
        }
        
        public static function delete($id) {
            $result = Database::deleteElements(self::$table, array("id" => $id));
            return $result;
        }
    }
