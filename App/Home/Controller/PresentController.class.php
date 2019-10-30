<?php
namespace Home\Controller;

class PresentController extends CommonController
{
	public function index(){
		$giftinfo = M("gift_record");
		$user = session("user");
		//查询礼物发送记录

		$total = $giftinfo->where("touserid=".$user['id'])->count();
		
		//创建分页对象
		$page  = new \Think\Page($total,4);

		//获取所有礼物信息
		$list = $giftinfo->where("touserid=".$user['id'])->order("id desc")->limit($page->firstRow,$page->listRows)->select();

		//放置到模板中
		$this->assign("reinfo",$list);
		$this->assign("gifts",json_encode($total));
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板中

		$this->display("index");
	}
	public function send(){
		$gifts = M("gift_record");
		$user = session("user");

		$total = $gifts->where("fromuserid=".$user['id'])->count();
		
		//创建分页对象
		$page  = new \Think\Page($total,4);

		//获取所有礼物信息
		$list = $gifts->where("fromuserid=".$user['id'])->order("id desc")->limit($page->firstRow,$page->listRows)->select();

		//放置到模板中
		$this->assign("reinfo",$list);
		$this->assign("gifts",json_encode($total));
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板中
		
		$this->display("send");
	}
	public function del($id){
		$gif = M("gift_record");
		$res = $gif->where("giftid=".$id)->delete();
		if($res){
			$this->assign("sysCall","删除成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}else{
			$this->assign("sysCall","删除失败！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}
	}	

}