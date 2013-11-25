<html>
<head>
	<title>RecipeBoxr - Food</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline">Food</a></div>
	<div class="container">
		<div class="tools">
			<a class="block" href="create_food.php">Create Food</a>
		</div>
		<div class="main">
			<ul>
<?php
require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo("Failed to connect to MySQL: " . mysqli_connect_error());
}

$query = "SELECT * FROM food;";

if($result = mysqli_query($conn,$query)) {
	while($row = mysqli_fetch_array($result)) {
		echo("<li><a href=\"edit_food.php?id=" . $row['food_id'] . "\">" . $row['name'] . "</a></li>");
	}
}
else {
	echo(mysqli_error($conn));
}

mysqli_close($conn);
?>
			</ul>
		</div>
	</div>
	<div class="foot">(C) 2013 Justin Lane</div>
</body>
</html>