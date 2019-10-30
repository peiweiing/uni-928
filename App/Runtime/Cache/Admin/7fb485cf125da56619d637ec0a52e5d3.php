<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/yyw/index.php/Admin/Diary/index" method="post">
	<input type="hidden" name="pageNum" value="<?php echo ((isset($currentPage) && ($currentPage !== ""))?($currentPage):'1'); ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" /><!--每页显示多少条-->
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST['_order']); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST['_sort']); ?>"/>
</form>
<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" /><!--每页显示多少条-->
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td colspan="2">
					<b>搜索</b> &nbsp; 关键字：<input type="text" name="title" value="<?php echo ($_POST['title']); ?>" /> [标题]
						&nbsp;&nbsp;审核：<select name='status'>
											<option value=''>请选择</option>
											<option value='1' <?php if($_POST['status']== 1): ?>selected<?php endif; ?> >未审核</option>
											<option value='2' <?php if($_POST['status']== 2): ?>selected<?php endif; ?> >已审核</option>
										  </select>
						&nbsp;&nbsp;分类：<select name='catid'>
											<option value=''>请选择</option>
											<option value='1' <?php if($_POST['catid']== 1): ?>selected<?php endif; ?> >婚恋课堂</option>
											<option value='2' <?php if($_POST['catid']== 2): ?>selected<?php endif; ?> >爱情故事</option>
											<option value='3' <?php if($_POST['catid']== 3): ?>selected<?php endif; ?> >两性私语</option>
											<option value='4' <?php if($_POST['catid']== 4): ?>selected<?php endif; ?> >情感物语</option>
											<option value='5' <?php if($_POST['catid']== 5): ?>selected<?php endif; ?> >生活点滴</option>
											<option value='6' <?php if($_POST['catid']== 6): ?>selected<?php endif; ?> >文学随笔</option>
											<option value='7' <?php if($_POST['catid']== 7): ?>selected<?php endif; ?> >其他日志</option>
										  </select>
				</td>
				<td>
				发表时间：<input type="text" name="starttime" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true" value="<?php echo ($_POST['starttime']); ?>" />
							&nbsp;~&nbsp;
						   <input type="text" name="endtime" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true" value="<?php echo ($_POST['endtime']); ?>" />
				</td>
				<td>
					<div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="delete" href="/yyw/index.php/Admin/Diary/del/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>/navTabId/listdiary" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="/yyw/index.php/Admin/Diary/edit/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>"  width="550" height="380" target="navTab"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="40">日记id</th>
				<th width="80">会员名</th>
				<th width="60">分类</th>
				<th width="200">标题</th>
				<th width="80">状态</th>
				<th width="50" orderField="views" <?php if($_REQUEST['_order']== 'views'): ?>class="<?php echo ($_REQUEST['_sort']); ?>"<?php endif; ?>>浏览</th>
				<th width="50">评论</th>
				<th width="80" orderField="addtime" <?php if($_REQUEST['_order']== 'addtime'): ?>class="<?php echo ($_REQUEST['_sort']); ?>"<?php endif; ?>>发表时间</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$diary): $mod = ($i % 2 );++$i;?><tr target="item_id" rel="<?php echo ($diary["id"]); ?>">
					<td><?php echo ($diary["id"]); ?></td>
					<td><?php echo ($diary["userid"]); ?></td>
					<td><?php echo ($diary["catid"]); ?></td>
					<td><?php echo ($diary["title"]); ?></td>
					<td>
						<a href='/yyw/index.php/Admin/Diary/editStatus/id/<?php echo ($diary["id"]); ?>/status/<?php echo ($diary["status"]); ?>/navTagId/listdiary' target="ajaxTodo">
						<?php if($diary["status"] == 2): ?><img src='/yyw/Public/images/yes.gif'/>
						<?php else: ?>
							<img src='/yyw/Public/images/no.gif'/><?php endif; ?>
						</a>
						<?php if($diary["status"] == 2): ?>已审核<?php else: ?>未审核<?php endif; ?>
					</td>
					<td><?php echo ($diary["views"]); ?></td>
					<td><?php echo ($diary["comments"]); ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$diary["addtime"])); ?></td>
					<!--<td><?php echo ($vo["sex"]); ?> &nbsp;&nbsp;&nbsp;<a href="/yyw/index.php/Admin/Diary/editsex/id/<?php echo ($vo["id"]); ?>/sex/<?php echo ($vo["sex"]); ?>/navTabId/liststu" target="ajaxTodo">修改性别</a></td>-->
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak(<?php echo (C("TMPL_L_DELIM")); ?>numPerPage:this.value<?php echo (C("TMPL_R_DELIM")); ?>)">
				<option value="10" <?php if($numPerPage == 10): ?>selected<?php endif; ?>>10</option>
				<option value="15" <?php if($numPerPage == 15): ?>selected<?php endif; ?>>15</option>
				<option value="20" <?php if($numPerPage == 20): ?>selected<?php endif; ?>>20</option>
				<option value="25" <?php if($numPerPage == 25): ?>selected<?php endif; ?>>25</option>
				<option value="30" <?php if($numPerPage == 30): ?>selected<?php endif; ?>>30</option>
			</select>
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>
</div>