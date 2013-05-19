<?php

class PageController extends BaseController {

    public function show() {
        $page = PageModel::selectPageFromUrl($this->urlArray);
        $this->title = $page["title"];
        $this->pageTitle = $page["title"] . " - " . SiteModel::selectSiteTitle();
        $this->content = $page["content"];
        $this->description = $page["description"];
        $this->keywords = $page["keywords"];
        $this->module = $page["module"];
        $moduleName = BasePageModel::selectModuleName($this->module);
        $this->subpages = PageModel::selectSubpages($page["id"]);

        if($moduleName) {
            $model = $moduleName . "Model";
            $this->$moduleName = $model::selectAllFromPage($page["id"]);
            $this->render("page/".$moduleName.".php");
        } else {
            $this->render("page/page.php");
        }
    }

}
