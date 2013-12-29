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
		$this->drawHeader();
		$this->drawMenu();

		$this->startMain();
		include("${path}/view/page/loginForm.php");
		$this->endMain();

		$this->drawFooter();
	}

	public function drawHeader() {
		parent::drawHeader($this->path);
	}

	public function drawMenu() {
		parent::drawMenu($this->path);
	}

	public function drawFooter() {
		parent::drawFooter($this->path);
	}
}
?>