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

	public function getUserDetails($id) {
		$query = "SELECT * FROM user WHERE user_id=${id};";
		$result = $this->db->query($query);
		return $result->fetch_assoc();
	}

	public function updateUserDetails($id,$uname,$fname,$lname,$pass,$email) {
		$query = "UPDATE user SET uname=\"${uname}\",fname=\"${fname}\",lname=\"${lname}\",pass=\"${pass}\",email=\"${email}\" WHERE user_id=${id};";
		$result = $this->db->query($query);
	}

	public function createUser($fname,$lname,$uname,$pass,$email) {
		$fname = $this->db->real_escape_string($fname);
		$lname = $this->db->real_escape_string($lname);
		$uname = $this->db->real_escape_string($uname);
		$pass = $this->db->real_escape_string($pass);
		$email = $this->db->real_escape_string($email);
		$query = "INSERT INTO user(fname,lname,uname,password,email) VALUES (\"${fname}\",\"${lname}\",\"${uname}\",\"${pass}\",\"${email}\");";
		$this->db->query($query);
	}
}

?>