<?php !defined('DEX') && die('Access denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $site_name?></title>
<meta name="keywords" content="<?php echo $site_keyword?>" />
<meta name="description" content="<?php echo $site_descrip?>" />
<link rel="stylesheet" href="<?php echo site_url()?>/resources/css/layout.css" />
<link rel="shortcut icon" href="<?php echo site_url()?>/favicon.ico" />
</head>

<body>
<!-- header start -->
<body>
<div class="top">
    <div class="w1000">
        <div class="logo">
        	<img src="<?php echo site_url()?>/resources/images/global/logo.jpg" />
        </div>
        <div id="main-nav" class="nav fr">
            <a href="<?php echo site_url()?>">公司首页</a>
            <a href="<?php echo site_url()?>/page/intro.html">公司简介</a>
            <a href="<?php echo site_url()?>/html/case/">装修案例</a>
            <a href="<?php echo site_url()?>/html/material/">装修材料</a>
            <a href="<?php echo site_url()?>/page/contact.html">联系我们</a>
        </div>
    </div>
</div>
<script type="text/javascript">
	var cURL = window.location.pathname;
	var nav  = document.getElementById('main-nav').getElementsByTagName('a');
	if(cURL.indexOf("/intro.html") != -1)
		nav[1].className = 'active';
	else if(cURL.indexOf("/case/") != -1)
		nav[2].className = 'active';
	else if(cURL.indexOf("/material/") != -1)
		nav[3].className = 'active';
	else if(cURL.indexOf("/contact.html/") != -1 )
		nav[4].className = 'active';
	else
		nav[0].className = 'active';
</script>

<!-- header end -->