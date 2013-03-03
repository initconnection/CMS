<?php
    require_once(ROOT_PATH . "views/base.view.php");

    class BaseController {
        
        public function makeRedirect($location) {

            $template = new BaseView();
            $template->title = "Redirection";
            $template->location = "http://" . $location;
            $template->render("redirect.php");
        }
    }
?>
