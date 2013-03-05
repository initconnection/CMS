<?php

    class Loader {
        private $controller;
        private $action;
        private $urlvalues;

        public function __construct($urlvalues) {
            
            $this->urlvalues = $urlvalues;

            if ($this->urlvalues["controller"] == "") {
                $this->controller = "HomeController";
            } else {
                $this->controller = $this->urlvalues['controller'] . "Controller";
            }

            if ($this->urlvalues["action"] == "") {
                $this->action = "index";
            } else {
                $this->action = $this->urlvalues["action"];
            }
        }

        public function createController() {

            if (class_exists($this->controller)) {
                
                $parents = class_parents($this->controller);
                if (in_array("BaseController", $parents)) {                 
                    if (method_exists($this->controller, $this->action)) {                
                        return new $this->controller($this->action, $this->urlvalues);
                        return true;
                    } else {
                        echo "Bad action name";
                        return false;
                    }
                } else {
                    echo "Bad Controller :(";
                    return false;
                }
            } else {
                echo "Bad URL :(";
                return false;
            }
        }
    }
?>
