<?php
require("..\config.php");

$name = $_POST["name"];
$notes = $_POST["notes"];

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo("Failed to connect to MySQL: " . mysqli_connect_error());
	die();
}

$name = mysqli_real_escape_string($conn,$name);
$notes = mysqli_real_escape_string($conn,$notes);

$query = "INSERT INTO food (name,notes) VALUES (\"" . $name . "\",\"" . $notes . "\");";

if(mysqli_query($conn,$query)) {
	mysqli_close($conn);
	header("Location: ../food.php");
}
else {
	echo(mysql_error($conn));
	mysqli_close($conn);
}
?>