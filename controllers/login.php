<?php
    session_start();
	require_once("../config/requires.inc.php");
	
	$email = mysql_escape_string(htmlentities($_POST['email'],ENT_QUOTES,"UTF-8"));
	$password = $_POST['password'];
	
	if((empty($email) && empty($password))==1){
		print "F:Invalid login credentials!";
	}else{
		if (filter_var($email,FILTER_VALIDATE_EMAIL)){
			if($password==""){
				print "F:Invalid login credentials!";
			}else{
				$uac = new User_Account($email,$password);
				
				if ($uac->validAccount()==1){
					$_SESSION['eventpulseid']=$uac->getID();
					print "T:Log In successfull";
				}		
			}
		}else{
			print "F:Invalid login credentials!";
		}
	}
?>