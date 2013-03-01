<?php !defined('DEX') && die('Access denied');?>

<script type="text/javascript" src="<?php echo site_url()?>/resources/js/jquery.ajaxfileupload.js"></script>
<script type="text/javascript">

function checkSize() {
	if ( $("#ad_width").val() == '' || $("#ad_width").val() == 0 ) {
		$("#ad_width").val($("#ad_image").width());
	}
	
	if ( $("#ad_height").val() == '' || $("#ad_height").val() == 0 ) {
		$("#ad_height").val($("#ad_image").width());
	}
}

function resetImage() {
	$("#ad_image").removeAttr('height').removeAttr('width');
	$("#ad_width").val($("#ad_image").width());
	$("#ad_height").val($("#ad_image").height());
}

function setWidth(obj) {
	if ( $("#ad_image").attr('src') == '') {
		art.dialog.alert('请先上传广告图片。');
		return false;
	}
	w = parseInt(obj.value);
	if (w > 1000) w = 1000;
	obj.value = w;
	$("#ad_image").attr('width', w);
}

function setHeight(obj) {
	if ( $("#ad_image").attr('src') == '') {
		art.dialog.alert('请先上传广告图片。');
		return false;
	}
	h = parseInt(obj.value);
	if (h > 500) h = 500;
	obj.value = h;
	$("#ad_image").attr('height', h);
}

function ajaxImageUpload(id){
	if ( document.getElementById(id).value == '')
		return;
	
	$("#ad_image").hide();
	$("#loading").ajaxStart(function(){
		$(this).show();
	}).ajaxComplete(function(){
		$(this).hide();
	});

	$.ajaxFileUpload({
		url:'<?php echo site_url('admin/ad-upload');?>',
		secureuri:false,
		fileElementId:id,
		dataType: 'json',
		success: function (data, status){
			$("#ad_image").attr('src', data.url)
            .attr('o-width', data.width)
            .attr('o-height', data.height).show();

			$("#ad_url").val(data.url);
			$("#ad_width").val('');
			$("#ad_height").val('');
            setImageTip();
		},
		error: function (data, status, e){
			alert(data);
		}
	});
	return false;
}

function setImageTip() {
    $("#ad_image_tip").html('原始尺寸：' + $("#ad_image").attr('o-width') + '*' +  $("#ad_image").attr('o-height') );
}
$(document).ready(function() {
    if ( $("#ad_image").attr('o-width') )
        setImageTip()  
});
</script>

<?php load_view('admin/ad_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/ad-save')?>" onsubmit="checkSize()">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    <input name="ad_id" value="<?php echo $row['ad_id']?>" type="hidden" />
    <legend>详细信息</legend>

	<div class="control-group">
        <label class="control-label" for="ad_name">广告名</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="ad_name" name="ad_name" value="<?php echo $row['ad_name']?>" placeholder="名称" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ad_apply">应用区域</label>
        <div class="controls">
        	<select class="input-medium" id="ad_apply" name="ad_apply">
                <?php echo $ad_apply?>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ad_type">类型</label>
        <div class="controls">
        	<select class="input-medium" id="ad_type" name="ad_type">
                <?php echo $ad_type?>
            </select>
        </div>
    </div>
	
    <div class="control-group">
        <label class="control-label" for="ad_desc">描述</label>
        <div class="controls">
            <textarea class="input-xxlarge" id="ad_desc" name="ad_desc" rows="3" placeholder="网站描述"><?php echo $row['ad_desc']?></textarea>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ad_file">广告图片</label>
        <div class="controls">
            <input type="file" id="ad_file" size="45" name="ad_file" onchange="return ajaxImageUpload('ad_file');" /><br />
            <img id="loading" src="/resources/images/admin/loading.gif" style="display:none" />
            <?php if ($row['ad_url']) :?>
            <img src="<?php echo $row['ad_url']?>" id="ad_image" class="img-polaroid"  o-width="<?php echo $row['ad_width']?>" o-height="<?php echo $row['ad_height']?>" />
            <?php else :?>
            <img src="" id="ad_image" class="img-polaroid" style="display:none;" />
            <?php endif;?>
            <input type="hidden" id="ad_url" name="ad_url" value="<?php echo $row['ad_url']?>" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ad_width">尺寸(宽度*高度)</label>
        <div class="controls">
            <input class="input-mini" type="text" id="ad_width" name="ad_width" value="<?php echo $row['ad_width']?>" placeholder="300" onblur="setWidth(this)"/>
            
            <input class="input-mini" type="text" name="ad_height" id="ad_height" value="<?php echo $row['ad_height']?>" placeholder="300" onblur="setHeight(this)" />
            
            <a href="javascript:;" class="icon-refresh" alt="重置图片尺寸" title="重置图片尺寸" onclick="resetImage();"></a>

            <span class="help-inline" id="ad_image_tip"></span>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ad_href">转向地址</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="ad_href" name="ad_href" value="<?php echo $row['ad_href']?>" placeholder="http://www.example.com" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ad_target">转向方式</label>
        <div class="controls">
        	<select class="input-medium" id="ad_target" name="ad_target">
            <?php echo $ad_target?>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ad_status">状态</label>
        <div class="controls">
        	<select class="input-medium" id="ad_status" name="ad_status">
            <?php echo $ad_status?>
            </select>
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>