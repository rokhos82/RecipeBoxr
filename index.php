<?php
require("config.php");
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	mysqli_close($conn);
	die();
}

mysqli_close($conn);

function __autoload($class_name) {
	$filename = $class_name . ".php";
	if(file_exists("./libs/" . $filename)) {
		include("./libs/" . $filename);
	}
	elseif (file_exists("./model/" . $filename)) {
		include("./model/" . $filename);
	}
	elseif (file_exists("./view/" . $filename)) {
		include("./view/" . $filename);
	}
}

$model = new rbrModel();
$controller = new controller($model);
$view = new view($controller,$model);

$view->output();
?>