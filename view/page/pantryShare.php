<p>Share pantry for <?php echo $_SESSION["share_id"]; ?></p>
<form action="index.php" method="get" id="pantryShareForm">
<select name="user_id">
<?php
$users = $this->model->getUserList();
foreach($users as $k=>$v) {
	$username = $v["uname"];
	$uid = $v["user_id"];
	echo("<option value=\"${uid}\">${username}</option>");
}
?>
</select><br/>
<input type="hidden" name="action" value="pantryShare" />
<input type="hidden" name="pantry_id" value="<?php echo($_SESSION["share_id"]); ?>" />
<input type="submit" value="Share" />
</form>