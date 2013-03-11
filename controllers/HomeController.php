<?php

    class HomeController extends BaseController {

        public function index() {
            $this->title = "Pagrindinis";
            $this->render("home/index.php");
        }
    }