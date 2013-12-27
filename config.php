<?php
session_start();
$mysql_host = "127.0.0.1";
$mysql_user = "recipe_user";
$mysql_pass = "b0xr";
$mysql_db = "recipeboxr";

$version = "0.0.2";

$language = "en-us";
$include_path = dirname(__FILE__);
require("${include_path}/localize.php");

function __autoload($class_name) {
	$include_path = dirname(__FILE__);
	$filename = $class_name . ".php";
	if(file_exists("${include_path}/libs/${filename}")) {
		include("${include_path}/libs/${filename}");
	}
	elseif (file_exists("${include_path}/model/${filename}")) {
		include("${include_path}/model/${filename}");
	}
	elseif (file_exists("${include_path}/view/${filename}")) {
		include("${include_path}/view/${filename}");
	}
	elseif (file_exists("${include_path}/${filename}")) {
		include("${include_path}/${filename}");
	}
}
?>