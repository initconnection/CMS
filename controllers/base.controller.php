<?php

    require_once(ROOT_PATH . "views/base.view.php");
    
    class BaseController {

        private $_action = "";
        public $urlValues = "";
        public function __construct($action, $urlValues) {
            $this->_action = $action;
            $this->urlValues = $urlValues;
        }
        
        public function executeAction() {
            return $this->{$this->_action}();
        }
        
        public function checkAction($action) {
            return (($this->_action == $action) ? true : false);
        }
    }
?>
