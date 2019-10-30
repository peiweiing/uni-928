<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/index.php/Admin/User/update/navTabId/listuser/callbackType/closeCurrent" enctype="multipart/form-data"  class="pageForm required-validate" 
		onsubmit="return iframeCallback(this, dialogAjaxDone);"><?php  ?>
		<input type="hidden" name="id" value="<?php echo ($find['id']); ?>"/>
		<div class="pageFormContent" layoutH="60">
			<dl style="height:50px;">
				<dt>头像：</dt>
				<dd><img src="/Public/Uploads/pic/<?php echo ($find['avatar']); ?>" width="50" height="50" /></dd>
			</dl>
			<dl>
				<dt>修改形象照：</dt>
				<dd>
					<input type="file" name="pic" />
				</dd>
			</dl>			
			<dl>
				<dt>E-Mail：</dt>
				<dd><input type="text"  style="width:100%" name="email" value="<?php echo ($find["email"]); ?>"/></dd>
			</dl>
			<dl>
				<dt>用户状态：</dt>
				<dd>
					<select name="status">
						<option value="1"<?php if($find['status'] == 1): ?>selected<?php endif; ?>>启用</option>
						<option value="2"<?php if($find['status'] == 2): ?>selected<?php endif; ?>>禁用</option>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>征友状态：</dt>
				<dd>
					<select name="lovestatus">
						<option value="">=请选择=</option>
						<option value="1"<?php if($find['lovestatus'] == 1): ?>selected<?php endif; ?>>征友进行时</option>
						<option value="0"<?php if($find['lovestatus'] == 0): ?>selected<?php endif; ?>>关闭征友</option>
					</select>
				</dd>
			</dl>
			
			<dl>
				<dt>积分：</dt>
				<dd>
					<input type="text" name="points" value="<?php echo ($find['points']); ?>" readonly size="10" />
					<input type="radio" name="active" value="increase"  checked />增加
					<input type="radio" name="active" value="reduce" />减少
					&nbsp;&nbsp;&nbsp;
					<input type="text" style="width:100%;" name="updatePoints" size="6"/>
				</dd>
			</dl>
			
			
			<!--<th width="">ID</th>
				<th width="">昵称/用户名</th>
				<th width="">E-Mail</th>
				<th width="">积分</th>
				<th width="">头像</th>
				<th width="">状态</th>
                <th width="">征友状态</th>
				<th width="">登陆次数</th>
				<th width="">登陆时间</th>
				<th width="">注册时间</th>
				<th width="">操作</th>
				-->
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>