<?php
/* Setup database structure for the first time. */

require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}

/*
	Create the database
*/
$query = "CREATE DATABASE IF NOT EXISTS recipeboxr;";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}


/*
	Create the tables
*/
/* Create units table and populate it. */
$query = "CREATE TABLE IF NOT EXISTS util_units (unit_id int unsigned auto_increment primary key, name varchar(50),abbreviation varchar(15));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

$query = "INSERT INTO util_units (name,abbreviation) VALUES ('Fluid Ounce','fl oz'),('Cup','c'),('Pint','pt'),('Quart','qt'),('Gallon','gal'),('Teaspoon','tsp'),('Tablespoon','tbsp'),('Ounce','oz'),('Pound','lb'),('Milliliter','mL'),('Liter','L'),('Gram','g'),('Kilogram','kg');";

/* Create units conversion table and populate it. */
$query = "CREATE TABLE IF NOT EXISTS util_unit_conv (unit_from int unsigned, unit_to int unsigned, factor float, PRIMARY KEY (unit_from,unit_to), FOREIGN KEY(unit_from) REFERENCES util_units(unit_id), FOREIGN KEY (unit_to) REFERENCES util_units(unit_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create user table */
$query = "CREATE TABLE IF NOT EXISTS user (user_id int unsigned auto_increment, fname varchar(20), lname varchar(20), uname varchar(30), email varchar(50), PRIMARY KEY (user_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create configuration table */
$query = "CREATE TABLE IF NOT EXISTS config (config_id int unsigned auto_increment, key varchar(20), value varchar(50), PRIMARY KEY (config_id);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create rights table */
$query = "CREATE TABLE IF NOT EXISTS rights (right_id int unsigned auto_increment, name varchar(20), description text, PRIMARY KEY(right_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create roles table */
$query = "CREATE TABLE IF NOT EXISTS roles (role_id int unsigned auto_increment, name varchar(20), description text, PRIMARY KEY(role_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create role/rights cross table */
$query = "CREATE TABLE IF NOT EXISTS role_rights_cross (role_id int unsigned, right_id int unsigned, PRIMARY KEY(role_id,right_id), FOREIGN KEY (role_id) REFERENCES roles(role_id) ON UPDATE CASCADE ON DELETE CASCADE, FOREIGN KEY (right_id) REFERENCES rights(right_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create user/role cross table */
$query = "CREATE TABLE IF NOT EXISTS user_role_cross (user_id int unsigned, role_id int unsigned, PRIMARY KEY(user_id,role_id), FOREIGN KEY (user_id) REFERENCES user(user_id) ON UPDATE CASCADE ON DELETE CASCADE);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create user/rights cross table */
$query = "CREATE TABLE IF NOT EXISTS user_rights_cross (user_id int unsigned, right_id int unsigned, PRIMARY KEY(user_id,right_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create pantryType table */
$query = "CREATE TABLE IF NOT EXISTS pantryType (type_id int unsigned auto_increment, name varchar(20), notes text, PRIMARY KEY (type_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create pantry table */
$query = "CREATE TABLE IF NOT EXISTS pantry (pantry_id int unsigned auto_increment, name varchar(20), notes text, type int unsigned, PRIMARY KEY (pantry_id), FOREIGN KEY (type) REFERENCES pantryType(type_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create food table */
$query = "CREATE TABLE IF NOT EXISTS food (food_id int unsigned auto_increment, name varchar(50), category varchar(50), note text, PRIMARY KEY (food_id));";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create recipe table */
$query = "CREATE TABLE IF NOT EXISTS recipe (recipe_id int unsigned auto_increment, title varchar(30), note text, creator int unsigned, servings int, serving_size int, serving_unit int unsigned, PRIMARY KEY(recipe_id), FOREIGN KEY(creator) REFERENCES user(user_id) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY(serving_unit) REFERENCES util_units(unit_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create product table */
$query = "CREATE TABLE IF NOT EXISTS product (product_id int unsigned auto_increment, name varchar(50),food_id int unsigned, size int, unit_id int unsigned, recipe_id int unsigned DEFAULT NULL, link_url varchar(50) DEFAULT NULL, note text, PRIMARY KEY (product_id), FOREIGN KEY (food_id) REFERENCES food(food_id) ON UPDATE CASCADE ON DELETE RESTRICT, FOREIGN KEY (recipe_id) REFERENCES recipe(recipe_id) ON UPDATE CASCADE ON DELETE SET NULL);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create pantry_item table */
$query = "CREATE TABLE IF NOT EXISTS pantry_item (pantry_id int unsigned, product_id int unsigned, quantity int, threshold int, PRIMARY KEY(pantry_id,product_id),  FOREIGN KEY (product_id) REFERENCES product(product_id) ON UPDATE CASCADE ON DELETE RESTRICT, FOREIGN KEY (pantry_id) REFERENCES pantry(pantry_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

/* Create recipeFoodCross table */
$query = "CREATE TABLE IF NOT EXISTS recipeFoodCross (recipe int unsigned, food int unsigned, PRIMARY KEY (recipe,food), FOREIGN KEY (recipe) REFERENCES recipe(recipe_id) ON UPDATE CASCADE ON DELETE CASCADE, FOREIGN KEY (food) REFERENCES food(food_id) ON UPDATE CASCADE ON DELETE RESTRICT);";
if(!mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	die();
}

mysqli_close($conn);
?>