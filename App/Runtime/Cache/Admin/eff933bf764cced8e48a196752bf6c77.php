<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/yyw/index.php/Admin/Diary/update/navTabId/listdiary/callbackType/closeCurrent" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
		<div class="pageFormContent" layoutH="57">
			<dl>
				<dt>分类：</dt>
				<dd>
					<select class="required combox" name="catid" id="w_combox_catid">
						<option value='' disabled>请选择</option>
						<option value='1' <?php if($vo["catid"] == 1): ?>selected<?php endif; ?>>婚恋课堂</option>
						<option value='2' <?php if($vo["catid"] == 2): ?>selected<?php endif; ?>>爱情故事</option>
						<option value='3' <?php if($vo["catid"] == 3): ?>selected<?php endif; ?>>两性私语</option>
						<option value='4' <?php if($vo["catid"] == 4): ?>selected<?php endif; ?>>情感物语</option>
						<option value='5' <?php if($vo["catid"] == 5): ?>selected<?php endif; ?>>生活点滴</option>
						<option value='6' <?php if($vo["catid"] == 6): ?>selected<?php endif; ?>>文学随笔</option>
						<option value='7' <?php if($vo["catid"] == 7): ?>selected<?php endif; ?>>其他日志</option>
					</select>
				</dd>
			</dl>
			
			<dl>
				<dt>阅读权限：</dt>
				<dd>
					<select class="required combox" name="power" id="w_combox_power">
						<option value='1' <?php if($vo["power"] == 1): ?>selected<?php endif; ?> >公开</option>
						<option value='2' <?php if($vo["power"] == 2): ?>selected<?php endif; ?> >仅自己看</option>
					</select>
				</dd>
			</dl>
			
			<dl>
				<dt>天气：</dt>
				<dd>
					<select class="combox" name="weather" id="w_combox_weather">
						<option value=''>请选择</option>
						<option value="1" <?php if($vo["weather"] == 1): ?>selected<?php endif; ?> >晴天</option>
						<option value="2" <?php if($vo["weather"] == 2): ?>selected<?php endif; ?> >阴天</option>
						<option value="3" <?php if($vo["weather"] == 3): ?>selected<?php endif; ?> >多云</option>
						<option value="4" <?php if($vo["weather"] == 4): ?>selected<?php endif; ?> >雨天</option>
						<option value="5" <?php if($vo["weather"] == 5): ?>selected<?php endif; ?> >雷阵雨</option>
						<option value="6" <?php if($vo["weather"] == 6): ?>selected<?php endif; ?> >雪天</option>
					</select>
				</dd>
			</dl>
			
			<dl>
				<dt>心情：</dt>
				<dd>
					<select class="combox" name="feel" id="w_combox_feel">
						<option value=''>请选择</option>
						<option value="1" <?php if($vo["feel"] == 1): ?>selected<?php endif; ?> >开心</option>
						<option value="2" <?php if($vo["feel"] == 2): ?>selected<?php endif; ?> >吃惊</option>
						<option value="3" <?php if($vo["feel"] == 3): ?>selected<?php endif; ?> >抓狂</option>
						<option value="4" <?php if($vo["feel"] == 4): ?>selected<?php endif; ?> >伤心</option>
						<option value="5" <?php if($vo["feel"] == 5): ?>selected<?php endif; ?> >动心</option>
						<option value="6" <?php if($vo["feel"] == 6): ?>selected<?php endif; ?> >愤怒</option>
						<option value="7" <?php if($vo["feel"] == 7): ?>selected<?php endif; ?> >傻笑</option>
						<option value="8" <?php if($vo["feel"] == 8): ?>selected<?php endif; ?> >疑惑</option>
						<option value="9" <?php if($vo["feel"] == 9): ?>selected<?php endif; ?> >感叹</option>
						<option value="10" <?php if($vo["feel"] == 10): ?>selected<?php endif; ?> >郁闷</option>
						<option value="11" <?php if($vo["feel"] == 11): ?>selected<?php endif; ?> >沮丧</option>
						<option value="12" <?php if($vo["feel"] == 12): ?>selected<?php endif; ?> >一般</option>
					</select>
				</dd>
			</dl>
			
			<dl>
				<dt>标题：</dt>
				<dd><input type="text" class="required" style="width:100%" name="title" value="<?php echo ($vo["title"]); ?>"/></dd>
			</dl>
			
			<dl class="nowrap">
				<dt>内容：</dt>
				<dd><textarea class="editor" name="description" rows="12" cols="100" tools="simple"><?php echo ($vo["content"]); ?></textarea></dd>
			</dl>
			<dl>
				<dt>标题：</dt>
				<dd><input type="radio" name="status" value='1' <?php if($vo["status"] == 1): ?>checked<?php endif; ?> />未审核
					<input type="radio" name="status" value='2' <?php if($vo["status"] == 2): ?>checked<?php endif; ?> />已审核
				</dd>
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