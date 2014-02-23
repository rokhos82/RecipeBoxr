<fieldset>
	<legend>Tools</legend>
	<a href="recipeCreate">Create Recipe</a>
	<form>
		<label>Search:</label><input type="text"/><input type="button" value="Go" />
	</form>
</fieldset>
<fieldset>
	<legend>Favorite Recipes</legend>
	<ul>
	</ul>
</fieldset>
<fieldset>
	<legend>Recipes List</legend>
	<ul>
		<?php
		$recipes = $this->model->getRecipeList();
		foreach($recipes as $key => $recipe) {
			$name = $recipe["name"];
			$id = $recipe["id"];
			echo("<li><a href=\"recipeDetail?id=${id}\">${name}</a></li>");
		}
		?>
	</ul>
</fieldset>