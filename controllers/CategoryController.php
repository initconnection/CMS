<?php

class CategoryController extends BaseController {
    
    public function index() {
        $this->title = "Pages";
        $this->categories = CategoryModel::selectAll();
        $this->render("category/index.php");
    }

    public function create() {
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $title = $_POST["title"];
            CategoryModel::insert($title);
            redirect("category/index");
        }
        else {
            
            $this->title = "";

            $this->render("category/create.php");
        }
    }
    
}
