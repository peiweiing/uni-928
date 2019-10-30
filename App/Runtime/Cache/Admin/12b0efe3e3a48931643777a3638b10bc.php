<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/yyw/index.php/Admin/Profile/index" method="post">
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
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="10">用户ID</th>
				<th width="10">昵称/用户名</th>
				<th width="20">公司类型</th>
				<th width="30">收入描述</th>
				<th width="20">工作状况</th>
				<th width="40">公司名称</th>
				<th width="30">专业类型</th>
				<th width="30">学校名称</th>
				<th width="30">入学年份</th>
				<th width="90">语言能力</th>
				<th width="30">是否喝酒</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="item_id" rel="<?php echo ($vo["userid"]); ?>">
				<td><?php echo ($vo["userid"]); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["shiye"]); ?></td>
				<td><?php echo ($vo["shouru"]); ?></td>
				<td><?php echo ($vo["zhuangtai"]); ?></td>
				<td><?php if($vo["companyname"] != null): echo ($vo["companyname"]); else: ?>未填写<?php endif; ?></td>
				<td><?php echo ($vo["leixing"]); ?></td>
				<td><?php if($vo["school"] != null): echo ($vo["school"]); else: ?>未填写<?php endif; ?></td>
				<td><?php if($vo["schoolyear"] != null): echo ($vo["schoolyear"]); else: ?>未填写<?php endif; ?></td>
				<td><?php echo ($vo["yuyan0"]); ?> <?php echo ($vo["yuyan1"]); ?> <?php echo ($vo["yuyan2"]); ?> <?php echo ($vo["yuyan3"]); ?> <?php echo ($vo["yuyan4"]); ?></td>
				<td><?php echo ($vo["hejiu"]); ?></td>
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