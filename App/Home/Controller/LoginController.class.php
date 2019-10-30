<?php

namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller
{ 
    //提供用户登陆界面表单
    public function index() {
        $this->display("Login/login");
    }
    
    public function login() {
        
        
        //拿到账号密码，判断账号是用户昵称还是邮箱
        $str = '@';
        if(strpos($_POST['username'], $str)){
            $item = 'email';
            preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/', $_POST['username'], $res);
            
        }else{
            $item = 'username';
			preg_match('/^[\x{4e00}-\x{9fa5}]|[\w-_]{3,16}$/u', $_POST['username'], $res);
        }
        if(!$res) {
            $this->assign('errorInfo', '用户名格式不正确，必须为3-16个字符，1个汉字=2个字符');
            $this->display("Login/systemInfo");
            exit();
        }

       
        $mod = D('User');
        $info = $mod->where("{$item}='".$_POST['username']."'")->select();
        //通过->select()查询到的是二维数组
        //通过->find()查询到的是一个一维数组
        if($info[0]['status'] == 2) {
            $this->assign('errorInfo', '由于您之前的一些操作，该用户已禁止，请联系客服！');
            $this->display('Login/systemInfo');
            exit();
        }        
        if($info && ($info[0]['password'] == md5($_POST['password'])) ) {
            //找出用户的性别字段显示性别区分头像
            $userSex = D('User_params')->field('gender')->where("userid=".$info[0]['id'])->select();
            $info[0]['gender'] = $userSex[0]['gender'];

            //记录登陆次数 跟最后一次登陆时间
            $user = D('User')->find($info[0]['id']);
            $user['logintime'] = time();
            $user['loginviews']++;
            D('User')->data($user)->save();
            
            session('user', $info[0]);

            //添加积分记录 每日登录网站
            $userPointsController = new \Home\Controller\UserPointsController();
            $userPointsController->insert('login');
            
            $this->display("Login/loginInfo");
        }else{
            $this->assign('errorInfo', '登录失败，帐号或者密码错误！');
            $this->display("Login/systemInfo");
        }

    }
    
    //处理用户退出操作
    public function logout() {
        session('user', null);
        //通知用户退出成功
        
        $this->display('Login/loginInfo');
    }
    
    //提供用户注册表单界面
    public function register() {
		$this->assign('verifyInfo', '<font color="#999">请输入验证码</font>');
        $this->display("Login/register");
    }
    
    //将用户信息插入到数据库中
    public function insert() {

        $mod = D('User');
        //封装信息并判断
        if(!$mod->create()) {
            $info = $mod->getError();
            $this->assign("errorInfo", $info);
            //输出错误消息到页面
            $this->display('Login/systemInfo');
        }else{
            $mod->password = md5($_POST['password']);
            //$mod->regtime = time();

            //添加用户账号信息
            $mod->add();
            $userId = $mod->getLastInsId();

            //封装用户资料
            $params = array();
            $params['userid'] = $userId;
            $params['gender'] = $_POST['gender'];
            $params['ageyear'] = $_POST['ageyear'];
            $params['agemonth'] = $_POST['agemonth'];
            $params['ageday'] = $_POST['ageday'];
            $params['marrystatus'] = $_POST['marrystatus'];
            $params['education'] = $_POST['education'];
            $params['height'] = $_POST['height'];
            $params['provinceid'] = $_POST['provinceid'];
            $params['cityid'] = $_POST['cityid'];
            $params['age'] = date('Y', time()) - $params['ageyear'];

            //添加用户资料信息添加
            D('User_params')->data($params)->add();

            //把用户基本信息存到session
            $user = $mod->find($userId);
            $user['gender'] = $_POST['gender'];
            session('user', $user);

            //添加积分记录 注册
            $userPointsController = new \Home\Controller\UserPointsController();
            $userPointsController->insert('reg');
            
            //添加积分记录 每日登录
            $userPointsController->insert('login');
            
            //注册成功跳到首页
            header("Location:".U('Index/index'));
        }
		
    }
    
    public function getCode() {

        //验证码配置
        $config = array(
            'fontSize'  =>  15,
            'length'    =>  2,
            'useNoise'  =>  false,          
        );
        $Verify = new \Think\Verify($config);
        
        //输出验证码
        //@ 为src=""里的地址
        $Verify->entry();
    }

    
    //判断用户是否为会员
    private function isnanVIP() {
        //如果是VIP则给会员标志赋值为一张图片
        //vipImg
    
    }

    //加载注册城市街道信息
    public function addrAjax($upid=0) {
        $addrs = D('District')->where("upid={$upid}")->select();
        echo json_encode($addrs);
        exit();
    }

    //客户端验证用户名、邮箱唯一性
    public function unique($inputName, $inputValue){
        //echo $inputName.':'.$inputValue;
        $res = D('User')->field($inputName)->select();
        foreach($res as $v){
            if(in_array($inputValue, $v)){
                echo false;
                exit();
            }
        }
        echo true;
        exit();
    }
	
	//注册校验验证码
	public function verify($ver) {
		//dump($ver);
		$Verify = new \Think\Verify();
		if($Verify->check($ver, '')){
			echo true;
			exit();
		}
		echo false;
		exit();
	}
	
	/*
	public function fuZhi() {
		//if($val) {
			$this->item = $_POST['val'];
			$this->assign('sysCall', '登陆成功!');
			$this->assign('sysUrl', $this->item);
			return true;
			//echo 'hrevy';
			//echo $_POST['val'];
		//}
	}
	*/
	//检查用户是否登录
	public function checkUser(){
		if($_SESSION['user']==null){
			echo 'false';
			exit();
		}else{
			echo 'true';
			exit();
		}
	}

}
