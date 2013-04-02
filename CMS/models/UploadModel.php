<?php

/**
 * kazkas cia parasytas
 */

require_once(CMS_PATH . "commons/class.upload.php");

class UploadModel extends BaseModel {

    protected static $table = "upload";

    public static function uploadImage($imageFile) {
        $handle = new Upload($imageFile);
        if ($handle->uploaded) {
            $handle->process(SITE_PATH."upload/");
            if ($handle->processed) {
                $handle->image_resize = true;
                $handle->image_x = 100;
                $handle->image_ratio_y = true;
                $handle->process(SITE_PATH."upload/thumbnails");

                Database::insertElement(self::$table, array("file" => $handle->file_dst_name));

                $handle->clean();
            } else {
                echo 'error : ' . $handle->error;
            }
        }
    }

    public static function selectFile($id) {
        return Database::selectElement(self::$table, array("id" => $id));
    }

    public static function selectAllFiles() {
        return Database::selectAllElements(self::$table);
    }

    public static function deleteFile($id) {
        $file = self::selectFile($id);
        unlink(SITE_PATH . "upload/" . $file["file"]);
        unlink(SITE_PATH . "upload/thumbnails/" . $file["file"]);
        Database::deleteElements(self::$table, array("id" => $id));
    }
}
