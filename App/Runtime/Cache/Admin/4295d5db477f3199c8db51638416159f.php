<?php if (!defined('THINK_PATH')) exit();?>
<form id="pagerForm" action="/index.php/Admin/User/index" method="post">
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
					<b>搜索</b> &nbsp; 昵称/用户名：<input type="text" name="username" value="<?php echo ($_POST['username']); ?>" /> 
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
			<li><a class="delete" href="/index.php/Admin/User/del/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>/navTabId/listuser" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="/index.php/Admin/User/edit/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>"  width="550" height="380" target="dialog"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="20" orderField="id" <?php if($_REQUEST['_order']== 'id'): ?>class="<?php echo ($_REQUEST['_sort']); ?>"<?php endif; ?>>ID</th>
				<th width="" orderField="username" <?php if($_REQUEST['_order']== 'username'): ?>class="<?php echo ($_REQUEST['_sort']); ?>"<?php endif; ?>>昵称/用户名</th>
				<th width="">E-Mail</th>
				<th width="">积分</th>
				<th width="">头像</th>
				<th width="">状态</th>
                <th width="">征友状态</th>
				<th width="" orderField="loginviews" <?php if($_REQUEST['_order']== 'loginviews'): ?>class="<?php echo ($_REQUEST['_sort']); ?>"<?php endif; ?>>登陆次数</th>
				<th width="">登陆时间</th>
				<th width="">注册时间</th>
				<th width="">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="height:30px;" target="item_id" rel="<?php echo ($vo['id']); ?>">
					<td><?php echo ($vo['id']); ?></td>
					<td><?php echo ($vo['username']); ?></td>
					<td><?php echo ($vo['email']); ?></td>
					<td><?php echo ($vo['points']); ?></td>
					<td style="line-height:50px;">
						<?php if($vo['avatar'] != null): ?><img src="/Public/Uploads/pic/<?php echo ($vo['avatar']); ?>" width="30" height="30" />
						<?php else: ?>
							<?php if($vo['gender'] == 1): ?><img src="/Public/Uploads/pic/male.gif" width="30" height="30" />
							<?php else: ?>
							<img src="/Public/Uploads/pic/female.gif" width="30" height="30" /><?php endif; endif; ?>
					
					</td>
					<td><?php echo ($sta[$vo['status']]); ?></td>
                    <td><?php echo ($loveSta[$vo['lovestatus']]); ?></td>
                    <td><?php echo ($vo['loginviews']); ?>次</td>
                    <td><?php echo (date("Y-m-d H:i:s",$vo['logintime'])); ?></td>
                    <td><?php echo (date("Y-m-d",$vo['regtime'])); ?></td>
                    <td>
                        <a style="color:blue;" href="/index.php/Admin/User/edit/id/<?php echo ($vo['id']); ?>/act/resetpass" target="dialog">修改用户密码</a>
                    </td>
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
        <div style="line-heigth:20px;">
            
        </div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>
</div>