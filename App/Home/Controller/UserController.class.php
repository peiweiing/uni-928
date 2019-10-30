<?php

namespace Home\Controller;

class UserController extends CommonController
{
    protected $state;

    //输出会员中心界面
    public function index() {
		
        if($act == 'userInfo') {
            $sql = "select u.*,up.lovestatus from yyw_user u,yyw_user_params up where u.id=up.userid and u.id=".$_SESSION['user']['id'];
            $list = M()->query($sql);
            
            $find = array();
            foreach($list as $v) {
                $find = $v;
            }
            $this->assign('item', $find['lovestatus']);
            $this->assign('loveSta', array('已关闭征友', '征友进行时'));
            $this->assign("find", $find);

            $this->display('User/userinfo');
            
        }else if($act == 'editPass') {
            $this->display('User/editPass');
            
        }else if($act == 'receiveEmail') {
            $find = D('User')->field('emailstatus')->find(session('user')['id']);
            $this->assign('esta', $find['emailstatus']);
            $this->display('User/receiveEmail');
            
        }else if($act == 'loveStatus') {
            $find = D('UserParams')->field('lovestatus')->where('userid='.session('user')['id'])->find();
            $this->assign('lsta', $find['lovestatus']);
            $this->display('User/loveStatus');
        }
        $this->display('User/userinfo');
    }

    //接收用户信息更改数据库的信息
    public function update($type) {
        //判断更改什么信息
        
        $data = array();
        //修改邮件接收状态
        if($type == 'receiveEmail'){
            $mod = D('User');
            $data['id'] = session('user')['id'];
            $data['emailstatus'] = $_POST['emailstatus'];
        //修改征友状态
        }else if($type == 'loveStatus'){
            $mod = D('UserParams');
            $res = $mod->where('userid='.session('user')['id'])->find();
            $data['id'] = $res['id'];
            $data['userid'] = session('user')['id'];
            $data['lovestatus'] = $_POST['lovestatus'];
        }else{
        //修改密码
            $mod = D('User');
            $find = $mod->field(array('password'))->where('id='.session('user')['id'])->find();
            if($find['password'] != md5($_POST['password'])) {
                $this->assign('errorInfo', '对不起，旧密码不正确');
                $this->display("Login/systemInfo");
                exit();
            }
            $data['id'] = session('user')['id'];
            $data['password'] = md5($_POST['newpassword']);
            
        }
        if($mod->data($data)->save()){
            if(in_array(md5($_POST['newpassword']), $data)) {
                $this->assign('sysCall', '密码修改成功，请记住新密码');
                
            }else{
                $this->assign('sysCall', '设置成功');
            }
            $this->assign('url', true);
            $this->display('Login/loginInfo');
        }
    }
    
    //输出用户信息列表
    public function view($act) {
    
        if($act == 'userInfo') {
            $sql = "select u.*,up.lovestatus from yyw_user u,yyw_user_params up where u.id=up.userid and u.id=".$_SESSION['user']['id'];
            $list = M()->query($sql);
            
            $find = array();
            foreach($list as $v) {
                $find = $v;
            }
            $this->assign('item', $find['lovestatus']);
            $this->assign('loveSta', array('已关闭征友', '征友进行时'));
            $this->assign("find", $find);

            $this->display('User/userinfo');
            
        }else if($act == 'editPass') {
            $this->display('User/editPass');
            
        }else if($act == 'receiveEmail') {
            $find = D('User')->field('emailstatus')->find(session('user')['id']);
            $this->assign('esta', $find['emailstatus']);
            $this->display('User/receiveEmail');
            
        }else if($act == 'loveStatus') {
            $find = D('UserParams')->field('lovestatus')->where('userid='.session('user')['id'])->find();
            $this->assign('lsta', $find['lovestatus']);
            $this->display('User/loveStatus');
        }
    }
    
    //vip
    public function vip(){
        
        $this->display();
    }
    
    //支付
    public function pay(){      
            $uid=session('user')['id'];
            $_POST['uid']=$uid;
            $_POST['orderno']=ordercode();
            $_POST['order_name']='vip300终身会员';
            $_POST['order_time']=time();
            //验证订单id
            $this->state=M("Order")->add($_POST);
            if($this->state){
                alipay($_POST['orderno'],$_POST['ordername'],$_POST['sum_money']);  //支付
            }else{
                    $this->error("非法操作！");//非法操作
            }

        
    }
    
	//支付宝即时到帐页面跳转同步通知页面
	public function returnurl(){
		$data=returnurl();
		if($data){
			$this->orderhandle();
		}
	}
	
	//支付宝即时到帐服务器异步通知页面方法
	public function notifyurl(){
		$data=notifyurl();
		if($data){
			$this->orderhandle();
		}
	}
        //处理订单
	public function orderhandle(){
		//更改当前用户账户信息
		//更新订单信息
		$orderData['is_pay'] = 1;
		$orderData['pay_time'] = time();
		$res=M("Order")->where('order_id='.$this->state)->save($orderData);
                                    $order=M("Order")->where('order_id='.$this->state)->find();
		//修改vip会员信息
                                   $coninfo=M('Contact_information');
                                   if($coninfo->where('userid='.$order['uid'])->find()){
                                       $coninfo->where('userid='.$order['uid'])->save(array('jurisdiction'=>1));//设置vip会员可见
                                   }else{
                                       $data['userid']=$order['uid'];
                                       $data['jurisdiction']=1;
                                       $coninfo->add($data);
                                   }
                                   
                                   
	}
	

}
