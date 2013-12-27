<?php
require("config.php");

$model = new rbrModel();
$controller = new controller($model);
$view = new view($controller,$model,$_GLOBALS["local_strings"]);

$view->output();
?>