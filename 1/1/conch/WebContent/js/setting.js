/**
 * 
 */
//include file="login.js" 
	
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
	
	// write some thing to get exist
	// open ok
	// hello world
	
	// Welcome to eclipse.
});

function sub_pmprofile(){
	var username = document.getElementById("input-user").value;
	var photoemail = document.getElementById("input-photoemail").value;
	var pmpasswd = document.getElementById("input-pmpasswd").value;
	//alert(username + ", " + photoemail + ", " + pmpasswd);

	$.post("./photo/pmprofile",
	{
		username:username,
		photomail:photoemail,
		passwd:pmpasswd
	},
	function(data, status){
		data=toJSON(data);
		alert("Data: " + data.data + "\nStatus: " + status);
	});
}

function sub_profile(){
	alert("sub_profile");
    /*var nick = $.trim($("#nickname").val());
    if(nick ==''){
            $("#sub_tip").html("请填写昵称");
            return;		
    }
    var cansub = $("#can_sub").val();
    if(cansub == 0){
            $("#sub_tip").html("昵称已被占用");
            return;	
    }
    if(cansub == 2){
            $("#sub_tip").html("邮箱已被占用");
            return;	
    }
    var emails = $("#email").val();
	if(emails == ''){
	    $("#sub_tip").html("请填写邮箱");
	    return;
	}
	    var city = $("#city").val();
	if(city == 0){
	    $("#sub_tip").html("请填写城市");
	    return;
	}*/
	$("#myform").submit();
}