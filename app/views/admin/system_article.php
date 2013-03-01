<?php !defined('DEX') && die('Access denied');?>

<?php load_view('admin/system_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/system-save')?>">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    
	<legend>页面设置</legend>
    <div class="control-group">
        <label class="control-label" for="stmp_host">页面静态化开启</label>
        <div class="controls">
        	<label class="checkbox">
                <input name="article_html" type="checkbox" value="1" <?php echo $article_html ? 'checked' : ''?>>
               
            </label>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="article_html_path">文章文件夹</label>
        <div class="controls">
            <input type="text" id="article_html_path" name="article_html_path" value="<?php echo $article_html_path?>" placeholder="/example/" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="page_html_path">单页文件夹</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="page_html_path" name="page_html_path" value="<?php echo $page_html_path?>" placeholder="Password" />
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>