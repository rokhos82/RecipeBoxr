<?php

class view {
	private $controller;
	private $model;
	private $local;

	public function __construct($controller,$model,$local) {
		$this->controller = $controller;
		$this->model = $model;
		$this->local = $local;
	}

	public function output() {
		global $_GLOBALS;
		$include_path = $_GLOBALS["include_path"];
		$this->drawHeader($include_path);
		$this->drawMenu($include_path);
		if($_SESSION["logged_in"]) {
			$txt = $_GLOBALS["local_strings"]["welcome"];
		}
		else {
			$txt = $_GLOBALS["local_strings"]["login_msg"];
		}
		echo("<div class=\"main\">${txt}</div>");
		$this->drawFooter($include_path);
		
	}

	public function drawHeader($path) {
		$title = $this->local["title"];
		include_once("${path}/view/header.php");
	}

	public function drawMenu($path) {
		$tools = $this->controller->getMenuItems();
		include_once("${path}/view/tools.php");
	}

	public function drawFooter($path) {
		$copyright = $this->local["copyright"];
		include_once("${path}/view/footer.php");
	}
}

?>