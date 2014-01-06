<?php
class controller {
	private $model;
	private $view;

	public function __construct($model) {
		$this->model = $model;
	}

	public function perform($action) {
		global $_GLOBALS;
		$local = $_GLOBALS["local_strings"];

		if(!isset($_SESSION["username"])) {
			if($action == "login") {
				$loggedIn = isset($_SESSION["username"]) ? true : false;
				if(isset($_GET["username"])) {
					$user = $_GET["username"];
					$pass = $_GET["password"];
					$query = "SELECT * FROM user WHERE uname=${user} AND password=${pass}";
					if($this->model->authenticateUser($user,$pass)) {
						$loggedIn = true;
						$_SESSION["username"] = $user;
						header("Location: index.php?action=home");
					}
					else {
						header("Location: index.php?action=login");
					}
				}

				if(!$loggedIn) {
					$this->view = new view($local,$_GLOBALS["include_path"]);
					$this->view->initialize($this);
					$this->view->output("loginForm.php");
				}
			}
			else {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("greeting.php");
			}
		}
		else {
			if($action == "logout") {
				session_destroy();
				header("Location: index.php?action=start");
			}
			elseif($action == "home") {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("welcome.php");
			}
			elseif($action == "pantry") {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("pantry.php");	
			}
			else {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("welcome.php");
			}
		}
	}

	public function getMenuItems() {
		$items = array();
		if(isset($_SESSION["username"])) {
			$user = $_SESSION["username"];
			$query = "SELECT * FROM menus WHERE user=${user}";
			$items["Pantry"] = "index.php?action=pantry";
			$items["Logout"] = "index.php?action=logout";
		}
		else {
			$items["Login"] = "index.php?action=login";
		}
		return $items;
	}

	public function getModel() {
		return $this->model;
	}
}
?>