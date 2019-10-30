<?php

namespace Home\Controller;

class UserPointsController extends CommonController
{

    //查询积分记录列表
    public function index() {
        $mod = D('UserPoints');
        $staTime = strtotime($_REQUEST['startDate']);
        $endTime = strtotime($_REQUEST['endDate']);
        //拼装搜索条件
        $search = array();
        $urlList= array();
        $search['userid'] = array('eq', session('user')['id']);
		$search['status'] = array('eq', 1);

        if($_REQUEST['startDate']) {
            $search['addtime'] = array('egt', $staTime);
            $urlList[] = "startDate={$_REQUEST['startDate']}";
            
        }
        if($_REQUEST['endDate']) {
            $search['addtime'] = array('elt', $endTime);
            $urlList[] = "endDate={$_REQUEST['endDate']}";
        }
        if($_REQUEST['startDate'] && $_REQUEST['endDate']) {
            $search['addtime'] = array('between', array($staTime, $endTime));
            $urlList[] = "startDate={$_REQUEST['startDate']}";
            $urlList[] = "endDate={$_REQUEST['endDate']}";
        }
        if($_REQUEST['skeyword']) {
            $search['content'] = array('like', "%{$_REQUEST['skeyword']}%");
            $urlList[] = "skeyword={$_REQUEST['skeyword']}";
        }
        
        if(count($urlList) > 0) {
            $url = '&'.implode('&', $urlList);
        }
        
        $newPoints = $mod->order('id desc')->limit(1)->where('userid='.session('user')['id'].' and status=1')->select();
        $total = $mod->where($search)->count();
        
        $page = new \Home\Org\ShowPage($total, 5, $url);
        
        $list = $mod->order('addtime desc')->limit($page->limit)->where($search)->select();
        //dump($list);
        $this->assign('showPage', $page->fpage(array(0, 3, 4, 5, 6, 7, 8)));
        $this->assign('list', $list);
        $this->assign('newPoints', $newPoints[0]['points']);
        
        $this->assign('skeyword', $_REQUEST['skeyword']);
        $this->assign('startDate', $_REQUEST['startDate']);
        $this->assign('endDate', $_REQUEST['endDate']);
        $this->display('UserPoints/index');
    }
    
    //根据用户指定的操作添加积分记录
    public function insert($type, $val='') {
    //$val 暂定礼物id
        //$mod = D('UserPoints');
        //找出用户的积分
        $currentPoints = D('User')->field('points')->find(session('user')['id']);
        $status = false;
        $data = array();
        $update = array();
        
        $where = array();
        $where['userid'] = array('eq', session('user')['id']);
        $where['content'] = '每日登录网站，奖励积分';
        //找到每天登录的时间点
        $iTag = D('UserPoints')->field('addtime')->order('addtime desc')->limit(1)->where($where)->find();
        
        $where['addtime'] = array('between', array($iTag['addtime'], time()) );
        if($type == 'blog') {
            $where['content'] = array('eq', '发表一篇微博，奖励积分');
        }else if($type == 'diary') {
            $where['content'] = array('eq', '发表一篇日记，奖励积分');
        }else if($type == 'hi') {
			$where['content'] = array('eq', '成功打过一次招呼，奖励积分');
		}
        
        switch($type) {
            case 'reg'://注册
                $status = true;
                $data['increase'] = 300;
                $data['content'] = '注册新会员';
                break;
                
            case 'login'://每日登录
                
                $data['increase'] = 10;
                $data['content'] = '每日登录网站，奖励积分';
                
                break;
                
            case 'blog'://发表微博
                
                $data['increase'] = 20;
                $data['content'] = '发表一篇微博，奖励积分';
                break;
                
            case 'diary'://发表日记
            
                $data['increase'] = 30;
                $data['content'] = '发表一篇日记，奖励积分';
                break;
				
			case 'hi'://打招呼
				$data['increase'] = 20;
				$data['content'] = '成功打过一次招呼，奖励积分';
				break;
                
            case 'gift'://赠送礼物
                $status = true;
                $gift = D('Gift')->field(array('points'))->find($val);
                $data['reduce'] = $gift['points'];//扣除指定礼物的积分
                $data['content'] = '购买礼物什么样的，扣除积分';
                break;
        }
        $num = D('UserPoints')->where($where)->count();
        
        if($data['reduce']) {
            $data['points'] = $currentPoints['points'] - $data['reduce'];
        }else{
            $data['points'] = $currentPoints['points'] + $data['increase'];
        }
        
        $data['userid'] = session('user')['id'];
        $data['addtime'] = time();
        
        
        
        //每日登录    
        if($type == 'login' && ( time() - $iTag['addtime'] > (24*3600) ) ) {
            $status = true;
        }
        
        //每日发表微博限5次
        if($type == 'blog' && $num < 5) {
            $status = true;
        }
		//每日发表日记限5次
		if($type == 'diary' && $num < 5) {
			$status = true;
		}
		
		//打招呼
		if($type == 'hi' && $num < 10) {
			$status = true;
		}
        
        
        //符合增加积分记录条件
        if($status) {
            //添加积分记录
            D('UserPoints')->data($data)->add();
        
            //修改用户积分
            $update['id'] = session('user')['id'];
            $update['points'] = $data['points'];
            D('User')->data($update)->save();
            return true;
        }
        return true;
        
        
    }
    
    //删除指定积分记录的操作
    public function del() {
		$data = array();
		$data['id'] = $_GET['id'];
		$data['status'] = 0;
        if(D('UserPoints')->data($data)->save()) {
            //header('Location:'.$_SERVER['HTTP_REFERER']);
            $this->assign('sysCall', '删除成功!');
            $this->assign('sysUrl', $_SERVER['HTTP_REFERER']);
            $this->display('Login/loginInfo');
        }
    }
}
