document.writeln("<link rel=\"stylesheet\" type=\"text\/css\" href=\"/content/navtop_2012.css\" \/>");
document.writeln("<div class=\"nav_top_2011\">");
var p__un = document.cookie.match(new RegExp("(^| )UserNick=([^;]*)(;|$)"));
if (!p__un) p__un = document.cookie.match(new RegExp("(^| )UserName=([^;]*)(;|$)"));
if (p__un) {
    document.write('<p><em>' + decodeURIComponent(p__un[2]) + '</em><a href="http://notify.csdn.net/" class="notice_num" id="header_notice_num" target=_blank>0</a>我的：<a href="http://my.csdn.net/my/letter" target=_blank>收件箱<span id="header_letter_num"></span></a><a href="http://download.csdn.net/my" class="red" target=_top>资源</a><a href="http://write.blog.csdn.net/" class="red" target=_top>博客</a><a href="http://my.csdn.net" target=_top>空间</a><a href="/account/profile" target=_blank>设置</a>|<a href="/help/faq" target=_blank>帮助</a>|<a href="/account/logout" target="_top">退出</a></p>');
} else {
    document.write('<p><span style="color:red;">您还未登录！</span>|<a href="/account/login" target="_top">登录</a>|<a href="/account/register" target=_top>注册</a>|<a href="/help/faq" target="_blank">帮助</a></p>');
}
document.writeln("<ul>");
var nav_arr1 = ['首页','业界','移动','云计算','研发','论坛','博客','下载'];
var nav_arr2 = ['www.csdn.net', 'news.csdn.net', 'mobile.csdn.net','cloud.csdn.net','sd.csdn.net','bbs.csdn.net', 'blog.csdn.net', 'download.csdn.net'];
for (var ii = 0; ii < nav_arr1.length; ii++)
document.writeln('<li><a href="http://' + nav_arr2[ii] + '/" target="_blank">' + nav_arr1[ii] + '</a></li>');
document.writeln("<li class=\"more\" ><h2 id=\"topnav_btnmore\" onclick=\"showNavMore(this)\"><a href=\"javascript:void(0);\">更多<\/a><\/h2>");
document.writeln("<div id=\"topnav_hidlist\">");
document.writeln("<iframe name='nav_frm' src='about:blank' width=92 height=178 scrolling=no frameborder=no></iframe>");
document.writeln("<\/div>");
document.writeln("<\/li>");
document.writeln("<\/ul>");
document.writeln("<\/div>");

function _el_(id) { return document.getElementById(id); }
function showNavMore(e) {
    var frm = window.frames['nav_frm'];
    var ss = '<!doctype html>';
    ss += '<html dir="ltr" lang="zh-CN">';
    ss += '<head>';
    ss += '<title>csdn</title>';
    ss += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    ss += '<link type="text/css" rel="Stylesheet" href="/content/navtop_2012.css" />';
    ss += '<base target="_blank" />';
    ss += '</head>';
    ss += '<body class="navbody">';
    ss += '<div class="nav_top_2011">';
    ss += '<ul style="width:76px;" onclick="top.hide_nav_more()">';
    var arr1 = ['CTO俱乐部', '学生大本营', '培训充电', '程序员', 'ITeye', 'TUP'];
    var arr2 = ['cto.csdn.net', 'student.csdn.net', 'edu.csdn.net', 'mobile.csdn.net', 'sd.csdn.net', 'cloud.csdn.net', 'www.programmer.com.cn', 'www.iteye.com', 'tup.csdn.net'];
    for (var i = 0; i < arr1.length; i++)
        ss += '<li><a href="http://' + arr2[i] + '/">' + arr1[i] + '</a></li>';
    ss += '</ul>';
    ss += '</div>';
    ss += '</body>';
    ss += '</html>';
    if (!frm.document.title) {
        frm.document.write(ss);
    }
    var hidList = _el_("topnav_hidlist");
    var isshow = hidList.style.display == "block";
    hidList.style.display = isshow ? "none" : "block";
    e.className = isshow ? "" : "open";
    e.firstChild.blur();

    if (document.body.onclick == null) {
        document.body.onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement;
            if (target.parentNode && target.parentNode.id == 'topnav_btnmore') {
                return;
            }
            if (target.id != 'topnav_btnmore') {
                hide_nav_more();
            }
        };
    }
}
function hide_nav_more() {
    _el_("topnav_hidlist").style.display = "none";
    _el_("topnav_btnmore").className = "";
}

var isSSL = 'https:' == document.location.protocol;

// Google code
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-535605-6']);
_gaq.push(['_setDomainName', 'csdn.net']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = (isSSL ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
