var flag=0;
var domain_url = 'http://www.ycpai.com/';
//获取最新消息
function get_new_message(){
	$.ajax({
	   type: "get",
	   url: domain_url+"message/get_num_new_msg",
	   dataType:"json",
	   success: function(msg){
		   if(msg){
			   $(".msg_num").html(msg);
			   $(".msg_num").show();
			   flag = 1
			   setInterval(flash_meg, 1000);
		   }else{
			if (flag!=0) {
				document.title='缘创派 | 互联网创业合伙人，这里找到';
				flag = 0;
				$(".msg_num").hide();
			}
		   }
	   }
	});
}
function flash_meg(){
	if(flag == 1){
		 flag=2;
		document.title='【新消息】缘创派 | 互联网创业合伙人，这里找到';
		return;
	}
	if (flag == 2)
	{
		 flag=1;
		 document.title='【　　　】缘创派 | 互联网创业合伙人，这里找到';
		 return;
	}
}

//获取项目或个人关注状况 vid项目或用户ID，type  0用户，1项目
function vali_user_follow(vid,type){
	$.ajax({
		type: "get",
		url: domain_url+"home/vali_user_follow/"+vid+'/'+type,
		dataType:"json",
		success: function(msg){
			if(msg.status == 1){
				if (msg.data == 1) {
					var inhtml = '<a href="javascript:void(0);" class="btn disabled">已关注</a>';
				}else{
					var inhtml = '<a href="javascript:void(0);" class="btn disabled">双向关注</a>';
				}
				
				$("#follow_status").html(inhtml);
			}
		}
	});	
}
//判断用户是否已经赞过项目
function is_good_project(pid){
	$.ajax({
		type: "get",
		url: domain_url+"home/have_good_project/"+pid,
		dataType:"json",
		success: function(msg){
			if(msg.status == 1){
				 $(".is_good").addClass("disabled");
				 $(".is_good").removeClass("btn-danger");
			}
			$("#p_g_num").html(msg.num);
		}
	});
}
//判断用户是否已经踩过项目
function is_bad_project(pid){
	$.ajax({
		type: "get",
		url: domain_url+"home/have_bad_project/"+pid,
		dataType:"json",
		success: function(msg){
			if(msg.status == 1){
				 $(".is_bad").addClass("disabled");
				 $(".is_bad").removeClass("btn-danger");
			}
		}
	});
}

//获取根据用户ID的提醒
function get_top_tip(){
	$.ajax({
	  type: "get",
	  url: domain_url+"kvdb/ajax_top_tip",
	  dataType:"json",
	  success: function(msg){
		  if(msg){
		      var inhtml = $("#for_top_tip").html();	
		      var len = msg.length;
		      for (var i=0;i<len;i++) {
			    inhtml += '<p><a href="'+msg[i].url+'">'+msg[i].tip+'</a></p>';
		      }
			$("#for_top_tip").html(inhtml);
			$(".top_pin").show();
		  }
	  }
       });
}
//数量提醒
function top_num_tip(){
	$.ajax({
	  type: "get",
	  url: domain_url+"kvdb/ajax_top_num_tip",
	  dataType:"json",
	  success: function(msg){
		  if(msg){
		      var inhtml = $("#for_top_tip").html();	
		      var len = msg.length;
		      for (var i=0;i<len;i++) {
			    inhtml += '<p><a href="'+msg[i].url+'">'+msg[i].tip+'</a></p>';
		      }
			$("#for_top_tip").html(inhtml);
			$(".top_pin").show();
		  }
	  }
       });
}
//获取联系用户数
function get_statics(){
	$.ajax({
	   type: "get",
	   url: domain_url+"common/get_active_num",
	   dataType:"json",
	   success: function(msg){
		   if(msg){
			   $("#connect_num").html(msg);
		   }
	   }
	});
}
//判断是否显示推荐信息
function get_tuijian(){
	$.ajax({
		   type: "get",
		   url: domain_url+"home/get_tuijian",
		   dataType:"json",
		   success: function(msg){
			   if(msg == 1){
				  $("#tuijian_tip").show();
			   }
		   }
		});
}
//关注项目或个人follow_id项目或人ID，type:0用户，1项目
function add_follow(follow_id,type){
	$.ajax({
		type: "get",
		url: domain_url+"active/add_follow/"+follow_id+'/'+type,
		dataType:"json",
		success: function(msg){
			if(msg){
				if(type == 0){
					$("#for_follow_user").html('<a href="javascript:void(0);" class="btn disabled">已关注</a>');
				}else{
				        $("#for_follow_project").html('<a href="javascript:void(0);" class="btn disabled">已关注</a>');
				}
			}else{
				alert('关注失败');
				}
		}
	});
}
//聊天页取消关注
function msg_cacle_follow(follow_id,type){
	$.ajax({
		type: "get",
		url: domain_url+"active/cacel_follow/"+follow_id+'/'+type,
		dataType:"json",
		success: function(msg){
			if(msg){
				var inhtml = '<a href="javascript:add_follow('+follow_id+',0);" class="btn btn-small" >关注</a>';
				$("#for_follow_user").html(inhtml);
			}
		}
	});
}
//取消关注项目或个人follow_id项目或人ID，type:0用户，1项目
function cacel_follow(follow_id,type){
	$.ajax({
		type: "get",
		url: domain_url+"active/cacel_follow/"+follow_id+'/'+type,
		dataType:"json",
		success: function(msg){
			if(msg){
				window.location.reload();
			}
		}
	});
}
//列表页添加关注
function list_follow(follow_id,type){
	$.ajax({
		type: "get",
		url: domain_url+"active/add_follow/"+follow_id+'/'+type,
		dataType:"json",
		success: function(msg){
			if(msg){
				if(type == 0){
					     $("#for_follow_user_"+follow_id).html('<a href="javascript:void(0);" class="btn btn-small disabled"><i class="icon-ok"></i> 已关注</a>');
				}else{
					$("#for_follow_project_"+follow_id).html('<a href="javascript:void(0);" class="btn btn-small disabled"><i class="icon-ok"></i> 已关注</a>');
					}
			}else{
				alert('关注失败');
				}
		}
	});
}
//获取城市
function get_city(state){
	if(state>0){
		$.ajax({
		   type: "get",
		   url: domain_url+"home/get_city/"+state,
		   dataType:"json",
		   success: function(msg){
			   if(msg){
				var inhtml = '<option value="0">请选择</option>';
				var len = msg.length;
				for(var i=0;i<len;i++){
					inhtml += '<option value="'+msg[i].id+'">'+msg[i].name+'</option>';
				}
				$("#city").html(inhtml);
			   }
		   }
		});
	}else{
		var inhtml = '<option value="0">请选择</option>';
		$("#city").html(inhtml);	
	}
}
//获取最新注册用户
function get_new_users(){
	$.ajax({
	   type: "get",
	   url: domain_url+"home/get_new_user",
	   dataType:"json",
	   success: function(msg){
	        if(msg){
		var userstr='';
			for(var i=0;i<6;i++){
				userstr += '<li class="divider"></li><strong><a target="_blank" href="'+domain_url+'home/person/'+msg[i].id+'">'+msg[i].name+'</a>- '+msg[i].city+' </strong>- '+msg[i].role_type+'<p>'+msg[i].pre_achieve+'...</p>';
			}
			 $("#new_list").html(userstr);
		}
	   }
	});
}
//获取完善程度
function get_degree(){
		$.ajax({
		   type: "get",
		   url: domain_url+"home/get_user_degree",
		   dataType:"json",
		   success: function(msg){
	       $("#degree").html(msg+'%');
		   }
		});
}
//获取每日推荐
function get_day_rand(){
	$.ajax({
	   type: "get",
	   url: domain_url+"active/day_rand_user",
	   dataType:"json",
	   success: function(msg){
		   if(msg == -1){
			    var userstr = '您所在城市今日无合适人选推荐';
			    $("#day_rand_user").html(userstr);  
			}else if(msg){
				var userstr='';
				var src_value = msg.imagepath =='' ? domain_url+'uploadfile/user_img/usrsmall.gif' : msg.imagepath;
				userstr += '<li class="divider"></li><a class="thumbnail" href="'+domain_url+'home/person/'+msg.id+'" style=" border:0"><img width="120" class="img-circle" alt="" src="'+src_value+'"></a>'+
				'<strong><a target="_blank" href="http://www.ycpai.com/home/person/'+msg.id+'">'+msg.name+'</a>- '+msg.city+' </strong>- '+msg.role_type+'<p>'+msg.skill_describe+'</p><p><strong>个人描述:</strong>'+msg.pre_achieve+
				'</p><p><a class="btn btn-primary day_rand" href="javascript:filter_rand('+msg.id+',1);">建立联系</a> <a style=" margin-left:30px" class="btn btn-primary day_rand" href="javascript:filter_rand('+msg.id+',0);">忽略</a><li class="divider"></li>';
			$("#day_rand_user").html(userstr);
		   }else{
			   var userstr = '今日已推荐30人';
			    $("#day_rand_user").html(userstr);
			}
	   }
	});
}
//过滤每日推荐
function filter_rand(user_id,type){
	$(".day_rand").addClass('disabled');
	$.ajax({
		   type: "get",
		   url: domain_url+"active/filter_rand_user"+user_id+"/"+type,
		   dataType:"json",
		   success: function(msg){
		       if(msg == 1){
			    get_day_rand();  
		      }
		   }
		});
}
//验证昵称
function check_nick(){
	var nick = $.trim($("#nickname").val());	
	var cans = $("#can_sub").val();
	if(nick !=''){
	  $.ajax({
	    type: "get",
	    url: domain_url+"home/uniq_nick/"+encodeURIComponent(nick),
	    dataType:"json",
	    success: function(msg){
		    if(msg){
			$("#for_nick").html('<font color="green">昵称可以使用</font>');
			if(cans==0){
				  $("#can_sub").val(1);		
			}
		    }else{
			   $("#for_nick").html('<font color="red">昵称已被占用</font>');
			   $("#can_sub").val(0);
			   return; 
		    }
	    }
	});
   }
}
//验证邮箱
function check_email(){
	var mail = $("#email").val();
	var cans = $("#can_sub").val();	
	if(mail == ''){
		$("#email_tip").html('<font color="red">请填写邮箱</font>');
		return;
	}
	var pattern=/^([a-zA-Z0-9]+[_|\_|\.\-]?)*[a-zA-Z0-9]+@([a-zA-Z0-9\-]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	if(!mail.match(pattern)){
	     $("#email_tip").html('<font color="red">邮箱格式不正确</font>');
	     $("#can_sub").val(2);
		return;
	}
	$.ajax({
	    type: "get",
	    url: domain_url+"index/uniq_email/"+encodeURIComponent(mail),
	    dataType:"json",
	    async:false,
	    success: function(msg){
		    if(msg){
			$("#email_tip").html('<font color="green">邮箱可以使用</font>');
			if(cans==2){
				  $("#can_sub").val(1);		
			}
		    }else{
			    $("#email_tip").html('<font color="red">邮箱已被占用</font>');
			    $("#can_sub").val(2);
			   return; 
			}
		}
	});		
}
//分享到新浪或QQ
function user_share(div_id,content,url){
      var url = 'http://www.ycpai.com/'+url;
      var inhtml='';
      inhtml = "<a title='分享到新浪微博' href='";
      inhtml += "javascript:void((function(s,d,e){try{}catch(e){}var f=\"http:\/\/v.t.sina.com.cn/share/share.php?\",u=\""+url+"\",p=[\"url=\",e(u),\"&amp;title=\",e(\""+content+"\")].join(\"\");function a(){if(!window.open([f,p].join(\"\"),\"mb\",[\"toolbar=0,status=0,resizable=1,width=620,height=450,left=\",(s.width-620)/2,\",top=\",(s.height-450)/2].join(\"\")))u.href=[f,p].join(\"\");};"
      inhtml += "if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,document,encodeURIComponent));";
      inhtml += "'><img src='http://www.ycpai.com/statics/images/tsina.png' alt=分享到新浪微博></a> ";
      inhtml += " <a href='";
      inhtml += "javascript:(function(){window.open(\"http://v.t.qq.com/share/share.php?title="+encodeURIComponent(content)+'&amp;url='+encodeURIComponent(url)+"&amp;source=bookmark\",\"_blank\",\"width=610,height=350\");})()'";
      inhtml += "title='分享到QQ微博'><img src='http://www.ycpai.com/statics/images/tqq.png' alt='分享到QQ微博'></a>";
      $("#"+div_id).html(inhtml);
}
//发送手机验证
	function send_sms(){
		var moblie = $("#moblie").val();
		if(moblie == ''){
			alert('请输入手机号码');
			return;
		}
		var pattern=/^[1]{1}[3|4|5|8]{1}[0-9]{9}$/; 
		if(!moblie.match(pattern)){
			alert('请输入正确的手机');
			return;
		}
		$.ajax({
			   type: "get",
			   url: domain_url+'active/send_sms/'+moblie,
			   dataType:"json",
			   success: function(msg){
				   if(msg.status == 1){
					  $("#for_sms").html('验证码已发送，请查收验证');
					  // setTimeout(for_send_sms,60000);
				   }else{
					   alert(msg.info);
					   }
			   }
			});	
	}
	function for_send_sms(){
		$("#for_sms").html('<a href="javascript:send_sms()">重新发送</a>');	
	}
	//发送手机验证码
	function send_mobile_vali(){
		var moblie_vali = $("#mobile_vali").val();
		if(moblie_vali == ''){
			alert('请输入验证码');
			return;
		}
		var pattern=/[0-9]{4}/; 
		if(!moblie_vali.match(pattern)){
			alert('请输入4位数字验证码');
			return;
		}
		$.ajax({
			   type: "get",
			   url: domain_url+"active/mobile_vali/"+moblie_vali,
			   dataType:"json",
			   success: function(msg){
				   if(msg){
					  $("#moblie").val(msg);
					  $("#for_sms").html('');
					   $("#for_sms_vali").html('');
					   $("#moblie").attr('readonly','readonly');
					    $("#moblie_status").html('(已验证)');
				   }else{
					   alert('验证失败');
				   }
			   }
			});	
	}
//发送验证邮件
	function send_email(){
		var emails = $("#email").val();
		if(emails == ''){
			$("#sub_tip").html("请填写邮箱");
			return;
		}
		var pattern=/^([a-zA-Z0-9]+[_|\_|\.\-]?)*[a-zA-Z0-9]+@([a-zA-Z0-9\-]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		if(!emails.match(pattern)){
			$("#sub_tip").html('请输入正确的邮箱');
			return;
		}
		$.ajax({
			   type: "post",
			   url: domain_url+"active/send_email",
			   data:'email='+emails,
			   dataType:"json",
			   success: function(msg){
				   if(msg==1){
					  $("#for_email").html('邮件已经发送，请去邮箱验证');
				   }else if(msg==2){
					 	alert('邮箱已经被占用');
					 }else{
					   alert('发送失败');
					   }
			   }
			});	
	}
//类似新浪微博
//生成推送channel
function channel_create(uid) {
	$.ajax({
		type: "get",
		url: "/message/channel_create_channel/",
		success: function(msg){
			var channel = sae.Channel(msg);
			channel.onopen = onOpen;
			//channel.onclose = onClose;
			//channel.onerror = onClose;
			channel.onmessage = function (data) {
			    var info = eval('('+data.data+')');
			    
			    var now_chat_user = parseInt($("#channel_chat_uid").val());
			    if (now_chat_user>0 && now_chat_user == info.user_id) {
				if (info.type == 1) {
					$(".writting").toggle();
					
				}else{
					var now_html = $(".chat_ul").html();
					detail = '<li><div class="chat_left"><p class="chat_time">刚刚</p><p class="chat_content">'+info.message+'</p></div><div style="clear: both"></div></li>';
					now_html = now_html+detail;
					$(".chat_ul").html(now_html);
					var lastli = $(".chat_ul li:last");
					var offset = lastli.offset();
					$('.msg_chat').scrollTop(offset.top);
					$(".msg_num").html(1);
					$(".msg_num").show();
					$(".writting").hide();
					flag = 1
					setInterval(flash_meg, 1000);
					setTimeout("update_no_read("+now_chat_user+")",5000);
				}
			    }else{
				if (!info.type) {
					get_new_message();
				}
			    }
			    
			}
		}
	});
}
//开启时已经创建关闭一个channel
function onOpen() {
	$.ajax({
		type: "get",
		url: "/message/user_open_channel",
		dataType:"json",
		success: function(msg){
		}
	 });
}
//开启时已经创建关闭一个channel
function left_follow_num() {
	$.ajax({
		type: "get",
		url: "/friends/left_follow_num",
		dataType:"json",
		success: function(msg){
			if (msg.status == 1) {
				$("#my_follow").html(msg.my_follow);
				$("#follow_me").html(msg.follow_me);
			}
		}
	});
}
//开启时已经创建关闭一个channel
function onClose() {
	$.ajax({
		type: "get",
		url: "/message/user_close_channel",
		dataType:"json",
		success: function(msg){
		}
	 });
}
//当前页面3秒后执行清空聊天未读状态
function update_no_read(uid) {
	$.ajax({
		type: "get",
		url: "/message/update_to_read/"+uid,
		dataType:"json",
		success: function(msg){
			document.title='缘创派 | 互联网创业合伙人，这里找到';
			flag = 0;
			$(".msg_num").hide();
		}
	     });
}

