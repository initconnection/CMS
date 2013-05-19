<?php

class HomeModel extends BaseModel {

    protected static $table = "home";
    protected static $moduleName = "Home";
    
    public static function insertHomePage($buttonTitle, $buttonUrl) {
        Database::insertElement(self::$table, array("button_title" => $buttonTitle,
            "button_url" => $buttonUrl));
    }

    public static function updateHomePage($id, $buttonTitle, $buttonUrl) {
        Database::updateElements(self::$table, array("button_title" => $buttonTitle,
            "button_url" => $buttonUrl), array("id" => $id));
    }

    public static function selectHomePage() {
        return Database::selectFirstElement(self::$table);
    }
    
    public static function selectAllFromPage($pageId) {
        return self::selectHomePage($pageId);
    }
    
}
