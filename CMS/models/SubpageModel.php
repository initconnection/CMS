<?php

    class SubpageModel extends PageModel {

        protected static $table = "subpage";

        public static function insertPage($title, $content, $description, $keywords, $module, $parent) {
            $name = strtolower(str_replace(" ", "-", $title));
            $page = array("title" => $title, "name" => $name, "content" => $content, "description" => $description,
                "keywords" => $keywords, "module" => $module);
            $id = Database::insertElement(parent::$table, $page);

            $subpage = self::createSubpage($parent, $id);

            Database::insertElement(self::$table, $subpage);
        }

        public static function createSubpage($parent, $page) {
            $maxPosition = Database::selectMaxValue("subpage", "position", array("parent" => $parent));
            $subpage = array("parent" => $parent, "page" => $page, "position" => (++$maxPosition));
            return $subpage;
        }
    }
