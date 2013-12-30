<?php

class rbrModel extends model {
	public $text;

	public function __construct() {
		parent::__construct();
		$this->text = "Hello World!";
	}

	public function authenticateUser($user,$pass) {
		$query = "SELECT * FROM user WHERE uname=\"${user}\" AND password=\"${pass}\";";
		$result = $this->db->query($query);
		return ($result->num_rows > 0);
	}
}

?>