var Badwords = function () {
    var high_w = /(\u4E0A.*\u6D77.*\u5E2E)|(\u6C5F.*\u86E4.*\u87C6)|(\u5F6D.*\u535A.*\u7F51)|(\u4E60.*\u8FDC.*\u5E73)|(\u4E60.*\u8FD1.*\u5E73)|(\u5F20.*\u5FB7.*\u6C5F)|(\u4FDE.*\u6B63.*\u58F0)|(\u5218.*\u4E91.*\u5C71)|(\u5F20.*\u9AD8.*\u4E3D)|(\u674E.*\u514B.*\u5F3A)|(\u5468.*\u6069.*\u6765)|(\u9093.*\u5C0F.*\u5E73)|(\u80E1.*\u9526.*\u6D9B)|(\u6C5F.*\u6CFD.*\u6C11)|(\u6BDB.*\u6CFD.*\u4E1C)|(\u8309.*\u8389.*\u82B1)/g;
    var low_w = /csdn|admin|master|fuck|(\u7BA1.*\u7406.*\u5458)|(\u53D1.*\u7968)|(\u767C.*\u7968)|(\u5BA2.*\u670D)|(\u7535.*\u8A71)|(\u7535.*\u8BDD)|(\u5C0F.*\u59D0)|(\u5993.*\u5973)|(\u8BC1.*\u4EF6)|(\u529E.*\u7406)|(\u8FA6.*\u7406)/g;

    this.check = function (str, is_high) {
        var ok = high_w.test(str);
        if (is_high) return ok;
        if (!ok) {
            ok = low_w.test(str);
        }
        return ok;
    };
};