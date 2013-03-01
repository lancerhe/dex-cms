<?php !defined('DEX') && die('Access denied');?>

<?php load_view('admin/system_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/system-save')?>">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    
	<legend>站点设置</legend>
    <div class="control-group">
        <label class="control-label" for="site_name">网站标题</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="site_name" name="site_name" value="<?php echo $site_name?>" placeholder="网站标题" />
            <span class="help-inline">变量名：$site_name</span>
        </div> 
    </div>

    <div class="control-group">
        <label class="control-label" for="site_descrip">网站默认关键字</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="site_keywords" name="site_keywords" value="<?php echo $site_keywords?>" placeholder="网站默认关键字" />
            <span class="help-inline">变量名：$site_keywords</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="site_descrip">网站描述</label>
        <div class="controls">
            <textarea class="input-xxlarge" id="site_descrip" name="site_descrip" rows="3" placeholder="网站描述"><?php echo $site_descrip?></textarea>    
            <span class="help-inline">变量名：$site_descrip</span>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="site_copyright">网站版权信息</label>
        <div class="controls">
            <textarea class="input-xxlarge" id="site_copyright" name="site_copyright" rows="3" placeholder="网站版权信息"><?php echo $site_copyright?></textarea>
            <span class="help-inline">变量名：$site_copyright</span>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="site_icp">网站备案号</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="site_icp" name="site_icp" value="<?php echo $site_icp?>" placeholder="ICP" />
            <span class="help-inline">变量名：$site_icp</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="site_icp">联系电话</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="site_phone" name="site_phone" value="<?php echo $site_phone?>" placeholder="输入一个联系电话" />
            <span class="help-inline">变量名：$site_phone</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="site_icp">联系地址</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="site_address" name="site_address" value="<?php echo $site_address?>" placeholder="输入一个地址" />
            <span class="help-inline">变量名：$site_address</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="site_icp">客服QQ</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="site_qq" name="site_qq" value="<?php echo $site_qq?>" placeholder="QQ" />
            <span class="help-inline">变量名：$site_qq</span>
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>