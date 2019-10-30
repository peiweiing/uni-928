<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/index.php/Admin/Choose/index" method="post">
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
					<b>搜索</b> &nbsp; 关键字：<input type="text" name="title" value="<?php echo ($_POST['title']); ?>" />
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="20">ID</th>
				<th width="40">昵称/用户名</th>
				<th width="30">性 别要求</th>
				<th width="60">年 龄要求</th>
				<th width="60">身 高要求</th>
				<th width="40">所在城市要求</th>
				<th width="40">婚 史要求</th>
				<th width="40">交友类型要求</th>
				<th width="40">学历要求</th>
				<th width="40">是否有形象照</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="1">
				<td><?php echo ($vo["userid"]); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["sex"]); ?></td>
				<td><?php if($vo["age"] != null): echo ($vo["age"]["0"]); ?>-<?php echo ($vo["age"]["1"]); ?>岁<?php else: ?>不限<?php endif; ?></td>
				<td><?php if($vo["weight"] != null): echo ($vo["weight"]["0"]); ?>-<?php echo ($vo["weight"]["1"]); ?>CM<?php else: ?>不限<?php endif; ?></td>
				<td><?php echo ($vo["sheng"]); ?> <?php echo ($vo["shi"]); ?></td>
				<td><?php echo ($vo["hunshi"]); ?> <?php echo ($vo["hunshi2"]); ?></td>
				<td><?php echo ($vo["jiaoyou"]); ?> <?php echo ($vo["leixing"]); ?></td>
				<td><?php if($vo["xueli"] != null): echo ($vo["xueli"]); ?>-<?php echo ($vo["xueli2"]); endif; ?></td>
				<td><?php if($vo["ishead"] == 1): ?>有形象照<?php else: ?>无<?php endif; ?></td>
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