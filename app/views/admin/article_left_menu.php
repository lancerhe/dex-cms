<?php !defined('DEX') && die('Access denied');?>

<div class="well" id="left-nav">
    <ul class="nav nav-list">
        <li class="nav-header">文章管理</li>

        <li id="li-article-index"><a href="<?php echo site_url('admin/article')?>"><i class="icon-list"></i> 文章列表</a></li>
        <li id="li-article-add"><a href="<?php echo site_url('admin/article-add')?>"><i class="icon-plus"></i> 添加文章</a></li>
        <li><a onclick="art.dialog.confirm('确认更新所有页面吗？', function(){location.href='<?php echo site_url('admin/article-htmlpage')?>'});" href="javascript:;"><i class="icon-refresh"></i> 更新页面</a></li>
     
        <li class="nav-header">栏目管理</li>
        <li id="li-article-cate"><a href="<?php echo site_url('admin/article-cate')?>"><i class="icon-list"></i> 栏目列表</a></li>
        <li><a onclick="art.dialog.confirm('确认更新栏目吗？', function(){location.href='<?php echo site_url('admin/article-htmlcate')?>'});" href="javascript:;"><i class="icon-refresh"></i> 更新栏目</a></li>
    </ul>
</div>

<script type="text/javascript">
    $("#li-<?php echo strtolower($controller)?>-<?php echo $action?>").addClass('active');
</script>