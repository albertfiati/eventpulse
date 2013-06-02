<?php
	include("models/uploadPicture.php");
	print "Username: ". $_POST['username'];
	print "</br>Password: ". $_POST['password'];
	$pic = new uploadPicture($_POST['username'],"myFile","uploadedFiles/logos/");
	print "</br>". $pic->upload();
	print "</br>Gender" . $_POST['gender'];
?>