<script type="text/javascript">

function delUser(){
	if ( ! hasCheckOne() ) return false;
    
    art.dialog.confirm('确认删除选中用户吗？', function () {
        document.list.action = "<?php echo site_url('admin/user-del')?>";
        document.list.submit();
    }, function () {
        return true;
    });
    
}

function auditUser(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/user-audit')?>";
    document.list.submit();
}

function unAuditUser(){
	if ( ! hasCheckOne() ) return false;

    document.list.action = "<?php echo site_url('admin/user-unaudit')?>";
    document.list.submit();
}
</script>

<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="javascript:;">用户管理</a>
        <ul class="nav">
            <li class="active"><a href="<?php echo site_url('admin/user')?>">所有用户</a></li>
            <li><a href="<?php echo site_url('admin/user-add')?>">添加用户</a></li>
        </ul>
    </div>
</div>

<div class="well">
	<form method="get" action="" class="form-inline">
        <input type="hidden" name="M" value="admin/user" />
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
  
<!--  内容列表   -->
<form name="list" method="post" action="">
    <input name="url" value="<?php echo $url?>" type="hidden" />
<table class="table table-striped table-hover">
    <tr>
    	<th width="6%">选择</th>
    	<th width="18%">用户名</th>
        <th width="26%">邮件地址</th>
    	<th width="10%">状态</th>
    	<th width="20%">注册时间</th>
    	<th width="20%">操作</th>
    </tr>
    <?php foreach ($rows AS $row) :?>
    <tr>
    	<td><input name="id[]" type="checkbox" id="user_id_<?php echo $row['user_id']?>" value="<?php echo $row['user_id']?>" /></td>
    	<td><a href="<?php echo site_url('admin/user-view&id='.$row['user_id'])?>"><?php echo $row['user_name']?></a></td>
    	<td><?php echo $row['user_email']?></td>
    	<td><?php echo $row['user_confirm'] ? '<span class="label label-success">通过</span>' : '<span class="label">待审</span>'?></td>
    	<td><?php echo date('Y-m-d H:i', $row['user_regdate']);?></td>
    	<td>
        	<a class="btn btn-small" href="<?php echo site_url('admin/user-edit&id='.$row['user_id'])?>"><i class="icon-edit"></i> 编辑</a>
        	<a class="btn btn-small" href="<?php echo site_url('admin/user-view&id='.$row['user_id'])?>"><i class="icon-search"></i> 查看</a></td>
    </tr>
    <?php endforeach;?>    
</table>
<div class="pull-left pt10">
    <a href="javascript:checkAll()" class="btn btn-small"><i class="icon-ok-circle"></i> 全选</a>
    <a href="javascript:unCheckAll()" class="btn btn-small"><i class="icon-ban-circle"></i> 取消</a>
    <a href="javascript:auditUser()" class="btn btn-small"><i class="icon-eye-open"></i> 审核通过</a>
    <a href="javascript:unAuditUser()" class="btn btn-small"><i class="icon-eye-close"></i> 取消审核</a>
    <a href="javascript:delUser()" class="btn btn-small"><i class="icon-trash"></i> 删除</a>
</div>
<div class="pull-right">
	<?php echo $page?>
</div>
<div class="clearfix clear"></div>
</form>
</div>