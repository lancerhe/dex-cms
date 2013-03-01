<?php !defined('DEX') && die('Access denied');?>

<script language="javascript" src="<?php echo site_url();?>/resources/editor/kindeditor-min.js"></script>
<script language="javascript" src="<?php echo site_url();?>/resources/editor/lang/zh_CN.js"></script>
<script language="javascript" src="<?php echo site_url();?>/resources/js/checkform.js"></script>


<?php load_view('admin/singlepage_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/singlepage-save')?>" onsubmit="return Validator.Validate(this,2)">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    <input name="page_id" value="<?php echo $row['page_id']?>" type="hidden" />
    
    <div class="control-group">
        <label class="control-label" for="page_title">页面标题</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="page_title" name="page_title" value="<?php echo $row['page_title']?>" placeholder="页面标题" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="page_keyword">SEO关键词</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="page_keyword" name="page_keyword" value="<?php echo $row['page_keyword']?>" placeholder="用英文逗号隔开" />
        </div>
    </div>
    
	<div class="control-group">
        <label class="control-label" for="page_desc">SEO描述信息</label>
        <div class="controls">
        	<textarea name="page_desc" class="input-xxlarge"><?php echo $row['page_desc']?></textarea>
        </div>
    </div>
	
    <div class="control-group">
        <label class="control-label" for="page_name">页面名称</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="page_name" name="page_name" value="<?php echo $row['page_name']?>" placeholder="名称" dataType="Require" msg="请输入页面名称"/>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="page_content">页面内容</label>
        <div class="controls">
            <textarea name="page_content" dataType="Require" msg="请输入页面内容" style="width:700px;height:400px;visibility:hidden;"><?php echo $row['page_content']?></textarea>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>

<script language="javascript">

var editor;
editor = KindEditor.create('textarea[name="page_content"]', {
	allowFileManager : true,
	uploadJson:'<?php echo site_url("upload-process");?>',
	fileManagerJson:'<?php echo site_url("upload-show");?>'
});

var $page_name = jQuery("input[name='page_name']");
name = $page_name.val();
$page_name.bind('blur', function() {
	if ( typeof $page_name.data('name') != 'undefined' ) {
		name = $page_name.data('name');
	}
	if ( name == jQuery(this).val() ) {
		return ;
	}
	
	var new_name = jQuery(this).val();
	$page_name.data('name', new_name );
	jQuery.get("<?php echo site_url("admin/singlepage-check&name=")?>" + new_name, function(data) {
		if (data > 0) {
			$page_name.val('');
			jQuery("#page_name_tip").html("<font color='red'>"+new_name+" 已存在</font>");
		} else {
			jQuery("#page_name_tip").html("<font color='green'>"+new_name+" 可用</font>");
		}
	});
});
</script>