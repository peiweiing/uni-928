<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="/yyw/index.php/Admin/User/insert/navTabId/listuser/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>用户名：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="username"/></dd>
			</dl>
			
			<dl>
				<dt>邮箱：</dt>
				<dd><input type="text" class="required email"  style="width:100%" name="email"/></dd>
			</dl>
			
			     
			<dl>
				<dt>密码：</dt>
				<dd><input type="password" class="required alphanumeric" minlength="6" maxlength="20"   style="width:100%" name="password"/></dd>
			</dl>

		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">添加</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>