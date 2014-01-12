<fieldset>
	<legend>Food List</legend>
	<table>
		<thead>
			<tr><td>Food</td><td>Category</td><td>Notes</td></tr>
		</thead>
		<tfoot></tfoot>
		<tbody>
			<?php
			$foods = $this->model->getFoodList();
			foreach($foods as $k=>$food) {
				$name = $food["name"];
				$category = $food["category"];
				$notes = $food["notes"];
				echo("<tr><td>${name}</td></td><td>${category}</td><td>${notes}</td></tr>");
			}
			?>
		</tbody>
	</table>
</fieldset>
<form action="index.php" method="get">
	<fieldset>
		<legend>Create Food</legend>
		<label>Name:</label><input type="text" name="name" /><br />
		<label>Category:</label><input type="text" name="category" /><br />
		<label>Notes:</label><input type="text" name="notes" /><br />
		<input type="hidden" name="action" value="foodCreate" />
		<input type="submit" value="Create" />
	</fieldset>
</form>