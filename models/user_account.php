<?php
	class User_Account{
		//class variables
		private $email;
		private $password;
		var $table = USERACCOUNT;
		
		//user_account constructor
		public function __construct($email,$password){
			$this->email=$email;
			$this->password=$password;
		}
		
		//getters and setters
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email=$email;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function setPassword($password){
			$this->password=$password;
		}
		
		//fetch account ID
		public function getID(){
			$email = $this->email;
			$password = $this->password;
			$salt = $this->getSalt();			
			$hashedPassword = $this->hashPassword($salt,$password);
			
			try{
				$query = "Select * from $this->table where email='$email' and password='$hashedPassword'";
				$result = mysql_query($query);
				
				while($row=mysql_fetch_assoc($result)){
					return $row['accountID'];
				}	
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//creating salt
		public function createSalt(){
			$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
		    $iv = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
			$date = new DateTime();			
			$salt = uniqid().''.$iv .''. $date->format("ismm").''.uniqid();			
			return $salt;
		}
		
		//hash password
		public function hashPassword($salt,$password){
			return sha1($salt.''.$password);
		}
		
		//create new account
		public function createAccount(){
			$email = $this->email;
			$salt = $this->createSalt();
			$password = $this->hashPassword($salt, $this->password);
				
			try{				
				if($this->duplicateAccount()){
					return "F:Account unavailable. This e-mail has already been registered";
				}else{
					$query = "Insert into $this->table(email,password,salt) values('$email','$password','$salt')";
					$result = mysql_query($query);
					
					if($result==1){
						return mysql_insert_id();
					}else{
						return null;
					}	
				}				
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
				
		//update account details
		public function updateAccount(){
			$email = $this->email;
			$salt = $this->createSalt();
			$password = $this->hashPassword($salt, $this->password);
			$accId = $_SESSION['id'];
			
			try{
				if ($this->duplicateAccount()){
					return "F:Account unavailable. This e-mail has already been registered";
				}else{
					$query = "Update $this->table set email='$email',password='$password',salt='$salt' where accountID='$accId'";
					$result = mysql_query($query);
					
					if(mysql_affected_rows()>0){
						return "T:Account has been updated successfully";
					}else{
						return "F:Account update failed";
					}
				}				
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//valid account
		public function validAccount(){
			$email = $this->email;
			$password = $this->password;
			$salt = $this->getSalt();			
			$hashedPassword = $this->hashPassword($salt,$password);
			
			try{
				$query = "Select * from $this->table where email='$email' and password='$hashedPassword'";
				$result = mysql_query($query);
				if(mysql_num_rows($result)>0){
					return TRUE;
				}else{
					return FALSE;
				}	
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//checking for duplicate account
		public function duplicateAccount(){
			$email = $this->getEmail();
			
			try{
				$query = "Select * from $this->table where email='$email'";
				$result =  mysql_query($query);
				
				if (mysql_num_rows($result)>0){
					return TRUE;
				}else{
					return FALSE;
				}
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//fetch the salt of the account based on the email
		public function getSalt(){
			$email=$this->email;
			
			try{
				$query = "Select salt from $this->table where email='$email'";
				$result = mysql_query($query);
				
				if(mysql_num_rows($result)>0){
					while($row=mysql_fetch_assoc($result)){
						return $row['salt'];
					}
				}else{
					return null;
				}
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
	}
?>
