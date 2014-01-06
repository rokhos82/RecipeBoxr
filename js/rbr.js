var rbr = {};

rbr.setupDatabase = function() {
	var xmlhttp;
	
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	else {
		alert("You should really get a new browser...");
	}

	xmlhttp.open("GET","setup.php",true);
	xmlhttp.send();

	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			alert(xmlhttp.responseText);
		}
	}
};

rbr.loginSubmit = function(fid,pid) {
	var form = document.getElementById(fid);

	var password = document.getElementById(pid);
	var pass = password.value;
	pass = CryptoJS.SHA1(pass);
	password.value = pass;
	
	form.submit();
};

rbr.createUser = function(fid,pid1,pid2) {
	var form = document.getElementById(fid);
	
	var password1 = document.getElementById(pid1);	
	var pass1 = password1.value;
	pass1 = CryptoJS.SHA1(pass1);
	var password2 = document.getElementById(pid2);
	var pass2 = password2.value;
	pass2 = CryptoJS.SHA1(pass2);

	if(pass1.toString() == pass2.toString()) {
		password1.value = pass1;
		password2.value = "";
		form.submit();
	}
	else {
		password1.value = "";
		password2.value = "";
		alert("Passwords must match!");
	}
}