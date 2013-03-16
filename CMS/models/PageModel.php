<?php

    class PageModel extends BaseModel {
        private static $table = "page";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }

        public static function selectAllByPosition() {
            return Database::selectAllElements(self::$table, "position");
        }

        public static function insert($title, $content, $description, $keywords,
                $module, $category) {
            $page = array("title" => $title, "content" => $content,
                "description" => $description, "keywords" => $keywords, 
                "module" => $module);
            $id = Database::insertElement(self::$table, $page);
            $conditions = array("category" => $category);
            $maxPosition = Database::selectMaxValue("category_page", "position", $conditions);
            $maxPosition++;
            $category_page = array("category" => $category, "page" => $id, "position" => $maxPosition);
            Database::insertElement("category_page", $category_page);
        }
        
        public static function update($id, $title, $content, $description, $keywords,
                $module, $category) {
            $page = array("title" => $title, "content" => $content,
                "description" => $description, "keywords" => $keywords, 
                "module" => $module);
            Database::updateElements(self::$table, $page, array("id" => $id));
            $category_page = Database::selectElements("category_page", array("page" => $id));
            if ($category_page["category"] != $category) {
                $maxPosition = Database::selectMaxValue("category_page", "position", array("category" => $category));
                $categoryPage = array("category" => $category, "position" => ($maxPosition++));
                Database::updateElements("category_page", array("page" => $id), $categoryPage);
            }
        }

        public static function select($id) {
            $conditions = array("id" => $id);
            $result = Database::selectElement(self::$table, $conditions);
            return $result;
        }
        
        public static function selectWithCategory($category) {
            $conditions = array("category" => $category);
            $pageTable = array("table" => "page", "key" => "id");
            $categoryPageTable = array("table" => "category_page", "key" => "page");
            $result = Database::selectElemetsWithJoin($pageTable, $categoryPageTable, $conditions, "position");
            return $result;
        }
        
        public static function selectCategory($id) {
            $categoryPage = Database::selectElement("category_page", array("page" => $id));
            return $categoryPage["category"];
        }

        public static function delete($id) {
            $conditions = array("id" => $id);
            $result = Database::deleteElements(self::$table, $conditions);
            return $result;
        }

        private static function move($id, $up = true) {
            
            $conditions = array("page" => $id);
            $page = Database::selectElement("category_page", $conditions);
            $position = $page["position"];

            $conditions = array("category" => $page["category"]);
            $pages = Database::selectElements("category_page", $conditions, "position");
            
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
    }
