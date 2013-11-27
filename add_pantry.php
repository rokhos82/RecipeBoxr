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
	<div class="nav"><a class="inline" href="index.php"><?php echo($local_strings["nav_home"]); ?></a>&gt;<a class="inline"><?php echo($local_strings["nav_add_pantry"]); ?></a></div>
	<div class="container">
		<div class="tools">
			<a class="block" href="index.php"><?php echo($local_strings["menu_pantry"]); ?></a>
			<a class="block" href="food.php"><?php echo($local_strings["menu_food"]); ?></a>
			<a class="block" href="products.php"><?php echo($local_strings["menu_product"]); ?></a>
		</div>
		<div class="main">
			<form action="actions/new_pantry.php" method="post">
				<span><?php echo($local_strings["form_name"]); ?>:</span><input type="text" name="name" />
				<fieldset>
					<legend><?php echo($local_strings["form_note"]); ?></legend>
					<textarea rows=5 cols=50 name="notes"></textarea>
				</fieldset>
				<input type="submit" />
			</form>
		</div>
	</div>
	<div class="foot"><?php echo($local_strings["copyright"]); ?></div>
</body>
</html>
<?php
mysqli_close($conn);
?>