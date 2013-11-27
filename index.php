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
	<title><?php echo _("app.title"); ?></title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline"><?php echo($local_strings["nav_home"]); ?></a></div>
	<div class="container">
		<div class="tools">
			<a class="block" href="add_pantry.php"><?php echo($local_strings["menu_add_pantry"]); ?></a>
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
	</div>
	<div class="foot"><?php echo($local_strings["copyright"]); ?></div>
	<script type="text/javascript" src="./js/rbr.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>