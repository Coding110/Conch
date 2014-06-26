/*
 *
 */

function newAlbum()
{
	
}

$(document).ready(function(){	
	
	$("#album-new").click(function(){
	
		// 这里被调用了两次，需要检查下
		var fname = document.getElementById("album-name").value;
		var url = "./photo/album?task=new&list=null&fname=" + fname;
		$("#album").load(url);
//		$.get(url, function(data, status){
//			alert("Data: " + data + "nStatus: " + status);
//		});	
	});	
	
	

});


