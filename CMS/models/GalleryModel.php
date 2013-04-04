<?php

class GalleryModel extends BaseModel {
    
    protected static $modelName = "gallery";
    
    public static function uploadImage($file, $title) {
        $uploadId = UploadModel::uploadImage($file, $title, 100);
        
        return $uploadId;
    }
    
    public static function insertImage($file, $title, $pages) {
        $uploadId = self::uploadImage($file, $title);
        $image = array("upload_id" => $uploadId);
        $imageId = Database::insertElement(self::$modelName, $image);
        
        if($pages) {
            foreach (array_keys($pages) as $pageId) {
                Database::insertElement("page_gallery", array("gallery" => $imageId, "page" => $pageId));
            }
        }
    }
    
    public static function selectAllImages() {
        $galleryTable = array("table" => "gallery", "key" => "upload_id");
        $uploadTable = array("table" => "upload", "key" => "upload.id");
        
        return Database::selectElemetsWithJoin($galleryTable, $uploadTable);
    }
    
    public static function selectAllGalleryPages() {
        $moduleId = BasePageModel::selectModuleId(self::$modelName);
        return BasePageModel::selectAllModulePages($moduleId);
    }
    
    
    public static function selectImagesFromPage($pageId) {
        $galleryTable = array("table" => self::$modelName, "joinOn" => "gallery.id = gallery");
        $uploadTable = array("table" => "upload", "joinOn" => "upload.id = gallery.upload_id");
        $rightTables = array($galleryTable, $uploadTable);
        
        return Database::selectElementsWithLeftJoin("page_gallery", $rightTables, array("page" => "= " . $pageId));
    }
    
    public static function selectAllFromPage($pageId) {
        return self::selectImagesFromPage($pageId);
    }
    
}
