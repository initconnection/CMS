<?php

    class BaseController {

        private $_action = "";
        protected $url = "";
        protected $urlArray = array();
        protected $template_dir = "views/";
        protected $vars = array();
        protected $idArray= array();

        public function __construct($action, $urlValues) {
            $this->_action = $action;
			
			$homePageName = SiteModel::selectHomePageName();
			
            if(self::checkUrl($urlValues)) {
                $this->url = $urlValues["url"];
            } else {
                $this->url = $homePageName;
				$this->isHomePage = true;
            }
            $this->urlArray = explode("/", $this->url);
        }

        public function executeAction() {
            return $this->{$this->_action}();
        }

        public function checkAction($action) {
            return (($this->_action == $action) ? true : false);
        }

        public function checkUrl($url) {
            return ($url ? true : false);
        }

        public function render($view_file) {
            $this->currentPage = $this->url;
            $this->categories = CategoryModel::selectCategoriesAndPages();
            $this->view_file = $view_file;
            self::render_view("template.php");
        }

        public function render_view($view_file) {
            require_once(SITE_PATH . $this->template_dir . $view_file);
        }

        public function __set($name, $value) {
            $this->vars[$name] = $value;
        }
        public function __get($name) {
            return $this->vars[$name];
        }
    }