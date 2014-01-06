<p>User Management</p>
<table>
<tr><td>User ID</td><td>First Name</td><td>Last Name</td><td>User Name</td><td>Email</td></tr>
<?php
$users = $this->model->getUserList();
foreach($users as $k=>$v) {
	$id = $v["user_id"];
	$first = $v["fname"];
	$last = $v["lname"];
	$user = $v["uname"];
	$email = $v["email"];
	echo("<tr><td>${id}</td><td>${first}</td><td>${last}</td><td>${user}</td><td>${email}</td></tr>");
}
?>
</table>