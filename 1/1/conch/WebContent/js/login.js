//include file="../files/register.js" 
 function loginInfo(){
	var username=document.getElementById("username").value;
	var passwd =document.getElementById("password").value;
	 if(username=="")
		{
			 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">请输入用户名</span>';
			 return false;
		}
		if(passwd=="")
		{
			 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">请输入密码</span>';
			 return false;
		}		
	    $.get("/conch/user/loginCheck",{username : username,passwd:passwd},function (data){
	    	data=toJSON(data);
	    	alert(data.to);
      	  if(!data.result)
          	 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">' + data.mess + '</span>';
      	  else{
      		window.location.href=data.to;
         }
	    });
 }
 
 function toJSON(data){
	    if (typeof data == "string") data = eval("(" + data + ")");
	    return data;
 }
 
function loginCheck(){
	alert(document.getElementById("username").value);
	if(document.getElementById("username").value=="")
	{
		 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">请输入用户名</span>';
		 return false;
	}
	if(document.getElementById("password").value=="")
	{
		 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">请输入密码</span>';
		 return false;
	}
	return true;
}


