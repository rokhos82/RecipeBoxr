<div class="main">
	<table>
		<tr><td>Product</td><td>Quantity</td><td>Threshold</td></tr>
<?php
$query = "SELECT `product`.`name` AS `name`,`pantry_item`.`quantity` AS `quantity`,`pantry_item`.`threshold` AS `threshold` FROM `pantry_item` LEFT JOIN `product` ON `pantry_item`.`product_id`=`product`.`product_id` WHERE `pantry_item`.`pantry_id`=$pantry_id;";
if($result = mysqli_query($conn,$query)) {
	while($row = mysqli_fetch_array($result)) {
		$name = $row["name"];
		$quantity = $row["quantity"];
		$threshold = $row["threshold"];
		echo("<tr><td>$name</td><td>$quantity</td><td>$threshold</td></tr>");
	}
}
?>
	</table>
</div>