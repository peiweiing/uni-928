<?php
namespace Home\Controller;

use Think\Controller;

class UserListController extends Controller
{
	//显示用户列表
	public function index(){
		$mod = D("UserParams");
		
		if($_GET['type']=='mon'){
			//判断是独白模式要加载的变量
			$field = 'userid,gender,provinceid,cityid,height,age';//查询的参数表的字段
			$pageSize = 10;				//页数大小
			$display = 'userlistmon';	//加载的模板
			
			//最热日记
			$hotDiary = D('Diary')->scope('show,hot')->limit(15)->select();
			$this->assign('hotdiary',$hotDiary);

			
		}else{
			//判断是头像模式要加载的变量
			$field = 'userid,gender,provinceid,cityid,age';
			$pageSize = 30;
			$display = 'userlist';
			
			//最新日记
			$newDiary = D('Diary')->scope('show,new')->limit(15)->select();
			$this->assign('newdiary',$newDiary);
			//推荐会员
			$this->recommend();
		
		}
		//猜你喜欢
		$this->guess();
		
		
		//搜索封装查询条件
		if(!empty($_POST['city'])){				//城市不为空
			$map['cityid'] = $_POST['city'];
		}
		if(!empty($_POST['province'])){			//省不为空
			$map['provinceid'] = $_POST['province'];
		}
		if(!empty($_POST['gender'])){			//性别不为空
			$map['gender'] = $_POST['gender'];
		}
		if(!empty($_POST['avatar'])){			//头像不为空
			$map['avatar'] = 1;
		}
		if(!empty($_POST['max_age'])){			//最大年龄不为空
			if(!empty($_POST['min_age'])){		//同时最小年龄不为空
				$map['age']  = array('between',array($_POST['min_age'],$_POST['max_age']));
			}else{								//同时最小年龄为空
				$map['age']  = array('elt',$_POST['max_age']);
			}
		}else{									//最大年龄为空
			if(!empty($_POST['min_age'])){		//最小年龄不为空
				$map['age']  = array('egt',$_POST['min_age']); 
			}
		}
		if(!empty($_GET['gender'])){
			if($_GET['gender']=='female'){
				$map['gender'] = 2;
			}
			if($_GET['gender']=='male'){
				$map['gender'] = 1;
			}
		}
		// dump($_POST);
		$total = $mod->where($map)->count();
		if($total==0){
			$this->assign('total',$total);
			$this->display('userlist');
			return;
		}
		$page = new \Think\Page($total,$pageSize);
		$userparam = $mod->field($field)->where($map)->limit($page->firstRow,$page->listRows)->order('id desc')->select();

		$list = array();
		//找出对应的用户信息
		for($i=0;$i<count($userparam);$i++){
			$userparam[$i]['user'] = D("User")->field('username,avatar')->where('id='.$userparam[$i]['userid'].' and status=1')->find();
			
			if(!empty($userparam[$i]['user'])){
				$list[] = $userparam[$i];
			}
		}
		
		foreach($list as &$val){
			$val['provinceid'] = M("District")->where("id=".$val['provinceid'])->getField('name');
			$val['cityid'] = M("District")->where("id=".$val['cityid'])->getField('name');
			$val['icon'] = C('USER_CONFIG.ICON')[$val['gender']];
			if(empty($val['user']['avatar'])){
				$val['user']['avatar'] = C('USER_CONFIG.AVATAR')[$val['gender']];
			}
			if($_GET['type']=='mon'){
				$val['mon'] = M('ContactInformation')->where('userid='.$val['userid'])->getField('monologue');
				$val['phtotal'] = M('UserPhotoAlbum')->where('userid='.$val['userid'])->count();
			}
		}
		
		// dump($list);
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$show = $page->show();
		// dump($list);
		$this->assign('total',$total);
		$this->assign('list',$list);
		$this->assign('show',$show);
		$this->display($display);

	}
	
	//推荐会员
	public function recommend(){
		$mod = D("UserParams");
		//获取登陆会员信息
		if(session('user')==null){
			$userInfo['gender']=1;
			$userInfo['age'] = 25;
		}else{
			$userInfo = $mod->field('gender,age')->where('userid='.session('user')['id'])->find();
			
			if($userInfo['gender']==1){		//判断登陆用户性别，取反
				$recommend['gender'] = 2;
			}else{
				$recommend['gender'] = 1;
			}
		}
			
		//推荐会员（上下年龄相差三岁的异性）
		$recommend['age']  = array('between',array($userInfo['age']-3,$userInfo['age']+3));
		//查找参数符合的userid
		$list = $mod->field('userid,gender')->where($recommend)->order('rand()')->limit(9)->select();
		// dump($recUser);
		$recUser = array();
		for($r=0;$r<count($list);$r++){
			$list[$r]['user'] = D('User')->field('username,avatar')->where('id='.$list[$r]['userid'])->find();
			if(!empty($list[$r]['user'])){
				$recUser[] = $list[$r];
			}
		}
		
		
		foreach($recUser as &$value){
			$value['icon'] = C('USER_CONFIG.ICON')[$value['gender']];
			if(empty($value['user']['avatar'])){
				$value['user']['avatar'] = C('USER_CONFIG.AVATAR')[$value['gender']];
			}
		}
		// dump($recUser);
		$this->assign('recuser',$recUser);
		
	}
	
	//猜你喜欢
	public function guess(){
		$mod = D("UserParams");
		//获取登陆会员信息
		if(session('user')==null){
			$userInfo['gender']=1;
			$userInfo['age'] = 25;
		}else{
			$userInfo = $mod->field('gender,age')->where('userid='.session('user')['id'])->find();
			$guess['id'] = array('neq',session('user')['id']);
		}
		//猜你喜欢（上下年龄相差十五岁的异性或同性）
		
		$guess['age']  = array('between',array($userInfo['age']-10,$userInfo['age']+15));
		$list = $mod->field('userid,gender,age')->where($guess)->order('rand()')->limit(9)->select();
		$gueUser = array();
		for($g=0;$g<count($list);$g++){
			$list[$g]['user'] = D('User')->field('username,avatar')->where('id='.$list[$g]['userid'])->find();
			if(!empty($list[$g]['user'])){
				$gueUser[] = $list[$g];
			}
		}
		
		foreach($gueUser as &$value){
			$value['icon'] = C('USER_CONFIG.ICON')[$value['gender']];
			if(empty($value['user']['avatar'])){
				$value['user']['avatar'] = C('USER_CONFIG.AVATAR')[$value['gender']];
			}
		}
		// dump($gueUser);
		$this->assign('gueuser',$gueUser);
	}
}
