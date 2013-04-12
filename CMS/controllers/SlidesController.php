<?php

    class SlidesController extends BaseController {

    public function index() {
        $this->slides = SlidesModel::selectAllSlides();
        $this->render("slides/index.php");
    }
    
    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $file = $_FILES["file"];
            $title = $_POST["title"];
            $link = $_POST["link"];
            
            SlidesModel::insertSlide($file, $title, $link);
            
            redirect("slides/index");
        } else {
            $this->title = "";
            $this->link = "";
            
            $this->render("slides/create.php");
        }
    }

    public function update() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $title = $_POST["title"];
            $link = $_POST["link"];
            $file = $_FILES["file"];
            SlidesModel::updateSlide($id, $title, $link, $file);
            
            redirect("slides");
        } else {
            $this->id = $this->urlValues["id"];
            $slides = SlidesModel::selectSlide($this->id);
            $upload = UploadModel::selectFile($slides["upload_id"]);
            $this->image = $upload["file"];
            $this->title = $slides["title"];
            $this->link = $slides["link"];

            $this->render("slides/update.php");
        }
    }
}
