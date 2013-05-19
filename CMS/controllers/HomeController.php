<?php

class HomeController extends BaseController {

    
    public function index() {
         redirect("home/update");
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $buttonTitle = $_POST["buttonTitle"];
            $buttonUrl = $_POST["buttonUrl"];
            HomeModel::insertHomePage($buttonTitle, $buttonUrl);
            redirect("home");
        } else {
            $this->buttonTitle = "";
            $this->buttonUrl = "";
            $this->render("home/create.php");
        }
    }

    public function update() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $homeId = $_POST["homeId"];
            $buttonTitle = $_POST["buttonTitle"];
            $buttonUrl = $_POST["buttonUrl"];
            HomeModel::updateHomePage($homeId, $buttonTitle, $buttonUrl);
            redirect("home");
        } else {
            $homePage = HomeModel::selectHomePage();
            $this->homeId = $homePage["id"];
            $this->buttonTitle = $homePage["button_title"];
            $this->buttonUrl = $homePage["button_url"];
            $this->render("home/update.php");
        }
    }

    public function show() {
        redirect("home/update");
    }
    
}