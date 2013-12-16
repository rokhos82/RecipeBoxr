<?php

class database extends mysqli {
	public function __construct() {
		parent::__construct($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
	}
}

?>