1339059552DEXCACHE---><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>留言板 第1页 - 三明学院学院网</title>
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
<!-- header end --><link rel="stylesheet" href="http://local.smc.com/resources/css/page/message.css" />
<!--content-->
<div class="content">
	<div class="con_left">
      <h1 class="message_t meishi_t"><span style="float:left;">留言板</span></h1>
      <div class="ad_right" style="margin-top:0;">
        <img src="http://local.smc.com/resources/images/ad/ad3.gif" />
      </div>

      <div class="message_l">
        <ul>
        	                <li><a href="http://local.smc.com/guestbook/detail/67">三明学院学院网测试12</a><span>2012-06-01</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/66">三明学院学院网测试11</a><span>2012-06-01</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/65">三明学院学院网测试10</a><span>2012-06-01</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/64">三明学院学院网测试9</a><span>2012-06-21</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/63">三明学院学院网测试8</a><span>2012-06-26</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/62">三明学院学院网测试7</a><span>2012-06-01</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/61">三明学院学院网测试6</a><span>2012-06-01</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/58">三明学院学院网测试5</a><span>2012-06-01</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/57">三明学院学院网测试4</a><span>2012-06-01</span></li>
          	                <li><a href="http://local.smc.com/guestbook/detail/54">三明学院学院网测试1</a><span>2012-05-31</span></li>
          	        </ul>
        <div class="pagination"><span classs="current">1</span></div>      </div>

      <div class="ad_right">
        <img src="http://local.smc.com/resources/images/ad/ad6.gif" />
      </div>
    </div>
    <div class="con_right">
      <div class="woyao">
        <a class="fabu" style="float:right;" href="http://local.smc.com/guestbook/add">我要发布</a>
      </div>
      <div class="ad">
      	<img src="http://local.smc.com/resources/images/ad/ad2.gif" />
      	<img src="http://local.smc.com/resources/images/ad/ad7.gif" />
      </div>

    </div>
    <div class="clear"></div>
</div>
<!--end content-->
<!--footer-->
<div class="footer">
    <p>关于我们  |  广告投放  |  法律声明  |  联系我们<br />
    三明学院学生网：为您的每一天做最贴心的服务！www.xxxxxxxxx.com<br />
    QQ：88888888 888888888       联系电话：88888888888 8888888888 888888888<br />
    Copyright 2011-2013闽ICP备8888888号</p>
</div>
</body>
</html>
