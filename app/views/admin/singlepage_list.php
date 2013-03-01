<?php !defined('DEX') && die('Access denied');?>

<script language="javascript">
function preview (id) {
	window.open ('<?php echo site_url('single&id=')?>' + id,'newwindow','width=980,top=0,left=0,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no, status=no') 
}

function update(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/singlepage-update')?>";
    document.list.submit();
}

function del(){
	if ( ! hasCheckOne() ) return false;
    
    art.dialog.confirm('确认删除选中项目信息吗？', function () {
        document.list.action = "<?php echo site_url('admin/singlepage-del')?>";
        document.list.submit();
    }, function () {
        return true;
    });
    
}

</script>

<?php load_view('admin/singlepage_left_menu'); ?>

<div class="well" id="main-container">
<form name="list" method="post" action="">
<input name="url" value="<?php echo $url?>" type="hidden" />
<table class="table table-hover table-condensed">
    <tr>
    	<th width="6%">选择</th>
    	<th width="30">页面标题</th>
    	<th width="44%">静态页面</th>
    	<th width="20%">操作</th>
    </tr>
    <?php foreach ($rows AS $row) :?>
    <tr>
    	<td><input name="id[]" type="checkbox" id="id_<?php echo $row['page_id']?>" value="<?php echo $row['page_id']?>" /></td>
    	<td><?php echo $row['page_title']?></td>
    	<td><?php echo $row['page_html']?> <a target="_blank" href="<?php echo $row['page_url']?>"><?php echo $row['page_url']?></a></td>
    	<td><a class="btn btn-small" href="<?php echo site_url('admin/singlepage-edit&id='.$row['page_id'])?>"><i class="icon-edit"></i></a>
        <a class="btn btn-small" href="javascript:preview(<?php echo $row['page_id'];?>)"><i class="icon-search"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>
<div class="pull-left">
    <a href="javascript:checkAll()" class="btn btn-small"><i class="icon-ok-circle"></i> 全选</a>
    <a href="javascript:unCheckAll()" class="btn btn-small"><i class="icon-ban-circle"></i> 取消</a>
    <a href="javascript:update()" class="btn btn-small"><i class="icon-refresh"></i> 更新</a>
    <a href="javascript:del()" class="btn btn-small"><i class="icon-trash"></i> 删除</a>
</div>
<div class="pull-right">
    <?php echo $page?>
</div> 
<div class="clearfix clear"></div>
</form>
</div>