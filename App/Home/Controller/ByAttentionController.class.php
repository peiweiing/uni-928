<?php
	//粉丝的增删查
	namespace Home\Controller;
	
	class ByAttentionController extends CommonController
	{
		//浏览粉丝
		public function index(){
			//echo "浏览";
			$atten = D('byattention');
			$total = $atten->where('uid='.session('user')['id'])->count();
			$page = new \Think\Page($total,9);
			$mod = $atten->order('byaid desc')->field('uid')->limit($page->firstRow,$page->listRows)->where('byattenid='.session('user')['id'])->select();

			//定义一个空数组
			$list = array();
			//根据attenid获取关注的用户详情
			foreach($mod as $k=>$v){
				$list[] = $v['uid'];
			}
			
			//定义一个空数组接受查询信息
			$res = array();
			$resu = array();
			//遍历$list数组
			foreach($list as $v1){
				//执行查询
				$res[$v1] = D('user_params')->where('userid='.$v1)->field('id,gender,ageyear,marrystatus,height,cityid,monolog')->find();
				if(strlen($res[$v1]['monolog'])>27){
					$res[$v1]['monolog1'] = mb_substr($res[$v1]['monolog'],0,12,"utf-8")."...";
				}
				$resu[$v1] = D('user')->where('id='.$v1)->field('username,avatar,id')->find();
			}

			//根据出生年算出年龄
			$sex = array('1'=>'未婚','2'=>'已婚','3'=>'离异');
			foreach($res as $k=>$v){
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
			$this->display('byattention');		
		}

	}

?>