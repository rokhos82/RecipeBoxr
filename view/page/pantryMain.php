<p>Manage your pantries on this page.  Create new pantries, edit existing pantries, and delete unused pantries.</p>
<table>
<thead>
<tr><td colspan="2">Pantries</td></tr>
<tr><td>Name</td><td>Notes</td></tr>
</thead>
<tfoot>
</tfoot>
<tbody>
<?php
$pantries = $this->model->getPantryList($_SESSION["userid"]);
foreach($pantries as $k=>$v) {
	$name = $v["name"];
	$notes = $v["notes"];
	$id = $v["pantry_id"];
	echo("<tr><td>${name}</td><td>${notes}</td><td><a href=\"index.php?action=pantryEdit&pantry_id=${id}\">Edit</a></td><td><a href=\"index.php?action=pantryDelete&pantry_id=${id}\">Delete</a></td></tr>");
}
?>
</tbody>
</table>
<form action="index.php" method="get" id="newPantryForm">
<fieldset>
<legend>New Pantry</legend>
<label></label><input type="text" name="name" /><br />
<input type="text" name="notes" /><br />
<input type="hidden" name="action" value="pantryCreate" /><br />
<input type="button" value="Create" onclick="rbr.formSubmit('newPantryForm');" /><br />
</fieldset>
</form>