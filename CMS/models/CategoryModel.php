<?php

    class CategoryModel extends BaseModel {

        private static $table = "category";

        public static function selectAllCategories() {
            return Database::selectAllElements(self::$table);
        }

        public static function selectAllCategoriesAndNone() {
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
                $pages = PageModel::selectPagesFromCategory($category["id"]);
                $categoriesWithName[$name]["pages"] = $pages;
            }
            return $categoriesWithName;
        }

        public static function selectPagesWithoutCategory() {
            $pageTable = array("table" => "page", "key" => "id");
            $tableRight = array();
            $tableRight[] = array("table" => "category_page", "key" => "page");
            $tableRight[] = array("table" => "subpage", "key" => "page");
            $conditions = array("subpage.page" => "IS NULL", "category_page.page" => "IS NULL");

            //PATAISYTI!!

            $result = Database::selectElementsWithLeftJoin($pageTable, $tableRight, $conditions);
            return $result;
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
