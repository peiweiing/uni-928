<?php
namespace Home\Controller;
use Think\Controller;
class ChoseController extends Controller
{	
	//浏览择友选项方法
	public function index(){
		$this->display("index");
	}
	//加载城市信息方法
	public function loaddist($upid=0){
		$mod = M("district");
		$list = $mod->where("upid=".$upid)->select();
		echo json_encode($list);
		exit;
	}
	//设置择友条件方法
	public function setup(){
		dump($_POST);
	}
}