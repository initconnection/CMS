<?php

    class HomeController extends BaseController {

        public function index()
        {
            $view = new BaseView();
            $view->render("home/index.php");
        }
    }

?>
