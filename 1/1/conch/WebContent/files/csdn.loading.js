/*==================
 * 异步请求时加载效果
====================*/

csdn.loading = function (e) {
    /*
    var shield = document.createElement("DIV");
    shield.id = "csdnshield";
    shield.style.height = document.documentElement.scrollHeight + "px";
    shield.style.filter = "alpha(opacity=0)";
    shield.style.opacity = 0;
    document.body.appendChild(shield);

    csdn.setOpacity = function (obj, opacity) {
        if (opacity >= 1) opacity = opacity / 100;
        try { obj.style.opacity = opacity; } catch (err) { }
        try {
            if (obj.filters.length > 0 && obj.filters("alpha")) {
                obj.filters("alpha").opacity = opacity * 150;
            } else {
                obj.style.filter = "alpha(opacity=\"" + (opacity * 150) + "\")";
            }
        } catch (err) { }
    };
    var c = 0;
    csdn.doAlpha = function () {
        c += 2;
        if (c > 20) { clearInterval(ad); return 0; }
        csdn.setOpacity(shield, c);
    };
    //暂时不用遮罩效果
    //var ad = setInterval("csdn.doAlpha()", 1);
    */
    var load = document.createElement("div");
    load.id = "csdnload";
    var pos = $(e).position();
    load.style.left = pos.left + "px";
    load.style.top = pos.top + "px";
    load.style.width = e.offsetWidth - 11 + "px";
    load.style.height = e.offsetHeight - 5 + "px";
    document.body.appendChild(load);

    csdn.setLoad = function (len) {
        if ($("#csdnload").length == 0) return;
        var s = "";
        for (var i = 0; i < len; i++) s += " .";
        $("#csdnload").html("Loading" + s);
        if (len == 6) len = 0; len++;
        setTimeout("csdn.setLoad(" + len + ")", 400);
    };
    this.setLoad(6);
};
csdn.loaded = function () {
    if ($("#csdnshield").length > 0) {
        document.body.removeChild($("#csdnshield")[0]);
    }
    if ($("#csdnload").length > 0) {
        document.body.removeChild($("#csdnload")[0]);
    }
};