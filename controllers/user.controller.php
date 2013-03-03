<?php
	require_once("core/config.php");
	require_once(ROOT_PATH . "controllers/base.controller.php");	
	require_once(ROOT_PATH . "models/user.model.php");

	class UserController extends BaseController {
				
		public function showAllUsers() {
			
			$userModel = new UserModel("user");
			$template = new BaseView();
			$template->title = "Users";
			$template->users = $userModel->selectAll();
			$template->render("users.php");
		}
	}
	
	$userController = new UserController();

?>
