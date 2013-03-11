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
                "module" => $module, "category" => $category);
            return Database::insertElement(self::$table, $page);
        }

        public static function select($id) {
            $conditions = array("id" => $id);
            $result = Database::selectElement(self::$table, $conditions);
            return $result;
        }
        
        public static function selectWithCategory($category) {
            $conditions = array("category" => $category);
            $result = Database::selectElements(self::$table, $conditions, "position");
            return $result;
        }

        public static function delete($id) {
            $conditions = array("id" => $id);
            $result = Database::deleteElements(self::$table, $conditions);
            return $result;
        }

        public static function moveUp($id) {
            $conditions = array("id" => $id);
            $page = Database::selectElement(self::$table, $conditions);

            $pages = PageModel::selectAllByPosition();
            $pageInFront =  self::findPageInFront($pages, $page["position"]);

            //Update page's position to the position of the page in front
            $conditions = array("id" => $page["id"]);
            $data = array("position" => $pageInFront["position"]);
            Database::updateElements(self::$table, $conditions, $data);

            //Update page's position to the position of the page in front
            $conditions = array("id" => $pageInFront["id"]);
            $data = array("position" => $page["position"]);
            Database::updateElements(self::$table, $conditions, $data);

            return true;
        }

        private static function findPageInFront(array $pages, $position) {
            $pageInFront = $pages[0];
            foreach ($pages as $page) {
                if ($page["position"] < $position) {
                    $pageInFront = $page;
                }
                else {
                    return $pageInFront;
                }
            }
        }

        /*
       public static function modeDown($id) {
           $conditions = array("id" => $id);
           $page = Database::selectElement(self::$table, $conditions);

           $pages = PageModel::selectAllByPosition();
           $pageInFront =  self::findPageAfter($pages, $page["position"]);

           //Update page's position to the position of the page in front
           $conditions = array("id" => $page["id"]);
           $data = array("position" => $pageInFront["position"]);
           Database::updateElements(self::$table, $conditions, $data);

           //Update page's position to the position of the page in front
           $conditions = array("id" => $pageInFront["id"]);
           $data = array("position" => $page["position"]);
           Database::updateElements(self::$table, $conditions, $data);

           return true;
       } */


    }
