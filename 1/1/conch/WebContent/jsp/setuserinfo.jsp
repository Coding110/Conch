<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>
<body>
<form class="form-horizontal" id="myform" action="" method="post">
    <input type="hidden" value="1" name="dosubmit"></input>
    <input type="hidden" value="" name="direct"></input>
    <div id="legend" class="">
      <legend class="">基本资料</legend>
    </div>
    
    <div class="control-group">
      <label class="control-label">昵称</label>
      <div class="controls">
        <input type="text" class="input-xlarge" onblur="javascript:check_nick()" id="nickname" name="info[name]" value="Donghua Lau"></input>
        <span id="for_nick"></span> </div>
    </div>
    <div class="control-group">
      <label class="control-label"><font color="#FF0000">*</font>姓名</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="info[realname]" value="东华" />
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label"><font color="#FF0000">*</font>Email<span id="email_status">                
                </span></label>
      <div class="controls">
        <input type="text" id="email" class="input-xlarge" onblur="javascript:check_email()" name="infoemail" value="1485084328@qq.com" />
     </div>
    </div>
  
     <hr></hr>
    <div class="control-group"> 
      
      <!-- Prepended text-->
      <label class="control-label"><font color="#FF0000">*</font>所在地区</label>
      <div class="controls">
        <div class="input-prepend">
          <select id="state" name="info[state_id]" onchange="get_city(this.value)">
            <option value="0">请选择</option>
                        <option value="11" selected="">北京</option>
                        <option value="12">天津</option>
                        <option value="13">河北</option>
                        <option value="14">山西</option>
                        <option value="15">内蒙古</option>
                        <option value="21">辽宁</option>
                        <option value="22">吉林</option>
                        <option value="23">黑龙江</option>
                        <option value="31">上海</option>
                        <option value="32">江苏</option>
                        <option value="33">浙江</option>
                        <option value="34">安徽</option>
                        <option value="35">福建</option>
                        <option value="36">江西</option>
                        <option value="37">山东</option>
                        <option value="41">河南</option>
                        <option value="42">湖北</option>
                        <option value="43">湖南</option>
                        <option value="44">广东</option>
                        <option value="45">广西</option>
                        <option value="46">海南</option>
                        <option value="50">重庆</option>
                        <option value="51">四川</option>
                        <option value="52">贵州</option>
                        <option value="53">云南</option>
                        <option value="54">西藏</option>
                        <option value="61">陕西</option>
                        <option value="62">甘肃</option>
                        <option value="63">青海</option>
                        <option value="64">宁夏</option>
                        <option value="65">新疆</option>
                        <option value="71">台湾</option>
                        <option value="81">香港</option>
                        <option value="82">澳门</option>
                        <option value="127">海外</option>
                      </select>
          <select id="city" name="info[city_id]">
            <option value="0">请选择</option>
                        <option value="1">东城区</option>
                        <option value="2">西城区</option>
                        <option value="3">崇文区</option>
                        <option value="4">宣武区</option>
                        <option value="5">朝阳区</option>
                        <option value="6">丰台区</option>
                        <option value="7">石景山区</option>
                        <option value="8" selected="">海淀区</option>
                      </select>
        </div>
        <p class="help-block"></p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">性别</label>
      <div class="controls"> 
        <!-- Inline Radios -->
        <label class="radio inline">
          <input type="radio" value="1" name="info[gender]" id="gender1" checked="checked" />
          男 </label>
        <label class="radio inline">
          <input type="radio" value="2" name="info[gender]" id="gender2" />
          女 </label>
      </div>
    </div>

    <div class="control-group"> 
      
      <!-- Select Multiple -->
      <label class="control-label">出生日期</label>
      <div class="controls">
        <select class="input-xlarge" name="info[age_range]">
          <option value="-1"></option>
                    <option value="0">&lt;25</option>
                    <option value="1" selected="selected">25-30</option>
                    <option value="2">30-35</option>
                    <option value="3">35-40</option>
                    <option value="4">&gt;40</option>
                  </select>
      </div>
    </div>
    

    <div class="control-group">
          <label class="control-label"></label>
          <div class="controls"><p id="sub_tip" style=" color:red"></p>
          </div>
    </div>
    <input type="hidden" id="can_sub" value="1" />

    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
         <a href="javascript:sub_profile()" class="btn btn-primary ">提交</a>&nbsp;&nbsp;&nbsp; <a href="" class="btn">跳过</a>
      </div>
    </div>
</form>
<script type="text/javascript">
function sub_profile(){
        var nick = $.trim($("#nickname").val());
        if(nick ==''){
                $("#sub_tip").html("请填写昵称");
                return;		
        }
        var cansub = $("#can_sub").val();
        if(cansub == 0){
                $("#sub_tip").html("昵称已被占用");
                return;	
        }
        if(cansub == 2){
                $("#sub_tip").html("邮箱已被占用");
                return;	
        }
        var emails = $("#email").val();
    if(emails == ''){
        $("#sub_tip").html("请填写邮箱");
        return;
    }
        var city = $("#city").val();
    if(city == 0){
        $("#sub_tip").html("请填写城市");
        return;
    }
    $("#myform").submit();
}
</script>
</body>
</html>