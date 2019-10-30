<?php
namespace Home\Controller;

class DiaryController extends CommonController
{
	private $weather = array("请选择","晴天","阴天","多云","雨天","雷阵雨","雪天");
	private $feel = array('请选择','开心','吃惊','抓狂','伤心','动心','愤怒','傻笑','疑惑','感叹','郁闷','沮丧','一般');
	private $power = array(1=>'公开',2=>'仅自己看');
	
	//个人中心浏览日记
	public function index(){
		$mod = D("Diary");
		$total = $mod->scope('read')->where("userid=".session('user')['id'])->count();
		$page = new \Think\Page($total,15);
		$diaryList = $mod->scope('read')->where("userid=".session('user')['id'])->limit($page->firstRow,$page->listRows)->select();
		
		foreach($diaryList as &$diary){
			$diary['catid'] = M("diary_category")->field("catname")->where("id=".$diary['catid'])->find();
			$diary['comment'] = M('diary_comment')->where('diaryid='.$diary['id'])->count();
		}
		// dump($diaryList);
		$page->setConfig('prev', "上一页"); 
		$page->setConfig('next', "下一页"); 
		$show = $page->show();
		
		$this->assign("show",$show);
		$this->assign("diaryList",$diaryList);
		$this->display("index");
	}
	
	
	//获取添加日记模板
	public function add(){
		$this->assign("cat",M("Diary_category")->select());
		$this->display("add");
	}
	//执行添加日记
	public function insert(){
		$mod = D("Diary");
		$_POST['userid'] = session('user')['id'];
		
		if(!$mod->create($_POST)){
			$this->error($mod->getError());
		}
		if($mod->add()){
			//添加积分
			$userPoints = new \Home\Controller\UserPointsController();
			$userPoints->insert('diary');
			
			echo "<script>window.parent.doAdd('true');</script>";
		}else{
			echo "<script>window.parent.doAdd('false');</script>";
		}
		exit();
	}
	
	//执行日记删除
	public function del(){
		$mod = D("Diary");
		$res = $mod->where("id=".$_POST['id'])->delete();
		if($res){	
			echo json_encode("true");
		}else{
			echo json_encode("false");
		}
	}
	
	//加载修改日记模板
	public function edit(){
		$mod = D("Diary");
		$info = $mod->where("userid=".session('user')['id'])->find($_GET['id']);
		$cat = M("Diary_category")->select();
		
		$this->assign("info",$info);
		$this->assign("cat",$cat);
		$this->assign("weather",$this->weather);
		$this->assign("feel",$this->feel);
		$this->assign("power",$this->power);
		$this->display("edit");
	}
	
	//执行修改日记
	public function update(){
		$mod = D("Diary");
		if(!$mod->create()){
			$this->error($mod->getError());
		}
		if($mod->save()){
			echo "<script>window.parent.doEdit('true');</script>";
			// $this->success("修改成功！",U("Diary/index"));
		}else{
			echo "<script>window.parent.doEdit('false');</script>";
			// $this->error("修改成功！");
		}
		exit();
	}
	
	
}