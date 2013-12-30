<html>
<head>
<title><?php echo $title; ?></title>
<?php
foreach($scripts as $k=>$v) {
	echo("<script type=\"text/javascript\" src=\"${v}\"></script>");
}
?>
<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline">Pantry</a></div>
<div class="container">