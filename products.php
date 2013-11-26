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
			<a class="block" href="create_product.php">New Product</a>
			<a class="block" href="food.php">Food</a>
		</div>
		<div class="main">
			<ul>
<?php
$query = "SELECT * FROM product;";
if($result = mysqli_query($conn,$query)) {
	while($row = mysqli_fetch_array($result)) {
		$name = $row["name"];
		echo("<li>$name</li>");
	}
}
else {
	echo(mysqli_error($conn));
}
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