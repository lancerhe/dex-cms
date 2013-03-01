<?php !defined('DEX') && die('Access denied');?>

<script>
var cateDialog = art.dialog({
    content: '<p style="width:200px">请选择移动分类:</p><select id="cate" name="cate"><option value="">请选择移动分类</option><?php echo $cate;?></select>',
    fixed: true,
    id   : 'cate-dialog',
    icon : 'question',
    okVal: '确定',
    lock : true,
    ok   : function() {
        var select = document.getElementById("cate");
        if (cate.value == '') {
            cate.focus();
            return false;
        } else {
            document.getElementById("cate_id").value = cate.value;
            document.list.action = "<?php echo site_url('admin/article-move')?>";
            document.list.submit();
        }
    },
    cancel: true              
}).hide();

function do_preview (id) {
	window.open ('<?php echo site_url('article-detail&id=')?>' + id,'newwindow','width=980,top=0,left=0,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no, status=no') 
}

function do_update(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/article-update')?>";
    document.list.submit();
}

function do_move(){
    if ( ! hasCheckOne() ) return false;
	cateDialog.show();
}

function do_top(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/article-top')?>";
    document.list.submit();
}

function do_del(){
	if ( ! hasCheckOne() ) return false;
    
    art.dialog.confirm('确认删除选中项目信息吗？', function () {
        document.list.action = "<?php echo site_url('admin/article-del')?>";
        document.list.submit();
    }, function () {
        return true;
    });
    
}

function do_audit(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/article-audit')?>";
    document.list.submit();
}
</script>

<?php load_view('admin/article_left_menu'); ?>

<div class="well" id="main-container">
	<form method="get" action="" class="form-inline">
        <input type="hidden" name="M" value="admin/article" />
        <select name="filter" class="input-medium">
            <option value="">搜索类型</option>
            <?php echo $filter?>
        </select>

        <input type="text" name="keyword" value="<?php echo $keyword?>" class="input-medium" placeholder="搜索关键词" />
        <select name="order" class="input-medium">
            <option value="">排序...</option>
            <?php echo $order?>
        </select>
        <button type="submit" class="btn">搜索</button>
    </form>

	<form name="list" method="post" action="">
        <input name="url" value="<?php echo $url?>" type="hidden" />
        <input name="cate_id" value="" type="hidden" id="cate_id" />
<table class="table table-condensed table-hover">
	<tr>
    	<th width="4%">选择</th>
        <th width="10%">类目</th>
    	<th width="28%">文章标题</th>
    	<th width="10%">发布时间</th>
    	<th width="8%">浏览数</th>
        <th width="8%">置顶</th>
    	<th width="6%">HTML</th>
    	<th width="6%">状态</th>
    	<th width="8%">发布人</th>
    	<th width="10%">操作</th>
    </tr>
    <?php foreach ($rows AS $row) :?>
    <tr>
    	<td><input name="id[]" type="checkbox" id="id_<?php echo $row['art_id']?>" value="<?php echo $row['art_id']?>" /></td>
    	<td><a href="<?php echo site_url('admin/article&cate='.$row['art_cate_id'])?>"><?php echo $row['art_cate_name']?></a></td>
    	<td><?php echo $row['art_title']?></td>
    	<td><?php echo date('Y-m-d', $row['art_publishdate'])?></td>
    	<td><?php echo $row['art_views']?></td>
    	<td><?php echo $row['art_top']?></td>    
    	<td><?php echo $row['art_url'] ? '<span class="label label-success">已生成</span>' : '<span class="label">未生成</span>'?></td>
    	<td><?php echo $row['art_status'] ? '<span class="label label-success">开放</span>' : '<span class="label">待审</span>'?></td>
    	<td><?php echo $row['user_name'] ? $row['user_name'] : 'admin'?></td>
    	<td><a class="btn btn-small" title="编辑" href="<?php echo site_url('admin/article-edit&id='.$row['art_id'])?>"><i class="icon-edit"></i></a>
        <a class="btn btn-small" title="预览" href="javascript:do_preview(<?php echo $row['art_id'];?>)"><i class="icon-search"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>
<div class="pull-left">
    <a href="javascript:checkAll()" class="btn btn-small"><i class="icon-ok-circle"></i> 全选</a>
    <a href="javascript:unCheckAll()" class="btn btn-small"><i class="icon-ban-circle"></i> 取消</a>
    <a href="javascript:do_update()" class="btn btn-small"><i class="icon-refresh"></i> 更新</a>
    <a href="javascript:do_audit()" class="btn btn-small"><i class="icon-eye-open"></i> 审核</a>
    <a href="javascript:do_top()" class="btn btn-small"><i class="icon-arrow-up"></i> 置顶</a>
    <a href="javascript:do_move()" class="btn btn-small"><i class="icon-move"></i> 移动</a>
    <a href="javascript:do_del()" class="btn btn-small"><i class="icon-trash"></i> 删除</a>
</div>
<div class="pull-right">
    <?php echo $page?>
</div> 
<div class="clearfix clear"></div>
</form>
</div>