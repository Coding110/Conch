<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>
<script type="text/javascript">
function getObj(id) {
   return document.getElementById(id);
}
 
//全国省市县级联
// JavaScript Document
 
//北京市辖区名称
var city1 = ["东城区","西城区","崇文区","宣武区","朝阳区","海淀区","丰台区","石景山区","房山区","通州区","顺义区","门头沟区","昌平区","大兴区","怀柔区","平谷区","密云县","延庆县"];
//上海市辖区名称
var city2 = ["黄浦区","卢湾区","徐汇区","长宁区","静安区","普陀区","闸北区","虹口区","杨浦区","宝山区","闵行区","嘉定区","浦东新区","金山区","松江区","青浦区","南汇区","奉贤区","崇明县"];
//天津市辖区名称
var city3 = ["和平区","河东区","河西区","南开区","河北区","红桥区","塘沽区","汉沽区","大港区","东丽区","西青区","津南区","北辰区","武清区","宝坻区","宁河县","静海县","蓟县"];
//重庆市辖区名称
var city4 = ["渝中区","大渡口区","江北区","沙坪坝区","九龙坡区","南岸区","北碚区","万盛区","双桥区","渝北区","巴南区","万县区","涪陵区","永川市","合川市","江津市","南川市","长寿县","綦江县","潼南县","荣昌县","壁山县","大足县","铜梁县","梁平县","城口县","垫江县","武隆县","丰都县","忠 县","开 县","云阳县","青龙镇青龙嘴","奉节县","巫山县","巫溪县","南宾镇","中和镇","钟多镇","联合镇","汉葭镇"];
//河北省主要城市名称
var city5 = ["石家庄市","唐山市","秦皇岛市","邯郸市","邢台市","保定市","张家口市","承德市","沧州市","廊坊市","衡水市"];
//山西省主要城市名称
var city6 = ["太原市","大同市","阳泉市","长治市","晋城市","朔州市","晋中市","运城市","忻州市","临汾市","吕梁市"];
//辽宁省主要城市名称
var city7 = ["沈阳市","大连市","鞍山市","抚顺市","本溪市","丹东市","锦州市","营口市","阜新市","辽阳市","盘锦市","铁岭市","朝阳市","葫芦岛市"];
//吉林省主要城市名称
var city8 = ["长春市","吉林市","四平市","辽源市","通化市","白山市","松原市","白城市","延边朝鲜族自治州"];
//河南省主要城市名称
var city9 = ["郑州市","开封市","洛阳市","平顶山市","安阳市","鹤壁市","新乡市","焦作市","濮阳市","许昌市","漯河市","三门峡市","南阳市","商丘市","信阳市","周口市","驻马店市","济源市"];
//江苏省主要城市名称
var city10 = ["南京市","无锡市","徐州市","常州市","苏州市","南通市","连云港市","淮安市","盐城市","扬州市","镇江市","泰州市","宿迁市"];
//浙江省主要城市名称
var city11 = ["杭州市","宁波市","温州市","嘉兴市","湖州市","绍兴市","金华市","衢州市","舟山市","台州市","丽水市"];
//安徽省主要城市名称
var city12 = ["合肥市","芜湖市","蚌埠市","淮南市","马鞍山市","淮北市","铜陵市","安庆市","黄山市","滁州市","阜阳市","宿州市","巢湖市","六安市","亳州市","池州市","宣城市"];
//福建省主要城市名称
var city13 = ["福州市","厦门市","莆田市","三明市","泉州市","漳州市","南平市","龙岩市","宁德市"];
//江西省主要城市名称
var city14 = ["南昌市","景德镇市","萍乡市","九江市","新余市","鹰潭市","赣州市","吉安市","宜春市","抚州市","上饶市"];
//山东省主要城市名称
var city15 = ["济南市","青岛市","淄博市","枣庄市","东营市","烟台市","潍坊市","威海市","济宁市","泰安市","日照市","莱芜市","临沂市","德州市","聊城市","滨州市","菏泽市"];
//湖北省主要城市名称
var city16 = ["武汉市","黄石市","襄樊市","十堰市","荆州市","宜昌市","荆门市","鄂州市","孝感市","黄冈市","咸宁市","随州市","恩施州","仙桃市","潜江市","天门市","神农架林区"];
//湖南省主要城市名称
var city17 = ["长沙市","株洲市","湘潭市","衡阳市","邵阳市","岳阳市","常德市","张家界市","益阳市","郴州市","永州市","怀化市","娄底市","湘西州"];
//广东省主要城市名称
var city18 = ["广州市","深圳市","珠海市","汕头市","韶关市","佛山市","江门市","湛江市","茂名市","肇庆市","惠州市","梅州市","汕尾市","河源市","阳江市","清远市","东莞市","中山市","潮州市","揭阳市","云浮市"];
//海南省主要城市名称
var city19 = ["海口市","龙华区","秀英区","琼山区","美兰区","三亚市"];
//四川省主要城市名称
var city20 = ["成都市","自贡市","攀枝花市","泸州市","德阳市","绵阳市","广元市","遂宁市","内江市","乐山市","南充市","宜宾市","广安市","达州市","眉山市","雅安市","巴中市","资阳市","阿坝州","甘孜州","凉山州"];
//贵州省主要城市名称
var city21 = ["贵阳市","六盘水市","遵义市","安顺市","铜仁地区","毕节地区","黔西南州","黔东南州","黔南州"];
//云南省主要城市名称
var city22 = ["昆明市","大理市","曲靖市","玉溪市","昭通市","楚雄市","红河市","文山市","思茅市","西双版纳市","保山市","德宏市","丽江市","怒江市","迪庆市","临沧市"];
//陕西省主要城市名称
var city23 = ["西安市","铜川市","宝鸡市","咸阳市","渭南市","延安市","汉中市","榆林市","安康市","商洛市"];
//甘肃省主要城市名称
var city24 = ["兰州市","嘉峪关市","金昌市","白银市","天水市","武威市","张掖市","平凉市","酒泉市","庆阳市","定西市","陇南市","临夏州","甘南州"];
//青海省主要城市名称
var city25 = ["西宁市","海东地区","海北州","黄南州","海南州","果洛州","玉树州","海西州"];
//黑龙江省主要城市名称
var city26 = ["哈尔滨市","齐齐哈尔市","鸡西市","鹤岗市","双鸭山市","大庆市","伊春市","佳木斯市","七台河市","牡丹江市","黑河市","绥化市","大兴安岭地区"];
//内蒙古自治区主要城市名称
var city27 = ["呼和浩特市","包头市","乌海市","赤峰市","通辽市","鄂尔多斯市","呼伦贝尔市","巴彦淖尔市","乌兰察布市","兴安盟","锡林郭勒盟","阿拉善盟"];
//广西壮族自治区主要城市名称
var city28 = ["南宁市","柳州市","桂林市","梧州市","北海市","防城港市","钦州市","贵港市","玉林市","百色市","贺州市","河池市","来宾市","崇左市"];
//西藏自治区主要城市名称
var city29 = ["拉萨市","昌都地区","山南地区","日喀则地区","那曲地区","阿里地区","林芝地区"];
//宁夏回族自治区主要城市名称
var city30 = ["银川市","石嘴山市","吴忠市","固原市","中卫市"];
//新疆维吾尔自治区主要城市名称
var city31 = ["乌鲁木齐市","克拉玛依市","吐鲁番地区","哈密地区","和田地区","阿克苏地区","喀什地区","克孜勒苏柯尔克孜自治州","巴音郭楞蒙古自治州","昌吉回族自治州","博尔塔拉蒙古自治州","伊犁哈萨克自治州","塔城地区","阿勒泰地区","石河子市","阿拉尔市","图木舒克市","五家渠市"];
//台湾省主要城市名称
var city32 = ["台北市","高雄市","基隆市","台中市","台南市","新竹市","嘉义市","台北县","宜兰县","桃园县","新竹县","苗栗县","台中县","彰化县","南投县","云林县","嘉义县","台南县","高雄县","屏东县","澎湖县","台东县","花莲县"];
//香港特别行政区主要辖区名称
var city33 = ["中西区","东区","九龙城区","观塘区","南区","深水埗区","黄大仙区","湾仔区","油尖旺区","离岛区","葵青区","北区","西贡区","沙田区","屯门区","大埔区","荃湾区","元朗区"];
//澳门地区
var city34 = ["澳门地区"];
//其它地区
var city35 = ["其它地区"];
 
//全国省会，直辖市，自治区名称
var provinceName = ["北京市","上海市","天津市","重庆市","河北省","山西省","辽宁省","吉林省","河南省","江苏省","浙江省","安徽省","福建省","江西省","山东省","湖北省","湖南省","广东省","海南省","四川省","贵州省","云南省","陕西省","甘肃省","青海省","黑龙江省","内蒙古自治区","广西壮族自治区","西藏自治区","宁夏回族自治区","新疆维吾尔自治区","台湾省","香港特别行政区","澳门特别行政区","其它"];
 
function province()
{
var e = getObj('province');
for (var i=0; i<provinceName.length; i++) {
	e.options.add(new Option(provinceName[i],i+1));
}
}
function cityName(n)
{
var e = getObj('city');
for (var i=e.options.length; i>0; i--) e.remove(i);
if (n == "") return; 
var a = eval("city"+ n); //得到城市的数组名
for (var i=0; i<a.length; i++) e.options.add(new Option(a[i], a[i]));
}
function onloadprovince()
{
province(); //初始时给省名下拉菜单赋内容 
}
</script>

<body onload="onloadprovince()">
<form class="form-horizontal" id="myform" action="" method="post">
    <input type="hidden" value="1" name="dosubmit"></input>
    <input type="hidden" value="" name="direct"></input>
    <div id="legend" class="">
      <legend class="">基本资料</legend>
    </div>
    
    <div class="control-group">
      <label class="control-label">昵称</label>
      <div class="controls">
        <input type="text" class="input-xlarge" onblur="javascript:check_nick()" id="nickname" name="info[name]" value=""></input>
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
          <select id="province" name=province onchange="cityName(this.value);">
            <option value="">
                                    请选择省名
            </option>
		  </select>
		 <select id="city" name="city">
            <option value="">
        	     请选择城市名
            </option>
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
</body>
</html>