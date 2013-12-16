<?php
require("config.php");

$model = new rbrModel();
$controller = new controller($model);
$view = new view($controller,$model);

$view->output();
?>