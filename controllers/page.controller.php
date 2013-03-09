<?php

require_once(ROOT_PATH . "controllers/base.controller.php");
require_once(ROOT_PATH . "models/page.model.php");

class PageController extends BaseController {

    public function index() {
        $view = new BaseView();
        $view->title = "Pages";
        $view->pages = PageModel::selectAll();
        $view->render("page/index.php");
    }

    public function create() {
        $view = new BaseView();

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $content = $_POST["content"];
            PageModel::insertPage($title, $content);
            redirect("page/index");
        }
        else {
            $view->title = "Create a new page";
            $view->render("page/create.php");
        }
    }

    public function show() {
        $id = 3;
        $view = new BaseView();
        $page = PageModel::selectPage($id);
        $view->title = $page["title"];
        $view->content = $page["content"];
        $view->render("page/show.php");
    }
}
