function signup() {
    if (csdn.doing) return false;
    clearError();

    if (!chk_sign()) return false;//检测

    var data = "";
    data += "nick=" + csdn.val2("nick");
    data += "&em=" + csdn.val2("em");
    data += "&pwd=" + csdn.val2("p1");
    data += "&cd=" + csdn.val2("cd");

    csdn.doing = true;
    csdn.loading($("#aReg")[0]);
    $.get(csdn.acc_handler + "?t=reg", data, function (data) {
        csdn.doing = false;
        csdn.loaded();
        data = csdn.toJSON(data);
        if (data.status == true) {
            location = "/account/regactive?from=" + csdn.val2('hd_from');
            return;
        }
        if (data.error.indexOf("-") == 2) {
            var arr = data.error.split("-");
            removeError($("#" + arr[0]));
            showerr($("#" + arr[0]), arr[1]);
            $("#" + arr[0]).select();
            if (arr[0] == "cd"){
               // $("#vcImg").attr("src", csdn.vc_handler + "?r=" + Math.random());
            }
        } else {
            alert(data.error);
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

$(function () {
    $("#aRecode").click(function () {
       // $("#vcImg").attr("src", csdn.vc_handler + "?r=" + Math.random()); return false;
        $("#vcImg").attr("src", "image.jsp?r=" + Math.random()); return false;
    });
    $("#aReg").click(function () {
        signup(); return false;
    });
    $("#em")[0].blur = function () {
        var e = $(this); removeError(e); check_em(e);
    };
    $("#p1")[0].onchange = function () {
        var e = $(this); removeError(e); chk_p1(e);
    };
    $("#p2")[0].onchange = function () {
        var e = $(this); removeError(e); chk_p2(e);
    };
  //  $("#vcImg").attr("src", csdn.vc_handler + '?r_d=' + csdn.random());
    $("#cd").focus(function () {
        if ($("#tr_vc").css("display") == "none") {
            $("#tr_vc").show();
        }
    });
    $('#cd').blur(function(){
    	check_verifyCode($("#cd"));
    });
    /*自动检查昵称是否可用*/
    $('#nick').blur(check_nick);
    $('#em').focus();
    
});
function check_nick(ev) {
    $(this).next().remove();
    var nick = this.value;
    if (!nick) return false;
    var nick2 = nick.replace(/[\u4e00-\u9fa5]/g, 'aa');
    if (!/^[a-z0-9_\-]{2,20}$/ig.test(nick2) ||
        nick.indexOf('\u4e36') != -1 ||
        new Badwords().check(nick)
        ) {
        showerr($(this), '昵称不合法');
        return false;
    }
    csdn.doing = true;
    $.get("register.jsp?check=chknick",{nick : nick},function (data){
    	data=csdn.toJSON(data);
    	alert("data.status : "+data.status);
    	//data.id;
    	if(data.status) showwok($('#nick'));
    	else showerr($('#nick'),data.error);
    	csdn.doing = false;
    	return false;
    });
}
function check_em(e) {
    if (!chk_em(e)) return false;
    $(e).next().remove();
    $.get("register.jsp?check=chkemail", "em=" + csdn.val2(e), function (data) {
        data = csdn.toJSON(data);
        if (data.status == true) showok(e);
        else showerr(e, data.error);
        return false;
    });
}

function check_verifyCode(e) {
  if (!chk_val($("#cd"), "请输入验证码")) return false;
    $(e).next().remove();
    $.get("register.jsp?check=chkCode", "rand=" + csdn.val2(e), function (data) {
    	data = csdn.toJSON(data);
        if (data.status == true) showok(e);
        else showerr(e, data.error);
        return false;
    });
}

function chk_sign() {
  
    if (!chk_val($("#nick"), "请输入昵称")) return false;

    if (!chk_em($("#em"))) return false;

    if (!chk_p1($("#p1"))) return false;

    if (!chk_p2($("#p2"))) return false;

    if (!chk_val($("#cd"), "请输入验证码")) return false;

    if (!$("#chkTerms").attr("checked")) {
        showerr($("#chkTerms").parent(), "您尚未阅读注册条款！");
        return false;
    }

    
    return true;
}
function chk_p1(e) {

    e.next().hide();

    if (!csdn.hasVal(e)) {
        showerr(e, "请输入密码！");
        e.focus();
        return false;
    }
    var pwStrong = csdn.checkPW(e.val());
    if (pwStrong == 1) {
        showerr(e, "密码安全太低，请重设！");
        e.focus();
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
    if (!csdn.hasVal(e)) {
        showerr(e, "请再次输入密码！");
        e.focus();
        return false;
    } else if (e.val() != $("#p1").val()) {
        showerr(e, "两次输入密码不一致，密码大小写敏感。");
        e.select();
        return false;
    } else {
        showok(e);
    }
    return true;
}
function chk_em(e) {
    if (!csdn.hasVal(e)) {
        showerr(e, "请输入您的邮箱！");
        e.focus();
        return false;
    } else if (!csdn.checkEM(e.val())) {
        showerr(e, "请输入真实的Email地址！");
        e.select();
        return false;
    } else {
        showok(e);
    }
    return true;
}
function chk_val(e, err) {
    if (!csdn.hasVal(e)) {
        showerr(e, err);
        e.focus();
        return false;
    } else {
        showok(e);
    }
    return true;
}
