<?php
require("config.php");

if(isset($_GET["action"])) {
	$action = $_GET["action"];
}
else {
	$action = "start";
}

$model = new rbrModel();
$controller = new controller($model);

$controller->perform($action);
?>