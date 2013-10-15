<?php
/* Setup database structure for the first time. */

require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "CREATE TABLE pantry (pantry_id int unsigned auto_increment primary key, name );";

?>