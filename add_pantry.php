<html>
<head>
	<title>RecipeBoxr - Add Pantry</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav">Home</div>
	<div class="container">
		<div class="tools">
			<a class="block" href="index.php">Pantries</a>
			<a class="block">Users</a>
		</div>
		<div class="main">
			<form action="actions/new_pantry.php" method="post">
				<span>Name:</span><input type="text" name="name" />
				<span>Notes:</span><input type="text" name="notes" />
				<input type="submit" />
			</form>
		</div>
	</div>
	<div class="foot">(C) 2013 Justin Lane</div>
</body>
</html>