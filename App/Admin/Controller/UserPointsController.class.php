<?php

namespace Admin\Controller;

class UserPointsController extends CommonController
{
    //查询积分列表
    
	public function _tigger_list(&$list){
		foreach($list as &$v) {
			$sta = D('User')->field(array('id', 'username'))->where('id='.$v['userid'])->find();
			$v['uid'] = $sta['id'];
			$v['username'] = $sta['username'];
			//$v['points'] = $sta['points'];

		}
		$this->assign('sta', array('隐藏', '显示'));
	}
    
    //执行删除指定用户积分信息的操作
    public function del() {
		if(D('UserPoints')->delete($_GET['id'])) {
			echo $this->success('删除成功！', U('UserPoints/index'));
		}else{
			echo $this->error('删除失败！');
		}
    }
	
	//修改用户积分记录状态
	public function update() {
		$data = array();
		$data['id'] = $_GET['id'];
		$data['status'] = ($_GET['status'] == 1) ? 0 : 1;
		
		if(D('UserPoints')->data($data)->save()) {
			echo $this->success('修改成功!', U('UserPoints/index'));
		}else{
			echo $this->error('修改失败!');
		}
	}
    
}