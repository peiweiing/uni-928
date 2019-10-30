<?php
	//关注的增删查
	namespace Home\Controller;
	
	class AttentionController extends CommonController
	{
		//查询以关注用户
		public function index(){
			//echo "浏览";
			$atten = D('attention');
			$total = $atten->where('uid='.session('user')['id'])->count();
			$page = new \Think\Page($total,9);
			$mod = $atten->order('id desc')->field('attenid')->limit($page->firstRow,$page->listRows)->where('uid='.session('user')['id'])->select();
			
			//定义一个空数组
			$list = array();
			
			//根据attenid获取关注的用户详情
			foreach($mod as $k=>$v){
				$list[] = $v['attenid'];
			}
			
			//定义一个空数组接受查询信息
			$res = array();
			$resu = array();
			//遍历$list数组
			foreach($list as $v1){
				//执行查询
				$res[$v1] = D('user_params')->where('userid='.$v1)->field('id,gender,ageyear,marrystatus,height,cityid,monolog')->find();
				if(strlen($res[$v1]['monolog'])>27){
					$res[$v1]['monolog1'] = substr($res[$v1]['monolog'],0,27)."...";
				}
				$resu[$v1] = D('user')->where('id='.$v1)->field('username,avatar,id')->find();
			}
			
			//根据出生年算出年龄
			$sex = array('1'=>'未婚','2'=>'已婚','3'=>'离异');
			foreach($res as $k=>$v){
				$res[$k]['attentionid'] = $atten->field('id')->where('attenid='.$k)->find()['id'];
				$res[$k]['ageyear'] = date('Y',time())-$res[$k]['ageyear'];
				$res[$k]['marrystatus'] = $sex[$res[$k]['marrystatus']];
				$city[$k] = D('district')->where('id='.$res[$k]['cityid'])->field('name,upid')->find();
				$city1[$k] = D('district')->where('id='.$city[$k]['upid'])->field('name')->find();
			}
			
			$users = array();
			foreach($resu as $k=>$v){
				$users[$k] = $v;
				if($users[$k]['avatar'] == null){
					if($res[$k]['gender'] == 1){
						$users[$k]['avatar'] = 'male.gif';
					}else{
						$users[$k]['avatar'] = 'female.gif';
					}
				}
			}
			$this->assign('city1',$city1);
			$this->assign('city',$city);
			$this->assign('users',$users);
			$this->assign('res',$res);
			$this->assign('pageInfo',$page->show());
			$this->assign('totalPages',$page->totalPages);
			$this->display('attention');
		}
		
		//添加关注指定用户
		public function insert(){
			//echo "添加";
			$id = $_POST['id'];
			$info = array();
			if(session('user')['id'] != $id ){
			$mod = D('attention');
			$num = $mod->field('attenid')->where('uid='.session('user')['id'])->select();
			$num2 = array();
			foreach($num as $v){
				$num2[] = $v['attenid'];
			}
			foreach($num2 as $v){
				if($v == $id){
					$info['error'] = false;
					$info['data'] = '您已经关注过此用户';
					echo json_encode($info);
					exit();
				}
			}
			$data['attenid'] = $id;
			$data['uid'] = session('user')['id'];
			
			//判断是否创建成功
			if(!$mod->create($data)){
				$info['error'] = false;
				$info['data'] = '关注失败';
			}else{
				//判断是否添加成功
				if($mod->add()){
					$mod2 = D('byattention');
					$data2['byattenid'] = $id;
					$data2['uid'] = session('user')['id'];
					$mod2->create($data2);
					if($mod2->add()){
						$info['error'] = true;
						$info['data'] = '关注成功';
					}else{
						$info['error'] = false;
						$info['data'] = '关注失败';
					}
					$userPointsController = new \Home\Controller\UserPointsController();
				$userPointsController->insert('blog');
				}else{
					$info['error'] = false;
					$info['data'] = '关注失败';
					
				}
			}
			}else{
				$info['error'] = false;
				$info['data'] = '不能关注自己';
				
			}
			echo json_encode($info);
		}
		
		//删除关注指定用户
		public function del(){
			//echo "删除成功";
			$id = $_POST[id];
			$mod = D('attention')->where('id='.$id)->delete();
			//判断是否成功删除
			$info = array();
			if($mod){
				$info['error'] = true;
			}else{
				$info['error'] = false;
				$info['data'] = '亲！取消关注失败';
			}
			
			echo json_encode($info);
			
		}

	}
	
?>