<?php
session_start();

global $_GLOBALS;
$_GLOBALS["mysql_host"] = "127.0.0.1";
$_GLOBALS["mysql_user"] = "recipe_user";
$_GLOBALS["mysql_pass"] = "b0xr";
$_GLOBALS["mysql_db"] = "recipeboxr";
$_GLOBALS["version"] = "0.0.3";
$_GLOBALS["language"] = "en-us";
$_GLOBALS["include_path"] = dirname(__FILE__);

$include_path = $_GLOBALS["include_path"];
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