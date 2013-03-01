<?php !defined('DEX') && die('Access denied');?>

<div class="well" id="left-nav">
    <ul class="nav nav-list">
        <li class="nav-header">广告管理</li>

        <li id="li-ad-index"><a href="<?php echo site_url('admin/ad')?>"><i class="icon-home"></i> 广告列表</a></li>
        <li id="li-ad-add"><a href="<?php echo site_url('admin/ad-add')?>"><i class="icon-star"></i> 添加广告</a></li>
    </ul>
</div>

<script type="text/javascript">
    $("#li-<?php echo strtolower($controller)?>-<?php echo $action?>").addClass('active');
</script>