<?php
namespace Home\Controller;

class MonologueController extends CommonController
{
	public function index(){
		$user = session('user');
		$mod = M('contact_information')->where("userid=".$user['id'])->find();
		$this->assign("monologue",$mod['monologue']);
		$this->display("index");
	}
	
	//修改内心独白
	public function update(){
		$mod = M("contact_information");
		$user = session('user');
		$data['monologue'] = $_POST['monologue'];
		$data['userid'] = $user['id'];
		$con = M('contact_information')->where("userid=".$user['id'])->field('userid')->find();
		
		if(empty($con)){
			D('UserParams')->where('userid='.$user['id'])->save(array('monolog'=>'1'));
			$s = M('contact_information')->add($data);
			$this->assign("sysCall","添加成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}else{
			$d = M('contact_information')->where("userid=".$user['id'])->save($data);
			$this->assign("sysCall","修改成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}
	}
}