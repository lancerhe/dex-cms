1339059541DEXCACHE---><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园娱乐 - 三明学院学院网</title>
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
<!-- header end --><link rel="stylesheet" href="http://local.smc.com/resources/css/page/job.css" />
<link rel="stylesheet" href="http://local.smc.com/resources/css/page/entertainment.css" />
<script type="text/javascript">
//选择器
function $a(id,tag){var re=(id&&typeof id!="string")?id:document.getElementById(id);if(!tag){return re;}else{return re.getElementsByTagName(tag);}}

//焦点滚动图 点击移动
function movec()
{
	var o=$a("bd1lfimg","");
	var oli=$a("bd1lfimg","dl");
    var oliw=oli[0].offsetWidth; //每次移动的宽度
	var ow=o.offsetWidth-2;
	var dnow=0; //当前位置
	var olf=oliw-(ow-oliw+10)/2;
		o["scrollLeft"]=olf+(dnow*oliw);
	var rqbd=$a("bd1lfsj","ul")[0];
	var extime;

	<!--for(var i=1;i<oli.length;i++){rqbd.innerHTML+="<li>"+i+"</li>";}-->
	var rq=$a("bd1lfsj","li");
	for(var i=0;i<rq.length;i++){reg(i);};
	oli[dnow].className=rq[dnow].className="show";
	var wwww=setInterval(uu,2000);

	function reg(i){rq[i].onclick=function(){oli[dnow].className=rq[dnow].className="";dnow=i;oli[dnow].className=rq[dnow].className="show";mv();}}
	function mv(){clearInterval(extime);clearInterval(wwww);extime=setInterval(bc,15);wwww=setInterval(uu,8000);}
	function bc()
	{
		var ns=((dnow*oliw+olf)-o["scrollLeft"]);
		var v=ns>0?Math.ceil(ns/10):Math.floor(ns/10);
		o["scrollLeft"]+=v;if(v==0){clearInterval(extime);oli[dnow].className=rq[dnow].className="show";v=null;}
	}
	function uu()
	{
		if(dnow<oli.length-2)
		{
			oli[dnow].className=rq[dnow].className="";
			dnow++;
			oli[dnow].className=rq[dnow].className="show";
		}
		else{oli[dnow].className=rq[dnow].className="";dnow=0;oli[dnow].className=rq[dnow].className="show";}
		mv();
	}
	o.onmouseover=function(){clearInterval(extime);clearInterval(wwww);}
	o.onmouseout=function(){extime=setInterval(bc,15);wwww=setInterval(uu,8000);}
}
</script>
<!--sitemap-->
<div class="sitemap">
    <div class="home">
    	<a href="http://local.smc.com/" >网站首页</a> &gt; <a href="javascript:;" >校园娱乐</a>
    </div>
</div>
<!--end sitemap-->

<!--content-->
<div class="content">
	<div class="con_left">
      <h1 class="meishi_t"><span style="float:left;">美食/饮品</span></h1>
      <div class="clear"></div>
      <div class="meishi">
        <div class="slide">
		<!-----------图片切换  begin----------->
		<div class="sub_box">
			<div id="p-select" class="sub_nav">
				<div class="sub_more"><a href="/" onfocus="this.blur()" title="查看更多目的地旅游指南" style="font-family: Tahoma; font-size: 12px;" target="_blank">更多>></a></div>
				<div class="sub_no" id="bd1lfsj">
					<ul>
						<li class="show">1</li><li class="">2</li><li class="">3</li><li class="">4</li><li class="">5</li>
					</ul>
				</div>
			</div>
			<div id="bd1lfimg">
				<div>
					<dl class="show"></dl>
										<dl class="">
						<dt><a href="http://www.codefans.net" title="" target="_blank"><img src="http://www.codefans.net/jscss/demoimg/wall1.jpg" alt="2011城市主题公园亲子游"></a></dt>
						<dd>
							<h2><a href="#" target="_blank">2011城市主题公园亲子游</a></h2>
							<tt><a href="#" target="_blank">又是春游踏青的季节，各大主题乐园都为大朋友、小朋友们准备了丰…</a></tt>
						</dd>
					</dl>
										<dl class="">
						<dt><a href="#" title="" target="_blank"><img src="http://www.codefans.net/jscss/demoimg/wall2.jpg" alt="潜入城市周边清幽之地"></a></dt>
						<dd>
							<h2><a href="#" target="_blank">潜入城市周边清幽之地</a></h2>
							<tt><a href="#" target="_blank">北京、上海、广州、成都周边，总有些人少清幽的地方，等着你去探…</a></tt>
						</dd>
					</dl>
										<dl class="">
						<dt><a href="#" title="" target="_blank"><img src="http://www.codefans.net/jscss/demoimg/wall3.jpg" alt="盘点中国最美雪山"></a></dt>
						<dd>
							<h2><a href="#" target="_blank">盘点中国最美雪山</a></h2>
							<tt><a href="#" target="_blank">盘点中国最美雪山，从云南的梅里到西藏的珠穆朗玛，带你领略中国…</a></tt>
						</dd>
					</dl>
										<dl class="">
						<dt><a href="#" title="" target="_blank"><img src="http://www.codefans.net/jscss/demoimg/wall4.jpg" alt="2011西安世园会攻略"></a></dt>
						<dd>
							<h2><a href="http://www.codefans.net/" target="_blank">2011西安世园会攻略</a></h2>
							<tt><a href="#" target="_blank">提供最全面西安世园会资讯、西安世园会参观指南、西安世园会旅游…</a></tt>
						</dd>
					</dl>
										<dl class="">
						<dt><a href="http://www.codefans.net/" title="" target="_blank"><img src="http://www.codefans.net/jscss/demoimg/wall5.jpg" alt="五月乐享懒人天堂塞班岛"></a></dt>
						<dd>
							<h2><a href="http://www.codefans.net/jscss/" target="_blank">五月乐享懒人天堂塞班岛</a></h2>
							<tt><a href="#" target="_blank">塞班岛是北马里亚纳群岛的首府，由于近邻赤道，塞班岛一年四季如…</a></tt>
						</dd>
					</dl>
									</div>
			</div>
		</div>
		<script type="text/javascript">movec();</script>
		<!-----------图片切换  end----------->
        </div>
        <div class="meishi_c">
          <h4><a href="http://local.smc.com/play/eat-in" style="color:white">校内</a></h4>
          <ul>
          	            	<li><a href="http://local.smc.com/play/detail/94">扬州风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/80">鸿运餐馆</a></li>
                        	<li><a href="http://local.smc.com/play/detail/81">扬州风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/82">龙岩华鑫</a></li>
                        	<li><a href="http://local.smc.com/play/detail/83">闽台风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/84">旺仔套餐</a></li>
                        	<li><a href="http://local.smc.com/play/detail/85">肥味香港</a></li>
                        	<li><a href="http://local.smc.com/play/detail/86">牛牛手工</a></li>
                        	<li><a href="http://local.smc.com/play/detail/87">莆仙小吃</a></li>
                        	<li><a href="http://local.smc.com/play/detail/88">莆仙小吃</a></li>
                        	<li><a href="http://local.smc.com/play/detail/89">牛牛手工</a></li>
                        	<li><a href="http://local.smc.com/play/detail/90">肥味香港</a></li>
                        	<li><a href="http://local.smc.com/play/detail/91">旺仔套餐</a></li>
                        	<li><a href="http://local.smc.com/play/detail/92">闽台风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/93">龙岩华鑫</a></li>
                        	<li><a href="http://local.smc.com/play/detail/95">鸿运餐馆</a></li>
                        <div class="clear"></div>
          </ul>
          <h4><a href="http://local.smc.com/play/eat-out" style="color:white">校外</a></h4>
          <ul>
                        	<li><a href="http://local.smc.com/play/detail/97">扬州风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/98">龙岩华鑫</a></li>
                        	<li><a href="http://local.smc.com/play/detail/99">闽台风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/100">旺仔套餐</a></li>
                        	<li><a href="http://local.smc.com/play/detail/101">肥味香港</a></li>
                        	<li><a href="http://local.smc.com/play/detail/102">牛牛手工</a></li>
                        	<li><a href="http://local.smc.com/play/detail/103">莆仙小吃</a></li>
                        	<li><a href="http://local.smc.com/play/detail/104">莆仙小吃</a></li>
                        	<li><a href="http://local.smc.com/play/detail/105">牛牛手工</a></li>
                        	<li><a href="http://local.smc.com/play/detail/106">肥味香港</a></li>
                        	<li><a href="http://local.smc.com/play/detail/107">旺仔套餐</a></li>
                        	<li><a href="http://local.smc.com/play/detail/108">闽台风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/109">龙岩华鑫</a></li>
                        	<li><a href="http://local.smc.com/play/detail/110">扬州风味</a></li>
                        	<li><a href="http://local.smc.com/play/detail/111">牛牛手工</a></li>
                        	<li><a href="http://local.smc.com/play/detail/96">鸿运餐馆</a></li>
                        <div class="clear"></div>
          </ul>
        </div>
      </div>

      <div class="con_bottom">
        <div class="ktv">
          <h2 class="ktv_t"><span style="float:left;">KTV/休闲吧/棋牌</span><a href="#" class="more_l" style="padding-right:0px;">更多...</a></h2>
          <ul>
                        	<li><a href="http://local.smc.com/play/detail/114">休闲棋牌会所</a></li>
                        	<li><a href="http://local.smc.com/play/detail/115">乐乐KTV</a></li>
                      </ul>
        </div>
        <div class="activity">
           <h2 class="activity_t"><span style="float:left;">校园活动</span><a href="#" class="more_l">更多...</a></h2>
            <ul>
                        	<li><a href="http://local.smc.com/play/detail/112">学院第六届十佳歌手季赛</a></li>
                        	<li><a href="http://local.smc.com/play/detail/113">校园剧《上大学》第二次联排</a></li>
                      </ul>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="con_right">
      <div class="woyao">

    		<a class="fabu" style="float:right;" href="http://local.smc.com/play/add">我要发布</a>
      </div>
      <div class="ad">
      	<img src="/resources/images/ad/ad2.gif" />
      </div>

      <div class="info">
        <h3 class="r_title"><a class="r_title" href="#">其它娱乐</a></h3>
        <ul class="r_list hot" style="font-size:14px;">

            	                    <li><a href="http://local.smc.com/market/detail/116">asdf</a></li>
                                    <li><a href="http://local.smc.com/market/detail/74">tsdtstat</a></li>
                                    <li><a href="http://local.smc.com/market/detail/5">本人已经大四！出售电脑，电脑桌套件等...</a></li>
                                    <li><a href="http://local.smc.com/market/detail/7">求购二手自行车</a></li>
                                    <li><a href="http://local.smc.com/market/detail/45">想买一台二手的无线路由器</a></li>
                                    <li><a href="http://local.smc.com/market/detail/47">索尼mp4</a></li>
                                    <li><a href="http://local.smc.com/market/detail/50">9.5成新 旱冰鞋 溜冰鞋</a></li>
                                    <li><a href="http://local.smc.com/market/detail/9">FASTADSL宽带猫转让：无线上网卡</a></li>
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
