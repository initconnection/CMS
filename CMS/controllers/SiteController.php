<?php

class SiteController extends BaseController {

    public function index() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($_POST as $key => $value) {
                SiteModel::insertParameter($key, $value);
            }
            redirect($this->lang ."/site/index");
        }
        else {
            $this->pages = PageModel::selectAllPages();
            $this->homePage = SiteModel::selectHomePage();
			$this->siteTitle = SiteModel::selectSiteTitle();
            $this->render("site/index.php");
        }
    }

}
