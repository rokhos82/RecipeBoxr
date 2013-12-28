<?php

class model {
	/**
	 * Creates a mysqli database connection when a model is constructed.
	 */
	function __construct() {
		try {
			$this->db = new Database();
		} catch(Exception $e) {
			die("Database connection could not be established.");
		}
	}
}

?>