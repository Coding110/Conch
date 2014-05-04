<%@ page language="java" contentType="text/html; charset=utf-8"
    pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="files/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="files/ga.js"></script>
<script type="text/javascript" src="files/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="files/csdn.js"></script>
<script type="text/javascript" charset="utf-8" src="files/tracking.js"></script>
<script type="text/javascript" charset="utf-8" src="files/main.js"></script>
<script type="text/javascript" src="js/register.js"></script>
<script type="text/javascript" src="js/login.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>用户注册</title>
</head>
<body>
<div class="full">
		<div class="logo_login02">
			<img src="files/becktu_logo.png" />
		</div>

<div class="content_login">
  <form id="subform" name="fm" action ="/conch/user/addUser" method="post">
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
								<td width="150" class="right" valign="top"><dfn>*</dfn>E-mail：</td>
								<td>
									<div class="oneline">
										<input type="text" id="em" name="regemail" class="inputbox" maxlength="100"/>
									</div>
									<div class="twoline">
										（有效的E-mail地址才能收到激活码，帐户在激活后才能享受网站服务。）</div>

								</td>
							</tr>
							<tr>
								<td class="right" valign="top"><dfn>*</dfn>昵称：</td>
								<td>
									<div class="oneline">
										<input type="text" id="nick" name="regname" class="inputbox" maxlength="20"/>
									</div>
									<div class="clear"></div>
									<div class="twoline">
										（昵称将在贝壳图全站显示。2～20个字符，支持中文、英文、数字、"_"、"-"）</div>

								</td>
							</tr>
							<tr>
								<td class="right" valign="top"><dfn>*</dfn>密码：</td>
								<td>
									<div class="oneline">
										<input type="password" id="p1" class="inputbox" maxlength="50"/>
										   <ul
												id="pwd-strong" style="display: none;">
												<li>弱</li>
												<li>中</li>
												<li>强</li>
											</ul>
									</div>
									<div class="clear"></div>
									<div class="twoline">
										（为了您帐户的安全，建议使用字符+数字等多种不同类型的组合，且长度大于5位。）</div>

								</td>
							</tr>
							<tr>
								<td class="right" valign="top"><dfn>*</dfn>再次输入密码：</td>
								<td>
									<div class="oneline">
										<input type="password" id="p2" name="passwd" class="inputbox" maxlength="50"/>
									</div>
									<div class="twoline">（确保您记住密码。）</div>

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
											href="https://passport.csdn.net/help/faq" target="_blank">如何启用Cookie？</a>）
									</div>
								</td>
							</tr>
							<tr id="tr_vc" style="">
								<td class="right" valign="top"></td>
								<td><img id="vcImg" src="image.jsp"
									style="vertical-align: middle"/> <a id="aRecode"
										href="javascript:void(0);" class="font_gray">看不清，换一张</a></td>
							</tr>
							<tr>
								<td class="right" valign="top"><dfn>*</dfn>注册条款：</td>
								<td>
									<div class="oneline">
										<p class="error_two">
											<input type="checkbox" id="chkTerms" name="chkTerms"
												value="1"/> <label for="chkTerms">我已仔细阅读并接受 <a
													href="voice.html"
													class="font_gray14" target="_blank">贝壳图注册条款</a>。
											</label>
										</p>
									</div>
									<div id="tmptext"></div> 
								</td>
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
									href="javascript:void(0)" onclick="document.getElementById('subform').submit();" ><span>注 册</span></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="btm_bg"></div>
		 </form>
		</div>
	</div>
	<script type="text/javascript" src="files/badwords.js"></script>
</body>
</html>