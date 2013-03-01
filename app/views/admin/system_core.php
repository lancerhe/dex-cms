<?php !defined('DEX') && die('Access denied');?>

<?php load_view('admin/system_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/system-save')?>">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    
	<legend>核心设置</legend>
    <div class="control-group">
        <label class="control-label" for="cookie_code">Cookie加密码</label>
        <div class="controls">
            <input type="text" id="cookie_code" name="cookie_code" value="<?php echo $cookie_code?>" />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="stmp_host">STMP服务器</label>
        <div class="controls">
            <input type="text" id="stmp_host" name="stmp_host" value="<?php echo $stmp_host?>" placeholder="stmp.example.com" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="stmp_port">STMP端口</label>
        <div class="controls">
            <input type="text" id="stmp_port" name="stmp_port" value="<?php echo $stmp_port?>" placeholder="25" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="stmp_user">STMP用户名</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="stmp_user" name="stmp_user" value="<?php echo $stmp_user?>" placeholder="Username" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="stmp_pass">STMP密码</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="stmp_pass" name="stmp_pass" value="<?php echo $stmp_pass?>" placeholder="Password" />
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>