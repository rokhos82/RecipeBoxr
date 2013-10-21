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
$query = "CREATE TABLE pantryEntry (entry_id int unsigned auto_increment primary key, container_id int unsigned, quantity int, threshold int);";

/* Create ingredientContainer table */
$query = "CREATE TABLE ingredientContainer (container_id int unsigned auto_increment primary key, name varchar(50),ingredient_id int unsigned, size int, unit_id int unsigned;";

/* Create ingredient table */
$query = "CREATE TABLE ingredient (ingredient_id int unsigned auto_increment primary key, name varchar(50), category varchar(50), note text);";

/* Create recipe table */
$query = "CREATE TABLE recipe (recipe_id int unsigned auto_increment primary key, varchar title, note text, creator int unsigned, servings int, serving_size int, serving_unit int unsigned);";

/* UTILITY TABLES */
/* Create units table and populate it. */
$query = "CREATE TABLE util_units (unit_id int unsigned auto_increment primary key, name varchar(50),abbreviation varchar(15));";
$query = "INSERT INTO util_units (name,abbreviation) VALUES ('Fluid Ounce','fl oz'),('Cup','c'),('Pint','pt'),('Quart','qt'),('Gallon','gal'),('Teaspoon','tsp'),('Tablespoon','tbsp'),('Ounce','oz'),('Pound','lb'),('Milliliter','mL'),('Liter','L'),('Gram','g'),('Kilogram','kg');" 

/* Create units conversion table and populate it. */
$query = "CREATE TABLE until_unit_conv (unit_from int unsigned, unit_to int unsigned, factor float, PRIMARY KEY (unit_from,unit_to), FOREIGN KEY(unit_from) REFERENCES util_units(unit_id), FOREIGN KEY (unit_to) REFERENCES util_units(unit_id);"

?>