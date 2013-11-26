<?php
require("..\config.php");

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo("Failed to connect to MySQL: " . mysqli_connect_error());
	die();
}

$name = mysqli_real_escape_string($conn,$_POST["name"]);
$notes = mysqli_real_escape_string($conn,$_POST["notes"]);
$food_id = mysqli_real_escape_string($conn,$_POST["food_id"]);

$query = "INSERT INTO product (name,notes) VALUES (\"" . $name . "\",\"" . $notes . "\");";

if(mysqli_query($conn,$query)) {
	mysqli_close($conn);
	header("Location: ../products.php");
}
else {
	echo(mysqli_error($conn));
	mysqli_close($conn);
}
?>