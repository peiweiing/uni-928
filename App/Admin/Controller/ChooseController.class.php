<?php
namespace Admin\Controller;

class ChooseController extends CommonController
{
	protected function _tigger_list(&$list){
	$sex = array(0=>'未填写',1=>'男',2=>'女');
	$hismarriage = array(0=>'未填写',1=>'单身',2=>'已婚',3=>'离异',4=>'丧偶');
	$type = array(0=>'未填写',1=>'朋友',2=>'知己',3=>'恋爱',4=>'结婚');
	$education = array(0=>'未填写',1=>'中专以下学历',2=>'中专',3=>'大专',4=>'本科',5=>'硕士',6=>'博士',7=>'博士后');
		foreach($list as &$v){
			$v['name'] = D('user')->where('id='.$v['userid'])->getfield('username');
			$v['sex'] = $sex[$v['sex']];
			$v['age'] = unserialize($v['age']);
			$v['area'] = unserialize($v['area']);
			$v['weight'] = unserialize($v['weight']);
			$v['hismarriage'] = unserialize($v['hismarriage']);
			$v['type'] = unserialize($v['type']);
			$v['education'] = unserialize($v['education']);
			$v['hunshi'] = $hismarriage[$v['hismarriage'][0]];
			$v['hunshi2'] = $hismarriage[$v['hismarriage'][1]];
			$v['jiaoyou'] = $type[$v['type'][0]];
			$v['leixing'] = $type[$v['type'][1]];
			$v['xueli'] = $education[$v['education'][0]];
			$v['xueli2'] = $education[$v['education'][1]];
			$v['sheng'] = D('district')->where('id='.$v['area'][0])->getfield('name');
			$v['shi'] = D('district')->where('id='.$v['area'][1])->getfield('name');
		}
	}

	protected function _list($model, $map = array(), $sortBy = '', $asc = false) {
		
		//排序字段 默认为主键名
		if (!empty($_REQUEST['_order'])) {
			$order = $_REQUEST['_order'];
		} else {
			$order = !empty($sortBy)?$sortBy:$model->getPk();
		}
		
		//排序方式默认按照倒序排列
		//接受 sort参数 0 表示倒序 非0都 表示正序
		if (!empty($_REQUEST['_sort'])) {
			$sort = $_REQUEST['_sort'] == 'asc'?'asc':'desc';
		} else {
			$sort = $asc ? 'asc' : 'desc';
		}
		
		//取得满足条件的记录数
		$count = $model->where($map)->count();
		
		//每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = $_REQUEST['numPerPage'];
		} else {
			$listRows = '10';
		}
		
		
		//设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage=$_REQUEST['pageNum'];
		}else{
			$nowPage=1;
		}
		$_GET['p']=$nowPage;
		
		//创建分页对象
		$p = new \Think\Page($count, $listRows);
		
		
		//分页查询数据
		$list = $model->field('')->where($map)->order($order.' '.$sort)
						->limit($p->firstRow.','.$p->listRows)
						->select();
						
		//回调函数，用于数据加工，如将用户id，替换成用户名称
		if (method_exists($this, '_tigger_list')) {
			$this->_tigger_list($list);
		}
		
		
		//分页跳转的时候保证查询条件
		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}
	
		//分页显示
		$page = $p->show();
		
		//列表排序显示
		$sortImg = $sort;                                 //排序图标
		$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列';   //排序提示
		$sort = $sort == 'desc' ? 1 : 0;                  //排序方式
		
		
		//模板赋值显示
		$this->assign('list', $list);
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);
		
		$this->assign("search",			$search);			//搜索类型
		$this->assign("values",			$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",		$count);			//总条数
		$this->assign("numPerPage",		$p->listRows);		//每页显多少条
		$this->assign("currentPage",	$nowPage);			//当前页码
		
	}
}