<?php

    class BaseView {
        
        protected $template_dir = "views/";
        protected $vars = array();
	   
	public function render()
	{
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
?>