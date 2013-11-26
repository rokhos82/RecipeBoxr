<?php
require("config.php");

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
if(mysqli_connect_errno($conn)) {
	echo(mysqli_connect_error($conn));
	mysqli_close($conn);
	die();
}

function buildSelectOptions($res) {
	while($row = mysqli_fetch_array($res)) {
		$id = $row["food_id"];
		$name = $row["name"];
		echo("<option value=\"$id\">$name</option>");
	}
}

$query = "SELECT * FROM food;";
if(!$result = mysqli_query($conn,$query)) {
	echo(mysqli_error($conn));
	mysqli_close($conn);
	die();
}

?>
<html>
<head>
	<title>RecipeBoxr - Create Product</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline" href="products.php">Products</a>&gt;<a class="inline">Create Product</a></div>
	<div class="container">
		<div class="tools">
			Tools
		</div>
		<div class="main">
			<form action="actions/new_product.php" method="post">
				<span>Name:</span><input type="text" name="name" />
				<span>Food:</span><select name="food_id"><?php buildSelectOptions($result); ?></select>
				<fieldset>
					<legend>Notes</legend>
					<textarea rows="5" cols="50"></textarea>
				</fieldset>
				<input type="submit" />
			</form>
		</div>
	</div>
	<div class="foot">(C) 2013 Justin Lane</div>
</body>
</html>
<?php
mysqli_close($conn);
?>