<?php

    class GalleryController extends BaseController {

    public function index() {
        //$this->images = GalleryModel::selectAllImages();
        $this->render("gallery/index.php");
    }
    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            //$pages = $_POST["page"];
            $file = $_FILES["file"];
            $title = $_POST["title"];
            $url = UploadModel::uploadImage($file);
            GalleryModel::insertImage($url, $title);
            redirect("news");
        } else {
            //$this->pageId = $this->urlValues["id"];
            $this->url = "";
            $this->title = "";
            //$this->newsPages = NewsModel::selectAllNewsPages();
            $this->render("gallery/create.php");
        }
    }
    /*

    public function update() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $heading = $_POST["heading"];
            $content = $_POST["content"];
            $pages = $_POST["page"];
            NewsModel::updateNews($id, $heading, $content, $pages);
            redirect("news");
        } else {
            $this->id = $this->urlValues["id"];
            $news = NewsModel::selectNews($this->id);
            $this->heading = $news["heading"];
            $this->content = $news["content"];
            $this->newsPages = NewsModel::selectAllNewsPages();
            $this->selectedPages = NewsModel::selectPages($this->id);
            $this->render("news/update.php");
        }
    }

    public function show() {
        $this->id = $this->urlValues["id"];
        $this->news = NewsModel::selectNewsFromPage($this->id);
        $this->render("news/index.php");
    }*/
}
