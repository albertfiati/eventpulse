<?php
    class User_Profile{
    	//class variables
    	private $accountID;
		private $orgName;
		private $orgDesc;
		private $orgLogo;
		var $table = USERPROFILE;
		
		//user profile constructor
		public function __construct($accountID,$orgName,$orgDesc,$orgLogo){
			$this->accountID = $accountID;
			$this->orgName = $orgName;
			$this->orgDesc = $orgDesc;
			$this->orgLogo = $orgLogo;
		}
		
		//getters and setters
		public function getAccountID(){
			return $this->accountID;
		}
		
		public function setAccountID($accountID){
			$this->accountID = $accountID;
		}
		
		public function getOrgName(){
			return $this->orgName;
		}
		
		public function setOrgName($orgName){
			$this->orgName = $orgName;
		}
		
		public function getOrgDesc(){
			return $this->orgDesc;
		}
		
		public function setOrgDesc($orgDesc){
			$this->orgDesc = $orgDesc;
		}
		
		public function getOrgLogo(){
			return $this->orgLogo;
		}
		
		public function setOrgLogo($orgLogo){
			$this->orgLogo = $orgLogo;	
		}
		
		//create a profile
		public function createProfile(){
			$accID = mysql_escape_string(htmlentities($this->getAccountID(),ENT_QUOTES,'UTF-8'));
			$orgName = mysql_escape_string(htmlentities($this->getOrgName(),ENT_QUOTES,'UTF-8'));
			$orgDesc = mysql_escape_string(htmlentities($this->getOrgDesc(),ENT_QUOTES,'UTF-8'));
			$orgLogo = mysql_escape_string(htmlentities($this->getOrgLogo(),ENT_QUOTES,'UTF-8'));
			
			try{
				$query = "Insert into $this->table(accountID,orgName,aboutOrg,orgLogo) values('$accID','$orgName','$orgDesc','$orgLogo')";
				$result = mysql_query($query);
				
				if($result==1){
					return "T:Profile Created Successfully";
				}else{
					return "F:Profile creation failed";
				}
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		public function updateProfile(){
			$accID = $this->getAccountID();
			$orgName = mysql_escape_string(htmlentities($this->getOrgName(),ENT_QUOTES,'UTF-8'));
			$orgDesc = mysql_escape_string(htmlentities($this->getOrgDesc(),ENT_QUOTES,'UTF-8'));
			$orgLogo = mysql_escape_string(htmlentities($this->getOrgLogo(),ENT_QUOTES,'UTF-8'));
			
			try{
				$query = "Update $this->table set orgname='$orgName', aboutOrg='$orgDesc', orgLogo='$orgLogo' where accountID='$accID'";
				$result = mysql_query($query);
				
				if(mysql_affected_rows()>0){
					return "T:Profile update successful";
				}else{
					return "F:Profile update failed!";
				}
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		public function viewProfile(){
			$accID = $this->getAccountID();
			
			try{
				$query = "select * from $this->table where accountID='$accID'";
				$result = mysql_query($query);
				
				return $result;
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
  	}
?>