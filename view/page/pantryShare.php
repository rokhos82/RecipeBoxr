<p>Share pantry for <?php echo $_SESSION["share_id"]; ?></p>
<form>
<select name="user_id">
<?php
$users = $this->model->getUserList();
foreach($users as $k=>$v) {
	$username = $v["uname"];
	$uid = $v["user_id"];
	echo("<option value=\"${uid}\">${username}</option>");
}
?>
</select>
</form>