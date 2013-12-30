<?php

class model {
	protected $db;
	/**
	 * Creates a mysqli database connection when a model is constructed.
	 */
	public function __construct() {
		try {
			$this->db = new Database();
		} catch(Exception $e) {
			die("Database connection could not be established.");
		}
	}
}

?>