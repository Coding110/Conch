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
function loginInfo1(username,password) {
//    $.get("login.jsp", { username :username,password:password}, function (data) {
//        data = csdn.toJSON(data);
//        if (data.status == true) showok(e);
//        else showerr(e, data.error);
//        return false;
//    });
	if(username=="")
	{
		 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">请输入用户名</span>';
		 return ;
	}
	if(password=="")
	{
		 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">请输入密码</span>';
		 return ;
	}
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      //alert(2);
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      //alert(3);
      }
        xmlhttp.onreadystatechange=function()
      {
    	//alert("readyState: " +xmlhttp.readyState +", status: " +xmlhttp.status);

      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
    	  //alert("rep: " + xmlhttp.responseText);
         // document.getElementById("tmptext").innerHTML=xmlhttp.responseText;
      	  var status = eval('('+ xmlhttp.responseText+')');	 
      	  if(!status['status'])
      		  //showerr($('#error-message'),status['error']);
          	 document.getElementById("error-message").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span style="color: #b74d46">' + status['error'] + '</span>';
      	  else
      		window.location.href=status['data'];
      	 //document.getElementById("tmptext").innerHTML= '<img src="images/pic_02.gif" style="vertical-align:middle" /><span>' + status['error'] + '</span>';
        }
      };
    //
    xmlhttp.open("POST","login.jsp",false);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;charset=UTF-8");
    xmlhttp.send("username="+username+"&password=" +password);
}

  function registerInfo(username,password,email)
  {
	  alert(chk_sign());
    if(!chk_sign()) return ;

  	//alert("username:"+username +"  password:"+password +"  email:" +email);
  var xmlhttp;
  if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    //alert(2);
    }
  else
    {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    //alert(3);
    }
      xmlhttp.onreadystatechange=function()
    {
  	//alert("readyState: " +xmlhttp.readyState +", status: " +xmlhttp.status);

    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
       var status = eval('('+ xmlhttp.responseText+')');	 
    	window.location.href=status['data'];
    	//document.getElementById("J-authcenter")
    	//window.location.href ="index.html";
      }
    };
  //
  xmlhttp.open("POST","register.jsp",false);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;charset=UTF-8");
  xmlhttp.send("isSubmit=true&username="+username+"&password=" +password+"&email="+email);
  }