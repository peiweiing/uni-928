<?php if (!defined('THINK_PATH')) exit();?><div class="PageContent">
	<div class="accountInfo">
		<p>新文章</p>
	</div>
</div>

<div id="pageContent"  layouth="100" style="overflow:auto;">
	<form method="post" action="/yyw/index.php/Admin/Article/insert/navTabId/wzlist/"  class="pageForm required-validate" onsubmit="return validateCallback(this,dialogAjaxDone);">
	<table class="form_table">
		<tbody>
		<input type="hidden" name="id" value="{id}">
		<tr>
			<th>标题：</th>
			<td><input type="text" value="" name="title" class="span2 required"></td>
		</tr>
		<tr><th></th><td class="gray">文章标题</td></tr>
		
		<tr>
			<th>分类：</th>
			<td>
				<select name="article_type" id="">
					<option value="1">常见问题</option>
                    <option value="2">交友须知</option>
                    <option value="3">关于婚恋</option>
                    <option value="4">合作联系</option>
                    <option value="5">帮助中心</option>
				</select>
			</td>
		</tr>
			
		<tr>
			<th>内容：</th>
			<td>
				<textarea class="span5 editor" rows="13" name="content"></textarea>
			</td>				
		</tr>

		

		<tr><th></th><td><input type="submit" value="发布文章"/></td>
		</tr>
	</tbody>
	</table>
	</form>
</div>