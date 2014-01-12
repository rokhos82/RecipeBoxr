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
<form>
<fieldset>
<legend>Add Product</legend>
</fieldset>
</form>