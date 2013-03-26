<?php

    class CategoryModel extends BaseModel {

        private static $table = "category";

        public static function selectAllCategories() {
            return Database::selectAllElements(self::$table);
        }
<<<<<<< HEAD
        
        public static function selectAllCategories() {
=======

        public static function selectAllCategoriesAndNone() {
>>>>>>> 950c771eef86913b324bd8e429d807c9e32a5bd3
            $category[] = array("id" => 0, "title" => _("No category"), "name" => "none");
            $categories = array_merge($category, self::selectAllCategories());
            return $categories;
        }

        public static function selectCategoriesAndPages() {
            $categories = self::selectAllCategories();
            $categoriesWithName = array();
            foreach ($categories as $category) {
                $name = $category["name"];
                $categoriesWithName[$name] = $category;
                $pages = PageModel::selectPagesWithCategory($category["id"]);
                $categoriesWithName[$name]["pages"] = $pages;
            }
            return $categoriesWithName;
        }

        public static function insertCategory($title) {
            $name = strtolower(str_replace(" ", "-", $title));
            $category = array("title" => $title, "name" => $name);
            return Database::insertElement(self::$table, $category);
        }

        public static function deleteCategory($id) {
            $result = Database::deleteElements(self::$table, array("id" => $id));
            return $result;
        }

    }
