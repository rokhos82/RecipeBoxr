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
<tbody></tbody>
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
	echo("<option value=\"${id}\">${name}<option>");
}
?>
</select><br />
<label>Quantity</label><input type="text" name="quantity" /><br />
<label>Threshold</label><input type="text" name="threshod" /><br />
</fieldset>
</form>