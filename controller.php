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
			$this->view = new view($local);
			$this->view->initialize($this);
			$this->view->output();
		}
		elseif($action == "login") {
			$this->view = new loginView($local,$_GLOBALS["include_path"]);
			$this->view->initialize($this);
			$this->view->output();
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
		}
		return $items;
	}
}
?>