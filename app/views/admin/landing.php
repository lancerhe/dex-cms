<div class="well well-small">
  <i class="icon-home"></i> 欢迎使用内容管理系统。 
</div>

<div class="well well-small">
  <i class="icon-tasks"></i> 欢迎您，<?php echo $manage_name?>，您的权限为超级管理员。 
</div>

<div class="pull-left" style="width:49%">
    <table class="table table-bordered">
        <tr>
            <th colspan="3">快捷操作</th>
        </tr>
        <tr>
            <td><i class="icon-book"></i> <a href="<?php echo site_url('admin/article')?>">文档列表</a></td>
            <td><i class="icon-tags"></i> <a href="">评论管理</a></td>
            <td><i class="icon-tag"></i> <a href="<?php echo site_url('admin/article-add')?>">内容发布</a></td>
        </tr>
        <tr>
            <td><i class="icon-list-alt"></i> <a href="<?php echo site_url('admin/article-cate')?>">栏目管理</a></td>
            <td><i class="icon-camera"></i> <a href="<?php echo site_url('admin/landing-htmlindex')?>">生成主页</a></td>
            <td><i class="icon-edit"></i> <a href="<?php echo site_url('admin/system')?>">修改系统参数</a></td>
        </tr>
    </table>
        
    <table class="table table-bordered">
        <tr>
            <th colspan="2">系统信息</th>
        </tr>
        <tr>
            <td width="40%">服务器时间：</td>
            <td width="60%"><?php echo $server_time?></td>
        </tr>
        <tr>
            <td>服务器解译引擎：</td>
            <td><?php echo $software?></td>
        </tr>
        <tr>
            <td>文件上传：</td>
            <td><?php echo $file_upload?></td>
        </tr>
        <tr>
            <td>全局变量 register_globals：</td>
            <td><?php echo $register_globals?></td>
        </tr>
        <tr>
            <td>安全模式 safe_mode：</td>
            <td><?php echo $safe_mode?></td>
        </tr>
        <tr>
            <td>图形处理 GD Library：</td>
            <td><?php echo $gd_version?></td>
        </tr>
        <tr>
            <td>内存占用:</td>
            <td><?php echo $memory_info?></td>
        </tr>
    </table>
</div>
    
<div class="pull-right" style="width:49%">
    <table class="table table-bordered">
        <tr>
            <th>数据统计</th>
        </tr>
        <tr>
            <td width="40%">文章数量：</td>
            <td width="60%"><?php echo $art_counts;?> [已发布：<?php echo $art_publish_counts;?>]</td>
        </tr>
        <tr>
            <td>广告数量：</td>
            <td><?php echo $ad_counts;?> [已投放：<?php echo $ad_publish_counts;?>]</td>
        </tr>
        <tr>
            <td>用户数量：</td>
            <td><?php echo $user_counts;?> [已验证通过：<?php echo $user_confirm_counts;?>]</td>
        </tr>
        <tr>
            <td>缓存大小：</td>
            <td><?php echo $cache_size?> <a href="javascript:;">清空缓存</a></td>
        </tr>
        <tr>
            <td>附件大小：</td>
            <td><?php echo $attach_size?></td>
        </tr>
    </table>
    
    <table class="table table-bordered">
        <tr>
            <th>程序信息</th>
        </tr>
        <tr>
            <td width="40%">系统模板设计：</td>
            <td width="60%"><a href="mailto:lancer.he@gmail.com">Lancer</a></td>
        </tr>
        <tr>
            <td>程序开发：</td>
            <td><a href="mailto:lancer.he@gmail.com">Lancer</a></td>
        </tr>
        <tr>
            <td>程序版本信息：</td>
            <td>Dex CMS 1.0 UTF-8</td>
        </tr>
    </table>
</div>