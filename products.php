<?php
require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	mysqli_close($conn);
	die();
}

?>
<html>
<head>
	<title>RecipeBoxr - Products</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline">Products</a></div>
	<div class="container">
		<div class="tools">
			<a class="block" href="add_pantry.php">Add Pantry</a>
			<a class="block">Users</a>
			<a class="block" href="food.php">Food</a>
		</div>
		<div class="main">
			<ul>
<?php
$query = "SELECT * FROM product;";
?>
			</ul>
		</div>
	</div>
	<div class="foot">(C) 2013 Justin Lane</div>
	<script type="text/javascript" src="./js/rbr.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>