<p>New User Page</p>
<form action="index.php" method="get" id="newUserForm">
<label>First Name: </label><input type="text" name="fname" /><br />
<label>Lane Name: </label><input type="text" name="lname" /><br />
<label>User Name: </label><input type="text" name="uname" /><br />
<label>Email: </label><input type="text" name="email" /><br />
<label>Password: </label><input type="password" name="password1" id="password1" /><br />
<label>Re-enter Password: </label><input type="password" name="password2" id="password2" /></br />
<input type="hidden" name="action" value="adminNewUser" /><br />
<input type="button" value="Create" onclick="rbr.createUser('newUserForm','password1','password2');" /><br />
</form>