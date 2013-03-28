<?php

class PageController extends BaseController {

    public function show() {
        $name = $this->urlValues["page"];
        $page = PageModel::selectPageByName($name);
        $this->title = $page["title"];
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];

        $this->render("page/show.php");
    }

}
