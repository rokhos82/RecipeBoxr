<?php
class controller {
	private $model;

	public function __construct($model) {
		$this->model = $model;
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