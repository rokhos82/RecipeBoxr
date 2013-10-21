<?php
/* Setup database structure for the first time. */

require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* Create user table */
$query = "CREATE TABLE user (user_id int unsigned auto_increment primary key, fname vchar(20), lname vchar(20), uname vchar(30), email vchar(50));";

/* Create pantry table */
$query = "CREATE TABLE pantry (pantry_id int unsigned auto_increment primary key, name vchar(20), notes text, type vchar(20));";

/* Create pantryEntry table */
$query = "CREATE TABLE pantryEntry (entry_id int unsigned auto_increment primary key);";

/* Create ingredientContainer table */
$query = "CREATE TABLE ingredientContainer (container_id int unsigned auto_increment primary key);";

/* Create ingredient table */
$query = "CREATE TABLE ingredient (ingredient_id int unsigned auto_increment primary key);";

/* Create recipe table */
$query = "CREATE TABLE recipe (recipe_id int unsigned auto_increment primary key);";

?>