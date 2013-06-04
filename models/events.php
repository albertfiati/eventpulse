<?php
    class Event{
    	//class variables
    	private $accountID;
		private $eventTitle;
		private $eventVenue;
		private $eventLatLng;
		private $startDate;
		private $startTime;
		private $endDate;
		private $endTime;
		private $eventPoster;
		private $eventDesc;
		public $table = EVENTS;
		
		//constructor
		public function __construct($accId,$title,$venue,$latlng,$startDate,$startTime,$endDate,$endTime,$poster,$desc){
			$this->accountID = $accId;
			$this->eventTitle = $title;
			$this->eventVenue = $venue;
			$this->eventLatLng = $latlng;
			$this->startDate = $startDate;
			$this->startTime = $startTime;
			$this->endDate = $endDate;
			$this->endTime = $endTime;
			$this->eventPoster=$poster;
			$this->eventDesc = $desc;
		}
		
		//getters and setters
		public function getAccountID(){
			return $this->accountID;
		}
		
		public function setAccountID($accID){
			$this->accountID=$accID;
		}
		
		public function getEventTitle(){
			return $this->eventTitle;
		}
		
		public function setEventTitle($title){
			$this->eventTitle=$title;
		}
		
		public function getEventVenue(){
			return $this->eventVenue;
		}
		
		public function setEventVenue($venue){
			$this->eventVenue = $venue;
		}
		
		public function getLatLng(){
			return $this->eventLatLng;
		}
		
		public function setLatLng($latlng){
			$this->eventLatLng=$latlng;
		}
		
		public function getStartDate(){
			return $this->startDate;
		}
		
		public function setStartDate($startDate){
			$this->startDate = $startDate;
		}
		
		public function getStartTime(){
			return $this->startTime;
		}
		
		public function setStartTime($startTime){
			$this->startTime=$startTime;
		}
		
		public function getEndDate(){
			return $this->endDate;
		}
		
		public function setEndDate($endDate){
			$this->endDate=$endDate;
		}
		
		public function getEndTime(){
			return $this->endTime;
		}
		
		public function setEndTime($endTime){
			 $this->endDate=$endTime;
		}
		
		public function getEventPoster(){
			return $this->eventPoster;
		}
		
		public function setEventPoster($poster){
			$this->eventPoster = $poster;
		}
		
		public function getEventDescription(){
			return $this->eventDesc;
		}
		
		public function setEventDescription($desc){
			$this->eventDesc=$desc;
		}
		
		//creating event
		public function createEvent(){
			$accID = $this->accountID;
			$title = mysql_escape_string($this->eventTitle);
			$venue = mysql_escape_string($this->eventVenue);
			$latlng = mysql_escape_string($this->eventLatLng);
			$startDate = mysql_escape_string($this->startDate);
			$startTime = mysql_escape_string($this->startTime);
			$endDate = mysql_escape_string($this->endDate);
			$endTime = mysql_escape_string($this->endTime);
			$poster = mysql_escape_string($this->eventPoster);
			$desc= mysql_escape_string($this->eventDesc);
			
			try{
				$query = "Insert into $this->table(accountID,title,venue,latlng,startdate,starttime,enddate,endtime,poster,description)
						  values('$accID','$title','$venue','$latlng','$startDate','$startTime','$endDate','$endTime','$poster','$desc')";
				$result = mysql_query($query);
				
				print $query;
				
				if($result==1){
					return mysql_insert_id();
				}else{
					return null;
				}
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//updating event
		public function updateEvent(){
			$accID = $this->accountID;
			$title = mysql_escape_string($this->eventTitle);
			$venue = mysql_escape_string($this->eventVenue);
			$latlng = mysql_escape_string($this->eventLatLng);
			$startDate = mysql_escape_string($this->startDate);
			$startTime = mysql_escape_string($this->startTime);
			$endDate = mysql_escape_string($this->endDate);
			$endTime = mysql_escape_string($this->endTime);
			$poster = mysql_escape_string($this->eventPoster);
			$desc= mysql_escape_string($this->eventDesc);
			
			try{
				$query = "update $this->table set title='$title',venue='$latlng',latlng='$latlng',startdate='$startDate',
						  starttime='$startTime',enddate='$endDate',endtime='$endTime',poster='$poster',description='$desc' where accountId='$accID'";				
				$result = mysql_query($query);
				
				if(mysql_affected_rows()>0){
					return "T:Event update successful";
				}else{
					return "F:Event update failed";
				}
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//delete event
		public function deleteEvent(){
			$accID = $this->accountID;
			
			try{
				$query = "delete from $this->table where accountId='$accID'";				
				$result = mysql_query($query);
				
				if(mysql_affected_rows()>0){
					return "T:Event cancelled";
				}else{
					return "F:Event cancellation failed";
				}
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//fetching events
		public static function listEvents(){
			try{
				$query = "select * from events order by id desc";				
				$result = mysql_query($query);
				
				return $result;
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
		
		//fetching events by account id
		public static function listEventsById($accId){
			try{
				$query = "select * from events where accountID=$accId order by id desc";				
				$result = mysql_query($query);
				
				return $result;
			}catch(Exception $ex){
				return "F:".$ex;
			}
		}
   	}
?>