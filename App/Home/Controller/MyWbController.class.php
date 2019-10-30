<?php

namespace Home\Controller;
class MyWbController extends CommonController
{
	public function index($id){
		$mod = D('wbreview');
		$total = $mod->where('uid='.$id)->count();
		$page = new \Think\Page($total,10);
		$list = $mod->order('id desc')->limit($page->firstRow,$page->listRows)->field('id,uid,text,time')->where('uid='.$id)->select();
		$user = D('user')->field('username,avatar')->where('id='.session('user')['id'])->find();
		$userinfo = D('user_params')->field('gender')->find();
		foreach($list as $k=>$v){
			$count[$k] = D('phwb')->where('wid='.$v['id'])->count();
		}
		$sex = array('1'=>'male.gif','2'=>'female.gif');
		if(empty($user['avatar'])){
			$user['avatar'] = $sex[$userinfo['gender']];
		}
		$this->assign('id',$id);
		$this->assign('user',$user);
		$this->assign('list',$list);
		$this->assign('num',$count);
		$newDiary = D('Diary')->scope('show,new')->limit(9)->select();
		$this->assign('newdiary',$newDiary);
		$this->assign('pageInfo',$page->show());
		$this->display('mywb');
	}
	
	public function insert(){
		$mod = M('wbreview');
		$list['wbid'] = $mod->field('wbid')->where('uid='.session('user')['id'])->order('wbid desc')->find();
		if($list['wbid'] == null){
			$list['wbid'] = 1;
		}else{
			$list['wbid'] = $list['wbid']['wbid']+1;
		}
		$list['uid'] = session('user')['id'];
		$list['text'] = $_POST['content'];
		$list['time'] = date('m-d H:i',time());
		$info = array();
		if($mod->create($list)){
			if($mod->add()){
				$data2 = array();
				$info['error'] = true;
				$data1 = $mod->order('id desc')->where('uid='.session('user')['id'])->limit(1)->find();
				$data2 = M('user')->field('username,avatar')->where('id='.session('user')['id'])->find();
				$sex = D('user_params')->field('gender')->where('userid='.session('user')['id'])->find();
				$data2['gender'] = $sex['gender'];
				if($data2['avatar'] == null){
					if($data2['gender'] == 1){
						$data2['avatar'] = 'male.gif';
						}
					else{
						$data2['avatar'] = 'female.gif';
					}
				}
				$info['data'] = array_merge($data1,$data2);
				$userPointsController = new \Home\Controller\UserPointsController();
				$userPointsController->insert('blog');
			}else{
				$info['error'] = false;
				$info['data'] = '发表心情失败!';
			}
		}else{
			$info['error'] = false;
			$info['data'] = '发表心情失败';
		}
		echo json_encode($info);
	}
}

?>