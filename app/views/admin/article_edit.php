<?php !defined('DEX') && die('Access denied');?>

<script language="javascript" src="<?php echo site_url();?>/resources/editor/kindeditor-min.js"></script>
<script language="javascript" src="<?php echo site_url();?>/resources/editor/lang/zh_CN.js"></script>
<script language="javascript" src="<?php echo site_url();?>/resources/js/jquery-ui/jquery.ui.core.min.js"></script>
<script language="javascript" src="<?php echo site_url();?>/resources/js/jquery-ui/jquery.ui.datepicker.min.js"></script>
<script language="javascript" src="<?php echo site_url();?>/resources/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
<script language="javascript" src="<?php echo site_url();?>/resources/js/checkform.js"></script>
<link rel="stylesheet" href="<?php echo site_url();?>/resources/js/jquery-ui/themes/ui-lightness/jquery-ui-1.8.15.custom.css" />

<?php load_view('admin/article_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/article-save')?>" onsubmit="return Validator.Validate(this,2)">
    <input name="url" value="<?php echo $url?>" type="hidden" />
    <input name="art_id" value="<?php echo $row['art_id']?>" type="hidden" />

    <div class="control-group">
        <label class="control-label" for="art_title">文章标题</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="art_title" name="art_title" value="<?php echo $row['art_title']?>" placeholder="" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="art_keyword">SEO关键词</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="art_keyword" name="art_keyword" value="<?php echo $row['art_keyword']?>" placeholder="用英文逗号隔开" />
        </div>
    </div>
    
	<div class="control-group">
        <label class="control-label" for="art_desc">SEO描述信息</label>
        <div class="controls">
        	<textarea name="art_desc" class="input-xxlarge"><?php echo $row['art_desc']?></textarea>
        </div>
    </div>

	<div class="control-group">
        <label class="control-label" for="art_cate_id">文章分类</label>
        <div class="controls">
        	<select class="input-large" name="art_cate_id" dataType="Require" msg="请选择文章分类"><option value="">请选择分类</option><?php echo $cate;?></select> <a href="<?php echo site_url("admin/article-cate")?>">管理分类</a>
        </div>
    </div>
    
	<div class="control-group">
        <label class="control-label" for="art_intro">文章简介</label>
        <div class="controls">
        	<textarea name="art_intro" class="input-xxlarge"><?php echo $row['art_intro']?></textarea>
        </div>
    </div>
    
	<div class="control-group">
        <label class="control-label" for="art_content">文章内容</label>
        <div class="controls">
            <textarea name="art_content" id="art_content" style="width:700px;height:400px;visibility:hidden;"><?php echo $row['art_content']?></textarea>
        </div>
    </div>
	
    <div class="control-group">
        <label class="control-label" for="art_publishdate">发布时间</label>
        <div class="controls">
            <input class="input-medium" type="text" readonly="readonly" id="art_publishdate" name="art_publishdate" value="<?php echo $row['art_publishdate']?>" placeholder="格式：YYYY-MM-DD" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="art_views">浏览量</label>
        <div class="controls">
            <input class="input-small" type="text" id="art_views" name="art_views" value="<?php echo $row['art_views']?>" placeholder="文章访问数量" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="art_top">置顶</label>
        <div class="controls">
            <input class="input-small" type="text" id="art_top" name="art_top" value="<?php echo $row['art_top']?>" placeholder="数字越大，文章排序越靠前" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="art_status">状态</label>
        <div class="controls">
        	<select class="input-medium" id="art_status" name="art_status">
            <?php echo $status?>
            </select>
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn" onclick="javascript:location.href='<?php echo $cancel?>'">取消</button>
    </div>
</form>
</div>
<script language="javascript">

var editor;
editor = KindEditor.create('textarea[name="art_content"]', {
	allowFileManager : true,
	uploadJson:'<?php echo site_url("upload-process");?>',
	fileManagerJson:'<?php echo site_url("upload-show");?>'
});

jQuery("#art_publishdate").datepicker();
</script>