<?php !defined('DEX') && die('Access denied');?>

<?php load_view('admin/system_left_menu'); ?>

<div class="well" id="main-container">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/system-save')?>">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    
	<legend>附件设置</legend>
    <div class="control-group">
        <label class="control-label" for="default_thumb_width">默认缩略图宽度</label>
        <div class="controls">
            <input type="text" id="default_thumb_width" name="default_thumb_width" value="<?php echo $default_thumb_width?>" placeholder="100" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="default_thumb_height">默认缩略图高度</label>
        <div class="controls">
            <input type="text" id="default_thumb_height" name="default_thumb_height" value="<?php echo $default_thumb_height?>" placeholder="100" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="upload_image_type">允许上传图片类型</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="upload_image_type" name="upload_image_type" value="<?php echo $upload_image_type?>" placeholder="用'|'作为分隔符如: jpg|gif|png" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="upload_media_type">允许上传媒体类型</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="upload_media_type" name="upload_media_type" value="<?php echo $upload_media_type?>" placeholder="用'|'作为分隔符如: fla|swf" />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="upload_media_type">允许上传文件类型</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="upload_file_type" name="upload_file_type" value="<?php echo $upload_file_type?>" placeholder="用'|'作为分隔符如: zip|gz|rar" />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="upload_watermark">图片水印开启</label>
        <div class="controls">
            <label class="checkbox">
                <input name="upload_watermark" type="checkbox" value="1" <?php echo $upload_watermark ? 'checked' : ''?>>
               
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="upload_watermark_file">图片水印文件</label>
        <div class="controls">
            <input class="input-xxlarge" type="text" id="upload_watermark_file" name="upload_watermark_file" value="<?php echo $upload_watermark_file?>" placeholder="如: images/watermark.png" />
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>