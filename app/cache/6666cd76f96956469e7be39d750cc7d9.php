1339479679DEXCACHE---><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>三明学院学生网|兼职|叫餐|活动</title>
<meta name="keywords" content="学院网," />
<meta name="description" content="三明学院学院网," />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://local.smc.com/resources/css/base.css" />
<link rel="stylesheet" href="http://local.smc.com/resources/css/layout.css" />
<script src="http://local.smc.com/resources/js/jquery-1.3.1.min.js" type="text/javascript"></script>

</head>

<body>
<!-- header start -->
<div class="header">
    <div class="top">
        <div class="top_txt">欢迎来到三明学院学生网</div>
        <div class="head_notic">
        <!--
            <div class="head_notic_icon"></div>
            <div id="xlMenu2">
            	<div class="notice-scroll">
                    <ul>
                        <li><a href="javascript:void(0)">网站公告网站公告1</a> </li>
                        <li><a href="javascript:void(0)">网站公告网站公告2</a> </li>
                        <li><a href="javascript:void(0)">网站公告网站公告3</a> </li>
                        <li><a href="javascript:void(0)">网站公告网站公告4</a> </li>
                        <li><a href="javascript:void(0)">网站公告网站公告5</a> </li>
                    </ul>
                </div>
                <div class="notice-wrap">
                    <ul>
                        <li><a href="javascript:void(0)">网站公告网站公告1</a> </li>
                        <li><a href="javascript:void(0)">网站公告网站公告2</a> </li>
                        <li><a href="javascript:void(0)">网站公告网站公告3</a> </li>
                    </ul>
                    <span><a href="javscript:void(0)">更多>></a></span>
                </div>
            </div>
            <div class="clear"></div>
        -->
        </div>
    	<div class="clear"></div>
    </div>

    <div class="top_mid">
        <div class="logo"><img src="http://local.smc.com/resources/images/global/logo.gif" /></div>
        <div class="search">
            <input id="searchBox" type="text" value="输入关键字" class="txt" onfocus="if(this.value=='输入关键字')value=''" onblur="if(this.value=='')value='输入关键字'" />
            <a class="btn" href="javascript:;" onclick="if (document.getElementById('searchBox').value=='输入关键字'){document.getElementById('searchBox').focus()} else {location.href='/search/page/'+document.getElementById('searchBox').value;}"></a>
        </div>

        <div id="Main-nav" class="nav">
            <ul>
                <li><a href="http://local.smc.com/">首页</a></li>
                <li><a href="http://local.smc.com/job">兼职/求职</a></li>
                <li><a href="http://local.smc.com/faq">新生咨询</a></li>
                <li><a href="http://local.smc.com/play">校园娱乐</a></li>
                <li><a href="http://local.smc.com/market">跳蚤市场</a></li>
                <li><a href="http://local.smc.com/material">考试资料</a></li>
                <li><a href="http://local.smc.com/guestbook">留言板</a></li>
            </ul>
        </div>

        <div class="user">
            <div id="user_box" class="user_box"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var cURL = window.location.pathname;
	if(cURL.indexOf("/job") != -1)
		$("#Main-nav li:eq(1) a").addClass('on');
	else if(cURL.indexOf("/faq") != -1)
		$("#Main-nav li:eq(2) a").addClass('on');
	else if(cURL.indexOf("/play") != -1)
		$("#Main-nav li:eq(3) a").addClass('on');
	else if(cURL.indexOf("/market") != -1)
		$("#Main-nav li:eq(4) a").addClass('on');
	else if(cURL.indexOf("/material") != -1 )
		$("#Main-nav li:eq(5) a").addClass('on');
    else if(cURL.indexOf("/guestbook") != -1 )
		$("#Main-nav li:eq(6) a").addClass('on');
	else if(cURL === '/' || cURL === 'index.php')
		$("#Main-nav li:eq(0) a").addClass('on');
    /*
	//Announcetments.
	$("#xlMenu2").click(function() {
		if ($(this).find('.notice-wrap').is(":visible") == true)
			$(this).find('.notice-wrap').hide();
		else
			$(this).find('.notice-wrap').show();
	});
	$("#xlMenu2").mouseleave(function() {
		$("#xlMenu2 .notice-wrap").hide();
	});

	var $noticeWrap = $('#xlMenu2 .notice-scroll ul');
	var noticeInterval=2000;
	var noticeMoving;
	$noticeWrap.hover( function(){
		clearInterval( noticeMoving );
	}, function() {
		noticeMoving = setInterval(function(){
			var li=$noticeWrap.find('li:first');
			var _h=li.height();
			li.animate({marginTop: -_h+'px'},600,function(){
				li.css('marginTop',0).appendTo($noticeWrap);
			});
		},noticeInterval);
	}).trigger('mouseleave');
    */
    $("#user_box").load('http://local.smc.com/user/ajax', function(data){$(this).html(data)})
</script>
<!-- header end --><!--特效开始-->
<div class="focus">
	<div class="focus_body">
        <!--焦点图 begin -->
        <div class="scroll">
            <a href="javascript:void(0);" class="arr_left" id="FS_arr_left_01">左移动</a>
            <a href="javascript:void(0);" class="arr_right" id="FS_arr_right_01">右移动</a>
            <div class="scroll_cont" id="FS_Cont_01">
            	<div class="box">
                	<a href="#" target="_blank"><img src="/resources/images/ad/slide_1.jpg" /></a>
                </div>
                <div class="box">
                	<a href="#" target="_blank"><img src="/resources/images/ad/slide_2.jpg" /></a>
                </div>
                <div class="box">
                	<a href="#" target="_blank"><img src="/resources/images/ad/slide_3.jpg" /></a>
                </div>
                <div class="box">
                	<a href="#" target="_blank"><img src="/resources/images/ad/slide_4.jpg" /></a>
                </div>
            </div>
            <div id="FS_numList_01" class="numList"></div>

            <div class="scroll_txt">
            	<div id="txt01" class="scroll_info" style="display:block">
            		<div class="txtbg"></div>
            		<div class="txtcontent">
                    	<h2><a href="#" target="_blank">广告标题</a></h2>
                        <p>描述信息1</p>
                        <p class="des">描述信息描述信息描述信息描述信息描述信息……
                        <a href="#" target="_blank">[详细]</a></p>
                        <div class="btn"><a href="#" target="_blank">播放</a></div>
                    </div>
        		</div>

                <div id="txt02" class="scroll_info" style="display:none">
               		<div class="txtbg"></div>
            		<div class="txtcontent">
                    	<h2><a href="#" target="_blank">广告标题</a></h2>
                        <p>描述信息2</p>
                        <p class="des">描述信息描述信息描述信息描述信息描述信息……
                        <a href="#" target="_blank">[详细]</a></p>
                        <div class="btn"><a href="#" target="_blank">播放</a></div>
                    </div>
                </div>

                <div id="txt03" class="scroll_info" style="display:none">
                	<div class="txtbg"></div>
            		<div class="txtcontent">
                    	<h2><a href="#" target="_blank">广告标题</a></h2>
                        <p>描述信息2</p>
                        <p class="des">描述信息描述信息描述信息描述信息描述信息……
                        <a href="#" target="_blank">[详细]</a></p>
                        <div class="btn"><a href="#" target="_blank">播放</a></div>
                    </div>
                </div>

                <div id="txt04" class="scroll_info" style="display:none">
                	<div class="txtbg"></div>
            		<div class="txtcontent">
                    	<h2><a href="#" target="_blank">广告标题</a></h2>
                        <p>描述信息2</p>
                        <p class="des">描述信息描述信息描述信息描述信息描述信息……
                        <a href="#" target="_blank">[详细]</a></p>
                        <div class="btn"><a href="#" target="_blank">播放</a></div>
                    </div>
                </div>
      		</div>
     	</div>
    </div>
</div>
<script type="text/javascript" src="/resources/js/slide.js"></script>
<!--特效结束-->
<div class="content">
	<!--滑动门-->
	<div class="left">
    	<div class="tabbox">
        	<div class="tabmenu">
                <ul>
                    <li onmouseover="tabChange(this,0)" class="cli">校园娱乐</li>
                    <li onmouseover="tabChange(this,1)" class="nli">跳蚤市场</li>
                    <li onmouseover="tabChange(this,2)" class="nli">考试材料</li>
                </ul>
            </div>
    		<div id="tabcontent">
            	<div class="tab">
                    <ul class="colL" name="tabul" >
                                                <li><a href="http://local.smc.com/play/detail/114" title="休闲棋牌会所"><span>[06-06]</span> 休闲棋牌会所</a></li>
                                                <li><a href="http://local.smc.com/play/detail/115" title="乐乐KTV"><span>[06-06]</span> 乐乐KTV</a></li>
                                            </ul>

                    <ul class="colL" name="tabul" >
                                                <li><a href="http://local.smc.com/play/detail/112" title="学院第六届十佳歌手季赛"><span>[06-06]</span> 学院第六届十佳歌手季赛</a></li>
                                                <li><a href="http://local.smc.com/play/detail/113" title="校园剧《上大学》第二次联排"><span>[06-06]</span> 校园剧《上大学》第二次联排</a></li>
                                            </ul>
                    <div class="clear"></div>
                </div>
                <div class="tab hidden">
                    <ul class="colL">
                                                <li><a href="http://local.smc.com/market/detail/74" title="tsdtstat"><span>[06-04]</span> tsdtstat</a></li>
                                                <li><a href="http://local.smc.com/market/detail/5" title="本人已经大四！出售电脑，电脑桌套件等"><span>[05-31]</span> 本人已经大四！出售电脑，电脑桌...</a></li>
                                                <li><a href="http://local.smc.com/market/detail/7" title="求购二手自行车"><span>[05-25]</span> 求购二手自行车</a></li>
                                                <li><a href="http://local.smc.com/market/detail/45" title="想买一台二手的无线路由器"><span>[05-23]</span> 想买一台二手的无线路由器</a></li>
                                            </ul>
                    <ul class="colL">
                                                <li><a href="http://local.smc.com/market/detail/116" title="asdf"><span>[06-07]</span> asdf</a></li>
                                                <li><a href="http://local.smc.com/market/detail/47" title="索尼mp4"><span>[05-23]</span> 索尼mp4</a></li>
                                                <li><a href="http://local.smc.com/market/detail/50" title="9.5成新 旱冰鞋 溜冰鞋"><span>[05-18]</span> 9.5成新 旱冰鞋 溜冰鞋</a></li>
                                                <li><a href="http://local.smc.com/market/detail/9" title="FASTADSL宽带猫转让：无线上网卡"><span>[05-16]</span> FASTADSL宽带猫转让：无线上网卡...</a></li>
                                                <li><a href="http://local.smc.com/market/detail/52" title="新贵---无线鼠标"><span>[05-16]</span> 新贵---无线鼠标</a></li>
                                            </ul>
                    <div class="clear"></div>
                </div>
                <div class="tab hidden">
                    <ul class="colL">
                                                <li><a href="http://local.smc.com/material/detail/79" title="zip"><span>[06-06]</span> zip</a></li>
                                            </ul>
                    <ul class="colL">
                                            </ul>
                    <div class="clear"></div>
                </div>
  			</div>
 		</div>
 	</div>
	<script language="javascript">
    function tabChange(obj, id) {
        $(".tabmenu li").removeClass('cli').addClass('nli');
        $(obj).removeClass('nli').addClass('cli');
        $("#tabcontent .tab:visible").hide();
        $("#tabcontent .tab").eq(id).show();
    }
    </script>
	<!--滑动门结束-->
	<div class="right">
		<div class="colR_til tit">兼职/求职</div>
        <div class="colR_box">
        	<ul>            	<li><a href="http://local.smc.com/job/detail/75" title="想找一份兼职">想找一份兼职</a><span>2012-06-05</span></li>
            	            	<li><a href="http://local.smc.com/job/detail/78" title="找一份和机械相关的实习工作">找一份和机械相关的实习...</a><span>2012-06-05</span></li>
            	            	<li><a href="http://local.smc.com/job/detail/28" title="招聘60名五月天演唱会兼职销售员">招聘60名五月天演唱会兼...</a><span>2012-05-26</span></li>
            	            	<li><a href="http://local.smc.com/job/detail/11" title="招聘统一冰红茶促销员">招聘统一冰红茶促销员</a><span>2012-05-24</span></li>
            	            	<li><a href="http://local.smc.com/job/detail/18" title="初三家教一次2小时80（已招满）">初三家教一次2小时80（已...</a><span>2012-05-24</span></li>
            	            	<li><a href="http://local.smc.com/job/detail/30" title="比较闲的兼职，赚的不多">比较闲的兼职，赚的不多...</a><span>2012-05-24</span></li>
            	            	<li><a href="http://local.smc.com/job/detail/10" title="蒙牛招聘促销员">蒙牛招聘促销员</a><span>2012-05-23</span></li>
            	            	<li><a href="http://local.smc.com/job/detail/13" title="急招发传单兼职">急招发传单兼职</a><span>2012-05-23</span></li>
            				</ul>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="link_til">
    <div class="link_h tit">友情链接</div>
</div>
<div class="link_box">
    <ul>
        <li><a href="http://218.5.241.16/">三明学院校园网</a>|</li>
        <li><a href="http://smcdy.shareyixia.com/">三明学院电影资源网</a>|</li>
        <li><a href="http://daydayforyou.com">泉州师范学院兼职网</a>|</li>
    </ul>
</div>

<!--footer-->
<div class="footer">
    <p>关于我们  |  广告投放  |  法律声明  |  联系我们<br />
    三明的学院学生网：为您的每一天做最贴心的服务！<a href="http://www.99foryou.com">www.99foryou.com</a><br />
    QQ：494812576 联系电话：15280593378<br />
    Copyright 2011-2013 闽ICP备12007926号</p>
</div>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F4af2e9d72ebf5c4fa4fc93dbc12bb888' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>
