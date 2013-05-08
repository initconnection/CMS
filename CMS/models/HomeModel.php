<?php

class HomeModel extends BaseModel {
    
    public static function selectAllFromPage($pageId) {
        $news = NewsModel::selectNewsFromPage($pageId);
        return array("news" => $news); 
    }
}