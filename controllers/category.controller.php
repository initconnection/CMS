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
            $description = $_POST["description"];
            $keywords = $_POST["keywords"];
            $module = $_POST["module"];
            
            PageModel::insertPage($title, $content, $description, $keywords,
                    $module);
            redirect("page/index");
        }
        else {
            
            $view->title = "";
            $view->content = "";
            $view->description = "";
            $view->keywords = "";
            $view->module = "";

            $view->render("page/create.php");
        }
    }

    public function show() {
        $id = $this->urlValues["id"];
        $view = new BaseView();
        $page = PageModel::selectPage($id);
        $view->title = $page["title"];
        $view->content = $page["content"];
        $view->description = $page["description"];
        $view->keywords = $page["keywords"];
        $view->module = $page["module"];
        $view->render("page/show.php");
    }
    
    public function update() {
        $id = $this->urlValues["id"];
        $view = new BaseView();
        $page = PageModel::selectPage($id);
        $view->title = $page["title"];
        $view->content = $page["content"];
        $view->description = $page["description"];
        $view->keywords = $page["keywords"];
        $view->module = $page["module"];
        $view->render("page/create.php");
    }
}
