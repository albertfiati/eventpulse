<?php
	session_start();
	require_once("../config/requires.inc.php");

    $title = mysql_escape_string(htmlentities($_POST['title'],ENT_QUOTES,"UTF-8"));
	$venue = mysql_escape_string(htmlentities($_POST['venue'],ENT_QUOTES,"UTF-8"));
	
	if (isset($_FILES['poster'])){
		$posterImg = new uploadPicture(uniqid(),"poster","../uploadedFiles/posters/");
		$posterPath = $posterImg->upload();
	}else{
		$posterPath = "nofile";
	}
	
	$description = mysql_escape_string(htmlentities($_POST['description'],ENT_QUOTES,"UTF-8"));
	$startdate = $_POST['startdate'];
	$starttime = $_POST['starttime'];
	$enddate = $_POST['enddate'];
	$endtime = $_POST['endtime'];
	$latlng  = mysql_escape_string(htmlentities($_POST['latlng'],ENT_QUOTES,"UTF-8"));
	$accID = $_SESSION['eventpulseid'];
	
	$event = new Event($accID,$title,$venue,$latlng,$startdate,$starttime,$enddate,$endtime,$posterPath,$description);
	
	//validate form
	$event->createEvent();
	
?>