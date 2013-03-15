<?php

class PageController extends BaseController {
    
    public function index() {
        $this->title = "Pages";
        $this->categories = CategoryModel::selectPages();
        $this->render("page/index.php");
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $description = $_POST["description"];
            $keywords = $_POST["keywords"];
            $module = $_POST["module"];
            $category = $_POST["category"];
            
            PageModel::insert($title, $content, $description, $keywords,
                    $module, $category);
            
            redirect("page/index");
        }
        else {
            $this->title = "";
            $this->content = "";
            $this->description = "";
            $this->keywords = "";
            $this->module = "";
            $this->categories = CategoryModel::selectAll();
            $this->category = $this->urlValues["id"];

            $this->render("page/create.php");
        }
    }

    public function show() {
        $id = $this->urlValues["id"];
        $page = PageModel::select($id);
        $this->title = $page["title"];
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];
        $this->render("page/show.php");
    }

    //!!!!!!!!!Pataisyti
    public function update() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $description = $_POST["description"];
            $keywords = $_POST["keywords"];
            $module = $_POST["module"];
            $category = $_POST["category"];

            PageModel::update($id, $title, $content, $description, $keywords,
                $module, $category);
            redirect("page/index");
        }
        else {
            $id = $this->urlValues["id"];
            $page = PageModel::select($id);
            $this->title = $page["title"];
            $this->content = $page["content"];
            $this->description = $page["description"];
            $this->keywords = $page["keywords"];
            $this->module = $page["module"];
            $this->category = $page["category"];
            $this->categories = CategoryModel::selectAll();
            $this->render("page/update.php");
        }
    }

    public function delete() {
        $id = $this->urlValues["id"];
        PageModel::delete($id);
        redirect("page/index");
    }

    public function up() {
        $id = $this->urlValues["id"];
        PageModel::moveUp($id);
        redirect("page/index");
    }

    public function down() {
        $id = $this->urlValues["id"];
        PageModel::moveDown($id);
        redirect("page/index");
    }

}
