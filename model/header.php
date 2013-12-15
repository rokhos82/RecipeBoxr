<html>
<head>
	<title><?php echo $local_strings["title"]; ?></title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline">Pantry - <?php echo($pantry_name); ?></a></div>
	<div class="container">
		<div class="tools">
			<a href=<?php echo "add_entry.php?pantry=$pantry_id"; ?>>Add Entry</a>
		</div>