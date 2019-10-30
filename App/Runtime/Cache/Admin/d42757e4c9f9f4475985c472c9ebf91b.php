<?php if (!defined('THINK_PATH')) exit();?>
<form id="pagerForm" method="post" action="demo_page1.html">
	<input type="hidden" name="status" value="${param.status}">
	<input type="hidden" name="keywords" value="${param.keywords}" />
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="${model.numPerPage}" />
	<input type="hidden" name="orderField" value="${param.orderField}" />
</form>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="demo_page4.html" target="navTab"><span>添加</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="20">ID</th>
				<th width="20">血型</th>
				<th width="30">星座</th>
				<th width="50">有无子女</th>
				<th width="50">是否有车</th>
				<th width="50">是否有房</th>
				<th width="50">个性</th>
				<th width="50">外貌自评</th>
				<th width="50">魅力部位</th>
				<th width="50">发型</th>
				<th width="50">发色</th>
				<th width="50">脸型</th>
				<th width="50">体型</th>
			</tr>
		</thead>
		<tbody>
			<tr target="sid_user" rel="1">
				<td><?php echo ($list["userid"]); ?></td>
				<td><?php echo ($bloodtype); ?></td>
				<td>
					<?php $_RANGE_VAR_=explode(',',"1.20,2.18");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>水瓶座<?php endif; ?>						
					<?php $_RANGE_VAR_=explode(',',"2.19,3.20");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>双鱼座<?php endif; ?>
					<?php $_RANGE_VAR_=explode(',',"3.21,4.19");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>白羊座<?php endif; ?>							
					<?php $_RANGE_VAR_=explode(',',"4.20,5.20");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>金牛座<?php endif; ?>							
					<?php $_RANGE_VAR_=explode(',',"5.21,6.21");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>双子座<?php endif; ?>							
					<?php $_RANGE_VAR_=explode(',',"6.22,7.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>巨蟹座<?php endif; ?>							
					<?php $_RANGE_VAR_=explode(',',"7.23,8.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>狮子座<?php endif; ?>					
					<?php $_RANGE_VAR_=explode(',',"8.23,9.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>处女座<?php endif; ?>						
					<?php $_RANGE_VAR_=explode(',',"9.23,10.23");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>天枰座<?php endif; ?>						
					<?php $_RANGE_VAR_=explode(',',"10.24,11.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>天蝎座<?php endif; ?>						
					<?php $_RANGE_VAR_=explode(',',"11.23,12.21");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>射手座<?php endif; ?>						
					<?php $_RANGE_VAR_=explode(',',"12.22,1.19");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>摩羯座<?php endif; ?>	
				</td>
				<td><?php echo ($child); ?></td>
				<td><?php if($list["car"] == 1): ?>暂未购车<?php elseif($list["car"] == 2): ?>已经购车<?php else: ?>未填写<?php endif; ?></td>
				<td><?php echo ($house); ?></td>
				<td><?php echo ($personality); ?></td>
				<td><?php echo ($zjappearance); ?></td>
				<td><?php echo ($attr); ?></td>
				<td><?php echo ($haircut); ?></td>
				<td><?php echo ($haircolor); ?></td>
				<td><?php echo ($face); ?></td>
				<td><?php echo ($size); ?></td>
			</tr>	
		</tbody>
	</table>
</div>