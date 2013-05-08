<?php

    class MainController extends BaseController {

        public function index()
        {
            redirect("page");
        }
        
        public function logIn()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                if (authorize($username, $password)) {
                    redirect("main/index");
                } else {
                    redirect("main/login");
                }
            }
            else {
                $this->title = "Please log in";
                $this->render("main/login.php");
            }
           
        }
    }