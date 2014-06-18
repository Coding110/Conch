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
	
	$("#setpwd").click(function(){
		var active = $("#setpwd").parent().attr('class');
		//alert(active);
		if(active==undefined || active==""){
			$("#tab-content-id").load("jsp/setpwd.jsp");
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
	$("#myform").submit();
}

function setPwd(){
	 var passwd = document.getElementById("passwd").value;
	 var newPasswd=document.getElementById("oldpwd").value;
	 if(passwd!=newPasswd){
	     showerr($("#oldpwd"), "旧密码输入错误！");
	     return false;
	 }
	   if (!chk_p1($("#p1"))) return false;
//	    chk_p1($("#p1"));
	   if (!chk_p2($("#p2"))) return false;
	    
	    $("#fm1").submit();  
}


