<?php !defined('DEX') && die('Access denied');?>

<div class="well" id="left-nav">
    <ul class="nav nav-list">
        <li class="nav-header">单页管理</li>

        <li id="li-singlepage-index"><a href="<?php echo site_url('admin/singlepage')?>"><i class="icon-home"></i> 单页列表</a></li>
        <li id="li-singlepage-add"><a href="<?php echo site_url('admin/singlepage-add')?>"><i class="icon-star"></i> 添加单页</a></li>
        <li><a onclick="art.dialog.confirm('确认更新所有单页吗？', function(){location.href='<?php echo site_url('admin/singlepage-htmlpage')?>'});" href="javascript:;"><i class="icon-refresh"></i> 更新单页</a></li>
    </ul>
</div>

<script type="text/javascript">
    $("#li-<?php echo strtolower($controller)?>-<?php echo $action?>").addClass('active');
</script>