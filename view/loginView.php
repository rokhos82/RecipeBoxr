<?php
class loginView extends view {	
	public function __construct($local,$path) {
		parent::__construct($local,$path);		
	}

	public function initialize($controller) {
		parent::initialize($controller);		
	}

	public function output() {
		$path = $this->path;
		$this->drawHeader(["./js/rbr.js","./js/sha1.js"]);
		$this->drawMenu();

		$this->startMain();
		include("${path}/view/page/loginForm.php");
		$this->endMain();

		$this->drawFooter();
	}

	public function drawHeader($scripts) {
		parent::drawHeader($scripts);
	}

	public function drawMenu() {
		parent::drawMenu();
	}

	public function drawFooter() {
		parent::drawFooter();
	}
}
?>