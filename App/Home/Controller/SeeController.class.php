<?php

	namespace Home\Controller;
	
	class SeeController extends CommonController
	{
		//查询看过的用户信息
		public function index(){
			//echo "浏览";
			$atten = D('see');
			$total = $atten->where('uid='.session('user')['id'])->count();
			$page = new \Think\Page($total,10);
			$mod = $atten->order('id desc')->field('seeid')->limit($page->firstRow,$page->listRows)->where('uid='.session('user')['id'])->select();
			
			//定义一个空数组
			$list = array();
			
			//根据attenid获取关注的用户详情
			foreach($mod as $k=>$v){
				$list[] = $v['seeid'];
			}
			
			//定义一个空数组接受查询信息
			$res = array();
			$resu = array();
			//遍历$list数组
			foreach($list as $v1){
				//执行查询
				$res[$v1] = D('user_params')->where('userid='.$v1)->field('id,gender,ageyear,marrystatus,height,cityid,monolog,education,salary')->find();
				if(strlen($res[$v1]['monolog'])>27){
					$res[$v1]['monolog1'] = substr($res[$v1]['monolog'],0,27)."...";
				}
				$resu[$v1] = D('user')->where('id='.$v1)->field('username,avatar,id')->find();
			}
			
			//根据出生年算出年龄
			$sex = array('1'=>'未婚','2'=>'已婚','3'=>'离异');
			$education=array(1=>"中专以下学历",2=>"中专",3=>"大专",4=>"本科",5=>"硕士",6=>"博士",7=>"博士后");
			$salary = array(1=>'低于2000元',2=>'2000~5000元',3=>'5000~10000元',4=>'10000~20000元',5=>'高于20000元');
			foreach($res as $k=>$v){
				$res[$k]['attentionid'] = $atten->field('id')->where('attenid='.$k)->find()['id'];
				$res[$k]['ageyear'] = date('Y',time())-$res[$k]['ageyear'];
				$res[$k]['marrystatus'] = $sex[$res[$k]['marrystatus']];
				if(empty($res[$k]['education'])){
					$res[$k]['education'] = "未填写";
				}else{
					$res[$k]['education'] = $education[$res[$k]['education']];
				}
				if(empty($res[$k]['salary'])){
					$res[$k]['salary'] = "未填写";
				}else{
					$res[$k]['salary'] = $salary[$res[$k]['salary']];
				}
				
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
			$this->display('see');
		}
	}

?>