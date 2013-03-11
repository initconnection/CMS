<?php

    class HomeController extends BaseController {

        public function index()
        {
            $this->title = "Pagrindinis";
            $this->render("home/index.php");
        }
        
        public function logIn()
        {
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
                $this->title = "Please log in";
                $this->render("home/login.php");
            }
           
        }
    }