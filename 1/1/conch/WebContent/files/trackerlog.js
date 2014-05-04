function GetQueryParam(locationstr, p) {
    var regex = new RegExp("[\?\&]" + p + "(?:=([^\&]*))?", "i");
    var match = regex.exec(locationstr);
    var value = null;
    if (match != null && match.length > 0) {
        value = decodeURIComponent(match[1]);
    }
    return value;
}

var promotionID = GetQueryParam(top.window.location.href, "promotionid")


var d = new Image,
e = "mini_tangram_log_" + Math.floor(2147483648 * Math.random()).toString(36);
//window[e] = d;
d.onload = d.onerror = d.onabort = function () {
    d.onload = d.onerror = d.onabort = null;
//    d = window[e] = null;
};
d.src = "http://tracker.pongo.cn/log/index?promotionid=" + encodeURIComponent(promotionID) + "&referUrl=" + encodeURIComponent(document.referrer) + "&r=" + Math.random();
