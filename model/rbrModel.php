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
		$query = "SELECT * FROM `user` ORDER BY `user_id`;";
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

	public function createPantry($uid,$name,$notes) {
		$uid = $this->db->real_escape_string($uid);
		$name = $this->db->real_escape_string($name);
		$notes = $this->db->real_escape_string($notes);
		$query = "INSERT INTO pantry(name,notes) VALUES (\"${name}\",\"${notes}\");";
		$this->db->query($query);
		$pid = $this->db->insert_id;
		$query = "INSERT INTO user_pantry_cross(user_id,pantry_id) VALUES (${uid},${pid});";
		$this->db->query($query);
	}

	public function getPantryList($uid) {
		$uid = $this->db->real_escape_string($uid);
		$query = "SELECT `pantry`.`pantry_id` AS `pantry_id`,`pantry`.`name` AS `name`,`pantry`.`notes` AS `notes` FROM `pantry` LEFT JOIN `user_pantry_cross` ON `pantry`.`pantry_id`=`user_pantry_cross`.`pantry_id` WHERE `user_pantry_cross`.`user_id`=${uid};";
		$results = $this->db->query($query);
		return $results;
	}

	public function deletePantry($pid) {
		$pid = $this->db->real_escape_string($pid);
		$query = "DELETE FROM `pantry` WHERE `pantry_id`=${pid};";
		$this->db->query($query);
	}
}

?>