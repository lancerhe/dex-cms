<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/resources/css/bootstrap.min.css" rel="stylesheet" />
<link href="/resources/css/admin-common.css" rel="stylesheet" />
<script type="text/javascript" src="/resources/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/resources/js/artDialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="/resources/js/artDialog/plugins/iframeTools.js"></script>
<title>内容管理系统</title>
<script type="text/javascript">
function setIFHeight() {
	$("#main").height( $(window).height() - $("#header").height() );
}
$(window).resize(function() {
	setIFHeight();
});
$(document).ready(function() {
	$("#nav > li").bind('click', function() {
		$("#nav > li.active").removeClass('active');
		$(this).addClass('active');
	});
});

</script>
</head>
<body>
<div id="header">
	<div id="logo" class="pull-left"><img src="resources/images/admin/logo.gif" /></div>
    <div id="login">
    	<ul id="login-bar" class="breadcrumb">
            <li><a href="<?php echo site_url()?>" target="_blank">网站主页</a> <span class="divider">/</span></li>
            <li><a href="<?php echo site_url("admin/manage-edit")?>">修改密码</a> <span class="divider">/</span></li>
            <li><a href="<?php echo site_url("admin/login-logout")?>">注销退出</a> <span class="divider">/</span></li>
            <li class="active">Lancer</li>
        </ul>
    	
    	<ul id="nav" class="nav nav-tabs">
        	<li class="active"><a href="<?php echo site_url("admin/landing")?>" target="main">后台主页</a></li>
            <li class="dropdown">
            	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">系统设置 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url("admin/system")?>" target="main">站点设置</a></li>
                    <li><a href="<?php echo site_url("admin/system-core")?>" target="main">核心设置</a></li>
                    <li><a href="<?php echo site_url("admin/system-article")?>" target="main">页面设置</a></li>
                    <li><a href="<?php echo site_url("admin/system-attach")?>" target="main">附件设置</a></li>
                </ul>
            </li>
            <li class="dropdown">
            	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">文章管理 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url("admin/article")?>" target="main">文章列表</a></li>
                    <li><a href="<?php echo site_url("admin/article-add")?>" target="main">添加文章</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url("admin/article-cate")?>" target="main">栏目管理</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:;" onclick="art.dialog.confirm('确认更新所有页面吗？', function(){main.location.href='<?php echo site_url("admin/article-htmlpage'")?>});" target="main">更新页面</a></li>
                    <li><a href="javascript:;" onclick="art.dialog.confirm('确认更新所有页面吗？', function(){main.location.href='<?php echo site_url("admin/article-htmlcate'")?>});" target="main">更新栏目</a></li>
                </ul>
            </li>
            <li class="dropdown">
            	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">单页管理 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url("admin/singlepage")?>" target="main">单页列表</a></li>
                    <li><a href="<?php echo site_url("admin/singlepage-add")?>" target="main">添加文章</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:;" onclick="art.dialog.confirm('确认更新所有单页吗？', function(){main.location.href='<?php echo site_url("admin/singlepage-htmlpage'")?>});" target="main">更新单页</a></li>
                </ul>
            </li>
            
            <li class="dropdown">
            	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">友情链接 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url("admin/link")?>" target="main">链接一览</a></li>
                    <li><a href="<?php echo site_url("admin/link-add")?>" target="main">添加链接</a></li>
                </ul>
            </li>
            
            <li class="dropdown">
            	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">广告投放 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url("admin/ad")?>" target="main">广告一览</a></li>
                    <li><a href="<?php echo site_url("admin/ad-add")?>" target="main">添加广告</a></li>
                </ul>
            </li>
            
            <li class="dropdown">
            	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">用户管理 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url("admin/user")?>" target="main">用户一览</a></li>
                    <li><a href="<?php echo site_url("admin/user-add")?>" target="main">添加用户</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div id="container">
	<iframe width="100%" src="<?php echo site_url("admin/landing")?>" name="main" id="main" scrolling="auto" frameborder="0" onload="Javascript:setIFHeight()"></iframe>
</div>
</body>
</html>