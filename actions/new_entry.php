<?php
require("..\config.php");

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	mysqli_close($conn);
	die();
}

$pantry_id = mysqli_real_escape_string($conn,$_POST["pantry_id"]);
$product_id = mysqli_real_escape_string($conn,$_POST["product_id"]);
$quantity = mysqli_real_escape_string($conn,$_POST["quantity"]);
$threshold = mysqli_real_escape_string($conn,$_POST["threshold"]);

$query = "INSERT INTO pantry_item VALUES ($pantry_id,$product_id,$quantity,$threshold);";

if(mysqli_query($conn,$query)) {
	mysqli_close($conn);
	header("Location: ../pantry.php?id=$pantry_id");
}
else {
	echo(mysql_error($conn));
	mysqli_close($conn);
}
?>