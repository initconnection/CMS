<?php

class SubpageModel extends BasePageModel {

    protected static $table = "subpage";

    public static function insertSubpage($title, $content, $description, $keywords, $module, $parent) {
        $name = strtolower(str_replace(" ", "-", $title));
        $page = array("title" => $title, "name" => $name, "content" => $content, "description" => $description,
            "keywords" => $keywords, "module" => $module);
        $id = Database::insertElement(parent::$table, $page);

        $subpage = self::createSubpage($parent, $id);

        Database::insertElement(self::$table, $subpage);
    }

    public static function deleteSubpage($subpage, $parent) {
        $result = Database::deleteElements("subpage", array("parent" => $parent, "page" => $subpage));
        return $result;
    }

    public static function moveSubpageUp($subpage, $parent) {
        self::moveSubpage($subpage, $parent, true);
    }

    public static function moveSubpageDown($subpage, $parent) {
        self::moveSubpage($subpage, $parent, false);
    }

    private static function moveSubpage($subpageId, $parentId, $up = true) {
        $subpage = Database::selectElement("subpage", array("page" => $subpageId));
        $subpages = Database::selectElements("subpage", array("parent" => $parentId), null,
            array("by" => "position", "asc" => 1));

        if($up) {
            $pageToSwap =  self::findPageAbove($subpages, $subpage);
        } else {
            $pageToSwap =  self::findPageBellow($subpages, $subpage);
        }

        Database::updateElements("subpage", array("position" => $pageToSwap["position"]),
            array("page" => $subpage["page"], "parent" => $parentId));
        Database::updateElements("subpage", array("position" => $subpage["position"]),
            array("page" => $pageToSwap["page"], "parent" => $parentId));
    }

    private static function createSubpage($parent, $page) {
        $maxPosition = Database::selectMaxValue("subpage", "position", array("parent" => $parent));
        $subpage = array("parent" => $parent, "page" => $page, "position" => (++$maxPosition));
        return $subpage;
    }

}
