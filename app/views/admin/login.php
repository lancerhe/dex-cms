<?php !defined('DEX') && die('Access denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title?></title>
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>/resources/css/admin-login.css" />
<script type="text/javascript">
function $(id) {return document.getElementById(id);}
function checkLogin() {
	var error = new Array();
	var error_msg = '';
	if ($('username').value.length < 4)
		error.push('请输入正确的用户名');

	if ($('password').value == '')
		error.push('请输入正确的密码');

	if ($('is_captcha').value == 1 && $('captcha').value.length != 4)
		error.push('请输入4位有效的验证码');

	if (error.length > 0) {
		for( i in error ) error_msg += error[i] + "\r\n";
		alert(error_msg);
		return false;
	}
	return true;
}
</script>
</head>
<body>
<div id="login-form">
	<h1>用户登陆</h1>
    <form action="<?php echo site_url('/admin/login-check')?>" method="post" onsubmit="return checkLogin();" target="_top">
    <div class="fl w200 h50" align="right">
    	<label for="username" class="login-bg-username-label">Username: </label>
    </div>
    <div class="fl w280 h50 login-bg-username">
        <input id="username" type="text" name="username" class="login-input-text" maxlength="16" value="" />
    </div>
    <div class="clear"></div>
    <div class="fl w200 h50" align="right">
    	<label for="password" class="login-bg-password-label">Password: </label>
    </div>
    <div class="fl w280 h50 login-bg-password">
        <input id="password" type="password" name="password" class="login-input-text" maxlength="16" value="" />
    </div>
    <div class="clear"></div>
    <div id="captchaWrap" <?php echo $is_captcha == 0 ? 'style="display:none"' : ''?>>
    	<div class="fl w200 h50" align="right">
    	<label for="captcha" class="login-bg-captcha-label">Password: </label>
        </div>
        <div class="fl w120 h50 login-bg-captcha">
        	<input id="is_captcha" type="hidden" value="<?php echo $is_captcha?>" />
            <input id="captcha" type="text" name="captcha" class="login-input-captcha" maxlength="4" value="" />
        </div>
        <div class="fl w120 h50">
            <img src="<?php echo site_url('admin/login-code')?>" class="login-img-captcha" title="刷新验证码" onclick="javascript:this.src='<?php echo site_url('admin/login-code&r=')?>'+Math.random();" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="fl w200 h50"></div>
    <div class="fl w280 h50 login-bg-button">
    	<input id="submit" type="submit" value="Submit" class="login-input-btn" />
        <input id="submit" type="reset" value="Button" class="login-input-btn" />
    </div>
    </form>
</div>

</body>
</html>
