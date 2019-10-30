<?php
namespace Home\Controller;

class GreetController extends CommonController
{
	//查看收到的问候
	public function index(){
		$this->selectList('hibox','touserid','receivedel','fromuserid','index');
	}
	//查看发送的问候
	public function send(){
		$this->selectList('hibox','fromuserid','senddel','touserid','send');
	}
	//查看单条收件信息
	public function receiveView(){
		$mod = D("Hibox");
		$info = $mod->find($_GET['id']);
		$info['content'] = M("Greet")->field("greeting")->where("id=".$info['greetid'])->find();
		$info['user'] = M("User")->field("username")->where("id=".$info['fromuserid'])->find();
		
		$this->assign("info",$info);
		
		if($info['status']==1){
			$data['status'] = 2;
			$mod->where("id=".$info['id'])->save($data);
		}
		$this->display("receiveview");
	}
	//查看单条发件信息
	public function sendView(){
		$mod = D("Hibox");
		$info = $mod->field('greetid,touserid,addtime')->find($_GET['id']);
		$info['content'] = M("Greet")->field("greeting")->where("id=".$info['greetid'])->find();
		$info['user'] = M("User")->field("username")->where("id=".$info['touserid'])->find();
		$this->assign("info",$info);
		$this->display("sendview");
	}
	
	//获取问候语
	public function add(){
		if(session('user')['id']==$_POST['touserid']){
			echo json_encode("自己");
			return ;
		}
		$gender1 = M("User_params")->field('gender')->where("userid=".session('user')['id'])->find();
		$gender2 = M("User_params")->field('gender')->where("userid=".$_POST['touserid'])->find();
		$aa = $gender1['gender'];
		$bb = $gender2['gender'];
		
		if($aa==$bb){
			$data = " male=1 and female=1 ";//同性恋  male=1 AND female=1;
		}elseif($aa == 1){
			$data = " male=0 and female=1 ";//男泡女  male=0 AND female=1;
		}elseif($bb == 1){
			$data = " male=1 and female=0 ";//女泡男  male=1 AND female=0;
		}
		$sql = "SELECT id,greeting FROM yyw_greet WHERE ".$data." and id >= floor(RAND() * (SELECT MAX(id) FROM `yyw_greet`)) ORDER BY id LIMIT 5";
		
		$greet = M('Greet')->query($sql);
		
		echo json_encode($greet);
	}
	//添加问候语
	public function insert(){
		$mod = M("hibox");
		$data['greetid'] = $_POST['greetid'];
		$data['fromuserid'] = session('user')['id'];
		$data['touserid'] = $_POST['touserid'];
		$data['addtime'] = time();
		
		$mod->create($data);
		if($mod->add()){
			//添加积分
			$userPoints = new \Home\Controller\UserPointsController();
			$userPoints->insert('hi');
			echo json_encode("true");
		}else{
			echo json_encode("true");
		}
	}
	//执行修改状态（修改信息）
	public function update(){
		$mod = M("Hibox");
		$map['id'] = array('in',$_POST['delid']);
		$data[$_POST['type']] = array('exp','2');
		if($mod->where($map)->save($data)){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	//会员中心未读问候
	public function noRead(){
		$total = M('Hibox')->where('touserid='.session('user')['id']." and status = 1")->count();
		echo json_encode($total);
		exit();
	}
	//查询收到的信件/问候、联系人
	private function selectList($db,$to,$delstatus,$from,$view){
		$mod = D($db);
		
		$data[$to] = session('user')['id'];
		$data[$delstatus] = 1;
		if(isset($_GET['status'])){
			$data['status'] = $_GET['status'];
		}
		
		$total = $mod->where($data)->count();//查询发件总数
		if($total==0){
			$this->assign("total",$total);
			$this->display($view);
			return;
		}
		$page = new \Think\Page($total,10);
		
		$list = $mod->field('id,status,addtime,'.$from)->where($data)->limit($page->firstRow,$page->listRows)->order('addtime DESC')->select();//查询所有发件信息
		$user = array();
		for($i=0;$i<$total;$i++){
			$user[$i] = D("User")->field('id userid,username,avatar')->where("id=".$list[$i][$from])->find();
		}
		
		for($j=0;$j<count($user);$j++){
			//查询用户的参数放入user数组
			$param = D("User_params")->scope('normal')->where("userid=".$user[$j]['userid'])->find();
			foreach($param as $key=>$value){
				$user[$j][$key] = $value;
			}
		}
		
		foreach($user as &$arr){
			//查询用户对应的省和市，替换user数组中的值
			$arr['provinceid']   = M("District")->where("id=".$arr['provinceid'])->getField('name');
			$arr['cityid']       = M("District")->where("id=".$arr['cityid'])->getField('name');
			$arr['marrystatus']  = C('USER_CONFIG.MARRY')[$arr['marrystatus']];
			$arr['education']    = C('USER_CONFIG.EDU')[$arr['education']];
			$arr['salary']       = C('USER_CONFIG.SALARY')[$arr['salary']];
			$arr['avatar']       = empty($arr['avatar'])?C('USER_CONFIG.AVATAR')[$arr['gender']]:$arr['avatar'];
			$arr['icon']         = C('USER_CONFIG.ICON')[$arr['gender']];
			$arr['gender']       = ($arr['gender']=="1")?"男":"女";
		}
		for($k=0;$k<count($list);$k++){
			$list[$k]['user'] = $user[$k];
		}
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$show = $page->show();

		$this->assign("show",$show);
		$this->assign("total",$total);
		$this->assign("list",$list);
		$this->assign("user",$user);
		$this->display($view);
	}
}