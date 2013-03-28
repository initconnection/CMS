<?php

    class SubpageController extends PageController {

        public function create() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = $_POST["title"];
                $content = $_POST["content"];
                $description = $_POST["description"];
                $keywords = $_POST["keywords"];
                $module = $_POST["module"];
                $parent = $_POST["parent"];

                SubpageModel::insertPage($title, $content, $description, $keywords,
                    $module, $parent);

                redirect("page/index");
            }
            else {
                $this->title = "";
                $this->content = "";
                $this->description = "";
                $this->keywords = "";
                $this->module = "";
                $this->parent = $this->urlValues["id"];

                $this->render("subpage/create.php");
            }
        }
    }