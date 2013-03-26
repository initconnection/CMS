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

        public static function selectPagesWithCategory($category) {
            $pageTable = array("table" => "page", "key" => "id");
            $categoryPageTable = array("table" => "category_page", "key" => "page");
            $result = Database::selectElemetsWithJoin($pageTable, $categoryPageTable, array("category" => $category), "position");

            return $result;
        }

        public static function selectPageCategory($id) {
            $categoryPage = Database::selectElement("category_page", array("page" => $id));
            return $categoryPage["category"];
        }

        public static function selectPageHistory($id) {
            $order = array("by" => "date", "asc" => 0);
            $versions = Database::selectElements("page_history", array("id" => $id), $order);
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

        public static function insertPage($title, $content, $description, $keywords, $module, $category) {
            $page = array("title" => $title, "content" => $content, "description" => $description,
                "keywords" => $keywords, "module" => $module);
            $id = Database::insertElement(self::$table, $page);

            $pageCategory = self::createPageCategory($id, $category);
            Database::insertElement("category_page", $pageCategory);
        }

        public static function insertPageToHistory($id) {
            $page = self::selectPage($id);
            $page["category"] = self::selectPageCategory($id);
            $version = Database::selectMaxValue("page_history", "version", array("id" => $id));
            $version ? $page["version"] = ++$version : $page["version"] = 1;
            Database::insertElement("page_history", $page);
        }

        public static function updatePage($id, $title, $content, $description, $keywords, $module, $category) {
            self::insertPageToHistory($id);

            $page = array("title" => $title, "content" => $content, "description" => $description,
                    "keywords" => $keywords, "module" => $module);
            Database::updateElements(self::$table, $page, array("id" => $id));

            $oldPageCategory = Database::selectElement("category_page", array("page" => $id));
            //If page did not have a category and it was assigned one
            if (!$oldPageCategory && $category) {
                $newPageCategory = createPageCategory($page, $category);
                Database::insertElement("category_page", $newPageCategory);
            }
            //If page had a category and it was unassigned
            if (!$category && $oldPageCategory) {
                Database::deleteElements("category_page", array("page" => $id));
            }
            //If page was assigned a new category
            if (($category && $oldPageCategory) && ($category != $oldPageCategory)) {
                $newPageCategory = createPageCategory($page, $category);
                Database::updateElements("category_page", $newPageCategory, array("page" => $id));
            }
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

        private static function movePage($id, $up = true) {
            $page = Database::selectElement("category_page", array("page" => $id));
            $pages = Database::selectElements("category_page", array("category" => $page["category"]),
                    array("by" => "position", "asc" => 1));

            if($up) {
                $pageToSwap =  self::findPageAbove($pages, $page);
            } else {
                $pageToSwap =  self::findPageBellow($pages, $page);
            }

            Database::updateElements("category_page", array("position" => $pageToSwap["position"]),
                    array("page" => $page["page"]));
            Database::updateElements("category_page", array("position" => $page["position"]),
                    array("page" => $pageToSwap["page"]));
        }
        
        public static function movePageUp($id) {
            self::movePage($id, true);
        }
        
        public static function movePageDown($id) {
            self::movePage($id, false);
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
