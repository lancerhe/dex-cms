<?php !defined('DEX') && die('Access denied');?>

<script language="javascript">
function showDialog() {
	return art.dialog({
		title  : '',
        width  : 400,
		content: document.getElementById('dialog-content'),
		fixed: true,
		id   : 'edit-dialog',
		okVal: '确定',
		lock : true,
		ok   : function() {
			document.cate.submit();
		},
		cancel: true              
	});
}

function previewCate(abbr) {
    window.open ('<?php echo site_url('article-cate&abbr=')?>' + abbr,'newwindow','width=980,top=0,left=0,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no, status=no') 
}

function moveCate(id) {
    $("#cate-info").html( '当前分类: ' + $("#cate-wrap-"+id).find('.cate-name').html() );
	$("#dialog-content").find("input[name='action']").val('move');
    $("#dialog-content").find("input[name='cate_id']").val(id);
    $("#dialog-content").find("#eidt-wrap").hide();
    $("#dialog-content").find("#cate_select").show();
	var dialog = showDialog();
	dialog.title('移动分类');
}
function addCate(id) {
	$("#cate-info").html( '父级分类: ' + $("#cate-wrap-"+id).find('.cate-name').html() );
	$("#dialog-content").find("input[name='action']").val('add');
    $("#dialog-content").find("input[name='cate_fid']").val(id);
    $("#dialog-content").find("#eidt-wrap").show();
    $("#dialog-content").find("#cate_select").hide();
	var dialog = showDialog();
	dialog.title('添加分类');
}

function editCate(id) {
	$("#cate-info").html( '当前修改分类: ' + $("#cate-wrap-"+id).find('.cate-name').html() );
	$("#dialog-content").find("input[name='action']").val('edit');
	$("#dialog-content").find("input[name='cate_id']").val(id);
	$("#dialog-content").find("input[name='cate_fid']").val('');
    $("#dialog-content").find("#eidt-wrap").show();
    $("#dialog-content").find("#cate_select").hide();
	var dialog = showDialog();
	dialog.title('编辑分类');
}

function delCate(id) {
	$("#dialog-content").find("input[name='action']").val('del');
	$("#dialog-content").find("input[name='cate_id']").val(id);
	$("#dialog-content").find("input[name='cate_fid']").val('');
	art.dialog.confirm('确认要删除该分类 ['+$("#cate-wrap-"+id).find('.cate-name').html()+'] 吗？<br />删除该分类后，该分类下的文章也将会被删除。', function() {
		document.cate.submit();
	}, function() {
		return true;
	})
}
</script>
<style type="text/css">
#dialog-content {display:none; text-align:left; width:350px;}
.well .cate-wrap { cursor:default;height:40px;line-height:40px; padding: 0px; margin: 0px; padding-right: 20px;}
.well .cate-operate {}
</style>
<div id="dialog-content">
	<p id="cate-info"></p>
    <form method="post" name="cate" action="<?php echo site_url('admin/article-catesave')?>">
    <p><input type="hidden" name="action" value="" />
    	<input type="hidden" name="cate_fid" value="" />
        <select id="cate_select" name="cate_select" class="w200"><option value="">请选择移动分类</option><?php echo $cate;?></select>
        <div id="eidt-wrap">
    	分类名称: <input type="text" name="cate_name" /><br />
        分类别名: <input type="text" name="cate_abbr" />
        </div>
    </p>
    </form>
</div>

<?php load_view('admin/article_left_menu'); ?>

<div class="well" id="main-container">
    <div id="cate-wrap-0" class="cate-wrap" style="font-size:14px; ">
        <div class="cate-name pull-left">文档根目录</div>
        <div class="cate-operate pull-right">&nbsp;<a href="javascript:;" onClick="addCate(0)" class="btn btn-small btn-primary"><i class="icon-white icon-plus"></i> 添加</a></div>
    </div>
	<?php echo $list;?>
</div>
<script language="javascript">
$(".cate-wrap").hover(function(){
	$(this).addClass('alert alert-success');
}, function(){
	$(this).removeClass('alert alert-success');
})
</script>
