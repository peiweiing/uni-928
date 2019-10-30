<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="/yyw/index.php/Admin/Notice/insert/navTabId/listnotice/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,navTabAjaxDone);"><?php  ?>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>公告标题：</dt>
				<dd><input type="text" style="width:100%" name="title" class="required"/></dd>
			</dl>
			
			<dl style="width:100%;">
				<dt>公告类型：</dt>
				<dd>
					<select name="type" class="required">
						<option value="">=请选择=</option>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['typeid']); ?>"><?php echo ($vo['typename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</dd>
			</dl>
			
			     
			<dl>
				<dt>公告内容：</dt>
				<dd>
					<textarea name="content" class="editor" cols="77" rows="15" minlength="300">
					
					</textarea>
				</dd>
			</dl>

		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">发布</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>