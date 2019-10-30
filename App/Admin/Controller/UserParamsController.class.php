<?php
namespace Admin\Controller;

class UserParamsController extends CommonController
{
	protected function _tigger_list(&$list){
		$sex = array(0=>'未填写',1=>'男',2=>'女');
		$lovesort=array(0=>'未填写',1=>"朋友",2=>"知己",3=>"恋爱",4=>"结婚");	
		$marry = C('USER_CONFIG.MARRY');
		$education = C('USER_CONFIG.EDU');
		$shuxing = C('USER_CONFIG.ZODIAC');
		$zhiye = C('USER_CONFIG.JOB');
		$salary = C('USER_CONFIG.SALARY');

		foreach($list as &$v){
			$v['uid'] = D('user')->where('id='.$v['userid'])->getfield('username');
			$v['cityname'] = D('district')->where('id='.$v['provinceid'])->getfield('name');
			$v['gender'] = $sex[$v['gender']];
			$v['marrystatus'] = $marry[$v['marrystatus']];
			$v['shengxiao'] = $shuxing[$v['ageyear']%12];
			$v['zhiye'] = $zhiye[$v['job']];
			$v['education'] = $education[$v['education']];
			$v['salary'] = $salary[$v['salary']];
			$v['lovesort'] = $lovesort[$v['lovesort']];
		}
	}
	//查看详细
	public function show(){
		$id = $_GET['id'];
		$mod = D("user_params")->where("userid=".$id)->find();
		$child=  C('USER_CONFIG.CHILD');
		$bloodtype = C('USER_CONFIG.BLOODTYPE');
		$house= C('USER_CONFIG.HOUSE');
		$personality= C('USER_CONFIG.PERSONALITY');
		$zjappearance= C('USER_CONFIG.ZJAPPEARANCE');
		$attr= C('USER_CONFIG.ATTR');
		$haircut= C('USER_CONFIG.HAIRCUT');
		$haircolor= C('USER_CONFIG.HAIRCOLOR');
		$face= C('USER_CONFIG.FACE');
		$size= C('USER_CONFIG.SIZE');
		$haizi = $child[$mod['child']];
		$birthday = $mod['agemonth'].".".$mod['ageday'];
		$this->assign("child",$haizi);
		$this->assign("birthday",$birthday);
		$this->assign("bloodtype",$bloodtype[$mod['bloodtype']]);
		$this->assign("house",$house[$mod['house']]);
		$this->assign("attr",$attr[$mod['attractive']]);
		$this->assign("haircut",$haircut[$mod['haircut']]);
		$this->assign("haircolor",$haircolor[$mod['haircolor']]);
		$this->assign("face",$face[$mod['face']]);
		$this->assign("size",$size[$mod['size']]);
		$this->assign("personality",$personality[$mod['personality']]);
		$this->assign("zjappearance",$zjappearance[$mod['zjappearance']]);
		$this->assign("list",$mod);
		$this->display("show");
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