<?php
	include("models/uploadPicture.php");
	// print "Username: ". $_POST['username'];
	// print "</br>Password: ". $_POST['password'];
// 	
	// if(isset($_FILES['myFile'])){
		// $pic = new uploadPicture($_POST['username'],"myFile","uploadedFiles/logos/");
		// print "</br>". $pic->upload();
	// }
	
	// print "</br>title" . $_POST['title'];
	// print "</br>venue" . $_POST['venue'];
	
	$d = new DateTime();
	$dd = $d->format('y m d');
	$now = new DateTime($dd);
	$odt = new DateTime('2013-6-5');
	
	print $now;
		
	// print $now->format('d m y') . "</br>";
	// print $odt->format('d m y');
	//print date_diff($odt,$now)->format('%a');
?>