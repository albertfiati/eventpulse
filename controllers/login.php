<?php
    session_start();
	require_once("../config/requires.inc.php");
	
	$email = mysql_escape_string($_POST['email'],ENT_QUOTES,"UTF-8");
	$password = $_POST['password'];
	
	if (filter_var($email,FILTER_VALIDATE_EMAIL)){
		if($password==""){
			return "F:Invalid login credentials";
		}else{
			$uac = new User_Account($email,$password);
			
			if ($uac->validAccount()==1){
				$_SESSION['id']=$accID;
				return "T:Log In successfull";
			}		
		}
	}else{
		return "F:Invalid login credentials!";
	}
?>