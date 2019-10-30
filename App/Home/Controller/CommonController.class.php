<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends PublicController
{

	public function __construct() {
		
		parent::__construct();
		
		//用户中心拿出用户的一些信息
		$user = D('User')->field()->find(session('user')['id']);
                                    $this->userother=M('User_params')->where('userid='.session('user')['id'])->find();
                                    $this->userother1=M('Contact_information')->where('userid='.session('user')['id'])->find();
                                 //   dump($this->userother1);
                                 //   dump($this->userother);
		$this->assign('user', $user);
	}

    //用户的一些操作是否登录，没有则跳转至登录界面
    public function _initialize() {
        parent::_initialize();
        if(!session('?user')) {
            $this->display('Login/login');
            exit();
        }
    }
   
    
}
