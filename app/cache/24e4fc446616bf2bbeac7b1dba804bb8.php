1339059538DEXCACHE---><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>新生咨询 - 三明学院学院网</title>
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
            <input type="text" value="输入关键字" class="txt" onfocus="if(this.value=='输入关键字')value=''" onblur="if(this.value=='')value='输入关键字'" />
            <a class="btn" href="#"></a>
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
<!-- header end --><link rel="stylesheet" href="http://local.smc.com/resources/css/page/market.css" />
<!--sitemap-->
<div class="sitemap">
    <div class="home">
    	<a href="http://local.smc.com/" >网站首页</a> &gt; <a href="javascript:;" >新生咨询</a>
    </div>
</div>
<!--end sitemap-->

<!--content-->
<div class="content">
	<div class="con_left">
        <h1>商家展示</h1>
        <div class="map">
        	<img src="/resources/images/map.gif" />
        </div>
    </div>

    <div class="con_right">
        <div class="woyao">
        	<a class="fabu" style="float:right;" href="http://local.smc.com/faq/add">我要发布</a>
        </div>
        <div class="ad">
            <img src="/resources/images/ad/ad1.gif" />
            <img src="/resources/images/ad/ad2.gif" />
        </div>
      	<div class="info">
        	<h3 class="r_title"><a style="float:left; color:#fff;" href="http://local.smc.com/faq/page">最新咨询</a><a href="http://local.smc.com/faq/page" class="more r_title_more">更多>></a></h3>
        	<ul class="r_list">
        		                <li><a href="http://local.smc.com/faq/detail/76">咨询下贵校的住宿情况</a><span class="date">2012-06-05</span></li>
                                <li><a href="http://local.smc.com/faq/detail/77">咨询下贵校的伙食怎么样，食堂...</a><span class="date">2012-06-05</span></li>
                        	</ul>
      	</div>
    </div>
    <div class="clear"></div>
</div>
<!--footer-->
<div class="footer">
    <p>关于我们  |  广告投放  |  法律声明  |  联系我们<br />
    三明学院学生网：为您的每一天做最贴心的服务！www.xxxxxxxxx.com<br />
    QQ：88888888 888888888       联系电话：88888888888 8888888888 888888888<br />
    Copyright 2011-2013闽ICP备8888888号</p>
</div>
</body>
</html>
