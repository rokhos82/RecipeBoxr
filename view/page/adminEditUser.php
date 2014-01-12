<?php
$details = $this->model->getUserDetails($_GET["user_id"]);
?>
<p>User Edit Page</p>
<form action="index.php" method="get">
<label>First Name: </label><input type="text" value="<?php echo $details["fname"] ?>" name="fname" /><br />
<label>Lane Name: </label><input type="text" value="<?php echo $details["lname"] ?>" name="lname" /><br />
<label>User Name: </label><input type="text" value="<?php echo $details["uname"] ?>" name="uname" /><br />
<label>Email: </label><input type="text" value="<?php echo $details["email"] ?>" name="email" /><br />
<input type="hidden" name="action" value="adminUpdateUser" />
<input type="submit" value="Update" />
</form>