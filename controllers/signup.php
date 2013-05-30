<?php
    session_start();
	require_once("../config/requires.inc.php");
	
	$email = mysql_escape_string($_POST['email'],ENT_QUOTES,"UTF-8");
	$password = $_POST['password'];
	
	if (filter_var($email,FILTER_VALIDATE_EMAIL)){
		if($password==""){
			return "F:Password field required!";
		}else{
			$uac = new User_Account($email,$password);
			$accID = $uac->createAccount();
			
			if ($accID!=null){
				$_SESSION['id']=$accID;
				return "T:Account created";
			}		
		}
	}else{
		return "F:Invalid email address!";
	}
?>