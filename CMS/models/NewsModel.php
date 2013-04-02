<?php

class NewsModel extends BaseModel {

    protected static $table = "news";

    public static function selectAllNews() {
        return Database::selectAllElements(self::$table);
    }

    public static function insertNews($heading, $content) {
        Database::insertElement(self::$table, array("heading" => $heading, "content" => $content));
    }

    public static function updateNews($id, $heading, $content) {
        Database::updateElements(self::$table, array("heading" => $heading, "content" => $content), array("id" => $id));
    }

    public static function selectNews($id) {
        return Database::selectElement(self::$table, array("id" => $id));
    }
}
