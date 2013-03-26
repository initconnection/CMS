<?php

class CategoryController extends BaseController {
    
    public function index() {
        $this->title = "Pages";
        $this->categories = CategoryModel::selectAllCategories();
        $this->render("category/index.php");
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            CategoryModel::insertCategory($title);
            redirect("page/index");
        }
        else {
            $this->title = "";
            $this->render("category/create.php");
        }
    }
    
    public function delete() {
        $id = $this->urlValues["id"];
        CategoryModel::deleteCategory($id);
        redirect("page/index");
    }
    
}
