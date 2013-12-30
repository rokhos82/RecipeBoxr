<form action="index.php" method="get" name="authForm" id="authForm">
	<label>Username:</label><input type="text" name="username" id="username" /><br />
	<label>Password:</label><input type="password" name="password" id="password" /><br />
	<input type="button" value="Login" onclick="rbr.loginSubmit('authForm','password');" />
	<input type="hidden" name="action" value="login" />
</form>