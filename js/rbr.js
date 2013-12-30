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
	var pass = CryptoJS.SHA1(pass);
	password.value = pass;
	
	form.submit();
};