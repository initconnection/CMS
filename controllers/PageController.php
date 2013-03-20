<?php

class PageController extends BaseController {   
    
    public function index() {
        $this->title = "Pages";
        $this->pages = PageModel::selectAll();
        $this->render("page/index.php");
    }

    public function create() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $title = $_POST["title"];
            $content = $_POST["content"];
            $description = $_POST["description"];
            $keywords = $_POST["keywords"];
            $module = $_POST["module"];
            
            PageModel::insert($title, $content, $description, $keywords,
                    $module);
            redirect("page/index");
        }
        else {
            
            $this->title = "";
            $this->content = "";
            $this->description = "";
            $this->keywords = "";
            $this->module = "";

            $this->render("page/create.php");
        }
    }

    public function show() {
        $id = $this->urlValues["id"];
        $page = PageModel::selectPage($id);
        $this->title = $page["title"];
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];
        $this->render("page/show.php");
    }
    
    public function update() {
        $id = $this->urlValues["id"];
        $page = PageModel::select($id);
        $this->title = $page["title"];
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];
        $this->render("page/create.php");
    }
}
