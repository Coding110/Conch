<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8" import="java.util.Date" import="java.sql.*" import="java.io.*" 
	import="java.util.Calendar" %>
    
<%@ include file="dbcommon.jsp" %>
  
 
 <%
	//openDB();
	//createTables();
	//closeDB();
	//Date date = new Date();
	Calendar birth = Calendar.getInstance();
	birth.clear();
	birth.set(2002,11,12);
	//AddUser("firstguy3", "AEFC23ACD29B", "test3@test.com", "Super Man", 'M', birth, "Beijing");	
	//CheckUser("firstguy2", "AEFC23ACD29B");
	
	int uid = 2;
	
	//AddPhotoMail(uid, "mail3@test.com", "fdsafdsafe2h", "imap.test.com", 143);
	
	//AddPhotoInfo("92a048a4df71bce4ab06974f59d26abc", uid, "mail3@test.com", "320", "dir6");
	
	AddADUnion("百度推广", "http://e.baidu.com/", "");

	
 %>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>

<script language="javascript" type="text/javascript" src="../js/jquery-1.11.0.js"></script>
<script language="javascript" type="text/javascript" src="../js/RSA.js"></script>
<script language="javascript" type="text/javascript" src="../js/BigInt.js"></script>
<script language="javascript" type="text/javascript" src="../js/Barrett.js"></script>

</head>
<body>

<script>
$(document).ready(function(){  
//十六进制公钥  
var rsa_n = "C34E069415AC02FC4EA5F45779B7568506713E9210789D527BB89EE462662A1D0E94285E1A764F111D553ADD7C65673161E69298A8BE2212DF8016787E2F4859CD599516880D79EE5130FC5F8B7F69476938557CD3B8A79A612F1DDACCADAA5B6953ECC4716091E7C5E9F045B28004D33548EC89ED5C6B2C64D6C3697C5B9DD3";  
      
$(".btn").click(function(){  
    setMaxDigits(131); //131 => n的十六进制位数/2+3  
    var key      = new RSAKeyPair("10001", '', rsa_n); //10001 => e的十六进制  
    var password = "123456";//$("#password").val();  
    password = encryptedString(key, password); //不支持汉字  
    $("#edata").append(password);  
    $("#edata").append("<br>length: " + password.length);  
    //$("#login").submit();  
    //alert(password); //test  
});  
});  
</script>

<button class="btn" id="btnid" value="RSA">RSA</button>
<div id="edata"><div>
</body>
</html>