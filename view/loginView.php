<?php
class loginView extends view {	
	public $path;

	public function __construct($local,$path) {
		parent::__construct($local);		
		$this->path = $path;
	}

	public function initialize($controller) {
		parent::initialize($controller);		
	}

	public function output() {
		$this->drawHeader();
		$this->drawMenu();

		$this->startMain();
		echo("<h1>Login Page Here</h1>");
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