<?php

class UploadController extends BaseController {

    public function index() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            UploadModel::uploadImage($_FILES["file"], "name");
            redirect("upload");
        } else {
            $this->uploadedFiles = UploadModel::selectAllFiles();
            $this->render("upload/index.php");
        }
    }

    public function delete() {
        UploadModel::deleteFile($this->urlValues["id"]);
        redirect("upload");
    }
}
