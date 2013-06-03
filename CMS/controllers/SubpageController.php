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

                SubpageModel::insertSubpage($title, $content, $description, $keywords,
                    $module, $parent);

                redirect($this->lang . "/page/index");
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

        public function delete() {
            $subpage = $this->urlValues["id"];
            $parent = $this->urlValues["subid"];
            SubpageModel::deleteSubpage($subpage, $parent);

            redirect($this->lang . "/page/index");
        }

        public function up() {
            $subpage = $this->urlValues["id"];
            $parent = $this->urlValues["subid"];
            SubpageModel::moveSubpageUp($subpage, $parent);

            redirect($this->lang . "/page/index");
        }

        public function down() {
            $subpage = $this->urlValues["id"];
            $parent = $this->urlValues["subid"];
            SubpageModel::moveSubpageDown($subpage, $parent);

            redirect($this->lang . "/page/index");
        }

    }