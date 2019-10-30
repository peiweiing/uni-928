<?php
//自定义Stu学生信息控制类
namespace Home\Controller;

class MessageController extends CommonController
{
	public function index(){
		$this->selectList("UserMessage","receiveid","receivedel","sendid","index");
	}
	public function send(){
		$this->selectList("UserMessage","sendid","senddel","receiveid","send");
	}
	
	//查看单条收件信息
	public function receiveView(){
		$mod = D("User_message");
		$info = $mod->find($_GET['id']);
		$info['user'] = M("User")->field("username")->where("id=".$info['sendid'])->find();
		
		$this->assign("info",$info);
		if($info['status']==1){
			$data['status'] = 2;
			$mod->where("id=".$info['id'])->save($data);
		}
		$this->display("receiveview");
	}
	//查看单条发件信息
	public function sendView(){
		$mod = D("User_message");
		$info = $mod->find($_GET['id']);
		$info['user'] = M("User")->field("id,username")->where("id=".$info['receiveid'])->find();
		$this->assign("info",$info);
		$this->display("sendview");
	}
	
	//查找单人用户信息
	public function add(){
		
		$mod = D("User");
		$user = $mod->field("id,username,avatar")->where("status=1 and id=".$_POST['id'])->find();
		
		if($user==null){
			echo json_encode("不存在");
			exit();
		}
		if($user['id']==session('user')['id']){
			echo json_encode("自己");
			exit();
		}
		$user = $this->getUserParams($user['id']);
		
		echo json_encode($user);
		exit();
	}
	
	public function insert(){
		$mod = D("UserMessage");
		$_POST['sendid'] = session('user')['id'];
		if(!$mod->create($_POST,1)){
			echo "添加失败！";
		}
		if($mod->add()){
			echo "true";
		}else{
			echo "false";
		}
	}
	//执行修改状态（修改信息）
	public function update(){
		$mod = M("UserMessage");
		$map['id'] = array('in',$_POST['delid']);
		$data[$_POST['type']] = array('exp','2');
		if($mod->where($map)->save($data)){
			echo "true";
		}else{
			echo "false";
		}
	}
	//会员中心未读信件
	public function noRead(){
		$total = M('UserMessage')->where('receiveid='.session('user')['id']." and status = 1")->count();
		echo json_encode($total);
		exit();
	}
	
	//查询单个用户信息
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
	
	//查询收到的信件/问候、联系人
	protected function selectList($db,$to,$delstatus,$from,$view){
		$mod = D($db);
		
		$data[$to] = session('user')['id'];
		$data[$delstatus] = 1;
		if($_GET['status']=='read'){
			$data['status'] = 2;
		}elseif($_GET['status']=='unread'){
			$data['status'] = 1;
		}
		
		$total = $mod->where($data)->count();//查询发件总数
		
		
		if($total==0){
			$this->assign("total",$total);
			$this->display($view);
			return;
		}
		$page = new \Think\Page($total,10);
		$list = $mod->field('id,status,addtime,'.$from)->where($data)->order('addtime DESC')->limit($page->firstRow,$page->listRows)->select();//查询所有发件信息
		$user = array();
		for($i=0;$i<$total;$i++){
			$user[$i] = D("User")->field('id userid,username,avatar')->where("id=".$list[$i][$from])->find();
		}
		
		for($j=0;$j<count($user);$j++){
			//查询用户的参数放入user数组
			$param = D("UserParams")->scope('normal')->where("userid=".$user[$j]['userid'])->find();
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

		$page->setConfig('prev', "上一页"); 
		$page->setConfig('next', "下一页"); 
		$show = $page->show();
		
		$this->assign("show",$show);
		$this->assign("total",$total);
		$this->assign("list",$list);
		$this->assign("user",$user);
		$this->display($view);
	}
	
	
}