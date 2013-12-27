<?php

class view {
	private $controller;
	private $model;

	public function __constructor($controller,$model) {
		$this->controller = $controller;
		$this->model = $model;
	}

	public function output() {
		global $_GLOBALS;
		$include_path = $_GLOBALS["include_path"];
		include_once("${include_path}/view/header.php");
		include_once("${include_path}/view/tools.php");
		if($_SESSION["logged_in"]) {
			$txt = $_GLOBALS["local_strings"]["welcome"];
		}
		else {
			$txt = $_GLOBALS["local_strings"]["login_msg"];
		}
		echo("<div class=\"main\">${txt}</div>");
		include_once("${include_path}/view/footer.php");
	}
}

?>