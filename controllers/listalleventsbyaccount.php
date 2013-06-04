<?php
    session_start();
	require_once("../config/requires.inc.php");
	
	$result = Event::listEventsById($_SESSION['eventpulseid']);
	
	while($row = mysql_fetch_assoc($result)){
		$date = new DateTime($row['startdate']);
		
		print "<a href=\"/event.html?id=".$row['id']."\">
				<div class='inline padding-top padding-bottom' style='border:1px solid #ecf0f1;padding-right:0px; margin:10px 10px 0px 0px;padding:0px; cursor:pointer;'>
		            <div class='column_2 bck light text center padding-top padding-bottom' style='min-height:134px;max-height:134px; padding-right:0px; margin-left:0px;
		            background-size:cover;background-image:url(\"". $row['poster'] ."\");'></div>
		            <div class='column_6 bck  text center' style='margin-left: -19px;'>
		            	<div style='min-height:100px; background-color:#eee; margin-right:-19px; padding-top:10px;'>
		            		<div style='text-align:left; padding:4px 3px 4px 4px; font-weight:bold;'>".$row['title']."</div>
			            	<div style='text-align:left; padding:4px 3px 4px 6px;'>&nbsp;<span class='icon map-marker'> &nbsp;&nbsp;</span>".$row['venue']."</div>
			            	<div style='text-align:left; padding:4px 3px 4px 6px;'>
			            		<span class='icon calendar'> &nbsp;</span>". date_format($date,'d M Y') .
			            		"&nbsp;&nbsp;&nbsp;&nbsp;<span class='icon time'> &nbsp;</span>". date('h:i a',strtotime($row['starttime'])) .
			            	"</div>		            		
		            	</div>
		            	<div style='background-color:#1bbc9b; margin-right:-19px;'>
		            		<div style='text-align:right; padding:7px;'>
		            			<span style='padding:6px; color:#fff;' class='icon share' title='Share'></span>
		            			<span style='padding:6px; color:#fff;' class='icon comments-alt' title='Review Feedback'></span>
		            			<span style='padding:6px; color:#fff;' class='icon pencil' title='Edit Event'></span>
		            			<span style='padding:6px; color:#fff;' class='icon trash' title='Delete or cancel event'></span>
		            		</div>
		            	</div>
		            </div>
		        </div>
		</a>";
	}
?>