<?php
	
namespace Home\Controller;
class WeiBoController extends CommonController
{
	//微博浏览
	public function index(){
		$mod = D('wbreview');
		$list = $mod->order('id desc')->limit(7)->select();
		//dump($list);
		$user = D('user');
		$userlist = array();
		
		foreach($list as $k=>&$v){
			$userlist[] = $user->field('username,avatar')->where('id='.$v['uid'])->find();
			$sex = D('user_params')->field('gender')->where('userid='.$v['uid'])->find();
			//dump($sex);
			$v['username'] = $userlist[$k]['username'];
			$v['avatar'] = $userlist[$k]['avatar'];
			$v['gender'] = $sex['gender'];
			if($v['avatar'] == null){
				if($v['gender'] == 1){
					$v['avatar'] = 'male.gif';
					}
				else{
					$v['avatar'] = 'female.gif';
				}
			}
		}
		$userlist = new UserListController();
		$userlist->recommend();
		$userList = new UserListController();
		$userList->guess();
		$newDiary = D('Diary')->scope('show,new')->limit(9)->select();
		$this->assign('newdiary',$newDiary);
		$this->assign('list',$list);
		$this->display('weibo');
	 }
	//微博发表
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