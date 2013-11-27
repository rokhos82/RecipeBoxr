<?php
require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	mysqli_close($conn);
	die();
}
$pantry_id = mysqli_real_escape_string($conn,$_GET["pantry"]);
?>
<html>
<head>
	<title><?php echo($local_strings["title"]); ?></title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline" href=<?php
	echo "pantry.php?id=$pantry_id"; ?>>Pantry</a>&gt;<a class="inline">Add Entry</a></div>
	<div class="container">
		<div class="tools">
			Tools
		</div>
		<div class="main">
			<form action="actions/new_entry.php" method="post">
				<span>Name:</span>
			</form>
		</div>
	</div>
	<div class="foot"><?php echo($local_strings["copyright"]); ?></div>
</body>
</html>
<?php
mysqli_close($conn);
?>