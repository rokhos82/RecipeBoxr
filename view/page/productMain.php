<?php
?>
<fieldset>
	<legend>Product List</legend>
	<table>
		<thead><tr><td>Name</td><td>Food</td><td>Notes</td></tr></thead>
		<tfoot></tfoot>
		<tbody>
			<?php
			$products = $this->model->getProductList();
			foreach($products as $k=>$product) {
				$name = $product["pname"];
				$food = $product["fname"];
				$notes = $product["notes"];
				echo("<tr><td>${name}</td><td>${food}</td><td>${notes}</td></tr>");
			}
			?>
		</tbody>
	</table>
</fieldset>
<form action="index.php" method="get">
	<fieldset>
		<legend>Create Product</legend>
		<label>Name:</label><input type="text" name="name" /><br />
		<label>Food:</label><select name="food_id">
		<?php
		$foods = $this->model->getFoodList();
		foreach($foods as $k=>$food) {
			$name = $food["name"];
			$id = $food["food_id"];
			echo("<option value=\"${id}\">${name}</option>");
		}
		?></select><br />
		<label>Notes:</label><input type="text" name="notes" /><br />
		<input type="hidden" name="action" value="productCreate" />
		<input type="submit" value="Create" />
	</fieldset>
</form>