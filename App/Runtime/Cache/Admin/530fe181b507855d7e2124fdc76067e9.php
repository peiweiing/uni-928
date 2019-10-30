<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="/yyw/index.php/Admin/Advertising/insert/navTabId/listadvertising"  class="pageForm required-validate" 
		onsubmit="return iframeCallback(this, navTabAjaxDone);"><?php  ?>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>标题：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="title"/></dd>
			</dl>
			
			<dl>
				<dt>图片：</dt>
				<dd><input type="file" name="uploadfiles" />
			</dl>
			<dl>
				<dt>链接地址：</dt>
				<dd><input type="text" style="width:100%" name="link"/></dd>
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