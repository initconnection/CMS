<?php

    class HomeController extends BaseController {

        public function index()
        {
            $view = new BaseView();
	  $view->title = "Pagrindinis";
            $view->render("home/index.php");
        }
    }

?>
