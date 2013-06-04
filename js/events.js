$(document).ready(function(){
	eventsinit();	
});

function eventsinit(){
	listAllEvents();
	listAllEventsById()
}

function newEvent(form){
	$(form).ajaxSubmit({
		url:"controllers/createevent.php",
		dataType:"html",
		type:"post",
		success:function(data,status){
			window.location.replace("profile.html");
		},
		error:function(data){
			$('#output').html(data);
		}
	});
	return false;
}	

function listAllEvents(){
	$.get("controllers/listallevents.php",function(data){		
		$('#alleventslist').html(data);	
	 });
	 
	 return false;
}

function listAllEventsById(){
	$.get("controllers/listalleventsbyaccount.php",function(data){		
		$('#alleventslistbyid').html(data);	
	 });
	 
	 return false;
}