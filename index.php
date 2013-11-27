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
	<title><?php echo($local_strings["title"]); ?></title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><?php echo($local_strings["nav_home"]); ?></div>
	<div class="container">
		<div class="tools">
			<a class="block" href="add_pantry.php">Add Pantry</a>
			<a class="block">Users</a>
			<a class="block" href="setup.php">Setup</a>
			<a class="block" href="food.php"><?php echo($local_strings["menu_food"]); ?></a>
			<a class="block" href="products.php"><?php echo($local_strings["menu_product"]); ?></a>
		</div>
		<div class="main">
			<ul>

<?php
$query = "SELECT * FROM pantry;";

if($result = mysqli_query($conn,$query)) {
	while($row = mysqli_fetch_array($result)) {
		echo("<li><a href=\"pantry.php?id=" . $row['pantry_id'] . "\">" . $row['name'] . "</a></li>");
	}
}
else {
	echo(mysqli_error($conn));
}
?>
			</ul>
		</div>
		<button onclick="rbr.setupDatabase();">Setup Database</button>
	</div>
	<div class="foot">(C) 2013 Justin Lane</div>
	<script type="text/javascript" src="./js/rbr.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>