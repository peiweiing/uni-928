<?php
namespace Home\Controller;

class HighSearchController extends CommonController
{
	public function index(){
		//热门日记
		$hotdiary = D("Diary")->scope('show,hot')->limit(10)->select();
		$this->assign("hotdiary",$hotdiary);
		
		//猜你喜欢
		$userlist = new UserListController();
		$userlist->guess();
		
		$this->display("index");
	}
	
	public function doSearch(){
		$mod = D('UserParams');
		//推荐会员
		$userList = new UserListController();
		$userList->recommend();
		//猜你喜欢
		$userList->guess();
		
		//最新日记
		$newDiary = D('Diary')->scope('show,new')->limit(10)->select();
		$this->assign('newdiary',$newDiary);
		
		if(!empty($_POST['gender'])){			//判断性别
			$map['gender']=$_POST['gender'];
		}
		if(!empty($_POST['lovesort'])){			//交友类型
			$map['lovesort']=$_POST['lovesort'];
		}
		if(!empty($_POST['edu'])){
			$map['education'] = $_POST['edu'];	//学历
		}
		if(!empty($_POST['city'])){				//城市不为空
			$map['cityid'] = $_POST['city'];
		}
		if(!empty($_POST['province'])){			//省不为空
			$map['provinceid'] = $_POST['province'];
		}
		if(!empty($_POST['salary'])){			//月收入
			$map['salary'] = $_POST['salary'];
		}
		if(!empty($_POST['house'])){			//是否有房
			$map['house'] = $_POST['house'];
		}
		if(!empty($_POST['car'])){				//是否有车
			$map['car'] = $_POST['car'];
		}
		if(!empty($_POST['avatar'])){			//头像不为空
			$map['avatar'] = 1;
		}
		if(!empty($_POST['max_age'])){			//年龄范围
			if(!empty($_POST['min_age'])){
				$map['age'] = array('between',array($_POST['min_age'],$_POST['max_age']));
			}else{
				$map['age'] = array('elt',$_POST['max_age']);
			}
		}else{
			if(!empty($_POST['min_age'])){
				$map['age'] = array('egt',$_POST['min_age']);
			}
		}
		
		if(!empty($_POST['max_height'])){			//身高范围
			if(!empty($_POST['min_heihgt'])){
				$map['height'] = array('between',array($_POST['min_heihgt'],$_POST['max_height']));
			}else{
				$map['height'] = array('elt',$_POST['max_height']);
			}
		}else{
			if(!empty($_POST['min_heihgt'])){
				$map['height'] = array('egt',$_POST['min_heihgt']);
			}
		}	
		if(!empty($_POST['marry'])){				//婚姻状况
			$marry = implode($_POST['marry'],',');
			$map['marrystatus'] = array('in',$marry);
		}
		if(!empty($_POST['child'])){				//是否有小孩
			$child = implode($_POST['child'],',');
			$map['child'] = array('in',$child);
		}
		
		
		if($_GET['type']=='localopsex'){			//同城异性
			//获取登陆的用户类型
			$mbInfo = $mod->field('gender,provinceid,cityid')->where('userid='.session('user')['id'])->find();
			if($mbInfo['gender']==1){
				$map['gender'] = 2;
			}else{
				$map['gender'] = 1;
			}
			$pro = $mbInfo['provinceid'];
			if($pro == 1 || $pro ==2 || $pro==9 || $pro == 22 || $pro==32 || $pro == 33 || $pro == 34){
				$map['provinceid'] = $pro;
			}else{
				$map['cityid'] = $mbInfo['cityid'];
			}
		}
		
		$total = $mod->where($map)->count();		//搜索的总数
		if($total==0){
			$this->assign('total',$total);
			$this->display('UserList/userlist');
			exit();
		}
		
		$page = new \Think\Page($total,30);
		$userparam = $mod->field('userid,gender,provinceid,cityid,age')->where($map)->limit($page->firstRow,$page->listRows)->order('id desc')->select();
		$list = array();
		
		for($i=0;$i<count($userparam);$i++){
			$userparam[$i]['user'] = D('User')->field('username,avatar')->where('id='.$userparam[$i]['userid'].' and status=1')->find();
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
		}
		
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$show = $page->show();
		
		$this->assign('show',$show);
		$this->assign('list',$list);
		$this->display('UserList/userlist');
	}
}