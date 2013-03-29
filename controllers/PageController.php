<?php

class PageController extends BaseController {

    public function show() {
        $page = PageModel::selectPageFromUrl($this->urlArray);
        $this->title = $page["title"];
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];
        $this->subpages = PageModel::selectSubpages($page["id"]);

        $this->render("page/show.php");
    }

}
