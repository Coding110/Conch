<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>设置存储邮箱</title>
</head>
<body>

<div class="form-horizontal" id="pmform"> <!--  action="./photo/pmprofile" method="post" -->

	<div class="control-group">
	      <label class="control-label"><font color="#FF0000">*</font>用户</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="input-user" value="" />
	      </div>
	 </div>
	 
	<div class="control-group">
		<label class="control-label"><font color="#FF0000">*</font>邮箱</label>	
		<div class="controls">
			<input type="text" class="input-xlarge input-photoemail" name="photomail" onblur="" id="input-photoemail" value="example@conch.com"></input>
			<span id="for_photoemail"></span>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label"><font color="#FF0000">*</font>密码</label>	
		<div class="controls">
			<input type="password" class="input-xlarge" onblur="" name="passwd" id="input-pmpasswd" value=""></input>
			<span id="for_pmpasswd"></span>
		</div>
	</div>
 
 	<div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
         <a href="javascript:sub_pmprofile()" class="btn btn-primary">提交</a>&nbsp;&nbsp;&nbsp; <a href="" class="btn">跳过</a>
      </div>
    </div>
    
 </div>
<script>

</script>
</body>
</html>