<?php
    
    class BaseController {

        private $_action = "";
        public $urlValues = "";
        protected $template_dir = "views/";
        protected $vars = array();
	   
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
        
	public function render($view_file)
	{
		$this->view_file = $view_file;
		self::render_view("template.php");
	}

        public function render_view($view_file) {
            require_once(ROOT_PATH . $this->template_dir . $view_file);
        }

        public function __set($name, $value) {
            $this->vars[$name] = $value;
        }
        public function __get($name) {
            return $this->vars[$name];
        }
    }