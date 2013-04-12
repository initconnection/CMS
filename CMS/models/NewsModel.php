<?php

class NewsModel extends BaseModel {

    protected static $table = "news";
    protected static $moduleName = "news";

    public static function selectAllNews() {
        return Database::selectAllElements(self::$table);
    }

    public static function selectPages($newsId) {
        $tempPageNews = Database::selectElements("page_news", array("news" => $newsId));
        
        $newsPages = array();
        foreach ($tempPageNews as $page) {
            $newsPages[] = $page["page"];
        }
        return $newsPages;
    }
    
    public static function insertNews($heading, $content, array $pages = null) {
        $name = titleToName($heading);
        $newsId = Database::insertElement(self::$table, array("heading" => $heading,
            "content" => $content, "name" => $name));
        if($pages) {
            foreach (array_keys($pages) as $pageId) {
                Database::insertElement("page_news", array("news" => $newsId, "page" => $pageId));
            }
        }
    }

    public static function updateNews($id, $heading, $content, array $pages = null) {
        $name = titleToName($heading);
        Database::updateElements(self::$table, array("heading" => $heading,
            "content" => $content, "name" => $name), array("id" => $id));
        
        Database::deleteElements("page_news", array("news" => $id));
        
        foreach(array_keys($pages) as $pageId) {
            Database::insertElement("page_news", array("page" => $pageId, "news" => $id));
        }
    }

    public static function selectNews($id) {
        return Database::selectElement(self::$table, array("id" => $id));
    }
    
    public static function selectAllNewsPages() {
        $moduleId = BasePageModel::selectModuleId(self::$moduleName);
        return BasePageModel::selectAllModulePages($moduleId);
    }
    
    public static function selectNewsFromPage($pageId) {
        $newsTable = array("table" => self::$table, "key" => "id");
        $pageNewsTable = array("table" => "page_news", "key" => "news");
        return Database::selectElemetsWithJoin($newsTable, $pageNewsTable, array("page" => $pageId));
    }
    
    
    public static function selectAllFromPage($pageId) {
        return self::selectNewsFromPage($pageId);
    }
    
}
