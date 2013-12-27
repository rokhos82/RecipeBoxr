<?php

class view {
	private $controller;
	private $model;

	public function __constructor($controller,$model) {
		$this->controller = $controller;
		$this->model = $model;
	}

	public function output() {
		global $local_strings;
		include_once("./view/header.php");
		include_once("./view/tools.php");
		$txt = $local_strings["welcome"];
		echo("<div class=\"main\">${txt}</div>");
		include_once("./view/footer.php");
	}
}

?>