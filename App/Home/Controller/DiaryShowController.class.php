<?php
namespace Home\Controller;

use Think\Controller;

class DiaryShowController extends PublicController
{
	//前台浏览日记
	public function index(){
		$mod = D("Diary");
		$newdiary = $mod->scope('show,new')->where("status=2")->limit(15)->select();
		$this->assign("newdiary",$newdiary);
		
		$hunlian = $mod->scope('show,hot')->where("catid=1 and status=2")->limit(6)->select();
		$aiqing = $mod->scope('show,hot')->where("catid=2 and status=2")->limit(6)->select();
		$liangxing = $mod->scope('show,hot')->where("catid=3 and status=2")->limit(6)->select();
		$qinggan = $mod->scope('show,hot')->where("catid=4 and status=2")->limit(6)->select();
		$shenghuo = $mod->scope('show,hot')->where("catid=5 and status=2")->limit(6)->select();
		$wenxue = $mod->scope('show,hot')->where("catid=6 and status=2")->limit(6)->select();
		
		//猜你喜欢
		$userlist = new UserListController();
		$userlist->guess();
		
		$this->assign("hunlian",$hunlian);
		$this->assign("aiqing",$aiqing);
		$this->assign("liangxing",$liangxing);
		$this->assign("qinggan",$qinggan);
		$this->assign("shenghuo",$shenghuo);
		$this->assign("wenxue",$wenxue);
		$this->display("index");
	}
	//显示日记列表
	public function diaryList(){
		$cat = M("Diary_category")->select();
		$all = array('id'=>'0','catname'=>'全部日记');
		array_unshift($cat,$all);
		$this->assign("cat",$cat);
		
		$mod = D("Diary");
		$hotdiary = $mod->scope('show,hot')->limit(10)->select();
		$this->assign("hotdiary",$hotdiary);
		
		if(isset($_GET['catid'])){
			$data['catid'] = $_GET['catid'];
			$this->assign("catid",$data['catid']);
			if($data['catid']=='0'){
				$data = null;
			}
		}
		$total = $mod->where($data)->count();
		$page = new \Think\Page($total,25);
		$list = $mod->field('id,userid,title,addtime')->where($data)->limit($page->firstRow,$page->listRows)->select();
		foreach($list as &$info){
			$info['username'] = D("User")->field("username")->where("id=".$info['userid'])->find();
		}
		
		//猜你喜欢
		$userlist = new UserListController();
		$userlist->guess();
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$show = $page->show();
		
		$this->assign('show',$show);
		$this->assign("list",$list);
		$this->display("diarylist");
	}
	//显示单个日记
	public function single(){
		$weather = array(1=>"晴天",2=>"阴天",3=>"多云",3=>"雨天",4=>"雷阵雨",5=>"雪天");
		$feel = array(1=>"开心",2=>"吃惊",3=>"抓狂",4=>"伤心",5=>"动心",6=>"愤怒",7=>"傻笑",8=>"疑惑",9=>"感叹",10=>"郁闷",11=>"沮丧",12=>"一般");
		$mod = D("Diary");
		//获取最热日记
		$hotdiary = $mod->scope('show,hot')->where("status=2 and power=1")->limit(10)->select();
		$this->assign("hotdiary",$hotdiary);
		//获取单条日记信息
		$mod->where("id=".$_GET['id'])->setInc('views');
		$info = $mod->where("id=".$_GET['id'])->find();
		$info['weather'] = $weather[$info['weather']];
		$info['feel'] = $feel[$info['feel']];
		$info['content'] = htmlspecialchars_decode($info['content']);
		
		$user = $this->getUserParams($info['userid'],'gender,provinceid,cityid,education,salary,age,height');
		
		//推荐会员
		$userlist = new UserListController();
		$userlist->recommend();
		
		$this->assign("user",$user);
		$this->assign("info",$info);
		$this->display("single");
	}
	
	
	private function getUserParams($id,$paramFields){
		
		$user = D('User')->field('id,username,avatar')->find($id);
		
		if(isset($paramFields)){
			$param = D("User_params")->field($paramFields)->where("userid=".$id)->find();//如果自定义的字段存在，则查询自定义的字段信息
		}else{
			$param = D("User_params")->scope('normal')->where("userid=".$id)->find();
		}
		
		
		if(!empty($param['provinceid'])){
			$param['provinceid'] = M("District")->where("id=".$param['provinceid'])->getField("name");
		}
		if(!empty($param['cityid'])){
			$param['cityid'] = M("District")->where("id=".$param['cityid'])->getField("name");
		}
		if(!empty($param['marrystatus'])){
			$param['marrystatus'] = C('USER_CONFIG.MARRY')[$param['marrystatus']];
		}
		if(!empty($param['education'])){
			$param['education'] = C('USER_CONFIG.EDU')[$param['education']];
		}
		if(!empty($param['salary'])){
			$param['salary'] = C('USER_CONFIG.SALARY')[$param['salary']];
		}
		foreach($param as $k=>$v){
			$user[$k] = $v;
		}
		
		if(empty($user['avatar'])){
			$user['avatar'] = C('USER_CONFIG.AVATAR')[$user['gender']];
		}
		$user['icon'] = C('USER_CONFIG.ICON')[$user['gender']];
		$user['gender'] = ($user['gender']==1)?'男':'女';
		
		return $user;
	}
	
}