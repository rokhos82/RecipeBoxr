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
$user_id = $_SESSION["userid"];
$query = "SELECT * FROM `pantry` JOIN `user_pantry_cross` ON `pantry`.`pantry_id`=`user_pantry_cross`.`pantry_id` WHERE `user_pantry_cross`.`user_id`=${user_id};";
?>
</tbody>
</table>
<p>New pantry form goes here</p>