<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       
        //调用网站公告赋值操作
        $noticeController = new \Home\Controller\NoticeController();
        $noticeController->index();
        
        // new了广告类 广告类就不能继承common类
		//下边的广告
        $advertising = new \Home\Controller\AdvertisingController();
		$advertising->index();
        //轮播右边个人信息展示
        $userInfo = D('User')->field()->find(session('user'));
        $this->assign('userInfo', $userInfo);
        
        $link = new PublicController();
		$link->index();
		//最热日记
		$hotDiary = D('Diary')->scope('show,hot')->where("status=2")->limit(5)->select();
		$this->assign("hotdiary",$hotDiary);
		//推荐男会员和女会员
		$female = $this->recommendUser('female');
		$male = $this->recommendUser('male');
		$newUser = $this->newUser();
		//个人日记总数
		$diaryTotal = D('Diary')->where('userid='.session('user')['id'])->count();
		$this->assign('diarytotal',$diaryTotal);		
		//会员礼物总数
		$present = D('gift_record')->where('touserid='.session('user')['id'])->count();
		$this->assign('present',$present);		
		//人气
		$views = D('user')->where('id='.session('user')['id'])->find();
		$this->assign('views',$views);
                //个人相册
                $this->albumTotal = D('User_photo_album')->where('userid='.session('user')['id'])->count();
		//独白模式
		$monUser = $this->monUser();
              //  dump($monUser);
		$this->assign('monuser',$monUser);
		
		$this->assign('female',$female);
		$this->assign('male',$male);
		$this->assign('newuser',$newUser);
		//$this->assign('list',$mod);
		$this->display("index");
    }
	
	//推荐会员
	public function recommendUser($type){
		// 推荐女会员
		if($type == 'female'){
			$map['gender'] = 2;
		}
		// 推荐男会员
		if($type == 'male'){
			$map['gender'] = 1;
		}
		$map['age'] = array('between',array(20,30));
		$list = D('UserParams')->field('userid,gender,cityid,age')->where($map)->limit(18)->order('rand()')->select();
		foreach($list as &$value){
			$value['cityid'] = D('District')->where('id='.$value['cityid'])->getField('name');
			$value['user'] = D('User')->field('username,avatar')->where('id='.$value['userid'])->find();
			if(empty($value['user']['avatar'])){
				$value['user']['avatar'] = C('USER_CONFIG.AVATAR');
			}
		}
		return $list;
	}
	
	//最新会员
	public function newUser(){
		$list = D('User')->field('id,username,avatar')->order('regtime desc')->limit(18)->select();
		foreach($list as &$value){
			$value['params'] = D('UserParams')->field('gender,cityid,age')->where('userid='.$value['id'])->find();
		}
		foreach($list as &$val){
			$val['params']['cityid'] = D('District')->where('id='.$val['params']['cityid'])->getField('name');
			if(empty($val['avatar'])){
				$val['avatar'] = C('USER_CONFIG.AVATAR');
			}
		}
		return $list;
	}
	
	public function monUser(){
		$data['monolog'] = 1;
		$list = D('UserParams')->field('userid,gender,provinceid,cityid,education,age')->where($data)->order('rand()')->limit(8)->select();
		foreach($list as &$val){
			$val['user'] = D('User')->field('username,avatar')->where('id='.$val['userid'])->find();
			$val['mon'] = D('ContactInformation')->where('userid='.$val['userid'])->getField('monologue');
			$val['provinceid'] = D('District')->where('id='.$val['provinceid'])->getField('name');
			$val['cityid'] = D('District')->where('id='.$val['cityid'])->getField('name');
			$val['icon'] = C('USER_CONFIG.ICON')[$val['gender']];
			$val['education'] = C('USER_CONFIG.EDU')[$val['education']];
			if(empty($val['user']['avatar'])){
				$val['user']['avatar'] = C('USER_CONFIG.AVATAR');
			}
		}
		return $list;
	}
}

