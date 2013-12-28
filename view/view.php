<?php

class view {
	protected $controller;
	protected $local;

	public function __construct($local) {
		$this->local = $local;
	}

	public function initialize($controller) {
		$this->controller = $controller;
	}

	public function output() {
		global $_GLOBALS;
		$include_path = $_GLOBALS["include_path"];
		$this->drawHeader($include_path);
		$this->drawMenu($include_path);
		
		$txt = $_GLOBALS["local_strings"]["welcome"];
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

	public function startMain() {
		echo("<div class=\"main\">");
	}

	public function endMain() {
		echo("</div>");
	}
}

?>