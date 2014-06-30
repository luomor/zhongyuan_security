//此js文件部分代码来自emlog模板tstyle。
(function(){var dep;var init=function(){(function($){$.fn.idTabs=function(){var s={};for(var i=0;i<arguments.length;++i){var a=arguments[i];switch(a.constructor){case Object:$.extend(s,a);break;case Boolean:s.change=a;break;case Number:s.start=a;break;case Function:s.click=a;break;case String:if(a.charAt(0)=='.')s.current=a;else if(a.charAt(0)=='!')s.event=a;else s.start=a;break;}}
if(typeof s['return']=="function")
s.change=s['return'];return this.each(function(){$.idTabs(this,s);});}
$.idTabs=function(tabs,options){var meta=($.metadata)?$(tabs).metadata():{};var s=$.extend({},$.idTabs.settings,meta,options);if(s.current.charAt(0)=='.')s.current=s.current.substr(1);if(s.event.charAt(0)=='!')s.event=s.event.substr(1);if(s.start==null)s.start=-1;var showId=function(){if($(this).is('.'+s.current))
return s.change;var id="#"+this.href.split('#')[1];var aList=[];var idList=[];$("a",tabs).each(function(){if(this.href.match(/#/)){aList.push(this);idList.push("#"+this.href.split('#')[1]);}});if(s.click&&!s.click.apply(this,[id,idList,tabs,s]))return s.change;for(i in aList)$(aList[i]).removeClass(s.current);for(i in idList)$(idList[i]).hide();$(this).addClass(s.current);$(id).show();return s.change;}
var list=$("a[href*='#']",tabs).unbind(s.event,showId).bind(s.event,showId);list.each(function(){$("#"+this.href.split('#')[1]).hide();});var test=false;if((test=list.filter('.'+s.current)).length);else if(typeof s.start=="number"&&(test=list.eq(s.start)).length);else if(typeof s.start=="string"&&(test=list.filter("[href*='#"+s.start+"']")).length);if(test){test.removeClass(s.current);test.trigger(s.event);}
return s;}
$.idTabs.settings={start:0,change:false,click:null,current:".current",event:"!click"};$.idTabs.version="2.2";$(function(){$(".idTabs").idTabs();});})(jQuery);}
var check=function(o,s){s=s.split('.');while(o&&s.length)o=o[s.shift()];return o;}
var head=document.getElementsByTagName("head")[0];var add=function(url){var s=document.createElement("script");s.type="text/javascript";s.src=url;head.appendChild(s);}
var s=document.getElementsByTagName('script');var src=s[s.length-1].src;var ok=true;for(d in dep){if(check(this,d))continue;ok=false;add(dep[d]);}if(ok)return init();add(src);})();

$(function() {
     //ctrl+enter提交评论
    $("#commentform").keydown(function(event){if(event.ctrlKey && event.keyCode == 13){jQuery("#comment_submit").click();} });
 	
	
});

//Tab切换标签
$(document).ready(function(){
	$('#tab-title span').click(function(){
	$(this).addClass("selected").siblings().removeClass();
	$("#tab-content > ul").slideUp('0').eq($('#tab-title span').index(this)).slideDown('0');
});
});

(function($){
  //goToTop
  var scrolltotop={
    setting: {startline:350, scrollto: 0, scrollduration:500, fadeduration:[500, 100]},
    controlHTML: ' ', 
    controlattrs: {offsetx:10, offsety:10}, 
    anchorkeyword: '#top', 
    state: {isvisible:false, shouldvisible:false},
    scrollup:function(){
      if (!this.cssfixedsupport) 
        this.$control.css({opacity:0}) 
      var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
      if (typeof dest=="string" && jQuery('#'+dest).length==1) 
        dest=jQuery('#'+dest).offset().top
      else
        dest=0
    this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
    },
    keepfixed:function(){
      var $window=jQuery(window);
      var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx;
      var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety;
      this.$control.css({left:controlx+'px', top:controly+'px'});
    },
    togglecontrol:function(){
      var scrolltop=jQuery(window).scrollTop()
      if (!this.cssfixedsupport)
        this.keepfixed()
      this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
      if (this.state.shouldvisible && !this.state.isvisible){
        this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
        this.state.isvisible=true
      }
      else if (this.state.shouldvisible==false && this.state.isvisible){
        this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
        this.state.isvisible=false
      }
    },
    init:function(){
      jQuery(document).ready(function($){
        var mainobj=scrolltotop
        var iebrws=document.all
        mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest 
        mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
        mainobj.$control=$('<div id="gotop"><a>'+mainobj.controlHTML+'</a></div>')
          .css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
          .attr({title:'点击回到顶部'})
          .click(function(){mainobj.scrollup(); return false})
          .appendTo('body')
        if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') 
          mainobj.$control.css({width:mainobj.$control.width()}) 
        mainobj.togglecontrol()
        $('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
          mainobj.scrollup()
          return false
        })
        $(window).bind('scroll resize', function(e){
          mainobj.togglecontrol()
        })
      })
    }
  };
  scrolltotop.init()
})(jQuery);
