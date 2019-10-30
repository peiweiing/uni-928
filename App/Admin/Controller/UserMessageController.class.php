<?php
namespace Admin\Controller;

class UserMessageController extends CommonController
{
	public function _tigger_list(&$list){
		foreach($list as &$value){
			$value['sendid'] = M('User')->where('id='.$value['sendid'])->getField('username');
			$value['receiveid'] = M('User')->where('id='.$value['receiveid'])->getField('username');
		}
	}
	
	protected function _search($name='') {
		//生成查询条件
		if (empty($name)) {
			$name = CONTROLLER_NAME;
		}
		$model = M($name);
		$map = array();
		
		if(!empty($_REQUEST['endtime'])){			//若结束时间存在
			if(!empty($_REQUEST['starttime'])){		//同时若开始时间存在
				$map['addtime'] = array('between',array(strtotime($_REQUEST['starttime']),strtotime($_REQUEST['endtime'])));
			}else{									//开始时间不存在
				$map['addtime'] = array('elt',strtotime($_REQUEST['endtime']));
			}
		}else{										//结束时间不存在
			if(!empty($_REQUEST['starttime'])){		//但开始时间存在
				$map['addtime'] = array('egt',strtotime($_REQUEST['starttime']));
			}
		}
		foreach ($model->getDbFields() as $key => $val) {
			if (substr($key, 0, 1) == '_')
				continue;
			if (isset($_REQUEST[$val]) && $_REQUEST[$val] != '') {
				$map[$val] = $_REQUEST[$val];
			}
		}
		return $map;
	}
}