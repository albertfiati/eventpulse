<?php
    require_once('config/requires.inc.php');
	
	// $uac = new User_Account("albert.fiati@gmail.co.uk","albert");
	// print "create account: ". $uac->createAccount();
	// print "</br>Account salt: ". $uac->getSalt();
	// print "</br>Account Password: ". $uac->getPassword();
	// print "</br>Duplicate Account: ". $uac->duplicateAccount();
	// print "</br>Valid Accounts: ". $uac->validAccount();
	// print "</p>";
	// $uac->setEmail('awkfiati@gmail.com');
	// $uac->setPassword('angela');
	// print "</br>Update Accounts: ". $uac->updateAccount(2);
	// print "</br>Account salt: ". $uac->getSalt();
	// print "</br>Account Password: ". $uac->getPassword();
	// print "</br>Duplicate Account: ". $uac->duplicateAccount();
	// print "</br>Valid Accounts: ". $uac->validAccount();
	// $prof =  new User_Profile(3,'Charter House','The best ever','picture path');
	// print $prof->createProfile();
	// $prof->setOrgDesc("Me fre ghana");
	// print "</br>".$prof->updateProfile();
	
	$events = new Events(3,"Ghana Rocks","MEST 2014 Class","10,5",date('2/3/2013'),'11:00',date('2/3/2013'),'12:00',"poster path","The best event");
	print $events->createEvent();
?>