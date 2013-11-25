<?php
require("config.php");

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
if(mysqli_connect_errno($conn)) {
	echo(mysqli_connect_error($conn));
	die();
}

$pantry_id = mysqli_real_escape_string($conn,$_GET["id"]);

$query = "SELECT * FROM pantry WHERE pantry_id=$pantry_id;";
if($result = mysqli_query($conn,$query)) {
	$row = mysqli_fetch_array($result);
	$pantry_name = $row['name'];
}
?>
<html>
<head>
	<title>RecipeBoxr</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline">Pantry - <?php echo($pantry_name); ?></a></div>
	<div class="container">
		<div class="tools">
			<a href="add_entry.php">Add Entry</a>
		</div>
		<div class="main">Main Body</div>
	</div>
	<div class="foot">(C) 2013 Justin Lane</div>
</body>
</html>