<?php

    class PageModel extends BaseModel {
        private static $table = "page";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }

        public static function selectAllByPosition() {
            return Database::selectAllElements(self::$table, "position");
        }

        public static function insert($title, $content, $description, $keywords, $module, $category) {

            $page = array("title" => $title, "content" => $content,
                "description" => $description, "keywords" => $keywords, 
                "module" => $module);
            $id = Database::insertElement(self::$table, $page);

            $maxPosition = Database::selectMaxValue("category_page", "position", array("category" => $category));
            $categoryPage = array("category" => $category, "page" => $id, "position" => (++$maxPosition));
            Database::insertElement("category_page", $categoryPage);
        }

        public static function copyPageToHistory($id) {

            $page = self::selectPage($id);
            $page["category"] = self::selectCategory($id);
            $version = Database::selectMaxValue("page_history", "version", array("id" => $id));
            $version ? $page["version"] = ++$version : $page["version"] = 1;
            Database::insertElement("page_history", $page);
        }
        
        public static function update($id, $title, $content, $description, $keywords, $module, $category) {

            self::copyPageToHistory($id);

            $page = array("title" => $title, "content" => $content, "description" => $description,
                    "keywords" => $keywords, "module" => $module);
            Database::updateElements(self::$table, array("id" => $id), $page);

            if ($category) {
                $categoryPage = Database::selectElement("category_page", array("page" => $id));
                if ($categoryPage["category"] != $category) {
                    $maxPosition = Database::selectMaxValue("category_page", "position", array("category" => $category));
                    $newCategoryPage = array("category" => $category, "page" => $id, "position" => (++$maxPosition));
                    if ($categoryPage) {
                        Database::updateElements("category_page", array("page" => $id), $newCategoryPage);
                    } else {
                        Database::insertElement("category_page", $newCategoryPage);
                    }
                } 
            } else {
                Database::deleteElements("category_page", array("page" => $id));
            }
        }

        public static function selectPage($id) {
            $result = Database::selectElement(self::$table, array("id" => $id));
            return $result;
        }
        
        public static function selectWithCategory($category) {
            $pageTable = array("table" => "page", "key" => "id");
            $categoryPageTable = array("table" => "category_page", "key" => "page");
            $result = Database::selectElemetsWithJoin($pageTable, $categoryPageTable, array("category" => $category), "position");

            return $result;
        }
        
        public static function selectCategory($id) {
            $categoryPage = Database::selectElement("category_page", array("page" => $id));
            return $categoryPage["category"];
        }

        public static function delete($id) {
            $result = Database::deleteElements(self::$table, array("id" => $id));
            return $result;
        }

        private static function move($id, $up = true) {
            
            $conditions = array("page" => $id);
            $page = Database::selectElement("category_page", $conditions);
            $position = $page["position"];

            $conditions = array("category" => $page["category"]);
            $pages = Database::selectElements("category_page", $conditions, array("by" => "position", "asc" => 1));
            
            if($up) {
                $pageToSwap =  self::findPageAbove($pages, $page);
            } else {
                $pageToSwap =  self::findPageBellow($pages, $page);
            }
                            
            //Update page's position to the position of the page in front
            $conditions = array("page" => $page["page"]);
            $data = array("position" => $pageToSwap["position"]);
            Database::updateElements("category_page", $conditions, $data);

            //Update page's position to the position of the page in front
            $conditions = array("page" => $pageToSwap["page"]);
            $data = array("position" => $page["position"]);
            Database::updateElements("category_page", $conditions, $data);
        }
        
        public static function moveUp($id) {
            self::move($id, true);
        }
        
        public static function moveDown($id) {
            self::move($id, false);
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
    }
