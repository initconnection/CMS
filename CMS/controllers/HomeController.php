<?php

    class HomeController extends BaseController {

    public function index() {
        $this->news = HomeModel::selectAllNews();
        $this->render("home/index.php");
    }
    
    public function show() {
        $this->id = $this->urlValues["id"];
        $this->news = NewsModel::selectNewsFromPage($this->id);
        $this->render("news/index.php");
    }
    
    }