<?php !defined('DEX') && die('Access denied');?>

<script type="text/javascript" src="<?php echo site_url()?>/resources/js/jquery.ajaxfileupload.js"></script>
<script type="text/javascript">

function ajaxImageUpload(id){
	if ( document.getElementById(id).value == '')
		return;
	
	$("#link_image").hide();
	$("#loading").ajaxStart(function(){
		$(this).show();
	}).ajaxComplete(function(){
		$(this).hide();
	});

	$.ajaxFileUpload({
		url:'<?php echo site_url('admin/link-upload');?>',
		secureuri:false,
		fileElementId:id,
		dataType: 'json',
		success: function (data, status){
			$("#link_image").attr('src', data.url).show();
			$("#link_url").val(data.url);
		},
		error: function (data, status, e){
			alert(data);
		}
	});
	return false;
}
</script>

<?php load_view('admin/link_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/link-save')?>">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    <input name="link_id" value="<?php echo $row['link_id']?>" type="hidden" />
    <legend>链接信息</legend>
    
	<div class="control-group">
        <label class="control-label" for="link_text">链接名称</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="link_text" name="link_text" value="<?php echo $row['link_text']?>" placeholder="名称" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="link_type">类型</label>
        <div class="controls">
        	<select class="input-medium" id="link_type" name="link_type">
            <?php echo $link_type?>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="link_type">链接图片</label>
        <div class="controls">
        	<input type="file" id="link_file" class="input-xlarge" name="link_file" onchange="return ajaxImageUpload('link_file');" /><br />
            <img id="lolinking" src="/resources/images/admin/loading.gif" style="display:none" />
            <?php if ($row['link_url']) :?>
            <img src="<?php echo $row['link_url']?>" id="link_image" style="border:1px solid #CCC; plinkding:1px;" />
            <?php else :?>
            <img src="" id="link_image" style="border:1px solid #CCC; plinkding:1px; display:none;" />
            <?php endif;?>
            <input type="hidden" id="link_url" name="link_url" value="<?php echo $row['link_url']?>" />
        </div>
    </div>

	<div class="control-group">
        <label class="control-label" for="link_href">转向地址</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="link_href" name="link_href" value="<?php echo $row['link_href']?>" placeholder="http://www.example.com" />
        </div>
    </div>
    
	<div class="control-group">
        <label class="control-label" for="link_target">转向方式</label>
        <div class="controls">
        	<select class="input-medium" id="link_target" name="link_target">
            <?php echo $link_target?>
            </select>
        </div>
    </div>

	<div class="control-group">
        <label class="control-label" for="link_order">排序</label>
        <div class="controls">
            <input class="input-small" type="text" id="link_order" name="link_order" value="<?php echo $row['link_order']?>" placeholder="0" />
        </div>
    </div>
	
    <div class="control-group">
        <label class="control-label" for="link_status">状态</label>
        <div class="controls">
        	<select class="input-medium" id="link_status" name="link_status">
            <?php echo $link_status?>
            </select>
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>