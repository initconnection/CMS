<?php

    class HomeController extends BaseController {

        public function index() {
            $this->news = NewsModel::selectAllNews();
            $this->render("home.php");
        }
	
    }