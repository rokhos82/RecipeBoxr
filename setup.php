<?php
/* Setup database structure for the first time. */

require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* Create user table */
$query = "CREATE TABLE user (user_id int unsigned auto_increment, fname vchar(20), lname vchar(20), uname vchar(30), email vchar(50), PRIMARY KEY (user_id));";

/* Create pantry table */
$query = "CREATE TABLE pantry (pantry_id int unsigned auto_increment, name vchar(20), notes text, type vchar(20), PRIMARY KEY (pantry_id));";

/* Create pantryItem table */
$query = "CREATE TABLE pantryItem (container_id int unsigned, pantry_id int unsigned, quantity int, threshold int, PRIMARY KEY (container_id,pantry_id), FOREIGN KEY (container_id) REFERENCES foodContainer(container_id) ON UPDATE CASCADE ON DELETE RESTRICT, FOREIGN KEY (pantry_id) REFERENCES pantry(pantry_id));";

/* Create foodContainer table */
$query = "CREATE TABLE foodContainer (container_id int unsigned auto_increment, name varchar(50),food_id int unsigned, size int, unit_id int unsigned, PRIMARY KEY (container_id);";

/* Create food table */
$query = "CREATE TABLE food (food_id int unsigned auto_increment, name varchar(50), category varchar(50), note text, PRIMARY KEY (food_id));";

/* Create recipe table */
$query = "CREATE TABLE recipe (recipe_id int unsigned auto_increment, varchar title, note text, creator int unsigned, servings int, serving_size int, serving_unit int unsigned, PRIMARY KEY(recipe_id));";

/* UTILITY TABLES */
/* Create units table and populate it. */
$query = "CREATE TABLE util_units (unit_id int unsigned auto_increment primary key, name varchar(50),abbreviation varchar(15));";
$query = "INSERT INTO util_units (name,abbreviation) VALUES ('Fluid Ounce','fl oz'),('Cup','c'),('Pint','pt'),('Quart','qt'),('Gallon','gal'),('Teaspoon','tsp'),('Tablespoon','tbsp'),('Ounce','oz'),('Pound','lb'),('Milliliter','mL'),('Liter','L'),('Gram','g'),('Kilogram','kg');" 

/* Create units conversion table and populate it. */
$query = "CREATE TABLE until_unit_conv (unit_from int unsigned, unit_to int unsigned, factor float, PRIMARY KEY (unit_from,unit_to), FOREIGN KEY(unit_from) REFERENCES util_units(unit_id), FOREIGN KEY (unit_to) REFERENCES util_units(unit_id);"

?>