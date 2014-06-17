<%@ page language="java" contentType="text/html; charset=utf-8"
    pageEncoding="utf-8" import="com.conch.generic.ConchCookie"  import="java.net.URLDecoder"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript">
function logOut(){
	  $.cookie("username",null,{path:"/"});	  	  
	   window.location.href="http://localhost：8080/conch"; 
}

</script>
</head>
<body>
<%
/*  Cookie cookies[]=request.getCookies(); // 将适用目录下所有Cookie读入并存入cookies数组中  
Cookie sCookie=null;  
String username=null;
String uid =null;
 System.out.println(cookies.length); 
if(cookies!=null){
 username= cookies[0].getValue();
 uid =cookies[1].getValue();  */
 ConchCookie cookie = new ConchCookie(response,request);
 String username=null;
 String uid= null;
if(cookie.getCookie("username")!=null){
	username = java.net.URLDecoder.decode(cookie.getCookie("username"),"UTF-8"); 
}
if(cookie.getCookie("uid")!=null){
    uid=  java.net.URLDecoder.decode(cookie.getCookie("uid"),"UTF-8");
}
 if(username!=null && !username.equals("null")){
  %>
   <ul class="nav pull-right">
        	 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="userhome.html"><%= username%> <b class="caret"></b> </a>
	 		<ul class="dropdown-menu">
	 			<li> <a href="./userhome.html"> <i class="icon-question-sign"></i> 我的主页 </a> </li>
	 			<li> <a href="./upload.html"> <i class="icon-question-sign"></i> 上传图片 </a> </li>
	 			<li> <a href="./user/getUser?uid=<%=uid%>" > <i class="icon-cog"></i> 修改个人资料 </a> </li>
	 			<li> <a href="./setting.html?username="> <i class="icon-cog"></i> 个人设置 </a> </li>
	 			<li><a href="javascript:logOut()" ><i class="icon-off"></i>  退出</a></li>
	 		</ul>
	 			 <div class="alert fade in top_pin hide"><a class="close" data-dismiss="alert" href="">×</a>
	 				<div id="for_top_tip"></div>
	 			 </div>
	 		</li>
	 	</ul>
  
   <%
}else{
	%>
	 <div class="pagetop_notice">
		  <cite id="login"  ><span class="login">您还未登录！</span>|
		   <a href="login.html" >登录</a>|<a href="register.html" >注册</a>
		 </cite>
	 </div>
	<% 
}
%>

</body>
</html>