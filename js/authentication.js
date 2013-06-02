$(document).ready(function() {
	authInit();
});

function authInit() {
	login();
	signup();
}

function login() {
	$("form[name='login']").on("submit", function() {
		var email = $("input[name='email']").val();
		var password = $("input[name='password']").val();

		var loginJSON = {
			email : email,
			password : password
		};

		$.post('controllers/login.php', loginJSON, function(data, status) {		
			if(data.trim().substring(0,1)=='T'){
				window.location.replace("profile.html");
			}else{
				$('#login_error').html(data.substring(3)).fadeIn(500);
				$("input[name='password']").val("");
			}
		});

		return false;
	});
}

function checkSession() {
	$.get("controllers/checksession.php", function(data) {
		if (data.trim() == "logout") {
			window.location.replace("signup.html");
		}
	});

	return false;
}

function logout() {
	$("li[name='logout']").on("click", function() {
		$.get("controllers/logout.php", function() {
			window.location.replace("index.html");
		});
		return false;
	});
}

function signup() {
	$("form[name='signup']").on("submit", function() {
		var email = $("input[name='email']").val();
		var password = $("input[name='password']").val();

		var accountJSON = {
			password : password,
			email : email
		};
		
		$.post('controllers/signup.php', accountJSON, function(data, status) {
			console.log(data);
			if(data.trim().substring(0,1)=="T"){
				window.location.replace("profile.html");
			}else{
				$('#signup_error').html("<i class='icon-info-sign'></i> " + data.substring(3)).fadeIn(500);				
			}
		});

		return false;
	});
}

function passwordReset(){
	var oldPassword = $("input[name='oldPassword']").val();
	var newPassword = $("input[name='newPassword']").val();
	var confirmPassword = $("input[name='confirmPassword']").val();
	
	var passJSON = {oldPassword:oldPassword,
					 newPassword:newPassword,
					 confirmPassword:confirmPassword};
					 
	$.post("controllers/resetPassword.php",passJSON,function(data,status){
		console.log(data);
	});
}

function updateProfile(){
	var username = $("input[name='username']").val();
	var orgname = $("input[name='orgname']").val();
	var email = $("input[name='email']").val();
	
	var profileJSON = {username:username,
					 orgname:orgname,
					 email:email};
					 
	$.post("controllers/profileUpdate.php",profileJSON,function(data,status){
		console.log(data);
	});
}

