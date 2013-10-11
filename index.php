<html>
<head>
	<title>RecipeBoxr</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav">Home</div>
	<div class="container">
		<div class="tools">
			<a class="block">Add Pantry</a>
			<a class="block">Users</a>
		</div>
		<div class="main">
			<ul>
				<li><a href="pantry.php">Pantry</a></li>
				<li>List</li>
				<li>Here</li>
			</ul>
<?php
require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
		</div>
	</div>
	<div class="foot">Footer - may not be used</div>
</body>
</html>