<?php

	class HomeController extends BaseController {
		
		public function index()
		{
			$template = new BaseView();
			$template->title = "Pavadinimas";
			$template->render("home/index.php");
		}
	}

?>
