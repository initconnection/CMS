<?php

    class NewsController extends BaseController {

    public function index() {
        $this->news = NewsModel::selectAllNews();
        $this->render("news/index.php");
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $heading = $_POST["heading"];
            $content = $_POST["content"];
            NewsModel::insertNews($heading, $content);
            redirect("news");
        } else {
            $this->heading = "";
            $this->content = "";
            $this->render("news/create.php");
        }
    }

    public function update() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $heading = $_POST["heading"];
            $content = $_POST["content"];
            NewsModel::updateNews($id, $heading, $content);
            redirect("news");
        } else {
            $this->id = $this->urlValues["id"];
            $news = NewsModel::selectNews($this->id);
            $this->heading = $news["heading"];
            $this->content = $news["content"];
            $this->render("news/update.php");
        }
    }

    public function show() {
        $this->news = NewsModel::selectAllNews();
        $this->render("news/index.php");
    }
}
