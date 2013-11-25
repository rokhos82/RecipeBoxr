<html>
<head>
	<title>RecipeBoxr - Create Food</title>
	<link rel="stylesheet" type="text/csss" href="main.css" />
</head>
<body>
	<div class="nav"><a class="inline" href="index.php">Home</a>&gt;<a class="inline" href="food.php">Food</a>&gt;<a class="inline">Create Food</a></div>
	<div class="container">
		<div class="tools">
			Tools
		</div>
		<div class="main">
			<form action="actions/new_food.php" method="post">
				<span>Name:</span><input type="text" name="name" />
				<fieldset>
					<legend>Notes</legend>
					<textarea rows="5" cols="50"></textarea>
				</fieldset>
				<input type="submit" />
			</form>
		</div>
	</div>
	<div class="foot">(C) 2013 Justin Lane</div>
</body>
</html>