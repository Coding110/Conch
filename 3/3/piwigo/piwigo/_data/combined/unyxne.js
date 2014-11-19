/*BEGIN  */
;

/*BEGIN themes/default/js/plugins/jquery.ajaxmanager.js */
(function($){"use strict";var managed={},cache={};$.manageAjax=(function(){function create(name,opts){managed[name]=new $.manageAjax._manager(name,opts);return managed[name];}
function destroy(name){if(managed[name]){managed[name].clear(true);delete managed[name];}}
var publicFns={create:create,destroy:destroy};return publicFns;})();$.manageAjax._manager=function(name,opts){this.requests={};this.inProgress=0;this.name=name;this.qName=name;this.opts=$.extend({},$.manageAjax.defaults,opts);if(opts&&opts.queue&&opts.queue!==true&&typeof opts.queue==='string'&&opts.queue!=='clear'){this.qName=opts.queue;}};$.manageAjax._manager.prototype={add:function(url,o){if(typeof url=='object'){o=url;}else if(typeof url=='string'){o=$.extend(o||{},{url:url});}
o=$.extend({},this.opts,o);var origCom=o.complete||$.noop,origSuc=o.success||$.noop,beforeSend=o.beforeSend||$.noop,origError=o.error||$.noop,strData=(typeof o.data=='string')?o.data:$.param(o.data||{}),xhrID=o.type+o.url+strData,that=this,ajaxFn=this._createAjax(xhrID,o,origSuc,origCom);if(o.preventDoubleRequests&&o.queueDuplicateRequests){if(o.preventDoubleRequests){o.queueDuplicateRequests=false;}
setTimeout(function(){throw("preventDoubleRequests and queueDuplicateRequests can't be both true");},0);}
if(this.requests[xhrID]&&o.preventDoubleRequests){return;}
ajaxFn.xhrID=xhrID;o.xhrID=xhrID;o.beforeSend=function(xhr,opts){var ret=beforeSend.call(this,xhr,opts);if(ret===false){that._removeXHR(xhrID);}
xhr=null;return ret;};o.complete=function(xhr,status){that._complete.call(that,this,origCom,xhr,status,xhrID,o);xhr=null;};o.success=function(data,status,xhr){that._success.call(that,this,origSuc,data,status,xhr,o);xhr=null;};o.error=function(ahr,status,errorStr){var httpStatus='',content='';if(status!=='timeout'&&ahr){httpStatus=ahr.status;content=ahr.responseXML||ahr.responseText;}
if(origError){origError.call(this,ahr,status,errorStr,o);}else{setTimeout(function(){throw status+'| status: '+httpStatus+' | URL: '+o.url+' | data: '+strData+' | thrown: '+errorStr+' | response: '+content;},0);}
ahr=null;};if(o.queue==='clear'){$(document).clearQueue(this.qName);}
if(o.queue||(o.queueDuplicateRequests&&this.requests[xhrID])){$.queue(document,this.qName,ajaxFn);if(this.inProgress<o.maxRequests&&(!this.requests[xhrID]||!o.queueDuplicateRequests)){$.dequeue(document,this.qName);}
return xhrID;}
return ajaxFn();},_createAjax:function(id,o,origSuc,origCom){var that=this;return function(){if(o.beforeCreate.call(o.context||that,id,o)===false){return;}
that.inProgress++;if(that.inProgress===1){$.event.trigger(that.name+'AjaxStart');}
if(o.cacheResponse&&cache[id]){if(!cache[id].cacheTTL||cache[id].cacheTTL<0||((new Date().getTime()-cache[id].timestamp)<cache[id].cacheTTL)){that.requests[id]={};setTimeout(function(){that._success.call(that,o.context||o,origSuc,cache[id]._successData,'success',cache[id],o);that._complete.call(that,o.context||o,origCom,cache[id],'success',id,o);},0);}else{delete cache[id];}}
if(!o.cacheResponse||!cache[id]){if(o.async){that.requests[id]=$.ajax(o);}else{$.ajax(o);}}
return id;};},_removeXHR:function(xhrID){if(this.opts.queue||this.opts.queueDuplicateRequests){$.dequeue(document,this.qName);}
this.inProgress--;this.requests[xhrID]=null;delete this.requests[xhrID];},clearCache:function(){cache={};},_isAbort:function(xhr,status,o){if(!o.abortIsNoSuccess||(!xhr&&!status)){return false;}
var ret=!!((!xhr||xhr.readyState===0||this.lastAbort===o.xhrID));xhr=null;return ret;},_complete:function(context,origFn,xhr,status,xhrID,o){if(this._isAbort(xhr,status,o)){status='abort';o.abort.call(context,xhr,status,o);}
origFn.call(context,xhr,status,o);$.event.trigger(this.name+'AjaxComplete',[xhr,status,o]);if(o.domCompleteTrigger){$(o.domCompleteTrigger).trigger(this.name+'DOMComplete',[xhr,status,o]).trigger('DOMComplete',[xhr,status,o]);}
this._removeXHR(xhrID);if(!this.inProgress){$.event.trigger(this.name+'AjaxStop');}
xhr=null;},_success:function(context,origFn,data,status,xhr,o){var that=this;if(this._isAbort(xhr,status,o)){xhr=null;return;}
if(o.abortOld){$.each(this.requests,function(name){if(name===o.xhrID){return false;}
that.abort(name);});}
if(o.cacheResponse&&!cache[o.xhrID]){if(!xhr){xhr={};}
cache[o.xhrID]={status:xhr.status,statusText:xhr.statusText,responseText:xhr.responseText,responseXML:xhr.responseXML,_successData:data,cacheTTL:o.cacheTTL,timestamp:new Date().getTime()};if('getAllResponseHeaders'in xhr){var responseHeaders=xhr.getAllResponseHeaders();var parsedHeaders;var parseHeaders=function(){if(parsedHeaders){return;}
parsedHeaders={};$.each(responseHeaders.split("\n"),function(i,headerLine){var delimiter=headerLine.indexOf(":");parsedHeaders[headerLine.substr(0,delimiter)]=headerLine.substr(delimiter+2);});};$.extend(cache[o.xhrID],{getAllResponseHeaders:function(){return responseHeaders;},getResponseHeader:function(name){parseHeaders();return(name in parsedHeaders)?parsedHeaders[name]:null;}});}}
origFn.call(context,data,status,xhr,o);$.event.trigger(this.name+'AjaxSuccess',[xhr,o,data]);if(o.domSuccessTrigger){$(o.domSuccessTrigger).trigger(this.name+'DOMSuccess',[data,o]).trigger('DOMSuccess',[data,o]);}
xhr=null;},getData:function(id){if(id){var ret=this.requests[id];if(!ret&&this.opts.queue){ret=$.grep($(document).queue(this.qName),function(fn,i){return(fn.xhrID===id);})[0];}
return ret;}
return{requests:this.requests,queue:(this.opts.queue)?$(document).queue(this.qName):[],inProgress:this.inProgress};},abort:function(id){var xhr;if(id){xhr=this.getData(id);if(xhr&&xhr.abort){this.lastAbort=id;xhr.abort();this.lastAbort=false;}else{$(document).queue(this.qName,$.grep($(document).queue(this.qName),function(fn,i){return(fn!==xhr);}));}
xhr=null;return;}
var that=this,ids=[];$.each(this.requests,function(id){ids.push(id);});$.each(ids,function(i,id){that.abort(id);});},clear:function(shouldAbort){$(document).clearQueue(this.qName);if(shouldAbort){this.abort();}}};$.manageAjax._manager.prototype.getXHR=$.manageAjax._manager.prototype.getData;$.manageAjax.defaults={beforeCreate:$.noop,abort:$.noop,abortIsNoSuccess:true,maxRequests:1,cacheResponse:false,async:true,domCompleteTrigger:false,domSuccessTrigger:false,preventDoubleRequests:true,queueDuplicateRequests:false,cacheTTL:-1,queue:false};$.each($.manageAjax._manager.prototype,function(n,fn){if(n.indexOf('_')===0||!$.isFunction(fn)){return;}
$.manageAjax[n]=function(name,o){if(!managed[name]){if(n==='add'){$.manageAjax.create(name,o);}else{return;}}
var args=Array.prototype.slice.call(arguments,1);managed[name][n].apply(managed[name],args);};});})(jQuery);

/*BEGIN plugins/GThumb/js/jquery.ba-resize.min.js */
/*
 * jQuery resize event - v1.1 - 3/14/2010
 * http://benalman.com/projects/jquery-resize-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function($,h,c){var a=$([]),e=$.resize=$.extend($.resize,{}),i,k="setTimeout",j="resize",d=j+"-special-event",b="delay",f="throttleWindow";e[b]=250;e[f]=true;$.event.special[j]={setup:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.add(l);$.data(this,d,{w:l.width(),h:l.height()});if(a.length===1){g()}},teardown:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.not(l);l.removeData(d);if(!a.length){clearTimeout(i)}},add:function(l){if(!e[f]&&this[k]){return false}var n;function m(s,o,p){var q=$(this),r=$.data(this,d);r.w=o!==c?o:q.width();r.h=p!==c?p:q.height();n.apply(this,arguments)}if($.isFunction(l)){n=l;return m}else{n=l.handler;l.handler=m}}};function g(){i=h[k](function(){a.each(function(){var n=$(this),m=n.width(),l=n.height(),o=$.data(this,d);if(m!==o.w||l!==o.h){n.trigger(j,[o.w=m,o.h=l])}});g()},e[b])}})(jQuery,this);

/*BEGIN plugins/GThumb/js/gthumb.js */
var GThumb={max_height:200,margin:10,max_first_thumb_width:0.7,big_thumb:null,small_thumb:null,method:'crop',t:new Array,build:function(){GThumb.t=new Array;jQuery('#thumbnails img.thumbnail').each(function(index){width=parseInt(jQuery(this).attr('width'));height=parseInt(jQuery(this).attr('height'));th={index:index,width:width,height:height,real_width:width,real_height:height};if(height<GThumb.max_height){th.width=Math.round(GThumb.max_height*width / height);th.height=GThumb.max_height;}
GThumb.t.push(th);});first=GThumb.t[0];GThumb.small_thumb={index:first.index,width:first.real_width,height:first.real_height,src:jQuery('#thumbnails img.thumbnail:first').attr('src')}
jQuery.resize.throttleWindow=false;jQuery.resize.delay=50;GThumb.process();},process:function(){var width_count=GThumb.margin;var line=1;var round_rest=0;var main_width=jQuery('#thumbnails').width();var first_thumb=jQuery('#thumbnails img.thumbnail:first');var best_size={width:1,height:1};if(GThumb.big_thumb!=null&&GThumb.big_thumb.height<main_width*GThumb.max_first_thumb_width){min_ratio=Math.min(1.05,GThumb.big_thumb.width/GThumb.big_thumb.height);for(width=GThumb.big_thumb.width;width/best_size.height>=min_ratio;width--){width_count=GThumb.margin;height=GThumb.margin;max_height=0;available_width=main_width-(width+GThumb.margin);line=1;for(i=1;i<GThumb.t.length;i++){width_count+=GThumb.t[i].width+GThumb.margin;max_height=Math.max(GThumb.t[i].height,max_height);if(width_count>available_width){ratio=width_count / available_width;height+=Math.round(max_height / ratio);line++;max_height=0;width_count=GThumb.margin;if(line>2){if(height>=best_size.height&&width/height>=min_ratio&&height<=GThumb.big_thumb.height){best_size={width:width,height:height};}
break;}}}
if(line<=2){if(max_height==0||line==1){height=GThumb.big_thumb.height;}else{height+=max_height;}
if(height>=best_size.height&&width/height>=min_ratio&&height<=GThumb.big_thumb.height){best_size={width:width,height:height}}}}
if(GThumb.big_thumb.src!=first_thumb.attr('src')){first_thumb.attr('src',GThumb.big_thumb.src).attr({width:GThumb.big_thumb.width,height:GThumb.big_thumb.height});GThumb.t[0].width=GThumb.big_thumb.width;GThumb.t[0].height=GThumb.big_thumb.height;}
GThumb.t[0].crop=best_size.width;GThumb.resize(first_thumb,GThumb.big_thumb.width,GThumb.big_thumb.height,best_size.width,best_size.height,true);}
if(best_size.width==1){if(GThumb.small_thumb!=null&&GThumb.small_thumb.src!=first_thumb.attr('src')){first_thumb.prop('src',GThumb.small_thumb.src).attr({width:GThumb.small_thumb.width,height:GThumb.small_thumb.height});GThumb.t[0].width=GThumb.small_thumb.width;GThumb.t[0].height=GThumb.small_thumb.height;}
GThumb.t[0].crop=false;}
width_count=GThumb.margin;max_height=0;line=1;thumb_process=new Array;for(i=GThumb.t[0].crop!=false?1:0;i<GThumb.t.length;i++){width_count+=GThumb.t[i].width+GThumb.margin;max_height=Math.max(GThumb.t[i].height,max_height);thumb_process.push(GThumb.t[i]);available_width=main_width;if(line<=2&&GThumb.t[0].crop!==false){available_width-=(GThumb.t[0].crop+GThumb.margin);}
if(width_count>available_width){last_thumb=GThumb.t[i].index;ratio=width_count / available_width;new_height=Math.round(max_height / ratio);round_rest=0;width_count=GThumb.margin;for(j=0;j<thumb_process.length;j++){if(thumb_process[j].index==last_thumb){new_width=available_width-width_count-GThumb.margin;}else{new_width=(thumb_process[j].width+round_rest)/ ratio;round_rest=new_width-Math.round(new_width);new_width=Math.round(new_width);}
GThumb.resize(jQuery('#thumbnails img.thumbnail').eq(thumb_process[j].index),thumb_process[j].real_width,thumb_process[j].real_height,new_width,new_height,false);width_count+=new_width+GThumb.margin;}
thumb_process=new Array;width_count=GThumb.margin;max_height=0;line++;}}
for(j=0;j<thumb_process.length;j++){GThumb.resize(jQuery('#thumbnails img.thumbnail').eq(thumb_process[j].index),thumb_process[j].real_width,thumb_process[j].real_height,thumb_process[j].width,max_height,false);}
if(main_width!=jQuery('#thumbnails').width()){GThumb.process();}},resize:function(thumb,width,height,new_width,new_height,is_big){if(GThumb.method=='resize'||height<new_height||width<new_width){real_width=new_width;real_height=new_height;width_crop=0;height_crop=0;if(is_big){if(width-new_width>height-new_height){real_width=Math.round(new_height*width / height);width_crop=Math.round((real_width-new_width)/2);}else{real_height=Math.round(new_width*height / width);height_crop=Math.round((real_height-new_height)/2);}}
thumb.css({height:real_height+'px',width:real_width+'px'});}else{thumb.css({height:'',width:''});height_crop=Math.round((height-new_height)/2);width_crop=Math.round((width-new_width)/2);}
thumb.parents('li').css({height:new_height+'px',width:new_width+'px'});thumb.parent('a').css({clip:'rect('+height_crop+'px, '+(new_width+width_crop)+'px, '+(new_height+height_crop)+'px, '+width_crop+'px)',top:-height_crop+'px',left:-width_crop+'px'});}};

/*BEGIN themes/default/js/thumbnails.loader.js */
if(typeof(max_requests)=="undefined")
max_requests=3;var thumbnails_queue=jQuery.manageAjax.create('queued',{queue:true,cacheResponse:false,maxRequests:max_requests,preventDoubleRequests:false});function add_thumbnail_to_queue(img,loop){thumbnails_queue.add({type:'GET',url:img.data('src'),data:{ajaxload:'true'},dataType:'json',beforeSend:function(){jQuery('.loader').show()},success:function(result){img.attr('src',result.url);jQuery('.loader').hide();},error:function(){if(loop<3)
add_thumbnail_to_queue(img,++loop);if(typeof(error_icon)!="undefined")
img.attr('src',error_icon);jQuery('.loader').hide();}});}
function pwg_ajax_thumbnails_loader(){jQuery('img[data-src]').each(function(){add_thumbnail_to_queue(jQuery(this),0);});}
jQuery(document).ready(pwg_ajax_thumbnails_loader);

