<?php

class database extends mysqli {
	public function __construct() {
		global $_GLOBALS;
		parent::__construct($_GLOBALS["mysql_host"],$_GLOBALS["mysql_user"],$_GLOBALS["mysql_pass"],$_GLOBALS["mysql_db"]);
	}
}

?>