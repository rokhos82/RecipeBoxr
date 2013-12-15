<?php

class view {
	private $controller;
	private $model;

	public function __constructor($controller,$model) {
		$this->controller = $controller;
		$this->model = $model;
	}

	public function output() {
		include_once("./header.php");
		$txt = $model->text;
		echo("<div class=\"main\">${txt}</div>");
		include_once("./footer.php");
	}
}

?>