<?php
namespace Home\Controller;

class UserParamsController extends CommonController
{
	//*************************查询详细资料方法***********************//
	public function index(){
		//获取session中用户的值
		$user = session("user");
		//获取登陆后的用户id
		$userid = $user['id'];
		//创建user对象
		$userinfo = M("user");
		$res=$userinfo->where("id=".$userid)->find();
		//将值放入模板
		$this->assign("email",$res['email']);
		$this->assign("username",$res['username']);
		//创建user_params对象
		$params = M("user_params");
		$userparams = $params->where("userid=".$userid)->find();
		//算出用户年龄
		$age = date("Y",time())-$userparams['ageyear'];
		//用户生日
		$birthday = $userparams['agemonth'].".".$userparams['ageday'];
		//查询所在城市
		$shi = $userparams['cityid'];
		$sheng = $userparams['provinceid'];

		$dis = M("district");
		$provinceid=$dis->where("level=1")->select();
		$city=$dis->where("level=2")->select();
		
		foreach($provinceid as $k=>$v){
			if($v['id'] == $sheng){
				$this->assign("sheng",$v['name']);
			}
		}		
		foreach($city as $k=>$v){
			if($v['id'] == $shi){
				$this->assign("shi",$v['name']);
			}
		}
		$this->assign("age",$age);
		$this->assign("ageyear",$userparams['ageyear']);
		$this->assign("agemonth",$userparams['agemonth']);
		$this->assign("ageday",$userparams['ageday']);
		$this->assign("height",$userparams['height']);
		$this->assign("birthday",$birthday);
		//用户出生年份
		$zodiac = $userparams['ageyear'];
		//对用户年份取余
		$yu = $zodiac%12;
		//============================生肖===================================
		$shuxing = array(0=>'猴',1=>'鸡',2=>'狗',3=>'猪',4=>'鼠',5=>'牛',6=>'虎',7=>'兔',8=>'龙',9=>'蛇',10=>'马',11=>'羊');
		
		$this->assign("shuxing",$shuxing[$yu]);
		//=============================写入模板================================
		$zhiye = array(0=>"=请选择=",1=>"在校学生",2=>"计算机/互联网/IT",3=>"电子/半导体/仪表仪器",4=>"通信技术",5=>"销售",6=>"市场拓展",7=>"公关/商务",8=>"采购/贸易",9=>"客户服务/技术支持",10=>"人力资源/行政管理",11=>"高级管理",
		12=>"生产/加工/制造",13=>"质控/安检",14=>"工程机械",15=>"技工",16=>"会计/审计/统计",17=>"金融/证券/投资",18=>"房地产/装修/物业",19=>"仓储/物流",20=>"交通/运输",
		21=>"普通劳动力/家政服务",22=>"普通服务行业",23=>"航空服务行业",24=>"教育/培训",25=>"咨询/顾问",26=>"学术/科研",27=>"法律",28=>"设计/创意",29=>"文学/传媒/影视",30=>"餐饮/旅游",31=>"化工",
		32=>"能源/地质勘查",33=>"医疗/护理",34=>"保健/美容",35=>"生物/制药/医疗器械",36=>"体育工作者",37=>"翻译",38=>"公务员/国家干部",39=>"私营业主",40=>"农/林/牧/渔业",41=>"警察/其他",42=>"自由职业者",43=>"其他");
		
		$marry = array(1=>"单身",2=>"已婚",3=>"离异",4=>"丧偶");
		$this->assign("marrystatus",$marry[$userparams['marrystatus']]);

		$this->assign("zhiye",$zhiye);
		
		$this->assign("userparams",$userparams);

		$this->display("index");
		
	}
	//**********************获取修改资料的方法*************************//
	public function update(){
		//获取详细资料操作对象
		$send = M("user_params");
		//获取session的值
		$user = session("user");
		//获取用户id
		$userid = $user['id'];		
		//将传来的值添加到数据库
		$data['hukou'] = $_POST['hukou'];
		$data['huji'] = $_POST['huji'];
		$data['child'] = $_POST['child'];
		$data['lovesort'] = $_POST['lovesort'];
		$data['personality'] = $_POST['personality'];
		$data['bloodtype'] = $_POST['bloodtype'];
		$data['job'] = $_POST['job'];
		$data['salary'] = $_POST['salary'];
		$data['house'] = $_POST['house'];
		$data['car'] = $_POST['car'];
		$data['weight'] = $_POST['weight'];
		$data['zjappearance'] = $_POST['zjappearance'];
		$data['attractive'] = $_POST['attractive'];
		$data['haircut'] = $_POST['haircut'];
		$data['haircolor'] = $_POST['haircolor'];
		$data['face'] = $_POST['face'];
		$data['size'] = $_POST['size'];

		//发送保存数据
		$res = $send->where("userid=".$userid)->save($data);

		if(!$res){
			$this->assign("errorInfo","修改失败！");
			$this->display("Login/systemInfo");
		}else{
			$this->assign("sysCall","修改成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}	
	}	
	//*****************************加载户籍信息**********************************
	public function loaddist($upid=0){
		$mod = M("district");
		$list = $mod->where("upid=".$upid)->select();
		
		echo json_encode($list);
		
		exit();
	}
}