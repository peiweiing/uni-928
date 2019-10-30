<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="/index.php/Admin/User/update/navTabId/listuser/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<input type="hidden" name="id" value="<?php echo ($find["id"]); ?>"/>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>账号：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="username" value="<?php echo ($vo["username"]); ?>"/></dd>
			</dl>
			
			<dl>
				<dt>姓名：</dt>
				<dd><input type="text"  style="width:100%" name="name" value="<?php echo ($vo["name"]); ?>"/></dd>
			</dl>
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>