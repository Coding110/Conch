$(function () {

	$("#em").blur(function(){	
	  var e = $(this); removeError(e); check_em(e);
	});
	$("#nick").blur(function(){	
		  var e = $(this); removeError(e); check_nick(e);
		});
	 $("#p1").blur(function () {
	  var e = $(this);removeError(e); chk_p1(e);
	 });
	 $("#p2").blur(function () {
	  var e = $(this); removeError(e); chk_p2(e);
	  });
//	 $("#aReg").click(function () {
//	        signup(); return false;
//	  });
	 $("#cd").blur(function () {
		  var e = $(this); removeError(e); check_verifyCode(e);
		  });
//	 $("#cd").focus(function () {
//	        if ($("#tr_vc").css("display") == "none") {
//	            $("#tr_vc").show();
//	        }
//	   });
	    $("#aRecode").click(function () {
	         $("#vcImg").attr("src", "image.jsp?r=" + Math.random()); return false;
	    });
	  $('#em').focus();
});
var chkflag=0;

function removeError(e) {
    e.parent().children().each(function () {
        if (this.className == "error_one") {
            this.parentNode.removeChild(this);
            return;
        }
    });
}

function showerr(e, err) {
	removeError(e);
    var p = document.createElement("p");
    p.className = "error_one";
    p.innerHTML = '<img src="images/pic_02.gif" style="vertical-align:middle" /><span>' + err + '</span>';
    e.parent().append(p);
}

function showok(e) {
	removeError(e);
    var p = document.createElement("p");
    p.className = "error_one";
    p.innerHTML = '<img src="images/pic_03.gif" style="vertical-align:middle" />';
    e.parent().append(p);
}

function clearError() {
    $(".error_one").each(function () {
        this.parentNode.removeChild(this);
    });
}
function removeError(e) {
    e.parent().children().each(function () {
        if (this.className == "error_one") {
            this.parentNode.removeChild(this);
            return;
        }
    });
}
function chk_em(e) {
    if (!isEmpty(e)) {
        showerr(e, "请输入您的邮箱！");
      //  e.focus();
        return false;
    } else if (!checkEM(e.val())) {
        showerr(e, "请输入真实的Email地址！");
       // e.select();
        return false;
    } else {
        showok(e);
    }
    return true;
}

function check_em(e) {
    if (!chk_em(e)) return false;
    $(e).next().remove();
    $.get("/conch/user/checkEmail", "email=" + csdn.val2(e), function (data) {
        data = csdn.toJSON(data);
        if (data.result == true){
        	showok(e);
        }
        else{ 
        	alert("email 赋值=1");
        	chkflag=1;
        	showerr(e, data.error);
        }
    });
}

function chk_p1(e) {
    e.next().hide();

    if (!isEmpty(e)) {
        showerr(e, "请输入密码！");
       // e.focus();
        return false;
    }
    var pwStrong = checkPW(e.val());
    if (pwStrong == 1) {
        showerr(e, "密码安全太低，请重设！");
        //e.focus();
        return false;
    } else {
        e.next().show();
        e.next().attr("class", "pwds" + (pwStrong - 1));
        e.next().children().each(function (i) {
            $(this).removeClass("currs");
            if (i == pwStrong - 2) $(this).attr("class", "currs");
        });
        showok(e);
    }
    return true;
}

function chk_p2(e) {
    if (!isEmpty(e)) {
        showerr(e, "请再次输入密码！");
       // e.focus();
        return false;
    } else if (e.val() != $("#p1").val()) {
        showerr(e, "两次输入密码不一致，密码大小写敏感。");
      //  e.select();
        return false;
    } else {
        showok(e);
    }
    return true;
}

function isEmpty (e) {
    var v = e.val();
    return (v != "" && v != "请选择" && v != "选择或填写");
}
function checkEM(em){
	return /^([a-z0-9][a-z0-9_\-\.]*)@([a-z0-9][a-z0-9\.\-]{0,20})\.([a-z]{2,4})$/i.test(em);
}
function checkPW(pw){
    if (pw.length < 5) return 1;
    var c = 0;
    if (/[a-z]+/.test(pw)) c++;
    if (/[A-Z]+/.test(pw)) c++;
    if (/[0-9]+/.test(pw)) c++;
    if (/[^a-zA-Z0-9]+/.test(pw)) c++;
    if (c < 2) {
        var s = "0123456789abcdefghigklmnopqrstuvwxyz";
        var arr = pw.toLowerCase().split('');
        var idx = s.indexOf(arr[0]);
        if (idx > -1) {
            var arr2 = s.split('');
            for (var i = 0; i < arr.length; i++) {
                if (idx + 1 >= arr2.length || arr[i] != arr2[idx + i]) {
                    c++;
                    break;
                }
            }
        }
    }
    if (c > 1) {
        if (pw.length > 7) c++;
        if (/[^a-zA-Z0-9]+/.test(pw)) c++;
    }
    if (pw.replace(/(.)\1+/, "").length == 0) {
        c = 1;
    }
    if (c > 4) c = 4;

    return c;
}

function toJSON(data){
    if (typeof data == "string") data = eval("(" + data + ")");
    return data;
}
function chk_val(e, err) {
    if (!isEmpty(e)) {
        showerr(e, err);
      //  e.focus();
        return false;
    } else {
        showok(e);
    }
    return true;
}

function check_nick(ev) {
    $(this).next().remove();
    var nick = ev.val();
   // chk_val($("#nick"), "请输入昵称");
    if (!isEmpty(ev)) {
        showerr(ev, "请输入昵称");
//        ev.focus();
        return false;
       }      
    var nick2 = nick.replace(/[\u4e00-\u9fa5]/g, 'aa');
    if (!/^[a-z0-9_\-]{2,20}$/ig.test(nick2) ||
        nick.indexOf('\u4e36') != -1 ||
        new Badwords().check(nick)
        ) {
        showerr($(this), '昵称不合法');
        return false;
    }
    $.get("register.jsp?check=chknick",{nick : nick},function (data){
    	data=toJSON(data);
    	//data.id;
    	if(data.status){
    		showok(ev);
    	}
    	else {
    		chkflag=1;
    		showerr(ev,data.error);
    	}
    });
}

function check_verifyCode(e) {
	  //integer n = new integer();	  
	  if (!chk_val($("#cd"), "请输入验证码")) return false;
	    $(e).next().remove();
	    $.get("register.jsp?check=chkCode", "rand=" + e.val(), function (data) {
	    	data = toJSON(data);
	        if (data.status == true){
	        	showok(e);
	        	}
	        else{
	        	chkflag=1;
	        	showerr(e, data.error);
	        	}
	    });
	   // return true;
	}
function chk_sign() {
	
    check_em($("#em"));
//    if (!check_nick($("#nick"))) return false;
    check_nick($("#nick"));
   if (!chk_p1($("#p1"))) return false;
//    chk_p1($("#p1"));
    if (!chk_p2($("#p2"))) return false;
 //   chk_p2($("#p2"));
//    if (!check_verifyCode($("#cd"))) return false;
    check_verifyCode($("#cd"));
    if (!$("#chkTerms").attr("checked")) {
        showerr($("#chkTerms").parent(), "您尚未阅读注册条款！");
       return false;

  }
	check_verifyCode($("#cd"));
	alert(!chkflag);
	alert(chkflag);
	if(!chkflag){
		chkflag=0;
     return true;
	}
	else{
		chkflag=0;
	 return false;
	}
}