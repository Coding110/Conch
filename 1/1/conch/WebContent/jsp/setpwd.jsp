<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"  import="com.conch.generic.ConchCookie"%>
 <%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>设置密码</title>
</head>
<body>
<form id="fm1" action="/conch/user/updatePwd" method="post">
<div class="form-horizontal" id="pmform">
	<div class="control-group">
	      <label class="control-label"><font color="#FF0000">*</font>旧密码</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="oldpwd" value="" />
	      </div>
	 </div>
	 
	<div class="control-group">
		<label class="control-label"><font color="#FF0000">*</font>新密码</label>	
		<div class="controls">
			<input type="password" class="input-xlarge input-photoemail"  onblur="" id="p1" ></input>
			<span id="for_photoemail"></span>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label"><font color="#FF0000">*</font>再次输入新密码</label>	
		<div class="controls">
			<input type="password" class="input-xlarge" onblur="" name="passwd" id="p2" ></input>
			<span id="for_pmpasswd"></span>
		</div>
	</div>
     
 	<div class="control-group">
          <label class="control-label"></label>
          <!-- Button -->
          <div class="controls">
         <a href="javascript:setPwd()" class="btn btn-primary">提交</a>
    </div>
     <input type="hidden" value="<c:out value="${user.passwd}"/>"  id ="passwd"/>
    <input type="hidden" value="<c:out value="${user.uid}"/>"  name="uid" id ="uid"/>
  </div>
  </div>
 </form>
</body>
</html>