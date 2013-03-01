<?php !defined('DEX') && die('Access denied');?>

<div class="well" id="left-nav">
    <ul class="nav nav-list">
        <li class="nav-header">系统设置</li>

        <li id="li-system-index"><a href="<?php echo site_url('admin/system')?>"><i class="icon-home"></i> 站点设置</a></li>
        <li id="li-system-core"><a href="<?php echo site_url('admin/system-core')?>"><i class="icon-star"></i> 核心设置</a></li>
        <li id="li-system-article"><a href="<?php echo site_url('admin/system-article')?>"><i class="icon-book"></i> 页面设置</a></li>
        <li id="li-system-attach"><a href="<?php echo site_url('admin/system-attach')?>"><i class="icon-file"></i> 附件设置</a></li>
    </ul>
</div>

<script type="text/javascript">
    $("#li-<?php echo strtolower($controller)?>-<?php echo $action?>").addClass('active');
</script>