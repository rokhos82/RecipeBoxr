<?php

class view {
	protected $controller;
	protected $local;
	protected $path;

	public function __construct($local,$path) {
		$this->local = $local;
	}

	public function initialize($controller) {
		$this->controller = $controller;
	}

	public function output($page) {
		$path = $this->path;
		$this->drawHeader(["./js/rbr.js","./js/sha1.js"]);
		$this->drawMenu();
		
		$this->startMain();
		include_once("${path}/view/page/${page}");
		$this->endMain();
		
		$this->drawFooter();
		
	}

	public function drawHeader($scripts) {
		$path = $this->path;
		$title = $this->local["title"];
		include_once("${path}/view/header.php");
	}

	public function drawMenu() {
		$path = $this->path;
		$tools = $this->controller->getMenuItems();
		include_once("${path}/view/tools.php");
	}

	public function drawFooter() {
		$path = $this->path;
		$copyright = $this->local["copyright"];
		include_once("${path}/view/footer.php");
	}

	public function startMain() {
		echo("<div class=\"main\">");
	}

	public function endMain() {
		echo("</div>");
	}
}

?>