<?php

namespace Home\Controller;
class WbPersonController extends CommonController
{
	//单挑微博浏览
	public function index($id){
		$mod = D('wbreview')->field('id,uid,text,time')->where('id='.$id)->find();
		$user = D('user')->field('username,avatar')->where('id='.$mod['uid'])->find();
		$userinfo = D('user_params')->field('gender')->find();
		//当前用户发表的微博条数
		$num = D('wbreview')->where('uid='.$mod['uid'])->count();
		//微博评论条数
		$wbpnum = D('phwb')->where('wid='.$mod['id'])->count();
		if($wbpnum == null){
			$wbpnum = 0;
		}
		$sex = array('1'=>'male.gif','2'=>'female.gif');
		if(empty($user['avatar'])){
			$user['avatar'] = $sex[$userinfo['gender']];
		}
		//查询出用户信息和对应的微博信息并合并
		$allInfo = array_merge($mod,$user);
		//评论查询显示
		$list= D('phwb')->field('id,content,time,uid')->where('wid='.$id)->select();
		$fid = D("wbreview")->field("uid")->where("id={$id}")->find();
		$this->getRev($list, $fid['uid']);
		$disTpl = '';

		foreach ($list as $v) {
			$disTpl .= "<div class='weinei1'>"; 
			$disTpl	.= "<a href='' target='_blank' class='head' title='查看资料' style='height:30px; width:30px'>";
			$disTpl	.=	"<img src='" . __ROOT__ . "/Public/Uploads/pic/{$v[avatar]}' border='0' style='height:30px;width:30px;' />";
			$disTpl	.=	"</a>";
			$disTpl	.=	"<span class='you'><a href='' title='查看TA的微播'><b>{$v['username']}</b></a>";
			$disTpl	.=	"对<a href=''title='查看TA的微播'><b>{$v['fusername']}</b></a>说：</span>";
			$disTpl	.=	"{$v['content']}";
			$disTpl	.=	"</div>";
			$disTpl	.=	"<div style='clear:both'></div>";
			$disTpl	.=	"<div class='huifu'>";
			$disTpl	.=	"<font color='#999999'>{$v['time']}</font>&nbsp;";
			$disTpl	.=	"<a href='javascript:void(0);' onclick='return doHuifu({$v['id']});' id='zwd{$v['id']}' >回复</a>";
			$disTpl	.=	"</div>";
			$disTpl .= $this->getDisTpl($v['rev']);	
		}
		$newDiary = D('Diary')->scope('show,new')->limit(9)->select();
		$this->assign('newdiary',$newDiary);
		$this->assign('disTpl', $disTpl);
		$this->assign('num',$num);
		$this->assign('wbpnum',$wbpnum);
		$this->assign('allInfo',$allInfo);
		$this->display('Weibo/wbperson');
	}
	
	private function getDisTpl($rev) {
		$disTpl = "";
		foreach ($rev as $v) {
			
			$disTpl .=	"<div class='weinei1' style=\"width:500px\">";
			$disTpl .=	"<a href=\"\" target=\"_blank\" class=\"head\" title=\"查看资料\" style=\"height:30px; width:30px\">";
			$disTpl .=	"<img src='" . __ROOT__ . "/Public/Uploads/pic/{$v['avatar']}' border='0' style='height:30px;width:30px;' />";
			$disTpl .=	"</a>";
			$disTpl .=	"<span class=\"you\"><a href=\"\" title=\"查看TA的微播\"><b>{$v['username']}</b></a>";
			$disTpl .=	"对<a href=''title=\"查看TA的微播\"><b>{$v['fusername']}</b></a>说：</span>";
			$disTpl .=	"{$v['content']}";
			$disTpl .=	"</div>";
			$disTpl .=	"<div style=\"clear:both\"></div>";
			$disTpl .=	"<div class=\"huifu\">";
			$disTpl .=	"<font color=\"#999999\">{$v['time']}</font>&nbsp;";
			$disTpl .=	"<a href=\"javascript:void(0);\" onclick=\"return doHuifu({$v['id']});\" id=\"zwd{$v['id']}\" >回复</a>";
			$disTpl .= "<div id='hkuang{$v['id']}'>";
			$disTpl .= "</div>";
			$disTpl .=	"</div>";
			
			if (isset($v['rev'])) {
				$disTpl .= $this->getDisTpl($v['rev']);
			}
		}
		return $disTpl;
	}
	
	private function getRev(&$list, $fid) {
		foreach ($list as &$v) {
			$user = M('user')->field('username, avatar')->where("id={$v['uid']}")->find();
			$sex = M('user_params')->field('gender')->where("userid={$v['uid']}")->find();
			
			$fuser = M('user')->field('username, avatar')->where("id={$fid}")->find();
			
			$v['username'] = $user['username'];
			$v['avatar'] = $user['avatar'];
			$v['sex'] = $sex['gender'];			
			
			$v['fusername'] = $fuser['username'];
			
			$tu = array("1"=>'male.gif',"2"=>'female.gif');
			if(empty($v['avatar'])){
				$v['avatar'] = $tu[$v['sex']];
			}			
			$revEx = M('phwb')->field('id,content,time,uid')->where("hid={$v['id']}")->select();
			
			if(! empty($revEx)) {
				$this->getRev($revEx, $v['uid']);
				$v['rev'] = $revEx;
			}
		}
		
		return $v['rev'];
	}
	
	//微博发表
	public function insert(){
		$mod = M('wbreview');
		$list['wbid'] = $mod->field('wbid')->where('uid='.session('user')['id'])->order('wbid desc')->find();
		if($list['wbid'] == null){
			$list['wbid'] = 1;
		}else{
			$list['wbid'] = $list['wbid']['wbid']+1;
		}
		$list['uid'] = session('user')['id'];
		$list['text'] = $_POST['content'];
		$list['time'] = date('m-d H:i',time());
		$info = array();
		if($mod->create($list)){
			if($mod->add()){
				$data2 = array();
				$info['error'] = true;
				$data1 = $mod->order('id desc')->where('uid='.session('user')['id'])->limit(1)->find();
				$data2 = M('user')->field('username,avatar')->where('id='.session('user')['id'])->find();
				$sex = D('user_params')->field('gender')->where('userid='.session('user')['id'])->find();
				$data2['gender'] = $sex['gender'];
				if($data2['avatar'] == null){
					if($data2['gender'] == 1){
						$data2['avatar'] = 'male.gif';
						}
					else{
						$data2['avatar'] = 'female.gif';
					}
				}
				$info['data'] = array_merge($data1,$data2);
				$userPointsController = new \Home\Controller\UserPointsController();
				$userPointsController->insert('blog');
			}else{
				$info['error'] = false;
				$info['data'] = '发表心情失败!';
			}
		}else{
			$info['error'] = false;
			$info['data'] = '发表心情失败';
		}
		echo json_encode($info);
	}
	
	//微博评论
	public function insertP(){
		$data['wid'] = $_POST['id'];
		$data['content'] = $_POST['content'];
		$data['time'] = date('Y-m-d H:i',time());
		$data['uid'] = session('user')['id'];
		$uid = D('wbreview')->field('uid')->where('id='.$data['wid'])->find()['uid'];
		$info = array();
		if($data['uid'] != $uid){
			if(D('phwb')->add($data)){
				$info['error'] = true;
				$data['id'] = D('phwb')->order('id desc')->limit(1)->field('id')->where('wid='.$data['wid'])->select()[0]['id'];
				
				$data1 = D('user')->field('username')->where('id='.$uid)->find();
				$data2 = D('user')->field('avatar')->where('id='.$data['uid'])->find();
				$data3 = D('user_params')->field('gender')->where('userid='.session('user')['id'])->find();
				$data['fname'] = session('user')['username'];
				$data['jname'] = $data1['username'];
				$tu = array(1=>'male.gif',2=>'female.gif');
				if(empty($data2['avatar'])){
					$data['avatar'] = $tu[$data3['gender']];
				}else{
					$data['avatar'] = $data2['avatar'];
				}
				$info['data'] = $data;
			}else{
				$info['error'] = false;
				$info['data'] = '评论失败';
			}
		}else{
			$info['error'] = false;
			$info['data'] = '不能评论自己';
		}
		echo json_encode($info);
	}
	
	public function insertH(){
		$data['hid'] = $_POST['id'];
		$data['content'] = $_POST['content'];
		$data['time'] = date('Y-m-d H:i',time());
		$data['uid'] = session('user')['id'];//当前用户id
		$uid = D('phwb')->field('uid')->where('id='.$data['hid'])->find()['uid'];//80  zhouwenda
		$info = array();
		if($data['uid'] != $uid){
			if(D('phwb')->add($data)){
				//获取当前被评论的用户名字
				$data1 = D('user')->field('username')->where('id='.$uid)->find();
				//获取回复用户的头像
				$data2 = D('user')->field('avatar')->where('id='.$data['uid'])->find();
				$data3 = D('user_params')->field('gender')->where('userid='.$data['uid'])->find();
				$data['fname'] = session('user')['username'];
				$data['jname'] = $data1['username'];
				$tu = array(1=>'male.gif',2=>'female.gif');
				if(empty($data2['avatar'])){
					$data['avatar'] = $tu[$data3['gender']];
				}else{
					$data['avatar'] = $data2['avatar'];
				}
				$info['error'] = true;
				$info['data'] = $data;
			}else{
				$info['error'] = false;
				$info['data'] = '回复失败';
			}
			
		}else{
			$info['error'] = false;
			$info['data'] = '不能回复自己';
		}
		echo json_encode($info);
	}
}
?>