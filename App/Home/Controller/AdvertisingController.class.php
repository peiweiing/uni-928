<?php
	
namespace Home\Controller;
use Think\Controller;

class AdvertisingController extends Controller
{
	public function index(){
		$list = D('advertising')->order('id desc')->limit(1)->find(31);
	
		$this->assign('advertising',$list);
	}
}
	
?>