<form name="list" method="post" action="<?php echo site_url('admin/manage-'.$action)?>">
    <input name="url" value="<?php echo $url?>" type="hidden" />
    <input name="manage_id" value="<?php echo $row['manage_id']?>" type="hidden" />
<table align="center" class="tblayout w98p mt10">
    <tr bgcolor="#EAEAEA">
    	<td height="24" colspan="3" class="pl10">管理员信息</td>
    </tr>
    <tr bgcolor="#FFFFFF" align="left">
    	<td width="15%" align="right" class="pr10">用户名:</td>
        <td width="45%" class="pl10"><input type="text" name="manage_user" value="<?php echo $row['manage_name']?>" class="w300" /></td>
    	<td width="40%" class="pl10"></td>
    </tr>
    <tr bgcolor="#FFFFFF" align="left">
    	<td align="right" class="pr10">密码:</td>
        <td class="pl10"><input type="password" name="manage_pass" value="" class="w300" /></td>
    	<td class="pl10"></td>
    </tr>
    <tr bgcolor="#FFFFFF" align="left">
    	<td align="right" class="pr10">确认密码:</td>
        <td class="pl10"><input type="password" name="manage_pass2" value="" class="w300" /></td>
    	<td class="pl10"></td>
    </tr>
    <tr bgcolor="#FFFFFF" align="left">
    	<td align="right" class="pr10"></td>
        <td class="pl10"><input type="submit" value="保 存"  class="btn"/></td>
    	<td class="pl10"></td>
    </tr>
</table>
</form>