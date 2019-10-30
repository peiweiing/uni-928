<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/yyw/index.php/Admin/UserPoints/index" method="post">
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
					<b>搜索</b> &nbsp; 关键字：<input type="text" name="keyword" value="<?php echo ($_POST['keyword']); ?>" /> [姓名]
						&nbsp;&nbsp;班级：<input size="10" type="text" name="classid" value="<?php echo ($_POST['classid']); ?>"/>
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
			<li><a class="delete" href="/yyw/index.php/Admin/UserPoints/del/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>/navTabId/listuserpoints" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="">积分编号</th>
				<th width="">用户ID</th>
				<th style="color:#e22c37;" width="">昵称/用户名</th>
				<th style="color:green;" width="">积分增加</th>
				<th style="color:red;" width="">积分减少</th>
				<th style="color:blue" width="">积分总额</th>
				<th width="" orderField="content" <?php if($_REQUEST['_order']== 'content'): ?>class="<?php echo ($_REQUEST['_sort']); ?>"<?php endif; ?>>积分详情</th>
				<th width="">记录状态</th>
				<th width="">积分添加时间</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="item_id" rel="<?php echo ($vo["id"]); ?>">
					<td><?php echo ($vo['id']); ?></td>
					<td><?php echo ($vo['uid']); ?></td>
					<td style="font-weight:bold;color:#e22c37;"><?php echo ($vo['username']); ?></td>
					<td style="color:green;" ><?php echo ($vo['increase']); ?></td>
					<td style="color:red;" ><?php echo ($vo['reduce']); ?></td>
					<td style="color:blue;" ><?php echo ($vo['points']); ?></td>
					<td><?php echo ($vo['content']); ?></td>
					<td><span style="color:blue;"><?php echo ($sta[$vo['status']]); ?></span>&nbsp;|&nbsp;<a href="/yyw/index.php/Admin/UserPoints/update/id/<?php echo ($vo['id']); ?>/status/<?php echo ($vo['status']); ?>/navTagId/listuserpoints" target="ajaxTodo">修改记录显示</a></td>
					<td><?php echo (date("Y-m-d H:i:s",$vo['addtime'])); ?></td>
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