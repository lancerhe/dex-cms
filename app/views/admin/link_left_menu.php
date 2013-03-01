<?php !defined('DEX') && die('Access denied');?>

<div class="well" id="left-nav">
    <ul class="nav nav-list">
        <li class="nav-header">链接管理</li>

        <li id="li-link-index"><a href="<?php echo site_url('admin/link')?>"><i class="icon-home"></i> 链接列表</a></li>
        <li id="li-link-add"><a href="<?php echo site_url('admin/link-add')?>"><i class="icon-star"></i> 添加链接</a></li>
    </ul>
</div>

<script type="text/javascript">
    $("#li-<?php echo strtolower($controller)?>-<?php echo $action?>").addClass('active');
</script>