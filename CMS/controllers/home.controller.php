<?php

    class HomeController extends BaseController {

        public function index()
        {
            $view = new BaseView();
            $view->title = "Pagrindinis";
            $view->render("home/index.php");
        }
        
        public function logIn()
        {
            $view = new BaseView();
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                if (authorize($username, $password)) {
                    redirect("home/index");
                } else {
                    redirect("home/login");
                }
            }
            else {
                $view->title = "Please log in";
                $view->render("home/login.php");
            }
           
        }
    }