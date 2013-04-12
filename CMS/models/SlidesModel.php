<?php

class SlidesModel extends BaseModel {
    
    protected static $modelName = "slides";
    
    public static function uploadImage($file) {
        $uploadId = UploadModel::uploadImage($file, 100, 646, 416);
        
        return $uploadId;
    }
    
    public static function insertSlide($file, $title, $link) {
        $uploadId = self::uploadImage($file);
        $slide = array("upload_id" => $uploadId, "link" => $link, "title" => $title);
        
        Database::insertElement(self::$modelName, $slide);
    }
    
    public static function updateSlide($slideId, $title, $link, $file) {
        $uploadId = self::uploadImage($file);
        $slide = array("title" => $title, "link" => $link, "upload_id" => $uploadId);
        
        Database::updateElements(self::$modelName, $slide, array("id" => $slideId));
    }
    
    public static function selectAllSlides() {
        $slidesTable = array("table" => "slides", "key" => "upload_id");
        $uploadTable = array("table" => "upload", "key" => "upload.id");
        
        return Database::selectElemetsWithJoin($uploadTable, $slidesTable);
    }
    
    public static function selectSlide($slideId) {
        return Database::selectElement(self::$modelName, array("id" => $slideId));
    }
}
