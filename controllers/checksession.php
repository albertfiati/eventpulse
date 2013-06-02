<?php
	session_start();
	
    if (!(isset($_SESSION['eventpulseid']))){
    	print "logout";
   }
?>