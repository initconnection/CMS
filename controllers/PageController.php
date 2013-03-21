<?php

class PageController extends BaseController {

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

}
