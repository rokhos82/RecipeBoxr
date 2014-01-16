<?php
$pid = $_SESSION["pid"];
$details = $this->model->getPantryDetail($pid);
$name = $details["name"];
?>
<p>Detail for pantry: <?php echo $name; ?></p>
<fieldset>
<legend>Current Inventory</legend>
<table>
<thead>
	<tr><td>Product</td><td>Quantity</td><td>Threshold</td></tr>
</thead>
<tfoot></tfoot>
<tbody>
	<?php
	$items = $this->model->getPantryItems($pid);
	foreach($items as $k=>$item) {
		$product_id = $item["product_id"];
		$name = $item["name"];
		$quantity = $item["quantity"];
		$threshold = $item["threshold"];
		echo("<tr><td>${name}</td><td>${quantity}</td><td>${threshold}</td><td><a href=\"index.php?action=pantryItemEdit&pantry_id=${pid}&product_id=${product_id}\">Edit</a></td><td><a href=\"index.php?action=pantryItemDelete&pantry_id=${pid}&product_id=${product_id}\">Delete</a></td><td><a href=\"index.php?action=pantryItemRestock&pantry_id=${pid}&product_id=${product_id}\">Restock</a></td></tr>");
	}
	?>
</tbody>
</table>
</fieldset>
<form action="index.php" method="get">
<fieldset>
<legend>Add Product</legend>
<label>Product:</label><select name="product_id">
<?php
$products = $this->model->getProductList();
foreach($products as $k=>$product) {
	$name = $product["pname"];
	$id = $product["pid"];
	echo("<option value=\"${id}\">${name}</option>");
}
?>
</select><br />
<label>Quantity</label><input type="text" name="quantity" /><br />
<label>Threshold</label><input type="text" name="threshold" /><br />
<input type="hidden" name="action" value="pantryAddItem" />
<input type="hidden" name="pantry_id" value="<?php echo $pid; ?>" />
<input type="submit" value="Add Item" />
</fieldset>
</form>