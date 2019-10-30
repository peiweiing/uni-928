<?php

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller
{
    //获取登陆界面的操作
    public function index() {
       
        $this->display('login');
    }
    public function login(){
		$a = 1;
		dump($a);
	}
    //处理用户登陆操作
    public function proLogin() {
/*
        $Verify = new \Think\Verify();
        if(!$Verify->check($_POST['verify'], '')){
            $this->assign('errorInfo', '验证码错误');
            $this->display('Login/login');
            exit();
        }*/
        $mod = D('User');
        $info = $mod->where("username='{$_POST['username']}'")->find();
        if($info['status'] == 0){
            if($info['password'] ==md5( $_POST['password'])){
                session('adminuser', $info);
                $this->redirect('Index/index');
            }else{
                $this->assign('errorInfo', '账号或密码错误!');
                $this->display('Login/login');
                exit();
            }
        }else{
            $this->assign('errorInfo', '登陆失败! 该账号不存在或已禁止');
            $this->display('Login/login');
            exit();
        }
    
    }
    
    //处理用户退出登陆操作
    public function logout() {
        session('adminuser', null);
        $this->display('Login/login');
    }
    
    //获取验证码
    public function getCode() {
        $config = array(
            'useNoise'  =>  false,
            'length'    =>  2,
            'fontSize'  =>  16,
        );
        $Verify = new \Think\Verify($config);
        $code = $Verify->entry();
    }
	//e10adc3949ba59abbe56e057f20f883e
	public function password(){
		$userinfo = session('adminuser');
		if(IS_POST){
			$pass =  I('post.pass','');
			$password = md5($pass);
			$res = M('User')->where('id=%d',$userinfo['id'])->save(array('password'=>$password));
			if($res !== false){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->display();
		}
		
	}
	
	
	
	
	
	
}
