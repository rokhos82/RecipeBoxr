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
	<title><?php echo $local_strings["title"]; ?></title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline"><?php echo($local_strings["nav_home"]); ?></a></div>
	<div class="container">
		<div class="tools">
		</div>
		<div class="main">
			<form action="./actions/login.php" method="POST">
				<div class="row">
					<span>Username:</span><input type="text" name="uname" />
				</div>
				<div class="row">
					<span>Password:</span><input type="password" name="pword" />
				</div>
			</form>
		</div>
	</div>
	<div class="foot"><?php echo($local_strings["copyright"]); ?></div>
	<script type="text/javascript" src="./js/rbr.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>