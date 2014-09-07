<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"  import="com.conch.generic.ConchCookie"%>
 <%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<link href="/conch/files/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="files/ga.js"></script>
<script type="text/javascript" src="files/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="files/csdn.js"></script>
<script type="text/javascript" charset="utf-8" src="files/tracking.js"></script>
<script type="text/javascript" charset="utf-8" src="files/main.js"></script>
<script type="text/javascript" src="js/register.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>重设密码</title>
</head>
<body>
<div class="full">
		<div class="logo_login02">
			<img src="/conch/files/becktu_logo.png" />
		</div>

<div class="content_login">
  <form id="subform" name="fm" action ="/conch/user/addUser" method="post" >
			<div class="top_bg"></div>
			<ul class="login_top">
				<!--
	<li><img src="./files/pic_login01.gif"></li>
	<li><img src="./files/pic_login02.gif"></li>
	<li><img src="./files/pic_login03.gif"></li>    
-->
			</ul>
			<div class="login_cont01">
				<h5></h5>
				<div class="table">
					<table border="0" width="100%">
						<tbody>
							<tr>
								<td width="150" class="right" valign="top"><dfn>*</dfn>注册E-mail：</td>
								<td>
									<div class="oneline">
										<input type="text" id="em" name="regemail" class="inputbox" maxlength="100"/>
									</div>
									<div class="twoline">
										（有效的E-mail地址才能收到激活码）</div>

								</td>
							</tr>
							<tr>
								<td class="right" valign="top"><dfn>*</dfn>校验码：</td>
								<td>
									<div class="oneline">
										<input type="text" id="cd" class="inputbox" maxlength="10"/>
									</div>
									<div style="clear: both;"></div>
									<div style="color: Red; font-size: 12px;">
										（如果您连续输入不对验证码，请检查您的浏览器是否禁用了Cookie。<a
											href="" target="_blank">如何启用Cookie？</a>）
									</div>
								</td>
							</tr>
							<tr id="tr_vc" style="">
								<td class="right" valign="top"></td>
								<td><img id="vcImg" src="/conch/image.jsp"
									style="vertical-align: middle"/> <a id="aRecode"
										href="javascript:void(0);" class="font_gray">看不清，换一张</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="login_cont10">
				<div class="table">
					<table border="0">
						<tbody>
							<tr>
								<td width="150" class="right" valign="top"></td>
								<td><a id="aReg" class="btn_logintwo"
									href="javascript:registerInfo()" ><span>重设密码</span></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="btm_bg"></div>
		 </form>
		</div>
	</div>
</body>
</html>