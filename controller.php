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
		if($action == "start") {
			$this->view = new view($local,$_GLOBALS["include_path"]);
			$this->view->initialize($this);
			$this->view->output();
		}
		elseif($action == "logout") {
			session_destroy();
			header("Location: index.php?action=start");
		}
		elseif($action == "login") {
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
				$this->view = new loginView($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output();
			}
		}
		elseif($action == "home") {
			$u = $_SESSION["username"];
			echo("<html>Welcome ${u}!</html>");
		}
	}

	public function getMenuItems() {
		$items = array();
		if(isset($_SESSION["user"])) {
			$user = $_SESSION["user"];
			$query = "SELECT * FROM menus WHERE user=${user}";
		}
		else {
			$items[] = "<a class=\"block\" href=\"index.php?action=login\">Login</a>";
			$items[] = "<a class=\"block\" href=\"index.php?action=logout\">Logout</a>";
		}
		return $items;
	}
}
?>