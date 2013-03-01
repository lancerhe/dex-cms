<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="javascript:;">用户管理</a>
        <ul class="nav">
            <li><a href="<?php echo site_url('admin/user')?>">所有用户</a></li>
            <li class="active"><a href="<?php echo site_url('admin/user-add')?>">添加用户</a></li>
        </ul>
    </div>
</div>

<div class="well">
<form class="form-horizontal" name="list" method="post" action="<?php echo site_url('admin/user-'.$action)?>">
	<input name="url" value="<?php echo $url?>" type="hidden" />
    <input name="user_id" value="<?php echo $row['user_id']?>" type="hidden" />
    <legend>用户信息</legend>
    <div class="control-group">
        <label class="control-label" for="user_name">用户名</label>
        <div class="controls">
            <input class="input-xlarge" type="text" id="user_name" name="user_name" value="<?php echo $row['user_name']?>" placeholder="Username" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="user_email">邮件地址</label>
        <div class="controls">
            <input class="input-xlarge" type="text" id="user_email" name="user_email" value="<?php echo $row['user_email']?>" placeholder="example@126.com" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="user_pass">密码</label>
        <div class="controls">
            <input class="input-xlarge" type="password" id="user_pass" name="user_pass" value="" placeholder="Password" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="user_pass2">密码</label>
        <div class="controls">
            <input class="input-xlarge" type="password" id="user_pass2" name="user_pass2" value="" placeholder="Confirm Password" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="user_regdate">注册时间</label>
        <div class="controls">
            <input class="input-xlarge" type="text" id="user_regdate" name="user_regdate" value="<?php echo $row['user_regdate'] ? date('Y-m-d', $row['user_regdate']) : '';?>" placeholder="YYYY-MM-DD" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="user_confirm">确认状态</label>
        <div class="controls">
        	<select class="input-medium" id="user_confirm" name="user_confirm">
            <?php echo $status?>
            </select>
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn">取消</button>
    </div>
</form>
</div>