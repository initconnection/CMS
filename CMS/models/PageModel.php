<?php

    class PageModel extends BaseModel {

        private static $table = "page";

        public static function selectAllPages() {
            return Database::selectAllElements(self::$table);
        }

        public static function selectAllPagesByPosition() {
            return Database::selectAllElements(self::$table, "position");
        }

        public static function selectPage($id) {
            $result = Database::selectElement(self::$table, array("id" => $id));
            return $result;
        }

        public static function selectPageByName($name) {
            $result = Database::selectElement(self::$table, array("name" => $name));
            return $result;
        }

        public static function selectPagesWithCategory($category) {
            $pageTable = array("table" => "page", "key" => "id");
            $categoryPageTable = array("table" => "category_page", "key" => "page");
            $result = Database::selectElemetsWithJoin($pageTable, $categoryPageTable, array("category" => $category), "position");

            return $result;
        }

        public static function selectPageCategories($id) {
            $tempCategoryPages = Database::selectElements("category_page", array("page" => $id), array("category" => "category"));
            $categoryPages = array();
            foreach ($tempCategoryPages as $category) {
                $categoryPages[] = $category["category"];
            }
            return $categoryPages;
        }

        public static function selectPageHistory($id) {
            $order = array("by" => "date", "asc" => 0);
            $versions = Database::selectElements("page_history", array("id" => $id), null, $order);
            return $versions;
        }

        public static function selectPageVersion($id, $version) {
            $result = Database::selectElement("page_history", array("id" => $id, "version" => $version));
            return $result;
        }

        public static function selectPagesWithoutCategory() {
            $pageTable = array("table" => "page", "key" => "id");
            $categoryPageTable = array("table" => "category_page", "key" => "page");
            $result = Database::selectElementsWithLeftJoin($pageTable, $categoryPageTable);
            return $result;
        }

        public static function insertPage($title, $content, $description, $keywords, $module, $categories) {
            $name = strtolower(str_replace(" ", "-", $title));
            $page = array("title" => $title, "name" => $name, "content" => $content, "description" => $description,
                "keywords" => $keywords, "module" => $module);
            $id = Database::insertElement(self::$table, $page);

            foreach ($categories as $category) {
                $pageCategory = self::createPageCategory($id, $category);
                Database::insertElement("category_page", $pageCategory);
            }
        }

        public static function insertPageToHistory($id) {
            $page = self::selectPage($id);
            $version = Database::selectMaxValue("page_history", "version", array("id" => $id));
            $version ? $page["version"] = ++$version : $page["version"] = 1;
            Database::insertElement("page_history", $page);
        }

        public static function updatePage($id, $title, $content, $description, $keywords, $module, array $categories) {
            self::insertPageToHistory($id);

            $name = strtolower(str_replace(" ", "-", $title));
            $page = array("title" => $title, "name" => $name, "content" => $content, "description" => $description,
                    "keywords" => $keywords, "module" => $module);
            Database::updateElements(self::$table, $page, array("id" => $id));

            $oldPageCategories = self::selectPageCategories($id);

            for($i = 0; $i < count($oldPageCategories); $i++) {
                if($categories[$i] == 0) {
                    Database::deleteElements("category_page", array("page" => $id, "category" => $oldPageCategories[$i]));
                } else if($categories[$i] != $oldPageCategories[$i]) {
                    $newPageCategory = self::createPageCategory($id, $categories[$i]);
                    Database::updateElements("category_page", $newPageCategory, array("page" => $id, "category" => $oldPageCategories[$i]));
                }
            }

            for($i = count($oldPageCategories); $i < count($categories); $i++) {
                $newPageCategory = self::createPageCategory($id, $categories[$i]);
                Database::insertElement("category_page", $newPageCategory);
            }
        }

        public static function deletePageFromCategory($category, $page) {
            $result = Database::deleteElements("category_page", array("page" => $page, "category" => $category));
            return $result;
        }

        public static function deletePage($id) {
            $result = Database::deleteElements(self::$table, array("id" => $id));
            return $result;
        }

        public static function createPageCategory($page, $category) {
            $maxPosition = Database::selectMaxValue("category_page", "position", array("category" => $category));
            $pageCategory = array("category" => $category, "page" => $page, "position" => (++$maxPosition));
            return $pageCategory;
        }

        private static function movePage($id, $category, $up = true) {
            $page = Database::selectElement("category_page", array("page" => $id));
            $pages = Database::selectElements("category_page", array("category" => $page["category"]), null,
                    array("by" => "position", "asc" => 1));

            if($up) {
                $pageToSwap =  self::findPageAbove($pages, $page);
            } else {
                $pageToSwap =  self::findPageBellow($pages, $page);
            }

            Database::updateElements("category_page", array("position" => $pageToSwap["position"]),
                    array("page" => $page["page"], "category" => $category));
            Database::updateElements("category_page", array("position" => $page["position"]),
                    array("page" => $pageToSwap["page"], "category" => $category));
        }
        
        public static function movePageUp($page, $category) {
            self::movePage($page, $category, true);
        }
        
        public static function movePageDown($page, $category) {
            self::movePage($page, $category, false);
        }
        
        private static function findPageAbove(array $pages, $thisPage) {
            $pageAbove = $pages[0];
            foreach ($pages as $page) {
                if ($page["position"] < $thisPage["position"]) {
                    $pageAbove = $page;
                }
            }
            return $pageAbove;
        }
        
        private static function findPageBellow(array $pages, $thisPage) {
            foreach ($pages as $page) {
                if ($page["position"] > $thisPage["position"]) {
                    return $page;
                }
            }
            return $thisPage;
        }

    }
