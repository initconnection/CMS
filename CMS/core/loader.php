<?php

    class Loader {
        private $_controller;
        private $_action;
        private $_urlValues;

        public function __construct($urlValues) {
            $this->_urlValues = $urlValues;

            if ($this->_urlValues["controller"] == "") {
                $this->_controller = "HomeController";
            } else {
                $this->_controller = ucfirst($this->_urlValues["controller"]) . "Controller";
            }

            if ($this->_urlValues["action"] == "") {
                $this->_action = "index";
            } else {
                $this->_action = $this->_urlValues["action"];
            }
        }

        public function createController() {
            if (class_exists($this->_controller)) {
                $parents = class_parents($this->_controller);
                if (in_array("BaseController", $parents)) {                 
                    if (method_exists($this->_controller, $this->_action)) {
                        return new $this->_controller($this->_action, $this->_urlValues);
                    } else {
                        echo "Bad action name";
                    }
                } else {
                    echo "Bad controller";
                }
            } else {
                echo "Bad URL";
            }
            return false;
        }
    }
