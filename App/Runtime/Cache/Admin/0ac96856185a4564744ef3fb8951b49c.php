<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/yyw/index.php/Admin/Hibox/index" method="post">
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
				<td>
					<b>搜索</b>
						&nbsp;&nbsp;状态：<select name='status'>
											<option value=''>请选择</option>
											<option value='1' <?php if($_POST['status']== 1): ?>selected<?php endif; ?> >未读</option>
											<option value='2' <?php if($_POST['status']== 2): ?>selected<?php endif; ?> >已读</option>
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
			<li><a class="delete" href="/yyw/index.php/Admin/Hibox/del/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>/navTabId/listdiary" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="30">ID</th>
				<th width="40">发送者</th>
				<th width="40">接收者</th>
				<th width="200">问候语</th>
				<th width="40">状态</th>
				<th width="40">发送者操作</th>
				<th width="40">接收者操作</th>
				<th width="60" orderField="addtime" <?php if($_REQUEST['_order']== 'addtime'): ?>class="<?php echo ($_REQUEST['_sort']); ?>"<?php endif; ?>>发表时间</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hibox): $mod = ($i % 2 );++$i;?><tr target="item_id" rel="<?php echo ($hibox["id"]); ?>">
					<td><?php echo ($hibox["id"]); ?></td>
					<td><?php echo ($hibox["fromuserid"]); ?></td>
					<td><?php echo ($hibox["touserid"]); ?></td>
					<td><?php echo ($hibox["greetid"]); ?></td>
					<td><?php if($hibox["status"] == 2): ?>已读<?php else: ?>未读<?php endif; ?></td>
					<td><?php if($hibox["status"] == 1): ?>未删除<?php else: ?>已删除<?php endif; ?></td>
					<td><?php if($hibox["status"] == 1): ?>未删除<?php else: ?>已删除<?php endif; ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$hibox["addtime"])); ?></td>
					<!--<td><?php echo ($vo["sex"]); ?> &nbsp;&nbsp;&nbsp;<a href="/yyw/index.php/Admin/Hibox/editsex/id/<?php echo ($vo["id"]); ?>/sex/<?php echo ($vo["sex"]); ?>/navTabId/liststu" target="ajaxTodo">修改性别</a></td>-->
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