<?php
namespace Admin\Controller;

class GreetController extends CommonController
{
	public function _tigger_list(&$list){
		foreach($list as &$value){
			$male = $value['male'];
			$female = $value['female'];
			if($male==1 && $female==1){
				$value['type'] = '同性恋';
			}elseif($male==0 && $female==1){
				$value['type'] = '男泡女';
			}elseif($male==1 && $female==0){
				$value['type'] = '女泡男';
			}
		}
	}
	
	//执行添加
	public function insert(){
		//同性恋
		if($_POST['type']==1){
			$_POST['male'] = 1;
			$_POST['female'] = 1;
		}
		//男泡女
		if($_POST['type']==2){
			$_POST['male'] = 0;
			$_POST['female'] = 1;	
		}
		//女泡男
		if($_POST['type']==3){
			$_POST['male'] = 1;
			$_POST['female'] = 0;
		}
		
		$model = D(CONTROLLER_NAME);
		unset( $_POST[$model->getPk()]);
		
		if (false === $model->create($_POST,1)) {
			$this->error($model->getError());
		}
		//保存当前数据对象
		if ($result = $model->add()) { //保存成功			
			//成功提示
			$this->success(L('新增成功'));
		} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
		}
	}
	
	//加载修改页面
	public function edit() {
		$model = M(CONTROLLER_NAME);
		$id = $_REQUEST[$model->getPk()];
		$vo = $model->find($id);
		if($vo['male']==1 && $vo['female']==1){
			$vo['type'] = 1;
		}elseif($vo['male']==0 && $vo['female']==1){
			$vo['type'] = 2;
		}elseif($vo['male']==1 && $vo['female']==0){
			$vo['type'] = 3;
		}
		
		$this->assign('vo', $vo);
		$this->display('edit');
	}
	
	//执行修改
	public function update() {
		$model = D(CONTROLLER_NAME);
		//同性恋
		if($_POST['type']==1){
			$_POST['male'] = 1;
			$_POST['female'] = 1;
		}
		//男泡女
		if($_POST['type']==2){
			$_POST['male'] = 0;
			$_POST['female'] = 1;	
		}
		//女泡男
		if($_POST['type']==3){
			$_POST['male'] = 1;
			$_POST['female'] = 0;
		}
		// dump($_POST);
		if(false === $model->create($_POST,2)) {
			$this->error($model->getError());
		}
		// 更新数据
		if(false !== $model->save()) {
			//成功提示
			$this->success(L('更新成功'));
		} else {
			//错误提示
			$this->error(L('更新失败'));
		}
	}
	
	//查询
	protected function _search($name='') {
		if(!empty($_POST['type']) || $_POST['type']!==''){
			//同性恋
			if($_POST['type']==1){
				$map['male'] = 1;
				$map['female'] = 1;
			}
			//男泡女
			if($_POST['type']==2){
				$map['male'] = 0;
				$map['female'] = 1;	
			}
			//女泡男
			if($_POST['type']==3){
				$map['male'] = 1;
				$map['female'] = 0;
			}
		}
		return $map;
	}
	
	
}