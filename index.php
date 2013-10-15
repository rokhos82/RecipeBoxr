<html>
<head>
	<title>RecipeBoxr</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav">Home</div>
	<div class="container">
		<div class="tools">
			<a class="block" href="add_pantry.php">Add Pantry</a>
			<a class="block">Users</a>
			<a class="block" href="setup.php">Setup</a>
		</div>
		<div class="main">
			<ul>

<?php
require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM pantry;";

if($result = mysqli_query($conn,$query)) {
	while($row = mysqli_fetch_array($result)) {
		echo("<li><a href=\"pantry.php?id=" . $row['pantry_id'] . "\">" . $row['name'] . "</a></li>");
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