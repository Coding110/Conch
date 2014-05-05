<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- <script type="text/javascript" src="js/jquery-1.7.1.js"></script> -->
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/login.js'></script>
<script type='text/javascript' src='files/register.js'></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="css/login.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>帐号登录</title>
</head>
<body>
	<div class="header"></div>
	<div class="main">
		<div class="container container-custom">
			<div class="row wrap-login">
				<div class="login-banner">
					<img src=images/login-banner.png class="img-responsive">
				</div>
				<div class="login-user">
					<div class="login-part">
						<h3>帐号登录</h3>
						<div class="user-info">
							<div class="user-pass">

								<form id="fm1" action="login" method="post" onsubmit="return loginCheck()">

									<input id="username" name="username" tabindex="1"
										placeholder="输入用户名/邮箱" class="user-name" type="text" value="" />

									<input id="password" name="password" tabindex="2"
										placeholder="输入密码" class="pass-word" type="password" value=""
										autocomplete="off" />
     
									<div id="error-message"></div>
									<div class="row forget-password">
										<span class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> <input
											type="checkbox" name="rememberMe" id="rememberMe"
											value="true" class="auto-login" tabindex="3" /> <label
											for="rememberMe">下次自动登录</label>
										</span> <span class="col-xs-6 col-sm-6 col-md-6 col-lg-6 forget">
											<a
											href="/account/fpwd?action=forgotpassword&service=http://www.csdn.net/"
											tabindex="4">忘记密码</a>
										</span>
									</div>
									<!-- 该参数可以理解成每个需要登录的用户都有一个流水号。只有有了webflow发放的有效的流水号，用户才可以说明是已经进入了webflow流程。否则，没有流水号的情况下，webflow会认为用户还没有进入webflow流程，从而会重新进入一次webflow流程，从而会重新出现登录界面。 -->
									<input type="hidden" name="lt"
										value="LT-684-caQE9zqxC1s7GM2EMdqSvdTbAhWTd0" /> <input
										type="hidden" name="execution" value="e5s1" /> <input
										type="hidden" name="_eventId" value="submit" /> <input
										class="logging" accesskey="l" value="登 录" tabindex="5"
										type="submit"/>

								</form>
							</div>
						</div>
						<div class="line"></div>
						<div class="third-part">
							<!-- 	<span>第三方帐号登录</span> <a
								href="https://api.weibo.com/oauth2/authorize?client_id=2601122390&response_type=code&redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DSinaWeiboProvider"
								class="sina"></a> <a id="linkedinAuthorizationUrl"
								href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id=75fvsy4v01jw1s&redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DLinkedInProvider&state=DCEEFWF45453sdffef424"
								class="linkin"></a> <a id="baiduAuthorizationUrl"
								href="https://openapi.baidu.com/oauth/2.0/authorize?response_type=code&client_id=cePqkUpKCBrcnQtARTNPxxQG&redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DBaiduProvider"
								class="baidu"></a> <a id="qqAuthorizationUrl"
								href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=100270989&redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DQQProvider&state=test"
								class="qq"></a> <a id="googleAuthorizationUrl"
								href="https://accounts.google.com/o/oauth2/auth?response_type=code&client_id=698150467263-vgi09jb7c8k0ic9088q5e4to0k2psfsl.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DGoogleProvider&state=email&approval_prompt=force&scope=email profile"
								class="google"></a> <a id="githubAuthorizationUrl"
								href="https://github.com/login/oauth/authorize?client_id=4bceac0b4d39cf045157&redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DGitHubProvider"
								class="github"></a> -->
							<div class="register-now">
								<span>还没有贝壳图帐号？</span> <span class="register"> <a
									href="register.html">马上注册</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer"></div>
</body>
</html>