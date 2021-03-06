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
            $pages = $_POST["page"];
            NewsModel::insertNews($heading, $content, $pages);
            redirect("news");
        } else {
            $this->pageId = $this->urlValues["id"];
            $this->heading = "";
            $this->content = "";
            $this->newsPages = NewsModel::selectAllNewsPages();
            $this->render("news/create.php");
        }
    }

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
    }
}
