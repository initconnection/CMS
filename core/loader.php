<?php

    class Loader {
        private $controller;
        private $action;
        private $urlValues;

        public function __construct($urlValues) {
            
            $this->urlValues = $urlValues;

            if ($this->urlValues["controller"] == "") {
                $this->controller = "HomeController";
            } else {
                $this->controller = ucfirst($this->urlValues['controller']) . "Controller";
            }

            if ($this->urlValues["action"] == "") {
                $this->action = "index";
            } else {
                $this->action = $this->urlValues["action"];
            }
        }

        public function createController() {

            if (class_exists($this->controller)) {
                
                $parents = class_parents($this->controller);
                if (in_array("BaseController", $parents)) {                 
                    if (method_exists($this->controller, $this->action)) {                
                        return new $this->controller($this->action, $this->urlValues);
                        return true;
                    } else {
                        echo "Bad action name";
                    }
                } else {
                    echo "Bad Controller :(";
                }
            } else {
                echo "Bad URL :(";
            }
            return false;
        }
    }
