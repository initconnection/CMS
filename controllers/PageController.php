<?php

class PageController extends BaseController {

    public function show() {
        var_export($this->url);
        $page = PageModel::selectPageFromUrl($this->url);
        $this->title = $page["title"];
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];

        $this->render("page/show.php");
    }

}
