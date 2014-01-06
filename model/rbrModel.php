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
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION["userid"] = $row["user_id"];
		}
		return ($result->num_rows > 0);
	}

	public function getUserList() {
		$query = "SELECT * FROM user ORDER BY user_id;";
		$result = $this->db->query($query);
		$users = array();
		if($result) {
			while($row = $result->fetch_assoc()) {
				$users[] = $row;
			}
		}
		return $users;
	}
}

?>