<?php

    class MainController extends BaseController {

        public function index()
        {
            redirect($this->lang . "/page");
        }
        
        public function logIn()
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                if (authorize($username, $password)) {
                    redirect($this->lang . "/main/index");
                } else {
                    redirect($this->lang . "/main/login");
                }
            }
            else {
                $this->title = "Please log in";
                $this->render("main/login.php");
            }
           
        }
    }