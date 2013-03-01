<?php !defined('DEX') && die('Access denied');?>

<script type="text/javascript">

function del(){
	if ( ! hasCheckOne() ) return false;
    
    art.dialog.confirm('确认删除选中广告吗？', function () {
        document.list.action = "<?php echo site_url('admin/link-del')?>";
        document.list.submit();
    }, function () {
        return true;
    });
    
}

function audit(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/link-audit')?>";
    document.list.submit();
}

function unAudit(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/link-unaudit')?>";
    document.list.submit();
}
</script>

<?php load_view('admin/link_left_menu'); ?>

<div class="well" id="main-container">
<form name="list" method="post" action="">
<input name="url" value="<?php echo $url?>" type="hidden" />
<table class="table table-hover table-condensed">
    <tr>
    	<th width="6%">选择</th>
        <th width="15%">类型</th>
        <th width="15%">名称</th>
    	<th width="36%">转向地址</th>
    	<th width="10%">打开方式</th>
        <th width="10%">开放状态</th>
    	<th width="10%">操作</th>
    </tr>
    <?php foreach ($rows AS $row) :?>
    <tr>
    	<td><input name="id[]" type="checkbox" id="link_id_<?php echo $row['link_id']?>" value="<?php echo $row['link_id']?>" /></td>
    	<td><?php echo $row['link_type'] == 'I' ? '<i class="icon-picture"></i> 图片': '<i class="icon-text-width"></i> 文本';?></td>
        <td><?php echo $row['link_text']?></td>
        <td><a href="<?php echo $row['link_href']?>"><?php echo $row['link_href']?></a></td>
    	<td><?php echo $row['link_target'];?></td>
        <td><?php echo $row['link_status'] ? '<span class="label label-success">已开放</span>' : '<span class="label label">已关闭</span>';?></td>
        <td><a class="btn btn-small" href="<?php echo site_url('admin/link-edit&id='.$row['link_id'])?>"><i class="icon-edit"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>
<div class="pt10">
    <a href="javascript:checkAll()" class="btn btn-small"><i class="icon-ok-circle"></i> 全选</a>
    <a href="javascript:unCheckAll()" class="btn btn-small"><i class="icon-ban-circle"></i> 取消</a>
    <a href="javascript:audit()" class="btn btn-small"><i class="icon-eye-open"></i> 审核通过</a>
    <a href="javascript:unAudit()" class="btn btn-small"><i class="icon-eye-close"></i> 取消审核</a>
    <a href="javascript:del()" class="btn btn-small"><i class="icon-trash"></i> 删除</a>
</div>   
</form>
</div>