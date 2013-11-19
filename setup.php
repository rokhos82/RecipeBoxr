<?php
/* Setup database structure for the first time. */

require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}

/* UTILITY TABLES */
/* Create units table and populate it. */
$query = "CREATE TABLE IF NOT EXISTS util_units (unit_id int unsigned auto_increment primary key, name varchar(50),abbreviation varchar(15));";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

$query = "INSERT INTO util_units (name,abbreviation) VALUES ('Fluid Ounce','fl oz'),('Cup','c'),('Pint','pt'),('Quart','qt'),('Gallon','gal'),('Teaspoon','tsp'),('Tablespoon','tbsp'),('Ounce','oz'),('Pound','lb'),('Milliliter','mL'),('Liter','L'),('Gram','g'),('Kilogram','kg');";

/* Create units conversion table and populate it. */
$query = "CREATE TABLE IF NOT EXISTS util_unit_conv (unit_from int unsigned, unit_to int unsigned, factor float, PRIMARY KEY (unit_from,unit_to), FOREIGN KEY(unit_from) REFERENCES util_units(unit_id), FOREIGN KEY (unit_to) REFERENCES util_units(unit_id));";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* MAIN TABLES */
/* Create user table */
$query = "CREATE TABLE IF NOT EXISTS user (user_id int unsigned auto_increment, fname varchar(20), lname varchar(20), uname varchar(30), email varchar(50), PRIMARY KEY (user_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create pantryType table */
$query = "CREATE TABLE IF NOT EXISTS pantryType (type_id int unsigned auto_increment, name varchar(20), notes text, PRIMARY KEY (type_id));";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create pantry table */
$query = "CREATE TABLE IF NOT EXISTS pantry (pantry_id int unsigned auto_increment, name varchar(20), notes text, type int unsigned, PRIMARY KEY (pantry_id), FOREIGN KEY (type) REFERENCES pantryType(type_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create food table */
$query = "CREATE TABLE IF NOT EXISTS food (food_id int unsigned auto_increment, name varchar(50), category varchar(50), note text, PRIMARY KEY (food_id));";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create foodContainer table */
$query = "CREATE TABLE IF NOT EXISTS foodContainer (container_id int unsigned auto_increment, name varchar(50),food_id int unsigned, size int, unit_id int unsigned, PRIMARY KEY (container_id), FOREIGN KEY (food_id) REFERENCES food(food_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create pantryItem table */
$query = "CREATE TABLE IF NOT EXISTS pantryItem (container_id int unsigned, pantry_id int unsigned, quantity int, threshold int, PRIMARY KEY (container_id,pantry_id), FOREIGN KEY (container_id) REFERENCES foodContainer(container_id) ON UPDATE CASCADE ON DELETE RESTRICT, FOREIGN KEY (pantry_id) REFERENCES pantry(pantry_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create recipe table */
$query = "CREATE TABLE IF NOT EXISTS recipe (recipe_id int unsigned auto_increment, title varchar(30), note text, creator int unsigned, servings int, serving_size int, serving_unit int unsigned, PRIMARY KEY(recipe_id), FOREIGN KEY(creator) REFERENCES user(user_id) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY(serving_unit) REFERENCES util_units(unit_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create recipeFoodCross table */
$query = "CREATE TABLE IF NOT EXISTS recipeFoodCross (recipe int unsigned, food int unsigned, PRIMARY KEY (recipe,food), FOREIGN KEY (recipe) REFERENCES recipe(recipe_id) ON UPDATE CASCADE ON DELETE CASCADE, FOREIGN KEY (food) REFERENCES food(food_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
mysqli_query($conn,$query);
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

mysqli_close($conn);
?>