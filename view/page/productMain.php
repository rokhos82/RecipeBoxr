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
<fieldset>
	<legend>Create Product</legend>
</fieldset>