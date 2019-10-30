<?php
namespace Home\Controller;
class ChooseController extends CommonController
{	
	//浏览择友选项方法
	public function index(){
		$userid = session("user")['id'];
		$sel = M("choose")->where("userid=".$userid)->order("id desc")->find();
		//反串行化返回模板
		$weight = unserialize($sel['weight']);
		$education = unserialize($sel['education']);
		$star = unserialize($sel['star']);
		$age = unserialize($sel['age']);
		$hismarriage = unserialize($sel['hismarriage']);
		$type = unserialize($sel['type']);
		$area = unserialize($sel['area']);

		$this->assign("weight",$weight);
		$this->assign("age",$age);
		$this->assign("hismarriage",$hismarriage);
		$this->assign("type",$type);;
		$this->assign("education",$education);
		$this->assign("areaa",json_encode($area[0]));

		$this->assign("sex",$sel['sex']);
		$this->assign("star",$star);
		$this->assign("ishead",$sel['ishead']);

		$mod = M("district");
		$list = $mod->where("id=".$area[1])->find();

		$this->assign("area",$list);
		$this->display("index");
	}

	//设置择友条件方法
	public function update(){
		//串行化数组值
		$userid = session("user")['id'];
		$age = serialize($_POST['age']);
		$weight = serialize($_POST['weight']);
		$star = serialize($_POST['star']);
		$education = serialize($_POST['education']);
		$area = serialize($_POST['area']);
		$hismarriage = serialize($_POST['hismarriage']);
		$type = serialize($_POST['type']);

		$data['userid'] = $userid;
		$data['sex'] = $_POST['sex'];
		$data['age'] = $age;
		$data['weight'] = $weight;
		$data['hismarriage'] = $hismarriage;
		$data['type'] = $type;
		$data['education'] = $education;
		$data['area'] = $area;
		$data['star'] = $star;
		$data['ishead'] = $_POST['ishead'];

		//封装信息
		$cho = M('choose')->where("userid=".$userid)->field('userid')->find();
		
	 	if(empty($cho)){
			$s = M('choose')->add($data);
			$this->assign("sysCall","添加成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}else{
			$d = M('choose')->where("userid=".$userid)->save($data);
			$this->assign("sysCall","修改成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}
	}
	
	
	//加载城市信息方法
	public function loaddist($upid=0){
		$mod = M("district");
		$list = $mod->where("upid=".$upid)->select();
		echo json_encode($list);
		exit;
	}	

}