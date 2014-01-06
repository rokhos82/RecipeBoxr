<?php
require("config.php");

$action = isset($_GET["action"]) ? $_GET["action"] : "start";

$model = new rbrModel();
$controller = new controller($model);

$controller->perform($action);
?>