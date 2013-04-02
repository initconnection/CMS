<?php

class BasePageModel extends BaseModel {

    protected static $table = "page";

    public static function selectPage($id) {
        $result = Database::selectElement(self::$table, array("id" => $id));
        return $result;
    }

    public static function selectAllPages() {
        return Database::selectAllElements(self::$table);
    }

    public static function selectAllPagesByPosition() {
        return Database::selectAllElements(self::$table, "position");
    }

    public static function selectPageWithName($name) {
        $result = Database::selectElement(self::$table, array("name" => $name));
        return $result;
    }

    public static function selectSubpages($pageId) {
        $pageTable = array("table" => "page", "key" => "id");
        $subpageTable = array("table" => "subpage", "key" => "page");
        $subpages = Database::selectElemetsWithJoin($pageTable, $subpageTable, array("parent" => $pageId), "position");
        $subpagesArray = array();
        foreach ($subpages as $subpage) {
            $subpage["subpages"] = self::selectSubpages($subpage["id"]);
            $subpagesArray[] = $subpage;
        }

        return $subpagesArray;
    }

    public static function selectSubpageWithName($parentId, $subpageName) {
        $pageTable = array("table" => "page", "key" => "id");
        $subpageTable = array("table" => "subpage", "key" => "page");
        $subpages = Database::selectElemetsWithJoin($pageTable, $subpageTable, array("parent" => $parentId, "name" => $subpageName), "position");
        return $subpages[0];
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

    public static function selectPageFromUrl(array $url) {
        $page = null;
        if (!empty($url)) {
            $page = self::selectPageWithName($url[0]);
            for ($i = 1; $i < count($url); $i++) {
                $page = self::selectSubpageWithName($page["id"], $url[$i]);
            }
        }
        return $page;
    }

    public static function insertPageToHistory($id) {
        $page = self::selectPage($id);
        $version = Database::selectMaxValue("page_history", "version", array("id" => $id));
        $version ? $page["version"] = ++$version : $page["version"] = 1;
        Database::insertElement("page_history", $page);
    }

    public static function deletePage($id) {
        $result = Database::deleteElements(self::$table, array("id" => $id));
        return $result;
    }

    protected static function findPageAbove(array $pages, $thisPage) {
        $pageAbove = $pages[0];
        foreach ($pages as $page) {
            if ($page["position"] < $thisPage["position"]) {
                $pageAbove = $page;
            }
        }
        return $pageAbove;
    }

    protected static function findPageBellow(array $pages, $thisPage) {
        foreach ($pages as $page) {
            if ($page["position"] > $thisPage["position"]) {
                return $page;
            }
        }
        return $thisPage;
    }

    public static function selectAllModules() {
        return Database::selectAllElements("module");
    }

    public static function selectModule($moduleId) {
        return Database::selectElement("module", array("id" => $moduleId));
    }

    public static function selectModuleName($moduleId) {
        $module = self::selectModule($moduleId);
        return $module["name"];
    }
    
    public static function selectModuleId($moduleName) {
        $module = Database::selectElement("module", array("name" => $moduleName));
        return $module["id"];
    }
    
    public static function selectAllModulePages($moduleId) {
        return Database::selectElements(self::$table, array("module" => $moduleId));
    }
}