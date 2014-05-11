/**
 * 
 */

$(document).ready(function(){
	$("#tab-content-id").load("jsp/setuserinfo.jsp");
	
	$("#setpmid").click(function(){
		var active = $("#setpmid").parent().attr('class');
		//alert(active);
		if(active==undefined || active==""){
			$("#tab-content-id").load("jsp/setphotomail.jsp");
		}
	});
	
	$("#setinfoid").click(function(){
		var active = $("#setinfoid").parent().attr('class');
		if(active==undefined || active==""){
			$("#tab-content-id").load("jsp/setuserinfo.jsp");
		}
	});
	
});