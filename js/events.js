$('document').ready(function(){
	eventinit();
});

function eventinit(){
	createEvent();
}

function createEvent(form){
	$(form).ajaxSubmit({
		url:"controllers/createevent.php",
		dataType:"html",
		type:"post",
		success:function(data,status){
			alert(data + " " + status);
			concole.log(data);
		},
		error:function(data,status){
			alert(data + " " + status);
			console.log(data,status);
		},
		complete:function(data,status){
			alert(data + " " + status);
			console.log(data + " " + status);
		}
	});
	return false;
}
