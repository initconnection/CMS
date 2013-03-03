<?php
    require_once(ROOT_PATH . "views/base.view.php");
    
    class BaseController {

        private $action = "";
        public $urlValues = "";
        public function __construct($action, $urlValues) {
                $this->action = $action;
                $this->urlValues = $urlValues;
        }

        public function executeAction() {
                return $this->{$this->action}();
        }

        public function makeRedirect($location) {

        $template = new BaseView();
        $template->title = "Redirection";
        $template->location = "http://" . $location;
        $template->render("redirect.php");
        }
    }
?>
