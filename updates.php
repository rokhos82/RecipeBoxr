<?php
/* Update existing database structure to the newer version. */

require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}

/* Drop existing tables */
$query = "DROP TABLE IF EXISTS foodContainer;";

$query = "DROP TABLE IF EXISTS pantryItem;";

/* Create new tables */
$query = "CREATE TABLE pantryItem (pantry_id int unsigned, food_id int unsigned, food_dtl_id int unsigned, quantity int, PRIMARY KEY(pantry_id,food_id,food_dtl_id));"

$query = "CREATE TABLE foodDetail (dtl_id in unsigned auto_increment, PRIMARY KEY(dtl_id));";

mysqli_close($conn);
?>