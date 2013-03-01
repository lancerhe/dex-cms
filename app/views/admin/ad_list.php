<?php !defined('DEX') && die('Access denied');?>

<script type="text/javascript">

function del(){
	if ( ! hasCheckOne() ) return false;
    
    art.dialog.confirm('确认删除选中广告吗？', function () {
        document.list.action = "<?php echo site_url('admin/ad-del')?>";
        document.list.submit();
    }, function () {
        return true;
    });
    
}

function audit(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/ad-audit')?>";
    document.list.submit();
}

function unAudit(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/ad-unaudit')?>";
    document.list.submit();
}
</script>

<?php load_view('admin/ad_left_menu'); ?>

<div class="well" id="main-container">
	<form method="get" action="" class="form-inline">
        <input type="hidden" name="M" value="admin/ad" />
        <select name="apply" class="input-medium">
            <option value="">选择应用区域</option>
            <?php echo $filter?>
        </select>

        <input type="text" name="keyword" value="<?php echo $keyword?>" class="input-medium" placeholder="搜索关键词" />
        
        <button type="submit" class="btn">搜索</button>
    </form>
    
    <form name="list" method="post" action="">
    <input name="url" value="<?php echo $url?>" type="hidden" />
    <table class="table table-hover table-condensed">
        <tr>
        	<td width="6%">选择</td>
            <td width="30%">名称</td>
        	<td width="16%">应用区域</td>
            <td width="15%">类型</td>
        	<td width="10%">参数</td>
            <td width="10%">开放状态</td>
        	<td width="10%">操作</td>
        </tr>
        <?php foreach ($rows AS $row) :?>
        <tr>
        	<td><input name="id[]" type="checkbox" id="ad_id_<?php echo $row['ad_id']?>" value="<?php echo $row['ad_id']?>" /></td>
        	<td><?php echo $row['ad_name']?></td>
            <td><a href="<?php echo site_url('admin/ad&apply='.$row['ad_apply'])?>"><?php echo $row['ad_apply_string']?></a></td>
        	<td><?php echo $row['ad_type'] == 'I' ? '<i class="icon-picture"></i> 图片': '<i class="icon-film"></i> 幻灯片';?></td>
        	<td><?php echo $row['ad_width'] . ' * ' . $row['ad_height'];?></td>
            <td><?php echo $row['ad_status'] ? '<span class="label label-success">已开放</span>' : '<span class="label label">已关闭</span>';?></td>
        	<td><a class="btn btn-small" href="<?php echo site_url('admin/ad-edit&id='.$row['ad_id'])?>"><i class="icon-edit"></i> 编辑</a></td>
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