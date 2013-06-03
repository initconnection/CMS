<?php

class PageController extends BaseController {
    
    public function index() {
        $this->title = "Pages";
        $this->categories = CategoryModel::selectCategoriesAndPages($this->lang);
        $this->pages = PageModel::selectPagesWithoutCategory();

        $this->render("page/index.php");
    }

    public function show() {
        $this->id = $this->urlValues["id"];
        $page = PageModel::selectPage($this->id);
        $this->title = $page["title"];
        $this->content = $page["content"];

        $this->render("page/show.php");
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $description = $_POST["description"];
            $keywords = $_POST["keywords"];
            $module = $_POST["module"];
			$categories = $_POST["categories"];
			$categoriesArray = explode(", ", $categories);
            
            PageModel::insertPage($title, $content, $description, $keywords, $module, $categoriesArray, $this->lang);
            
            redirect($this->lang . "/page/index");
        }
        else {
            $this->title = "";
            $this->content = "";
            $this->description = "";
            $this->keywords = "";
            $this->module = "";
            $this->allCategories = CategoryModel::selectAllCategoriesAndNone($this->lang);
            $this->categories = array($this->urlValues["id"]);
            $this->allModules = BasePageModel::selectAllModules();

            $this->render("page/create.php");
        }
    }

    public function update() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $title = $_POST["title"];
            $content = $_POST["content"];
            $description = $_POST["description"];
            $keywords = $_POST["keywords"];
            $module = $_POST["module"];
            $categories = $_POST["categories"];
			$categoriesArray = explode(", ", $categories);
			
            PageModel::updatePage($id, $title, $content, $description, $keywords, $module, $categoriesArray);

            redirect($this->lang . "/page/index");
        }
        else {
            $id = $this->urlValues["id"];
            $page = PageModel::selectPage($id);
            $this->id = $page["id"];
            $this->title = $page["title"];
            $this->content = $page["content"];
            $this->description = $page["description"];
            $this->keywords = $page["keywords"];
            $this->module = $page["module"];
            $this->categories = PageModel::selectPageCategories($id);
            $this->allCategories = CategoryModel::selectAllCategoriesAndNone($this->lang);
            $this->allModules = BasePageModel::selectAllModules();

            $this->render("page/update.php");
        }
    }

    public function delete() {
        $page = $this->urlValues["id"];
        if($this->urlValues["subid"]) {
            $category = $this->urlValues["subid"];
            PageModel::deletePageFromCategory($category, $page);
        } else {
            PageModel::deletePage($page);
        }
        redirect($this->lang . "/page/index");
    }

    public function up() {
        $page = $this->urlValues["id"];
        $category = $this->urlValues["subid"];
        PageModel::movePageUp($page, $category);

        redirect($this->lang . "/page/index");
    }

    public function down() {
        $page = $this->urlValues["id"];
        $category = $this->urlValues["subid"];
        PageModel::movePageDown($page, $category);

        redirect($this->lang . "/page/index");
    }

    public function history() {
        $id = $this->urlValues["id"];
        $this->pages = PageModel::selectPageHistory($id);

        $this->render("page/history.php");
    }

    public function version() {
        $id = $this->urlValues["id"];
        $subId = $this->urlValues["subid"];
        $page = PageModel::selectPageVersion($id, $subId);
        $this->id = $page["id"];
        $this->title = $page["title"];
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];
        $this->categories = PageModel::selectPageCategories($id);
        $this->allCategories = CategoryModel::selectAllCategoriesAndNone();

        $this->render("page/update.php");
    }

}
