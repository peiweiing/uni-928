<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/yyw/index.php/Admin/UserParams/index" method="post">
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
					<b>搜索</b> &nbsp; 关键字：<input type="text" name="gender" value="<?php echo ($_POST['gender']); ?>" />
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
				<th width="30">性别</th>
				<th width="60">出生年月</th>
				<th width="40">所在城市</th>
				<th width="50">户籍</th>
				<th width="30">年龄</th>
				<th width="30">婚姻状态</th>
				<th width="20">生肖</th>
				<th width="30">身高</th>
				<th width="30">体重</th>
				<th width="30">薪资</th>
				<th width="50">职业</th>
				<th width="50">学历</th>
				<th width="40">交友类型</th>
				<th width="40">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="1">
				<td><?php echo ($vo["userid"]); ?></td>
				<td><?php echo ($vo["uid"]); ?></td>
				<td><?php echo ($vo["gender"]); ?></td>
				<td><?php echo ($vo["ageyear"]); ?>年<?php echo ($vo["agemonth"]); ?>月<?php echo ($vo["ageday"]); ?>日</td>
				<td><?php echo ($vo["cityname"]); ?></td>
				<td><?php echo ($vo["hukou"]); ?> <?php echo ($vo["huji"]); ?></td>
				<td><?php if($vo["age"] != null): echo ($vo["age"]); ?>岁<?php endif; ?></td>
				<td><?php echo ($vo["marrystatus"]); ?></td>
				<td><?php echo ($vo["shengxiao"]); ?></td>
				<td><?php if($vo["height"] != null): echo ($vo["height"]); ?>CM<?php endif; ?></td>
				<td><?php if($vo["weight"] != null): echo ($vo["weight"]); ?>公斤<?php endif; ?></td>
				<td><?php echo ($vo["salary"]); ?></td>
				<td><?php echo ($vo["zhiye"]); ?></td>
				<td><?php echo ($vo["education"]); ?></td>
				<td><?php echo ($vo["lovesort"]); ?></td>
				<td><a href="/yyw/index.php/Admin/UserParams/show/id/<?php echo ($vo["userid"]); ?>" target="navTab" style="color:blue">查看详细</a></td>
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