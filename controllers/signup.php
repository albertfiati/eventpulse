<?php
    session_start();
	require_once("../config/requires.inc.php");
	
	$email = mysql_escape_string(htmlentities($_POST['email'],ENT_QUOTES,"UTF-8"));
	$password = $_POST['password'];
	
	if((empty($email) && empty($password))==1){
		print "F:All fields required";
	}else{
		if (filter_var($email,FILTER_VALIDATE_EMAIL)){
			if(empty($password)){
				print "F:Password field required!";
			}else{
				$uac = new User_Account($email,$password);
				$accID = $uac->createAccount();
				
				if ($accID>0){
					$_SESSION['eventpulseid']=$accID;
					print "T:Account created";
				}elseif(substr($accID, 0,1)=="F"){
					print $accID;
				}		
			}
		}else{
			print "F:Invalid email address!";
		}
	}
?>