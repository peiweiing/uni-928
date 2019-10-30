<?php
namespace Home\Controller;

class InformationController extends CommonController
{
	public function index(){
		$mod = M("contact_information");
		$user = session("user");
		$information = $mod->where("userid=".$user['id'])->find();
		$this->assign("jurisdiction",$information['jurisdiction']);
		$this->assign("information",$information);
		$this->display("index");
	}
	
	public function update(){
		$user = session("user");
		$data['phone'] = $_POST['phone'];
		$data['qq'] = $_POST['qq'];
		$data['telephone'] = $_POST['telephone'];
		$data['wechat'] = $_POST['wechat'];
		$data['blog'] = $_POST['blog'];
		$data['address'] = $_POST['address'];
		$data['code'] = $_POST['code'];
		$data['jurisdiction'] = $_POST['jurisdiction'];
		$data['userid'] = $user['id'];
		

		$info = M('contact_information')->where("userid=".$user['id'])->field('userid')->find();

	 	if(empty($info)){
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